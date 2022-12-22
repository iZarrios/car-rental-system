<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $user_id = filter_var($_POST['user_id'], FILTER_VALIDATE_INT);


    if (empty($user_id)) {
        $errors[] = "Invalid user_id Form";
    }


    // SELECT `user`.*,`reservation`.*,`car`.`plate_id`,`car`.`model` FROM `car`
    // JOIN `reservation` ON `reservation`.`plate_id`=`car`.`plate_id`
    // JOIN `user` ON `user`.`user_id`=`reservation`.`user_id`
    // WHERE `user`.`user_id`=14; 

    if (empty($errors)) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        try {

            $query = "
            SELECT `user`.*,`reservation`.*,`car`.`plate_id`,`car`.`model` FROM `car`
            JOIN `reservation` ON `reservation`.`plate_id`=`car`.`plate_id`
            JOIN `user` ON `user`.`user_id`=`reservation`.`user_id`
            WHERE `user`.`user_id`=$user_id; 
                ";
            $result = mysqli_query($conn, $query);

            $affectedRows = mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            // Printing Cars reserved
            $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // dd($cars);
            // Printing Cars reserved
            if ($affectedRows >= 1) {
                $_SESSION['report4_result'] = $cars;
            } else {
                $errors[] = "Returned 0 results" . "<br>";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "views/reports/report4.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/reports/report4.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/reports/report4.php");
        exit;
    }
}
?>