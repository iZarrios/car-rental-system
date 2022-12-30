<!-- Daily payments within specific period. -->

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

    $lower_date = validString($_POST['lower_date']);
    $upper_date = validString($_POST['upper_date']);


    if (empty($errors)) {
        try {
            // SELECT reservation_date,SUM(payment) AS "daily_payment" FROM `reservation`
            // GROUP BY (reservation_date)
            // HAVING reservation_date BETWEEN '2010-1-1'  AND '2012-1-1';
            $query = "
            SELECT reservation_date,SUM(payment) AS 'daily_payment' FROM `reservation`
            WHERE payment>0
            GROUP BY (reservation_date)
            HAVING reservation_date BETWEEN '$lower_date'  AND '$upper_date';
            ";
            $result = mysqli_query($conn, $query);

            $affectedRows = mysqli_affected_rows($conn);

            // close connection
            mysqli_close($conn);

            // Printing Cars reserved
            $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);


            // dd($cars);
            if ($affectedRows >= 1) {
                $_SESSION['report5_result'] = $cars;
            } else {
                $errors[] = "Returned 0 results" . "<br>";
                $_SESSION['errors'] = $errors;
            }
            header("Location: " . URL . "views/reports/report5.php");
            exit;
        } catch (\Throwable $th) {;
            $errors[] = $th;
            $_SESSION['errors'] = $errors;
            header("Location: " . URL . "views/reports/report5.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: " . URL . "views/reports/report5.php");
        exit;
    }
}
?>