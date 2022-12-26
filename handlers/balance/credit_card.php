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
    $fname = validString($_POST['fname']);
    $lname = validString($_POST['lname']);

    $cvv = filter_var($_POST['cvv'], FILTER_VALIDATE_INT);
    $card_number = filter_var($_POST['card_number'], FILTER_VALIDATE_INT);

    $month = (int)filter_var($_POST['expiration_month'], FILTER_VALIDATE_INT);
    $year = (int)filter_var($_POST['expiration_year'], FILTER_VALIDATE_INT);

    $added_balance = (float)filter_var($_POST['added_balance'], FILTER_VALIDATE_FLOAT);

    if (empty($fname)) {
        $errors[] = "fname is empty";
    }

    if (empty($lname)) {
        $errors[] = "lname is empty";
    }

    if (empty($cvv)) {
        $errors[] = "cvv is empty";
    } else {
        if (strlen($cvv) != 4) {
            $errors[] = "cvv is invalid";
        }
    }

    if (empty($card_number)) {
        $errors[] = "Card Number is empty";
    } else {
        if (strlen($card_number) != 8) {
            $errors[] = "card_number is invalid";
        }
    }

    if (empty($month)) {
        $errors[] = "month is empty";
    }
    if (empty($year)) {
        $errors[] = "year is empty";
    }
    if (empty($added_balance)) {
        $errors[] = "Added Balance is empty";
    } else {
        if ((float)$added_balance <= 0) {
            $errors[] = "Added balance must be greater than 0";
        }
    }

    if (!empty($fname) && !empty($lname)) {
        $query = "SELECT `user`.* FROM `user` WHERE `user_id` = $user_id";
        $result = mysqli_query($conn, $query);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if ($users[0]['lname'] != $lname || $users[0]['fname'] != $fname) {
            $errors[] = "Invalid Card data";
        }
    }

    if (!empty($month) && !empty($year)) {
        $current_year = (int)date("Y");
        $current_month = (int)date("m");
        if ($year - $current_year < 0) {
            $errors[] = "Credit Card is expired";
        } else if ($year - $current_year == 0) {
            if ($month - $current_month <= 0) {
                $errors[] = "Credit Card is expired";
            }
        }
    }

    if (empty($errors)) {
        try {
            // Adding Balance
            $query = "
            UPDATE user SET `balance` = balance + $added_balance WHERE `user_id`=$user_id
            ";

            $result = mysqli_query($conn, $query);
            $affectedRows = mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            if ($affectedRows >= 1) {
                $_SESSION['success'] = "Reservation is done successfully";
            } else {
                $errors[] = "Please enter a vaild user_id!";
                $_SESSION['errors'] = $errors;
            }
            $_SESSION['success'] = "Balance is added successfully";
            header("Location: " . URL . "views/user/balance.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/user/balance.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/user/balance.php");
        exit;
    }
}
?>