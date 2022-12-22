    <?php
    $lower_date_exploded = explode('-', $lower_date);
    $upper_date_exploded = explode('-', $upper_date);

    if (empty($lower_date)) {
        $lower_date_col = 1;
        $lower_date = 1;
    }
    // yyyy-mm-dd
    else if (!checkdate($lower_date_exploded[1], $lower_date_exploded[2], $lower_date_exploded[0])) {
        $errors[] = "Invalid Lower(From) Date";
    } else {
        $lower_date_col = 'reservation_date';
    }
    if (empty($upper_date)) {
        $upper_date_col = 1;
        $upper_date = 1;
    } else if (!checkdate($upper_date_exploded[1], $upper_date_exploded[2], $upper_date_exploded[0])) {
        $errors[] = "Invalid Upper(To) Date";
    } else {
        $upper_date_col = 'reservation_date';
    }
    ?>
