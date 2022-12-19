<?php
require_once '../../core/config.php';
require_once PATH . 'core/connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['plate_id'])) {

    // check if this id car exist in car table in database

    $plate_id = $_GET['plate_id'];
    $query = "DELETE FROM `car` WHERE `plate_id` = $plate_id";
    $result = mysqli_query($conn, $query);

    $_SESSION['success'] = "Car Deleted Successfully";
    header("Location:" . URL . "views/car/all.php");
    exit;
} else {

    header("Location:" . URL . "views/car/all.php");
    exit;
}
