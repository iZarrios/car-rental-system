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
    $plate_id = filter_var($_POST['plate_id'], FILTER_VALIDATE_INT);
    $office_Id = filter_var($_POST['office_Id'], FILTER_VALIDATE_INT);

    $pick_up_date = validString($_POST['pick_up_date']);
    $pick_up_date_v = new DateTime($pick_up_date);

    $return_date = validString($_POST['return_date']);
    $return_date_v = new DateTime($return_date);

    $number_of_days = $pick_up_date_v->diff($return_date_v)->format("%r%a");


    if ($number_of_days <= 0) {
        $errors[] = "Wrong Dates";
    }
    $query = "SELECT `car`.* FROM `car` WHERE `plate_id` = '$plate_id'";

    $result = mysqli_query($conn, $query);

    $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // $payment = filter_var($_POST['payment'], FILTER_VALIDATE_INT);
    $payment = $number_of_days * floatval($cars[0]['price_per_day']);


    if (empty($user_id)) {
        $errors[] = "user_id is invalid";
    }

    if (empty($plate_id)) {
        $errors[] = "plate_id is invalid";
    }

    if (empty($office_Id)) {
        $errors[] = "office_Id is invalid";
    }

    if (empty($pick_up_date)) {
        $errors[] = "pick_up_date is empty";
    }

    if (empty($return_date)) {
        $errors[] = "return_date is empty";
    }

    // dd($cars[0]['status']);
    if ($cars[0]['status'] == 'rented') {
        $errors[] = "The car you are trying to rent is rented";
    }

    if ($cars[0]['status'] == 'out of service') {
        $errors[] = "The car you are trying to rent is out of service";
    }

    $query = "SELECT `user`.* FROM `user` WHERE `user_id` = $user_id";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if ((float)$users[0]['balance'] < (float)$payment) {
        $errors[] = "Your balance is not enough";
    }

    if (empty($errors)) {
        $reservation_date = date("Y/m/d");
        try {
            // Inserting a reservation
            $query = "
            INSERT INTO `reservation` (`user_id`, `plate_id`, `office_Id`, `reservation_date`, `pick_up_date`,`return_date`,`payment`)
            VALUES ($user_id,$plate_id, $office_Id, '$reservation_date', '$pick_up_date','$return_date',$payment)
            ";

            $result = mysqli_query($conn, $query);
            $affectedRows = mysqli_affected_rows($conn);

            // Updating Car status
            $query = "UPDATE car SET `status` = 'rented' WHERE `plate_id`=$plate_id";

            $result = mysqli_query($conn, $query);

            $affectedRows += mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            if ($affectedRows >= 1) {
                $_SESSION['success'] = "Reservation is done successfully";
                // Subtracting Balance
                $query = "
                UPDATE user SET balance = balance - $payment WHERE `user_id`=$user_id;
            ";
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