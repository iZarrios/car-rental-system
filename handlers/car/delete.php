<?php
require_once '../../core/config.php';
require_once PATH . 'core/connection.php';

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

if (isset($_GET['plate_id'])) {

    // dd($_GET['plate_id']);
    // check if this id car exist in car table in database
    $plate_id = $_GET['plate_id'];

    // getting the car id with the given id
    $car = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `car` WHERE `plate_id` = '$plate_id'"));
    // dd($car);
    // if it exists on our database
    if ($car) {
        // delete car from our database.
        $query = "DELETE FROM `car` WHERE `plate_id` = $plate_id";
        $result = mysqli_query($conn, $query);
        // if file exists for that car
        if (file_exists(PATH . "uploads/images/cars/" . $car['plate_id']) . ".jpg") {
            // delete the file
            unlink(PATH . "uploads/images/cars/" . $car['plate_id'] . ".jpg");
        } else {
            $errors[] = "Could not delete image ";
            $_SESSION['errors']  = $errors;
            header("Location:" . URL . "views/car/Delete_car.php");
        }
        $_SESSION['success'] = "Car Deleted Successfully";
        header("Location:" . URL . "views/car/Delete_car.php");
        exit;
    } else {
        $errors[] = "This car does not exist on the database";
        $_SESSION['errors']  = $errors;
        header("Location:" . URL . "views/car/Delete_car.php");
        exit;
    }
} else {

    $errors[] = "Could not delete the car";
    $_SESSION['errors']  = $errors;
    header("Location:" . URL . "views/car/Delete_car.php");
    exit;
}
