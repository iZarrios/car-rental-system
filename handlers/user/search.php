
<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>


<?php
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
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    /* by user */
    $user_id = filter_var($_POST['user_id'], FILTER_VALIDATE_INT);
    $fname = trim(htmlentities(htmlspecialchars($_POST['fname'])));
    $lname = trim(htmlentities(htmlspecialchars($_POST['lname'])));
    $email = trim(htmlentities(htmlspecialchars($_POST['email'])));
    $lower_bdate = validString($_POST['lower_bdate']);
    $upper_bdate = validString($_POST['upper_bdate']);
    $gender = validString($_POST['gender']);
    $country = trim(htmlentities(htmlspecialchars($_POST['country'])));
    $city = trim(htmlentities(htmlspecialchars($_POST['city'])));

    $lower_balance = filter_var($_POST['lower_balance'], FILTER_VALIDATE_FLOAT);
    $upper_balance = filter_var($_POST['upper_balance'], FILTER_VALIDATE_FLOAT);


    /* by user */
    if (empty($user_id)) {
        $user_id_col = 1;
        $user_id = 1;
    } else {
        $user_id_col = 'user.user_id';
    }

    if (empty($fname)) {
        $fname_col = 1;
        $fname = 1;
    } else {
        $fname_col = 'user.fname';
    }

    if (empty($lname)) {
        $lname_col = 1;
        $lname = 1;
    } else {
        $lname_col = 'user.lname';
    }

    if (empty($email)) {
        $email_col = 1;
        $email = 1;
    } else {
        $email_col = 'user.email';
    }

    $lower_bdate_col = 'user.bdate';
    $upper_bdate_col = 'user.bdate';

    if ($gender == "Both") {
        $gender_col = 1;
        $gender = 1;
    } else {
        $gender_col = 'user.gender';
        if ($gender == "Male") {
            $gender = 1;
            $gender_col = 'user.gender';
        } else {
            $gender = 0;
        }
    }

    if (empty($country)) {
        $country_col = 1;
        $country = 1;
    } else {
        $country_col = 'user.country';
    }

    if (empty($city)) {
        $city_col = 1;
        $city = 1;
    } else {
        $city_col = 'user.city';
    }

    if (empty($lower_balance)) {
        $lower_balance_col = 1;
        $lower_balance = 1;
    } else {
        $lower_balance_col = 'user.balance';
    }

    if (empty($upper_balance)) {
        $upper_balance_col = 1;
        $upper_balance = 1;
    } else {
        $upper_balance_col = 'user.balance';
    }

    try {
        $query = "SELECT * FROM `reservation`  
        JOIN `user` ON `user`.`user_id`=`reservation`.`user_id`
        JOIN `car` ON `car`.`plate_id`=`reservation`.`plate_id`
        WHERE 
        $user_id_col=$user_id
        AND $fname_col='$fname'
        AND $lname_col='$lname'
        AND $email_col='$email'
        AND $lower_bdate_col >= '$lower_bdate'
        AND $upper_bdate_col <= '$upper_bdate'
        AND $gender_col=$gender
        AND $country_col='$country'
        AND $city_col='$city'
        AND $lower_balance_col >= $lower_balance
        AND $upper_balance_col <= $upper_balance";

        $result = mysqli_query($conn, $query);
        $affectedRows = mysqli_affected_rows($conn);

        // close connection
        mysqli_close($conn);

        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($affectedRows >= 1) {
            $_SESSION['search_result'] = $users;
        } else {
            $errors[] = "Returned 0 results";
            $_SESSION['errors'] = $errors;
        }
        header("Location: " . URL . "views/user/search_user.php");
        exit;
    } catch (\Throwable $th) {;
        $errors[] = $th;
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/user/search_user.php");
    }
} else {
    $_SESSION['errors'] = $errors;
    header("Location: " . URL . "views/user/search_user.php");
    exit;
}
?>