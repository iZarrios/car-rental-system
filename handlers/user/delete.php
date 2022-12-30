<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

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
if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];


    $query = "DELETE FROM `user`
        WHERE `user`.`user_id`=$user_id";
    $result = mysqli_query($conn, $query);

    $_SESSION['success'] = "User Deleted Successfully";
    header("Location: " . URL . "views/user/all.php");
    exit;
} else {
    header("Location: " . URL . "views/site/index.php");
    exit;
}
?>