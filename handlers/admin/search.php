
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

    /* by car */
    $brand = trim(htmlentities(htmlspecialchars($_POST['brand'])));
    $model = trim(htmlentities(htmlspecialchars($_POST['model'])));
    $body = trim(htmlentities(htmlspecialchars($_POST['body'])));
    $color = trim(htmlentities(htmlspecialchars($_POST['color'])));
    $year = filter_var($_POST['year'], FILTER_VALIDATE_INT);
    $lower_price = filter_var($_POST['lower_price'], FILTER_VALIDATE_FLOAT);
    $upper_price = filter_var($_POST['upper_price'], FILTER_VALIDATE_FLOAT);

    /* by reservation date */
    $lower_date = validString($_POST['lower_date']);
    $upper_date = validString($_POST['upper_date']);


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

    /* by car */
    if (empty($brand)) {
        $brand_col = 1;
        $brand = 1;
    } else {
        $brand_col = 'car.brand';
    }

    if (empty($model)) {
        $model_col = 1;
        $model = 1;
    } else {
        $model_col = 'car.model';
    }

    if (empty($body)) {
        $body_col = 1;
        $body = 1;
    } else {
        $body_col = 'car.body';
    }

    if (empty($color)) {
        $color_col = 1;
        $color = 1;
    } else {
        $color_col = 'car.color';
    }

    if (empty($year)) {
        $year_col = 1;
        $year = 1;
    } else {
        $year_col = 'car.year';
    }
    if (empty($lower_price)) {
        $lower_price_col = 1;
        $lower_price = 1;
    } else {
        $lower_price_col = 'car.price_per_day';
    }

    if (empty($upper_price)) {
        $upper_price_col = 1;
        $upper_price = 1;
    } else {
        $upper_price_col = 'car.price_per_day';
    }


    /* by reservation date */
    $lower_date_col = 'reservation.reservation_date';
    $upper_date_col = 'reservation.reservation_date';


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
        AND $brand_col='$brand'
        AND $model_col='$model' 
        AND $body_col='$body' 
        AND $color_col='$color' 
        AND $year_col='$year' 
        AND $lower_price_col >= $lower_price
        AND $upper_price_col <= $upper_price
        AND $lower_date_col  >= '$lower_date'
        AND $upper_date_col  <= '$upper_date'";

        $result = mysqli_query($conn, $query);
        $affectedRows = mysqli_affected_rows($conn);

        // close connection
        mysqli_close($conn);

        $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($affectedRows >= 1) {
            $_SESSION['search_result'] = $cars;
        } else {
            $errors[] = "Returned 0 results";
            $_SESSION['errors'] = $errors;
        }
        header("Location: " . URL . "views/admin/advanced_search.php");
        exit;
    } catch (\Throwable $th) {;
        $errors[] = $th;
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/admin/advanced_search.php");
    }
} else {
    $_SESSION['errors'] = $errors;
    header("Location: " . URL . "views/admin/advanced_search.php");
    exit;
}
?>