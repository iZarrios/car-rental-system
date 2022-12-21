<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $plate_id = filter_var($_POST['plate_id'], FILTER_VALIDATE_INT);
    $brand = trim(htmlentities(htmlspecialchars($_POST['brand'])));
    $model = trim(htmlentities(htmlspecialchars($_POST['model'])));
    $body = trim(htmlentities(htmlspecialchars($_POST['body'])));
    $color = trim(htmlentities(htmlspecialchars($_POST['color'])));
    $year = filter_var($_POST['year'], FILTER_VALIDATE_INT);
    $status = trim(htmlentities(htmlspecialchars($_POST['status'])));
    $price_per_day = filter_var($_POST['price_per_day'], FILTER_VALIDATE_FLOAT);


    // Car Image
    $imgName = $_FILES['image']['name'];
    $imgSize = $_FILES['image']['size'];
    $imgType = $_FILES['image']['type'];
    $imgTmp = $_FILES['image']['tmp_name'];

    // $allowedEXT = ['jpg', 'png', 'svg', 'jpeg'];
    $allowedEXT = ['jpg'];

    $explodes = explode('.', $imgName);
    $imgEXT = strtolower(end($explodes));

    // Validate Product Image
    if (empty($imgName)) {
        $errors[] = "Car Image is required";
    }
    if (!in_array($imgEXT, $allowedEXT)) {
        $errors[] = "This Extension isn't allowed";
    }
    if ($imgSize > 2097152 * 2) {
        $errors[] = "Image size should be less than 4MB";
    }

    if (empty($plate_id)) {
        $errors[] = "Plate id empty";
    }
    if (empty($brand)) {
        $errors[] = "Brand <br>";
    }
    if (empty($model)) {
        $errors[] = "model <br>";
    }
    if (empty($body)) {
        $errors[] = "body <br>";
    }
    if (empty($color)) {
        $errors[] = "color <br>";
    }
    if (empty($status)) {
        $errors[] = "status<br>";
    }

    if (empty($price_per_day)) {
        $errors[] = "The Product Price is required!";
    }

    if (empty($errors)) {

        //FIXME:
        $image = $plate_id . ".jpg";
        move_uploaded_file($imgTmp, PATH . "uploads/images/cars/" . $image);

        $query = "INSERT INTO `car` (`plate_id`, `brand`, `model`, `body`, `color`,`year`,`status`,`price_per_day`)
    VALUES ('$plate_id','$brand', '$model', '$body', '$color','$year','$status','$price_per_day')";
        /* VALUES ('$name', '$description', '$price', '$image', '$category_id')"; */
        $result = mysqli_query($conn, $query);
        $affectedRow = mysqli_affected_rows($conn);

        // Close DB Connection
        mysqli_close($conn);

        if ($affectedRow >= 1) {
            echo "Success car insert";
            // $_SESSION['success'] = "Product Inserted Successfully";
            header("Location:" . URL . "views/site/car.php");
            exit;
        }
    } else {
        echo "error car insert";
        // $_SESSION['errors'] = $errors;
        // header("Location:" . URL . "views/products/add.php");
        // exit;
    }
}
?>