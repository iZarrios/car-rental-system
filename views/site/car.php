<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>



<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$query = "SELECT `car`.* 
        FROM `car`
		WHERE `car`.`status` != 'out of service'
";

$result = mysqli_query($conn, $query);

$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

# split into arrays or 3 ( each 3 cars will fill one row)
$cars = (array_chunk($cars, 3));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../public/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/animate.css">

    <link rel="stylesheet" href="../../public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../public/css/magnific-popup.css">

    <link rel="stylesheet" href="../../public/css/aos.css">

    <link rel="stylesheet" href="../../public/css/ionicons.min.css">

    <link rel="stylesheet" href="../../public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../public/css/jquery.timepicker.css">


    <link rel="stylesheet" href="../../public/css/flaticon.css">
    <link rel="stylesheet" href="../../public/css/icomoon.css">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="../site/index.php">Hot<span>Wheels</span></a>
            <!-- AHEZ -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                    <li class="nav-item active"><a href="car.php" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <?php
                    if (isset($_SESSION['logged'])) {

                    ?>
                        <li class="nav-item">
                            <a href="../user/Welcome_User.php" class="nav-link"><strong>Hello
                                    <?= $_SESSION['logged']['full_name'] ?></strong></a>

                        </li>
                        <li class="nav-item"><a href=" <?= URL . "handlers/auth/logout.php"; ?>" class="nav-link">Sign
                                out</a></li>
                        <?php
                        if ($_SESSION['logged']['is_admin'] == "1") {
                        ?>
                            <li class="nav-item"><a href="<?= URL . "views/admin/admin.php" ?>" class=" nav-link">To Admin
                                    Panel</a></li>
                        <?php
                        }

                        ?>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item"><a href="LogIn.php" class="nav-link">Log in</a></li>
                        <li class="nav-item"><a href="SignUp.php" class="nav-link">Sign Up</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>


    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../../public/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Choose Your Car</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section bg-light">
        <div class="container">
            <h5><a href="../car/search_by_specs.php" class="nav-link">Search Cars by Specs</a></h5>
            <br>
            <h5>Car Catalogs</a></h5>

            <div class="row">

                <?php
                foreach ($cars as $car_row) {
                    foreach ($car_row as $car) {
                ?>
                        <div class="col-md-4">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(' <?= URL . "uploads/images/cars/" . $car['plate_id'] . ".jpg" ?>')">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="car-single.php"><?= $car['brand'] ?></a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat"><?= $car['model'] ?></span>
                                        <p class="price ml-auto"><?= $car['price_per_day'] ?> <span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="../car/rent_car.php?plate_id=<?= $car['plate_id'] ?>" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.php?plate_id=<?= $car['plate_id'] ?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
        </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="#" class="logo">Hot<span>Wheels</span></a></h2>
                        <p>A small new car rent office which provide multiple types of car to rent starting from low end
                            to high end and luxurious cars .</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="https://twitter.com/login"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.facebook.com/"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.instagram.com/"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fawzy Moaz, Smouha,
                                        Alexandria, Egypt</span></li>
                                <li><a href="tel://+20 0106
                                            820 8828"><span class="icon icon-phone"></span><span class="text">+20 0106
                                            820 8828</span></a></li>
                                <li><a href="https://mail.google.com/"><span class="icon icon-envelope"></span><span class="text">Hotwheels@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                </div>
            </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>



    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../../public/js/popper.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/jquery.easing.1.3.js"></script>
    <script src="../../public/js/jquery.waypoints.min.js"></script>
    <script src="../../public/js/jquery.stellar.min.js"></script>
    <script src="../../public/js/owl.carousel.min.js"></script>
    <script src="../../public/js/jquery.magnific-popup.min.js"></script>
    <script src="../../public/js/aos.js"></script>
    <script src="../../public/js/jquery.animateNumber.min.js"></script>
    <script src="../../public/js/bootstrap-datepicker.js"></script>
    <script src="../../public/js/jquery.timepicker.min.js"></script>
    <script src="../../public/js/scrollax.min.js"></script>
    <script src="../../public/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="../../public/js/google-map.js"></script>
    <script src="../../public/js/main.js"></script>

</body>

</html>