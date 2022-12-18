<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $user_id = filter_var($_POST['user_id'], FILTER_VALIDATE_INT);
    $plate_id = filter_var($_POST['plate_id'], FILTER_VALIDATE_INT);
    $office_Id = filter_var($_POST['office_Id'], FILTER_VALIDATE_INT);

    // $reservation_date = validString($_POST['reservation_date']);
    // $reservation_date_exploded = explode('-', $reservation_date);

    if (empty($user_id)) {
        $errors[] = "user_id is empty <br>";
    }
    if (empty($plate_id)) {
        $errors[] = "plate_id is empty <br>";
    }
    if (empty($office_Id)) {
        $errors[] = "office_Id is empty <br>";
    }

    // if (empty($reservation_date)) {
    //     $errors[] = "reservation_date is empty <br>";
    // } else if (!checkdate($reservation_date_exploded[1], $reservation_date_exploded[2], $reservation_date_exploded[0])) {

    //     $errors[] = "Invalid Date";
    // }

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
            // Updating Car status
            $query = "UPDATE car SET `status` = 'active' WHERE `plate_id`=$plate_id";
            $result = mysqli_query($conn, $query);

            $affectedRows = mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            echo "done";
            header("Location: " . URL . "/views/reservation/all.php");
            exit;
        } catch (\Throwable $th) {
            echo "Failed to delete" . "<br>";
        }
    } else {
        //TODO:
        $_SESSION['errors'] = $errors;
        echo "Failed to delete" . "<br>";
        print_r($errors);
        // exit;
        // header("Location: " . URL . "/handlers/reservation/store.php");
    }
}
?>