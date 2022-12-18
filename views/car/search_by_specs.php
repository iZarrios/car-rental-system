<?php require_once '../../core/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add office</title>
</head>

<body>

    <!-- Pass data through a form -->
    <!-- SELECT * FROM `car`
    WHERE `brand`= 'Dodge' AND `model`='MIMI' AND `body`='Sedan' AND `color`='blue' AND `year`=2010 AND `price_per_day` <700; -->
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
</body>

</html>