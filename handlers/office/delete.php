<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $office_Id = filter_var($_POST['office_Id'], FILTER_VALIDATE_INT);

    // $reservation_date = validString($_POST['reservation_date']);
    // $reservation_date_exploded = explode('-', $reservation_date);

    if (empty($office_Id)) {
        $errors[] = "office_Id is empty <br>";
    }
    // if (empty($reservation_date)) {
    //     $errors[] = "reservation_date is empty <br>";
    // } else if (!checkdate($reservation_date_exploded[1], $reservation_date_exploded[2], $reservation_date_exploded[0])) {

    //     $errors[] = "Invalid Date";
    // }

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

            echo "done";
            // header("Location: " . URL . "/views/office/all.php");
            exit;
        } catch (\Throwable $th) {
            echo "Failed to delete office from SQL Query" . "<br>";
        }
    } else {
        //TODO:
        $_SESSION['errors'] = $errors;
        echo "Failed to delete office" . "<br>";
        print_r($errors);
        // exit;
    }
}
?>