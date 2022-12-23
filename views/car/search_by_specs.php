<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['search_result'])) {

    $query_res = $_SESSION['search_result'];
    unset($_SESSION['search_result']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search by Specs</title>
</head>

<body>

    <!-- 



    Very important note!!
    1. There must be a validation for input data in the form (Front-end)
    2. Placeholder="Any" just a place holder not a text
    3. Fields are not required to be filled


    

    -->




    <!-- Pass data through a form -->
    <!-- SELECT * FROM `car`
    WHERE `brand`= 'Dodge' AND `model`='MIMI' AND `body`='Sedan' AND `color`='blue' AND `year`=2010 AND `price_per_day` <700; -->
    <?php require_once PATH . "views/inc/messages.php" ?>
    <form action="<?= URL . "handlers/car/search.php"; ?>" method="POST">
        <div>
            <label>brand: </label>
            <input type="text" name="brand">
        </div>
        <br>
        <div>
            <label>model: </label>
            <input type="text" name="model">
        </div>
        <br>
        <div>
            <label>body: </label>
            <input type="text" name="body">
        </div>
        <br>
        <div>
            <label>color: </label>
            <input type="text" name="color">
        </div>
        <br>
        <div>
            <label>year: </label>
            <input type="text" name="year">
        </div>
        <br>
        <div>
            <label>price_per_day is from</label>
            <input type="text" name="lower_price">
            <label>to</label>
            <input type="text" name="upper_price">
        </div>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
    if (isset($query_res)) {
        // print_r($query_res);
        // unset($query_res);
    ?>
        <table class="table table-bordered">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">brand</th>
                    <th scope="col">model</th>
                    <th scope="col">body</th>
                    <th scope="col">year</th>
                    <th scope="col"> price_per_day </th>
                </tr>
            </thead>

            <tbody class="text-center">
                <?php
                foreach ($query_res as  $car) {
                ?>
                    <tr>
                        <td> <?php echo $car["brand"] ?></td>
                        <td> <?php echo $car["model"] ?></td>
                        <td> <?php echo $car["body"] ?></td>
                        <td> <?php echo $car["year"] ?></td>
                        <td> <?php echo $car["price_per_day"] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php } ?>
</body>

</html>