
<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $brand = trim(htmlentities(htmlspecialchars($_POST['brand'])));
    $model = trim(htmlentities(htmlspecialchars($_POST['model'])));
    $body = trim(htmlentities(htmlspecialchars($_POST['body'])));
    $color = trim(htmlentities(htmlspecialchars($_POST['color'])));
    $year = filter_var($_POST['year'], FILTER_VALIDATE_INT);
    $lower_price = filter_var($_POST['lower_price'], FILTER_VALIDATE_FLOAT);
    $upper_price = filter_var($_POST['upper_price'], FILTER_VALIDATE_FLOAT);

    // $description    = trim(htmlentities(htmlspecialchars($_POST['description'])));
    // $category_id    = filter_var($_POST['category_id'], FILTER_VALIDATE_INT);

    if (empty($brand)) {
        $brand_col = 1;
        $brand = 1;
    } else {
        $brand_col = 'brand';
    }

    if (empty($model)) {
        $model_col = 1;
        $model = 1;
    } else {
        $model_col = 'model';
    }

    if (empty($body)) {
        $body_col = 1;
        $body = 1;
    } else {
        $body_col = 'body';
    }

    if (empty($color)) {
        $color_col = 1;
        $color = 1;
    } else {
        $color_col = 'color';
    }

    if (empty($year)) {
        $year_col = 1;
        $year = 1;
    } else {
        $year_col = 'year';
    }

    if (empty($lower_price)) {
        $lower_price_col = 1;
        $lower_price = 1;
    } else {
        $lower_price_col = 'price_per_day';
    }

    if (empty($upper_price)) {
        $upper_price_col = 1;
        $upper_price = 1;
    } else {
        $upper_price_col = 'price_per_day';
    }


    // SELECT * FROM `car` 
    // WHERE `brand`= 'Dodge' AND `model`='MIMI' AND `body`='Sedan' AND `color`='blue' AND `year`=2010 AND `price_per_day` <700;
    try {
        $query = "SELECT * FROM `car` WHERE 
        $brand_col='$brand' 
        AND $model_col='$model' 
        AND $body_col='$body' 
        AND $color_col='$color' 
        AND $year_col='$year' 
        AND $lower_price_col>=$lower_price
        AND $upper_price_col<= $upper_price
        AND `status` = 'active'";

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
        header("Location: " . URL . "views/car/search_by_specs.php");
        exit;
    } catch (\Throwable $th) {;
        $errors[] = $th;
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/car/search_by_specs.php");
    }
} else {
    $_SESSION['errors'] = $errors;
    header("Location: " . URL . "views/car/search_by_specs.php");
    exit;
}
?>