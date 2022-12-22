<!-- The status of all cars on a specific day. -->
<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['report4_result'])) {

    $query_res = $_SESSION['report4_result'];
    unset($_SESSION['report4_result']);
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
    <form action="<?= URL . "handlers/reports/r4.php"; ?>" method="POST">

        <div>
            <label for=" html">user_id:</label><br>
            <input type="text" name="user_id" id="user_id" placeholder="user_id" value='' required>
        </div>

        <input type="submit" name="submit" value="Search">
    </form>
    <div class="container">
        <?php require_once PATH . "views/inc/messages.php" ?>
        <?php
        if (isset($query_res)) {
            // print_r($query_res);
            // unset($query_res);
        ?>
            <table class="table table-bordered">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">user_id</th>
                        <th scope="col">fname</th>
                        <th scope="col">lname</th>
                        <th scope="col" colspan="2">email</th>
                        <th scope="col">password</th>
                        <th scope="col">bdate</th>
                        <th scope="col">gender</th>
                        <th scope="col">country</th>
                        <th scope="col">city</th>
                        <th scope="col">is_admin</th>

                        <th scope="col">plate_id</th>
                        <th scope="col">model</th>

                        <th scope="col">reservation_id</th>
                        <th scope="col">reservation_date</th>
                        <th scope="col">plate_id</th>
                        <th scope="col">pick_up_date</th>
                        <th scope="col">return_date</th>
                        <th scope="col">payment</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php
                    foreach ($query_res as  $car) {
                    ?>
                        <tr>
                            <td> <?php echo $car["user_id"] ?></td>
                            <td> <?php echo $car["fname"] ?></td>
                            <td> <?php echo $car["lname"] ?></td>
                            <td colspan="2"> <?php echo $car["email"] ?></td>
                            <td> <?php echo $car["password"] ?></td>
                            <td> <?php echo $car["bdate"] ?></td>
                            <td>
                                <?php
                                if ($car["gender"])
                                    echo "Male";
                                else
                                    echo "Female";
                                ?>
                            </td>
                            <td> <?php echo $car["country"] ?></td>
                            <td> <?php echo $car["city"] ?></td>
                            <td>
                                <?php
                                if ($car["is_admin"])
                                    echo "True";
                                else
                                    echo "False";
                                ?>
                            </td>

                            <td> <?php echo $car["plate_id"] ?></td>
                            <td> <?php echo $car["model"] ?></td>

                            <td> <?php echo $car["reservation_id"] ?></td>
                            <td> <?php echo $car["reservation_date"] ?></td>
                            <td> <?php echo $car["pick_up_date"] ?></td>
                            <td> <?php echo $car["return_date"] ?></td>
                            <td> <?php echo $car["payment"] ?></td>
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