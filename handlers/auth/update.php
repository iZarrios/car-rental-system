<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// if user is not logged in
if (!isset($_SESSION['logged'])) {
    header("Location: " . URL . "views/site/index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $user_id = $_SESSION['logged']['user_id'];

    $fname = validString($_POST['fname']);
    $lname = validString($_POST['lname']);
    // dd($fname);

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ?? "";

    $country = validString($_POST['country']);

    $city = validString($_POST['city']);



    if (empty($fname)) {
        $errors[] = "First Name is required";
    }

    if (minVal($fname, 3) || maxVal($fname, 50)) {
        $errors[] = "First Name should be between 3 and 50 characters";
    }

    if (empty($lname)) {
        $errors[] = "First Name is required";
    }
    if (minVal($lname, 3) || maxVal($lname, 50)) {
        $errors[] = "Last Name should be between 3 and 50 characters";
    }

    if (empty($email)) {
        $errors[] = "Email field is required";
    }

    if (empty($country)) {
        $errors[] = "Country field is required";
    }

    if (empty($city)) {
        $errors[] = "City field is required";
    }

    if (empty($errors)) {
        $query = "UPDATE `user` 
        SET  `fname` = '$fname', `lname` = '$lname', 
         `email` = '$email',
         `city` = '$city',
         `country` = '$country'
        WHERE `user`.`user_id` = $user_id;
        ";
        $result = mysqli_query($conn, $query);
        $affectedRow = mysqli_affected_rows($conn);

        // Close DB Connection

        if ($affectedRow >= 1) {
            // update current user  info
            $result = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$user_id'");
            $user = mysqli_fetch_assoc($result);
            $_SESSION['logged'] = $user;
            $_SESSION['logged']['full_name'] = $user['fname'] . " " . $user['lname'];

            mysqli_close($conn);
            $_SESSION['success'] = "User Updated Successfully";
            header("Location:" . URL . "views/user/Edit_User.php");
            exit;
        } else {
            $_SESSION['success'] = "User Updated Successfully(with no new info changed)";
            header("Location:" . URL . "views/user/Edit_User.php");
            exit;
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/user/Edit_User.php");
        exit;
    }
} else {
    header("Location: " . URL . "views/site/index.php");
    exit;
}
?>


