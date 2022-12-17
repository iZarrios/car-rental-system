<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    // Sanitize Inputs
    $f_name = validString($_POST['f_name']);
    $l_name = validString($_POST['l_name']);

    // dropdown menu in form
    $gender = validString($_POST['gender']);
    $gender_val = 0;
    if ($gender == 'male') {
        $gender_val = 1;
    }
    $country = validString($_POST['country']);
    $city = validString($_POST['city']);

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ?? "";

    $password = trim($_POST['password']);

    $b_date = validString($_POST['b_date']);

    $b_date_exploded = explode('/', $b_date);
    if (!checkdate($b_date_exploded[0], $b_date_exploded[1], $b_date_exploded[2])) {

        $errors[] = "Invalid Date";
    }

    // Check if email already exists
    $result = mysqli_query($conn, "SELECT `email` FROM `user` WHERE `email` = '$email'");

    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Sorry this email already exists choose another one";
        mysqli_free_result($result);
    }

    if (empty($f_name)) $errors[] = "First Name is required";
    if (minVal($f_name, 3) || maxVal($f_name, 50)) {
        $errors[] = "First Name should be between 3 and 50 characters";
    }
    if (empty($l_name)) {
        $errors[] = "First Name is required";
    }
    if (minVal($l_name, 3) || maxVal($l_name, 50)) {
        $errors[] = "Last Name should be between 3 and 50 characters";
    }
    if (empty($email)) {
        $errors[] = "Email field is required";
    }

    if (empty($password)) {
        $errors[] = "Password field is required";
    }

    // if there are no errors
    if (empty($errors)) {

        // Encrypt password
        // TODO:
        // $password = sha1($password);

        // Insert Statement
        $query = "INSERT INTO `user` (`f_name`, `l_name`, `email`, `password`, `bdate`,`gender`,`country`,`city`,`is_admin`)
                    VALUES ('$f_name', '$l_name', '$email', '$password', `$b_date`,`$gender_val`,`$country`,`$city`,'0')";
        $result = mysqli_query($conn, $query);
        $affectedRows = mysqli_affected_rows($conn);

        // close connection
        mysqli_close($conn);

        // TODO:
        $_SESSION['success'] = "You Have been registered successfully!";
        header("Location: " . URL . "views/auth/login.php");
        exit;
    } else {
        //TODO:
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/auth/register.php");
        exit;
    }
} else {
    //TODO:
    header("Location: " . URL . "views/auth/login.php");
    exit;
}
?>