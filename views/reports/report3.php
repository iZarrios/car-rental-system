<!-- The status of all cars on a specific day. -->
<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['report3_result'])) {

    $query_res = $_SESSION['report3_result'];
    unset($_SESSION['report3_result']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once PATH . "views/inc/messages.php" ?>
    <form action="<?= URL . "handlers/reports/r3.php"; ?>" method="POST">

        <div>
            <label for=" html">Enter date of specific day:</label><br>
            <input type="date" name="date" id="date" placeholder="yyyy-mm-dd" value='' required>
        </div>

        <input type="submit" name="submit" value="Search">
    </form>
    <div class="container">
        <?php
        if (isset($query_res)) {
            // print_r($query_res);
            // unset($query_res);
        ?>
            <table class="table table-bordered">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">plate_id</th>
                        <th scope="col">brand</th>
                        <th scope="col">model</th>
                        <th scope="col">body</th>
                        <th scope="col">color</th>
                        <th scope="col">year</th>
                        <th scope="col">status</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php
                    foreach ($query_res as  $car) {
                    ?>
                        <tr>
                            <td> <?php echo $car["plate_id"] ?></td>
                            <td> <?php echo $car["brand"] ?></td>
                            <td> <?php echo $car["model"] ?></td>
                            <td> <?php echo $car["body"] ?></td>
                            <td> <?php echo $car["color"] ?></td>
                            <td> <?php echo $car["year"] ?></td>
                            <td> <?php echo $car["status"] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>

</html>