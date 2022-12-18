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
    <form action="<?= URL . "handlers/office/store.php"; ?>" method="POST">
        <div>
            <label>office_Id: </label>
            <input type="text" name="office_Id">
        </div>
        <br>
        <div>
            <label>country: </label>
            <input type="text" name="country">
        </div>
        <br>
        <div>
            <label>city: </label>
            <input type="text" name="city">
        </div>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>