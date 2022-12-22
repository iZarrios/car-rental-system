<!-- All reservations within a specified period including all car and customer information. -->

<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $lower_date = validString($_POST['lower_date']);
    $upper_date = validString($_POST['upper_date']);

    $lower_date_col = 'reservation_date';
    $upper_date_col = 'reservation_date';

    if (empty($errors)) {
        try {
            // SELECT `car`.* FROM `car`
            // JOIN `reservation`ON `reservation`.plate_id=`car`.plate_id
            // WHERE `reservation`.reservation_date > '2010-1-1'; 
            $query = "SELECT `car`.*,`user`.* FROM `car`
                JOIN `reservation` ON `reservation`.plate_id=`car`.plate_id
                JOIN `user` ON `user`.user_id=`reservation`.user_id
                WHERE ($lower_date_col >= '$lower_date'
                AND $upper_date_col <= '$upper_date')
                ";
            $result = mysqli_query($conn, $query);

            $affectedRows = mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            // Printing Cars reserved
            $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);


            // dd($cars);
            if ($affectedRows >= 1) {
                $_SESSION['report1_result'] = $cars;
            } else {
                $errors[] = "Returned 0 results" . "<br>";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "views/reports/report1.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/reports/report1.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/reports/report1.php");
        exit;
    }
}
?>