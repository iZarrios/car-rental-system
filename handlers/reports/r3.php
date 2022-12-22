<!-- The status of all cars on a specific day. -->

<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $date = validString($_POST['date']);

    if (empty($errors)) {
        try {
            // SELECT `car`.* FROM `car`
            // WHERE `car`.plate_id NOT IN (
            //     SELECT `car`.plate_id FROM `car`
            //     JOIN `reservation`ON `reservation`.plate_id=`car`.plate_id
            //     WHERE '2011-1-18' BETWEEN   `reservation`.pick_up_date AND  `reservation`.return_date
            // );
            $query_not_reserved_cars = "
            SELECT `car`.* FROM `car`
            WHERE `car`.plate_id NOT IN (
                SELECT `car`.plate_id FROM `car`
                JOIN `reservation`ON `reservation`.plate_id=`car`.plate_id
                WHERE '$date' BETWEEN   `reservation`.pick_up_date AND  `reservation`.return_date
            );
            ";
            // SELECT `car`.* FROM `car`
            // JOIN `reservation`ON `reservation`.plate_id=`car`.plate_id
            // WHERE '2011-1-18' BETWEEN   `reservation`.pick_up_date AND  `reservation`.return_date ;
            $query_reserved_cars = "
            SELECT `car`.* FROM `car`
            JOIN `reservation`ON `reservation`.plate_id=`car`.plate_id
            WHERE '$date' BETWEEN  `reservation`.`pick_up_date` AND  `reservation`.`return_date`;
            ";

            $result1 = mysqli_query($conn, $query_not_reserved_cars);
            $result2 = mysqli_query($conn, $query_reserved_cars);

            $affectedRows = mysqli_affected_rows($conn);


            // close connection
            mysqli_close($conn);


            // Printing Cars reserved
            $not_reserved_cars = mysqli_fetch_all($result1, MYSQLI_ASSOC);
            $reserved_cars = mysqli_fetch_all($result2, MYSQLI_ASSOC);


            foreach ($not_reserved_cars as $key => $value) {
                $not_reserved_cars[$key]["status"] = "active";
            }
            foreach ($reserved_cars as $key => $value) {
                $reserved_cars[$key]["status"] = "reserved";
            }

            $result = [...$not_reserved_cars, ...$reserved_cars];

            // dd($result);
            if ($affectedRows >= 1) {

                $_SESSION['report3_result'] = $result;
            } else {
                $errors[] = "Returned 0 results" . "<br>";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "views/reports/report3.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/reports/report3.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/reports/report3.php");
        exit;
    }
}
?>