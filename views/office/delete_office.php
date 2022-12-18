<?php require_once '../../core/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Office</title>
</head>

<body>
    <!-- Pass data through a form -->
    <form action="<?= URL . "/handlers/office/delete.php"; ?>" method="POST">
        <div>
            <label>office_Id: </label>
            <input type="text" name="office_Id">
        </div>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>