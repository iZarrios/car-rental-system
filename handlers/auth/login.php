
<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['logged'])) {
    //TODO:
    header("Location: " . URL . "views/home.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    // Inputs
    // $email = $_POST['email'];
    // $password = sha1($_POST['password']);
    $password = trim($_POST['password']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ?? "";

    if (empty($email)) {
        //TODO: Redirection ??
        $errors[] = "Email wrong";
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'");
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {

        mysqli_free_result($result);
        //TODO: XD
        if ($user['password'] == $password) {

            $_SESSION['logged'] = $user;
            $_SESSION['logged']['full_name'] = $user['f_name'] . " " . $user['l_name'];
            //TODO: yes.
            header("Location:" . URL . "views/home.php");
            exit;
        } else {
            //TODO:
            $errors[] = "Wrong combination of credentials";
            exit;
        }
    }
} else {
    //TODO:
    header("Location: " . URL . "views/auth/login.php");
    exit;
}
