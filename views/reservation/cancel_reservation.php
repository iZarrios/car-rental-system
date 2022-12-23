<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Reservation</title>
</head>

<body>
    <!-- Pass data through a form -->
    <?php require_once PATH . "views/inc/messages.php" ?>
    <form action="<?= URL . "handlers/reservation/delete.php"; ?>" method="POST">
        <div>
            <label>user_id: </label>
            <input type="text" name="user_id">
        </div>
        <br>
        <div>
            <label>plate_id: </label>
            <input type="text" name="plate_id">
        </div>
        <br>
        <div>
            <label>office_Id: </label>
            <input type="text" name="office_Id">
        </div>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>