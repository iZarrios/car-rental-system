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
    $payment = filter_var($_POST['payment'], FILTER_VALIDATE_FLOAT);

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
    if (empty($payment)) {
        $errors[] = "payment is invalid ";
    }

    if (empty($errors)) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        try {
            $query = "UPDATE `reservation` SET `payment`=$payment WHERE `user_id`=$user_id AND `plate_id`=$plate_id AND `office_Id`=$office_Id";
            $result = mysqli_query($conn, $query);
            $affectedRows = mysqli_affected_rows($conn);

            $result = mysqli_query($conn, $query);

            $affectedRows += mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            if ($affectedRows >= 1) {
                $_SESSION['success'] = "Payment Edited Successfully";
            } else {
                $errors[] = "No Changes, Please check your data";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "views/reservation/all.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/reservation/all.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/reservation/all.php");
        exit;
    }
}
?>