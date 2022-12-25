
<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// if user is already logged in
if (isset($_SESSION['logged'])) {
    header("Location: " . URL . "views/site/index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    // Inputs
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ?? "";
    // $password = sha1($_POST['password']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $errors[] = "Insufficient info";
        exit;
    }
    if (empty($password)) {
        $errors[] = "Insufficient info";
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'");
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        mysqli_free_result($result);
        if ($user['password'] == $password) {

            $_SESSION['logged'] = $user;
            $_SESSION['logged']['full_name'] = $user['fname'] . " " . $user['lname'];
            header("Location:" . URL . "views/site/index.php");
            exit;
        } else {
            $errors[] = "Wrong combination of credentials";
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/site/login.php");
            exit;
        }
    }
} else {
    header("Location: " . URL . "views/site/login.php");
    exit;
}
