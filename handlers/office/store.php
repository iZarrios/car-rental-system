<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $office_Id = filter_var($_POST['office_Id'], FILTER_VALIDATE_INT);
    $country = trim(htmlentities(htmlspecialchars($_POST['country'])));
    $city = trim(htmlentities(htmlspecialchars($_POST['city'])));

    if (empty($office_Id)) {
        $errors[] = "office_Id is invalid";
    }
    if (empty($country)) {
        $errors[] = "country is invalid";
    }
    if (empty($city)) {
        $errors[] = "city is invalid";
    }

    if (empty($errors)) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        try {
            // Adding an office
            $query = "INSERT INTO `office` (`office_Id`,`country`, `city`) VALUES ($office_Id,'$country','$city')";
            $result = mysqli_query($conn, $query);
            $affectedRows = mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            if ($affectedRows >= 1) {
                $_SESSION['success'] = "Added Successfully";
            } else {
                $errors[] = "No changes" . "<br>";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "views/office/add_office.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = "office_Id already exists";
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/office/add_office.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/office/add_office.php");
        exit;
    }
}
?>