<!-- All reservations within a specified period including all car and customer information. -->
<?php require_once '../../core/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report 2</title>
</head>

<body>

    <!-- Pass data through a form -->
    <form action="<?= URL . "handlers/reports/r1.php"; ?>" method="POST">
        <div>
            <label>date range is from</label>
            <input type="text" name="lower_date">
            <label>to</label>
            <input type="text" name="upper_date">
        </div>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>