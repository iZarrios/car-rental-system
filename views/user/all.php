<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$query = "SELECT `user`.* 
        FROM `user`
";

$result = mysqli_query($conn, $query);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php

// if user is already logged in
if (!isset($_SESSION['logged'])) {
    header("Location: " . URL . "views/site/LogIn.php");
    exit;
}
if ($_SESSION['logged']['is_admin'] == "0") {
    header("Location: " . URL . "views/site/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main</title>
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
    <style type="text/css">
        a:link {
            color: rgb(34, 34, 34);
            background-color: transparent;
            text-decoration: none;
        }

        a:hover {
            color: rgb(196, 207, 212);
            background-color: transparent;
            text-decoration: underline;
        }

        .sign {
            width: 104%;
        }

        .gender {
            width: 30%;
            color: rgb(15, 0, 0);

        }

        .un {
            width: 76%;
            color: rgb(15, 0, 0);
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1px;
            background: rgb(236, 236, 236);
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            outline: none;
            box-sizing: border-box;
            border: 2px solid rgba(255, 255, 255, 0.02);
            margin-bottom: 50px;
            margin-left: 46px;
            text-align: center;
            margin-bottom: 27px;
            font-family: 'Ubuntu', sans-serif;
        }

        form.form1 {
            padding-top: 40px;
        }


        .submit {
            cursor: pointer;
            border-radius: 5em;
            color: rgb(255, 255, 255);
            background: #000e11;
            border: 0;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 10px;
            padding-top: 10px;
            font-family: 'Ubuntu', sans-serif;
            margin-left: 45%;
            font-size: 13px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
        }

        .forgot {
            width: 104%;
            padding-top: 15px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="../admin/admin.php">ADMIN<span>CONTROLSECTION</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="../admin/admin.php" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Office
                        </a>
                        <ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../office/Add_office.php" class="nav-link">Add Office</a>
                            </li>
                            <li><a class="dropdown-item" href="../office/delete_office.php" class="nav-link">Delete
                                    Office</a></li>
                            <li><a class="dropdown-item" href="../office/all.php" class="nav-link">View
                                    Offices</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Customization Tools
                        </a>
                        <ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= URL . "views/car/all_cars.php" ?> " class="nav-link">View cars</a></li>
                            <li><a class="dropdown-item" href="../car/Add_Car.php" class="nav-link">Add car</a></li>
                            <!-- <li><a class="dropdown-item" href="../car/Edit_car.php" class="nav-link">Customize car</a> -->
                    </li>
                    <li><a class="dropdown-item" href="../car/Delete_car.php" class="nav-link">Delete car</a>
                    </li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reports
                    </a>
                    <ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../reports/report1.php" class="nav-link">Report1</a></li>
                        <li><a class="dropdown-item" href="../reports/report2.php" class="nav-link">Report2</a></li>
                        <li><a class="dropdown-item" href="../reports/report3.php" class="nav-link">Report3</a></li>
                        <li><a class="dropdown-item" href="../reports/report4.php" class="nav-link">Report4</a></li>
                        <li><a class="dropdown-item" href="../reports/report5.php" class="nav-link">Report5</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reservations
                    </a>
                    <ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../reservation/all.php" class="nav-link">View
                                Reservations</a></li>
                        <li><a class="dropdown-item" href="../reservation/cancel_reservation.php" class="nav-link">Delete Reservations</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL . "views/site/index.php" ?>" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        To User Pages
                    </a>
                </li>
            </div>
        </div>
    </nav>

    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../../public/images/test1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="../admin/admin.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>View users<i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">View users</h1>
                </div>
            </div>
        </div>
    </section>
    </section>

    <section class="ftco-section contact-section">
        <div class="container-fluid">
            <?php require_once PATH . "views/inc/messages.php" ?>
            <table class=" table table-bordered text-center table-hover" style="width:100%">
                <thead class="thead-dark ">
                    <tr>
                        <!-- by user -->
                        <th style="font-size: 14px;" scope="col">user_id</th>
                        <th style="font-size: 14px;" scope="col">fname</th>
                        <th style="font-size: 14px;" scope="col">lname</th>
                        <th style="font-size: 14px;" scope="col">email</th>
                        <th style="font-size: 14px;" scope="col">balance</th>
                        <th style="font-size: 14px;" scope="col">bdate</th>
                        <th style="font-size: 14px;" scope="col">gender</th>
                        <th style="font-size: 14px;" scope="col">country</th>
                        <th style="font-size: 14px;" scope="col">city</th>
                        <th style="font-size: 14px;" scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php
                    foreach ($users as  $user) {
                    ?>
                        <tr>
                            <!-- by user -->
                            <td style="font-size: 14px;"> <?php echo $user["user_id"] ?></td>
                            <td style="font-size: 14px;"> <?php echo $user["fname"] ?></td>
                            <td style="font-size: 14px;"> <?php echo $user["lname"] ?></td>
                            <td style="font-size: 14px;"> <?php echo $user["email"] ?></td>
                            <td style="font-size: 14px;"> <?php echo $user["balance"] ?></td>
                            <td style="font-size: 14px;"> <?php echo $user["bdate"] ?></td>
                            <td style="font-size: 14px;">
                                <?php
                                if ($user["gender"] == 0)
                                    echo "Female";
                                else
                                    echo "Male";
                                ?>
                            </td>
                            <td style="font-size: 14px;"> <?php echo $user["country"] ?></td>
                            <td style="font-size: 14px;"> <?php echo $user["city"] ?></td>
                            <td class="text-center">
                                <a class="btn btn-danger" href="<?= URL . "handlers/user/delete.php?user_id=" . $user['user_id'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>




    </section> <!-- .section -->

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="#" class="logo">Admin<span>ControlSection</span></a></h2>
                        <div class="col-md">
                            <div class="ftco-footer-widget mb-4">
                                <h2 class="ftco-heading-2">Admin Information</h2>
                                <div class="block-23 mb-3">
                                    <ul>
                                        <li><span class="icon icon-map-marker"></span><span class="text">678 gish road,
                                                Mandara, Alexandria, Egypt</span></li>
                                        <li><a href="#"><span class="icon icon-phone"></span><span class="text">+20 0106
                                                    820 8828</span></a></li>
                                        <li><a href="https://mail.google.com/"><span class="icon icon-envelope"></span><span class="text">a.salem3214@gmail.com</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


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