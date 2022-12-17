<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "car_rental_system";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("There's an error during connection " . mysqli_connect_error());
}
