<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>



<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$query = "SELECT `office`.* FROM `office`";

$result = mysqli_query($conn, $query);
$offices = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offices</title>
</head>

<body>
    <h1 class="my-2 text-center"> All Offices</h1>
    <div class="container">
        <?php
        // dd($offices);
        if (isset($offices)) {

        ?>
        <table class="table table-bordered">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">office_id</th>
                    <th scope="col">country</th>
                    <th scope="col">city</th>
                </tr>
            </thead>

            <tbody class="text-center">
                <?php
                    foreach ($offices as  $office) {
                    ?>
                <tr>
                    <td> <?php echo $office["office_Id"] ?></td>
                    <td> <?php echo $office["country"] ?></td>
                    <td> <?php echo $office["city"] ?></td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
        <?php
            unset($offices);
        } ?>
    </div>
</body>

</html>