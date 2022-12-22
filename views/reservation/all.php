<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>



<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$query = "SELECT `reservation`.* 
        FROM `reservation`
";

$result = mysqli_query($conn, $query);

$reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
</head>

<body>
    <h1 class="my-2 text-center"> All Reservations</h1>
    <div class="container">
        <?php
        // dd($reservations);
        if (isset($reservations)) {

        ?>
            <table class="table table-bordered">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">user_id</th>
                        <th scope="col">plate_id</th>
                        <th scope="col">office_Id</th>
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
                    foreach ($reservations as  $reservation) {
                    ?>
                        <tr>
                            <td> <?php echo $reservation["user_id"] ?></td>
                            <td> <?php echo $reservation["plate_id"] ?></td>
                            <td> <?php echo $reservation["office_Id"] ?></td>
                            <td> <?php echo $reservation["reservation_id"] ?></td>
                            <td> <?php echo $reservation["reservation_date"] ?></td>
                            <td> <?php echo $reservation["pick_up_date"] ?></td>
                            <td> <?php echo $reservation["return_date"] ?></td>
                            <td> <?php echo $reservation["payment"] ?></td>
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