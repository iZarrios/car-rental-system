<?php require_once '../../core/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Reservation</title>
</head>

<body>
    <!-- Pass data through a form -->
    <form action="<?= URL . "handlers/reservation/delete.php"; ?>" method="POST">
        <!--attributes: -
        user_id 	
        plate_id 	
        office_Id 	
        reservation_id 	
        reservation_date 	
        pick_up_date 	
        return_date 	
        payment 	
      -->
        <div>
            <label>user_id: </label>
            <input type="text" name="user_id">
        </div>
        <br>
        <div>
            <label>plate_id: </label>
            <input type="text" name="plate_id">
        </div>
        <br>
        <div>
            <label>office_Id: </label>
            <input type="text" name="office_Id">
        </div>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>