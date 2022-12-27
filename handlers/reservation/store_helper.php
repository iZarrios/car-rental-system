<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<script>
    var form = document.getElementsByClassName('form'),
        pick_up_date = document.getElementById("pick_up_date"),
        return_date = document.getElementById("return_date");

    function calcPayment() {
        console.log("Hello from calcPayment");

        var dateFirst = new Date(pick_up_date.value);
        var dateSecond = new Date(return_date.value);
        // time difference
        var timeDiff = dateSecond.getTime() - dateFirst.getTime();
        // days difference
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

        if (pick_up_date.value && return_date.value) {
            if (diffDays > 0) {
                var price = document.getElementById("price_per_day").value;
                document.getElementById("message").innerHTML = `Total amount = ${price * diffDays}`;
            } else {
                document.getElementById("message").innerHTML = "Return date must be after Pick up date";
            }
        } else {
            if (document.getElementById("message").innerHTML) {
                document.getElementById("message").innerHTML = "Return date must be after Pick up date";
            }
        }
    }
    console.log(plate_id);
    pick_up_date.onchange = calcPayment
    return_date.onchange = calcPayment
</script>