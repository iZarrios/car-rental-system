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
    $lower_date_exploded = explode('-', $lower_date);

    $upper_date = validString($_POST['upper_date']);
    $upper_date_exploded = explode('-', $upper_date);


    if (empty($lower_date)) {
        $lower_date_col = 1;
        $lower_date = 1;

        // month,day,year
    } else if (!checkdate($lower_date_exploded[1], $lower_date_exploded[2], $lower_date_exploded[0])) {
        $errors[] = "Invalid Lower(From) Date";
    } else {
        $lower_date_col = 'reservation_date';
    }
    if (empty($upper_date)) {
        $upper_date_col = 1;
        $upper_date = 1;
    } else if (!checkdate($upper_date_exploded[1], $upper_date_exploded[2], $upper_date_exploded[0])) {
        $errors[] = "Invalid Upper(To) Date";
    } else {
        $upper_date_col = 'reservation_date';
    }

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
            }
            header("Location: " . URL . "/views/reports/report1.php");
            exit;
        } catch (\Throwable $th) {
            echo $th;
            echo "Failed to get report from SQL Query" . "<br>";
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "/views/reports/report1.php");
        exit;
    }
}
?>