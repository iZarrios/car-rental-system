<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//TODO: check if car is reserved or not
// jquery payment
// we need to get user and sync balance of user with payment

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $user_id = filter_var($_POST['user_id'], FILTER_VALIDATE_INT);
    $plate_id = filter_var($_POST['plate_id'], FILTER_VALIDATE_INT);
    $office_id = filter_var($_POST['office_id'], FILTER_VALIDATE_INT);

    $reservation_date = validString($_POST['reservation_date']);
    $pick_up_date = validString($_POST['pick_up_date']);
    $pick_up_date = new DateTime($pick_up_date);

    $return_date = validString($_POST['return_date']);
    $return_date = new DateTime($return_date);

    $number_of_days = $pick_up_date->diff($return_date)->format("%r%a");


    if ($number_of_days <= 0) {
        $errors[] = "Wrong Dates";
    }
    $query = "SELECT `car`.* FROM `car` WHERE `plate_id` = '$plate_id'";

    $result = mysqli_query($conn, $query);

    $car = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // $payment = filter_var($_POST['payment'], FILTER_VALIDATE_INT);
    $payment = $number_of_days * floatval($car['price_per_day']);



    if (empty($user_id)) {
        $errors[] = "user_id is invalid";
    }

    if (empty($plate_id)) {
        $errors[] = "plate_id is invalid";
    }

    if (empty($office_Id)) {
        $errors[] = "office_Id is invalid";
    }

    if (empty($reservation_date)) {
        $errors[] = "reservation_date is empty";
    }

    if (empty($pick_up_date)) {
        $errors[] = "pick_up_date is empty";
    }

    if (empty($return_date)) {
        $errors[] = "return_date is empty";
    }

    if (empty($payment)) {
        $errors[] = "payment is invalid";
    }

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
        try {
            // Inserting a reservation
            $query = "
            INSERT INTO `reservation` (`user_id`, `plate_id`, `office_Id`, `reservation_date`, `pick_up_date`,`return_date`,`payment`)
            VALUES ($user_id,$plate_id, $office_Id, '$reservation_date', '$pick_up_date','$return_date',$payment)
            ";

            $result = mysqli_query($conn, $query);
            // Updating Car status
            // FIXME: by adding a trigger.
            $query = "UPDATE car SET `status` = 'reserved' WHERE `plate_id`=$plate_id";

            $result = mysqli_query($conn, $query);

            $affectedRows = mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            if ($affectedRows >= 1) {
                $_SESSION['success'] = "Reservation is done successfully";
            } else {
                $errors[] = "Couldn't Reserve the car!";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "views/car/rent_car.php?plate_id=" . $plate_id);
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/car/rent_car.php?plate_id=" . $plate_id);
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/car/rent_car.php?plate_id=" . $plate_id);
        exit;
    }
}
?>