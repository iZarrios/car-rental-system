<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $office_Id = filter_var($_POST['office_Id'], FILTER_VALIDATE_INT);
    $country = trim(htmlentities(htmlspecialchars($_POST['country'])));
    $city = trim(htmlentities(htmlspecialchars($_POST['city'])));

    if (empty($office_Id)) {
        $errors[] = "office_Id is empty <br>";
    }
    if (empty($country)) {
        $errors[] = "country is empty <br>";
    }
    if (empty($city)) {
        $errors[] = "city is empty <br>";
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

            echo "done";
            //TODO:
            // header("Location: " . URL . "/views/office/all.php");
            // exit;
        } catch (\Throwable $th) {
            echo "Failed to add office from SQL Query" . "<br>";
        }
    } else {
        //TODO:
        $_SESSION['errors'] = $errors;
        echo "Failed to add office" . "<br>";
        // print_r($errors);
        // header("Location: " . URL . "/handlers/reservation/store.php");
        // exit;
    }
}
?>