<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['search_result'])) {

    $query_res = $_SESSION['search_result'];
    unset($_SESSION['search_result']);
}
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
    <title>Advanced Search</title>
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
    <script>
        function validateForm1() {
            var year = document.forms["myform1"]["year"].value;
            var lower_price = document.forms["myform1"]["lower_price"].value;
            var upper_price = document.forms["myform1"]["upper_price"].value;

            if (year > 0 || year < 10000) {

            } else {
                alert("year must be a valid number");
                return false;
            }
            if (lower_price > 0 || lower_price < 1000000) {

            } else {
                alert("lower price must be a valid number");
                return false;
            }
            if (upper_price > 0 || upper_price < 1000000) {

            } else {
                alert("upper price must be a valid number");
                return false;
            }
            return true;
        }
    </script>
</head>

<!-- 



    Very important note!!
    1. There must be a validation for input data in the form (Front-end)
    2. Placeholder="Any" just a place holder not a text
    3. Fields are not required to be filled


    

    -->

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
                    <p class="breadcrumbs"><span class="mr-2"><a href="../admin/admin.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Advanced Search<i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Advanced Search</h1>
                </div>
            </div>
        </div>
    </section>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">


            <?php require_once PATH . "views/inc/messages.php" ?>
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-8 block-9 mb-md-5">

                    <form class="form1 bg-light p-5 contact-form" name="myform1" id="myform1" action="<?= URL . "handlers/admin/search.php"; ?>" method="POST" onsubmit="return validateForm1();">
                        <h3 class="mb-3 bread">By user:</h3>
                        <div class="form-group">
                            <label for="html">User id:</label><br>
                            <input type="text" name="user_id" id="user_id" placeholder="user_id">
                        </div>

                        <div class="form-group">
                            <label for="html">First name: </label><br>
                            <input type="text" name="fname" placeholder="First name">
                        </div>

                        <div class="form-group">
                            <label for="html">Last name: </label><br>
                            <input type="text" name="lname" placeholder="Any">
                        </div>

                        <div class="form-group">
                            <label class="form-group">email: </label><br>
                            <input type="text" name="email" placeholder="Any">
                        </div>

                        <div class="form-group">
                            <label for="html">Birth date Range is from:</label><br>
                            <input type="date" name="lower_bdate" id="lower_bdate" placeholder="Start Date" value="1930-01-01" required>
                            <label for="html">To:</label>
                            <input type="date" name="upper_bdate" id="upper_bdate" placeholder="End Date" value="2022-12-31" required>
                        </div>

                        <div class="form-group">
                            <label>gender: </label><br>
                            <select name="gender" id="gender">
                                <option value="Both">Both</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>country: </label><br>
                            <input type="text" name="country" placeholder="Any">
                        </div>

                        <div class="form-group">
                            <label>city: </label><br>
                            <input type="text" name="city" placeholder="Any">
                        </div>
                        <br>
                        <h3>By Car</h3>
                        <div class="form-group">
                            <label>brand: </label><br>
                            <input type="text" name="brand" placeholder="Any">
                        </div>

                        <div class="form-group">
                            <label>model: </label><br>
                            <input type="text" name="model" placeholder="Any">
                        </div>

                        <div class="form-group">
                            <label>body: </label><br>
                            <input type="text" name="body" placeholder="Any">
                        </div>

                        <div class="form-group">
                            <label>color: </label><br>
                            <input type="text" name="color" placeholder="Any">
                        </div>

                        <div class="form-group">
                            <label>year: </label><br>
                            <input type="text" name="year" placeholder="Any">
                        </div>

                        <div class="form-group">
                            <label>price_per_day is from</label><br>
                            <input type="text" name="lower_price" placeholder="Any">
                            <label>to</label>
                            <input type="text" name="upper_price" placeholder="Any">
                        </div>
                        <br>
                        <h3>By Reservation day:</h3>
                        <div>
                            <label for="html">Date Range is from:</label><br>
                            <input type="date" name="lower_date" id="plate_id" placeholder="Start Date" value="1990-01-01" required>
                            <label for="html">To:</label>
                            <input type="date" name="upper_date" id="brand" placeholder="End Date" value="2030-12-31" required>
                        </div>
                        <br>
                        <input class="btn btn-primary py-3 px-5" type="submit" name="submit" value="submit"><br><br>
                    </form>
                    <?php
                    if (isset($query_res)) {
                        // print_r($query_res);
                        // unset($query_res);
                    ?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <table class=" table table-bordered text-center table-hover" style="width:100%">
                <thead class="thead-dark ">
                    <tr>
                        <!-- by user -->
                        <th style="font-size: 10px;" scope="col">user_id</th>
                        <th style="font-size: 10px;" scope="col">fname</th>
                        <th style="font-size: 10px;" scope="col">lname</th>
                        <th style="font-size: 10px;" scope="col">email</th>
                        <th style="font-size: 10px;" scope="col">balance</th>
                        <th style="font-size: 10px;" scope="col">bdate</th>
                        <th style="font-size: 10px;" scope="col">gender</th>
                        <th style="font-size: 10px;" scope="col">country</th>
                        <th style="font-size: 10px;" scope="col">city</th>

                        <!-- by car -->
                        <th style="font-size: 7px;" scope="col">plate_id</th>
                        <th style="font-size: 10px;" scope="col">brand</th>
                        <th style="font-size: 10px;" scope="col" class="text-center">Car Image</th>
                        <th style="font-size: 10px;" scope="col">model</th>
                        <th style="font-size: 10px;" scope="col">body</th>
                        <th style="font-size: 10px;" scope="col">color</th>
                        <th style="font-size: 10px;" scope="col">year</th>
                        <th style="font-size: 7px;" scope="col"> price_per_day </th>

                        <!-- by reservation -->
                        <th style="font-size: 6px;" scope="col">reservation_id</th>
                        <th style="font-size: 6px;" scope="col">reservation_date</th>
                        <th style="font-size: 6px;" scope="col">pick_up_date</th>
                        <th style="font-size: 7px;" scope="col">return_date</th>
                        <th style="font-size: 10px;" scope="col">payment</th>

                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php
                        foreach ($query_res as  $car) {
                    ?>
                        <tr>
                            <!-- by user -->
                            <td style="font-size: 9px;"> <?php echo $car["user_id"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["fname"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["lname"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["email"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["balance"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["bdate"] ?></td>
                            <td style="font-size: 9px;">
                                <?php
                                if ($car["gender"] == 0)
                                    echo "Female";
                                else
                                    echo "Male";
                                ?>
                            </td>
                            <td style="font-size: 9px;"> <?php echo $car["country"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["city"] ?></td>

                            <!-- by car -->
                            <td style="font-size: 9px;"> <?php echo $car["plate_id"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["brand"] ?></td>
                            <td width="150px"> <img style="  height: 100%; width: 100%;" src="<?= URL . "uploads/images/cars/" . $car['plate_id'] . ".jpg" ?>" alt="Car of The Image"></td>
                            <td style="font-size: 9px;"> <?php echo $car["model"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["body"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["color"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["year"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["price_per_day"] ?></td>

                            <!-- by reservation -->
                            <td style="font-size: 9px;"> <?php echo $car["reservation_id"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["reservation_date"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["pick_up_date"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["return_date"] ?></td>
                            <td style="font-size: 9px;"> <?php echo $car["payment"] ?></td>

                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        <?php } ?>
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