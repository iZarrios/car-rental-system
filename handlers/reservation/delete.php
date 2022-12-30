<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// if user is already logged in
if (!isset($_SESSION['logged'])) {
    header("Location: " . URL . "views/site/LogIn.php");
    exit;
}
if ($_SESSION['logged']['is_admin'] == "0") {
    header("Location: " . URL . "views/site/index.php");
    exit;
}

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $user_id = filter_var($_POST['user_id'], FILTER_VALIDATE_INT);
    $plate_id = filter_var($_POST['plate_id'], FILTER_VALIDATE_INT);
    $office_Id = filter_var($_POST['office_Id'], FILTER_VALIDATE_INT);


    if (empty($user_id)) {
        $errors[] = "user_id is invalid";
    }
    if (empty($plate_id)) {
        $errors[] = "plate_id is invalid";
    }
    if (empty($office_Id)) {
        $errors[] = "office_Id is invalid ";
    }

    if (empty($errors)) {

        /* Testcase
        1
        22408392
        1
        2010-10-19
        2010-11-19
        2010-10-30
        2000
         */
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        try {
            $query = "DELETE FROM `reservation` WHERE `user_id`=$user_id AND `plate_id`=$plate_id AND `office_Id`=$office_Id ";
            $result = mysqli_query($conn, $query);
            $affectedRows = mysqli_affected_rows($conn);
            // Updating Car status
            $query = "UPDATE car SET `status` = 'active' WHERE `plate_id`=$plate_id";
            $result = mysqli_query($conn, $query);

            $affectedRows += mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            if ($affectedRows >= 1) {
                $_SESSION['success'] = "Deleted Successfully";
            } else {
                $errors[] = "Not deleted, Please check your data";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "/views/reservation/cancel_reservation.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "/views/reservation/cancel_reservation.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "/views/reservation/cancel_reservation.php");
        exit;
    }
} else if (isset($_GET['user_id']) && isset($_GET['plate_id']) && isset($_GET['office_Id'])) {
    $errors = [];

    $user_id = filter_var($_GET['user_id'], FILTER_VALIDATE_INT);
    $plate_id = filter_var($_GET['plate_id'], FILTER_VALIDATE_INT);
    $office_Id = filter_var($_GET['office_Id'], FILTER_VALIDATE_INT);

    // dd($plate_id);

    if (empty($user_id)) {
        $errors[] = "user_id is invalid";
    }
    if (empty($plate_id)) {
        $errors[] = "plate_id is invalid";
    }
    if (empty($office_Id)) {
        $errors[] = "office_Id is invalid ";
    }

    if (empty($errors)) {

        /* Testcase
        1
        22408392
        1
        2010-10-19
        2010-11-19
        2010-10-30
        2000
         */
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        try {
            $query = "DELETE FROM `reservation` WHERE `user_id`=$user_id AND `plate_id`=$plate_id AND `office_Id`=$office_Id ";
            $result = mysqli_query($conn, $query);
            $affectedRows = mysqli_affected_rows($conn);
            // Updating Car status
            $query = "UPDATE car SET `status` = 'active' WHERE `plate_id`=$plate_id";
            $result = mysqli_query($conn, $query);

            $affectedRows += mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            if ($affectedRows >= 1) {
                $_SESSION['success'] = "Deleted Successfully";
            } else {
                $errors[] = "Not deleted, Please check your data";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "/views/reservation/all.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "/views/reservation/cancel_reservation.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "/views/reservation/cancel_reservation.php");
        exit;
    }
} else {
    header("Location: " . URL . "views/site/index.php");
    exit;
}
?>