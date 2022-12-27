<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['logged'])) {
    header("Location: " . URL . "views/site/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my balance</title>
</head>

<body>
    Enter Card Information
    <?php require_once PATH . "views/inc/messages.php" ?>
    <form method="POST" action="<?= URL . "handlers/balance/credit_card.php"; ?>">
        <label for="user_id">User id:</label><br>
        <input type="text" id="user_id" name="user_id"><br>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="cvv">CVV</label><br>
        <input type="password" id="cvv" name="cvv"><br>
        <label for="card_number">Card Number</label><br>
        <input type="text" id="card_number" name="card_number"><br>
        <label for="expiration_date">Expiration date</label><br>
        <input type="text" id="expiration_month" name="expiration_month" placeholder="month">
        <input type="text" id="expiration_year" name="expiration_year" placeholder="year"><br>
        <label for="added_balance">Balance to be added</label><br>
        <input type="text" id="added_balance" name="added_balance"><br>
        <input type="submit" name="submit" value="Confirm">
    </form>
</body>

</html>