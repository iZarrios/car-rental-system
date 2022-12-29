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

    $office_Id = filter_var($_POST['office_Id'], FILTER_VALIDATE_INT);


    if (empty($office_Id)) {
        $errors[] = "office_Id is invalid";
    }

    if (empty($errors)) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        try {
            $query = "DELETE FROM `office` WHERE `office_Id`=$office_Id";
            $result = mysqli_query($conn, $query);

            $affectedRows = mysqli_affected_rows($conn);


            // close connection
            mysqli_close($conn);

            if ($affectedRows >= 1) {
                $_SESSION['success'] = "Deleted Successfully";
            } else {
                $errors[] = "No changes" . "<br>";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "views/office/delete_office.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/office/delete_office.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/office/delete_office.php");
        exit;
    }
}
?>