<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['logged'])) {
    header("Location: " . URL . "views/site/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>my balance</title>
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
            background: #a2a3a3;
            border: 0;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 10px;
            padding-top: 10px;
            font-family: 'Ubuntu', sans-serif;
            margin-left: 20%;
            font-size: 13px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
        }

        .forgot {
            width: 104%;
            padding-top: 15px;
        }


        .ccicon {
            height: 38px;
            position: absolute;
            right: 6px;
            top: calc(50% - 17px);
            width: 60px;
        }

        /* Credit Card image styling */
        /* .preload * {
            -webkit-transition: none !important;
            -moz-transition: none !important;
            -ms-transition: none !important;
            -o-transition: none !important;
        } */


        #ccsingle {
            position: absolute;
            right: 15px;
            top: 20px;
        }

        #ccsingle svg {
            width: 100px;
            max-height: 60px;
        }

        .creditcard svg#cardfront,
        .creditcard svg#cardback {
            width: 100%;
            -webkit-box-shadow: 1px 5px 6px 0px black;
            box-shadow: 1px 5px 6px 0px black;
            border-radius: 22px;
        }

        #generatecard {
            cursor: pointer;
            float: right;
            font-size: 12px;
            color: #fff;
            padding: 2px 4px;
            background-color: #909090;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        /* CHANGEABLE CARD ELEMENTS */
        .creditcard .lightcolor,
        .creditcard .darkcolor {
            -webkit-transition: fill .5s;
            transition: fill .5s;
        }

        .creditcard .lightblue {
            fill: #03A9F4;
        }

        .creditcard .lightbluedark {
            fill: #0288D1;
        }

        .creditcard .red {
            fill: #ef5350;
        }

        .creditcard .reddark {
            fill: #d32f2f;
        }

        .creditcard .purple {
            fill: #ab47bc;
        }

        .creditcard .purpledark {
            fill: #7b1fa2;
        }

        .creditcard .cyan {
            fill: #26c6da;
        }

        .creditcard .cyandark {
            fill: #0097a7;
        }

        .creditcard .green {
            fill: #66bb6a;
        }

        .creditcard .greendark {
            fill: #388e3c;
        }

        .creditcard .lime {
            fill: #d4e157;
        }

        .creditcard .limedark {
            fill: #afb42b;
        }

        .creditcard .yellow {
            fill: #ffeb3b;
        }

        .creditcard .yellowdark {
            fill: #f9a825;
        }

        .creditcard .orange {
            fill: #ff9800;
        }

        .creditcard .orangedark {
            fill: #ef6c00;
        }

        .creditcard .grey {
            fill: #bdbdbd;
        }

        .creditcard .greydark {
            fill: #616161;
        }

        /* FRONT OF CARD */
        #svgname {
            text-transform: uppercase;
        }

        #cardfront .st2 {
            fill: #FFFFFF;
        }

        #cardfront .st3 {
            font-family: 'Source Code Pro', monospace;
            font-weight: 600;
        }

        #cardfront .st4 {
            font-size: 54.7817px;
        }

        #cardfront .st5 {
            font-family: 'Source Code Pro', monospace;
            font-weight: 400;
        }

        #cardfront .st6 {
            font-size: 33.1112px;
        }

        #cardfront .st7 {
            opacity: 0.6;
            fill: #FFFFFF;
        }

        #cardfront .st8 {
            font-size: 24px;
        }

        #cardfront .st9 {
            font-size: 36.5498px;
        }

        #cardfront .st10 {
            font-family: 'Source Code Pro', monospace;
            font-weight: 300;
        }

        #cardfront .st11 {
            font-size: 16.1716px;
        }

        #cardfront .st12 {
            fill: #4C4C4C;
        }

        /* BACK OF CARD */
        #cardback .st0 {
            fill: none;
            stroke: #0F0F0F;
            stroke-miterlimit: 10;
        }

        #cardback .st2 {
            fill: #111111;
        }

        #cardback .st3 {
            fill: #F2F2F2;
        }

        #cardback .st4 {
            fill: #D8D2DB;
        }

        #cardback .st5 {
            fill: #C4C4C4;
        }

        #cardback .st6 {
            font-family: 'Source Code Pro', monospace;
            font-weight: 400;
        }

        #cardback .st7 {
            font-size: 27px;
        }

        #cardback .st8 {
            opacity: 0.6;
        }

        #cardback .st9 {
            fill: #FFFFFF;
        }

        #cardback .st10 {
            font-size: 24px;
        }

        #cardback .st11 {
            fill: #EAEAEA;
        }

        #cardback .st12 {
            font-family: 'Rock Salt', cursive;
        }

        #cardback .st13 {
            font-size: 37.769px;
        }


        .creditcard {
            width: 100%;
            max-width: 400px;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            transition: -webkit-transform 0.6s;
            -webkit-transition: -webkit-transform 0.6s;
            transition: transform 0.6s;
            transition: transform 0.6s, -webkit-transform 0.6s;
            cursor: pointer;
        }

        .creditcard .front,
        .creditcard .back {
            position: absolute;
            width: 100%;
            max-width: 400px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-font-smoothing: antialiased;
            color: #47525d;
        }

        .creditcard .back {
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }

        .creditcard.flipped {
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }

        /* Split the screen in half */
        .split {
            height: 50%;
            width: 50%;
            position: fixed;
            z-index: 1;
            top: 0;
            overflow-x: hidden;
            padding-top: 20px;
        }

        /* Control the left side */
        .left {
            left: 0;
            background-color: #111;
        }

        /* Control the right side */
        .right {
            right: 0;
            background-color: red;
        }

        /* If you want the content centered horizontally and vertically */
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        /* Style the image inside the centered container, if needed */
        .centered img {
            width: 150px;
            border-radius: 50%;
        }
    </style>
    <script>
        function validateForm1() {
            var x1 = document.forms["myform1"]["lname"].value;
            var x2 = document.forms["myform1"]["fname"].value;
            var y = document.forms["myform1"]["pass"].value;
            var z = document.forms["myform1"]["email"].value;
            if (x1 == null || x1 == "") {
                alert("Last name must be filled out");
                return false;
            }
            if (x2 == null || x2 == "") {
                alert("First name must be filled out");
                return false;
            }
            if (y == null || y == "") {
                alert("password must be filled out");
                return false;
            }
            var emailRegEx = /^[A-Z0-9_-]+@[A-Z0-9]+\.[A-Z]{2,4}$/i;
            if (z.search(emailRegEx) == -1) {
                alert("Please enter a valid email address.");
                return false;
            }
            return true;
        }
    </script>
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
                    <li class="nav-item active"><a href="../site/index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="../site/about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="../site/services.php" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="../site/car.php" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="../site/contact.php" class="nav-link">Contact</a></li>
                    <?php
                    if (isset($_SESSION['logged'])) {

                    ?>
                        <li class="nav-item">
                            <a href="../user/Welcome_User.php" class="nav-link"><strong>Hello <?= $_SESSION['logged']['full_name'] ?></strong></a>

                        </li>
                        <li class="nav-item"><a href=" <?= URL . "handlers/auth/logout.php"; ?>" class="nav-link">Sign out</a></li>
                        <?php
                        if ($_SESSION['logged']['is_admin'] == "1") {
                        ?>
                            <li class="nav-item"><a href="<?= URL . "views/admin/admin.php" ?>" class=" nav-link">To Admin Panel</a></li>
                        <?php
                        }

                        ?>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item"><a href="../site/LogIn.php" class="nav-link">Log in</a></li>
                        <li class="nav-item"><a href="../site/SignUp.php" class="nav-link">Sign Up</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../../public/images/image15.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">

        </div>
    </section>

    <section class="ftco-section ftco-degree-bg">


        <div style=" width: 100%; height: 650px;">
            <div style="width: 50%; height: 550px; float:left;">
                <div class="container" style="position:relative; left:180px; top:2px;">
                    <?php require_once PATH . "views/inc/messages.php" ?>
                    <form method="POST" action="<?= URL . "handlers/balance/credit_card.php"; ?>">
                        <h1>Payment Information</h1>
                        <!-- <label for="user_id">User id:</label><br> -->
                        <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['logged']['user_id'] ?>"><br>
                        <label for="fname">First name:</label><br>
                        <input type="text" id="fname" name="fname"><br>
                        <label for="lname">Last name:</label><br>
                        <input type="text" id="lname" name="lname"><br>
                        <label for="cvv">CVV</label><br>
                        <input type="text" id="cvv" name="cvv"><br>
                        <label for="card_number">Card Number</label><br>
                        <input type="text" id="card_number" name="card_number"><br>
                        <label for="expiration_date">Expiration date</label><br>
                        <input type="number" placeholder="MM" min="1" max="12" id="expiration_month" name="expiration_month" placeholder="month">
                        <input type="number" placeholder="YYYY" min="2000" max="2027" id="expiration_year" name="expiration_year" placeholder="year"><br>
                        <label for="added_balance">Balance to be added</label><br>
                        <input type="text" id="added_balance" name="added_balance"><br><br>
                        <input type="submit" name="submit" value="Confirm">
                    </form>
                </div>
            </div>

            <div style="width:50%; height: 550px; float:left; ">
                <div class="payment-title">
                    <br>
                    <br>
                    <br>
                </div>
                <div class="container preload">
                    <div class="creditcard">
                        <!-- <div class="front"> -->
                        <div id="ccsingle"></div>
                        <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                            <g id="Front">
                                <g id="CardBackground">
                                    <g id="Page-1_1_">
                                        <g id="amex_1_">
                                            <path id="Rectangle-1_1_" class="lightcolor grey" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                            C0,17.9,17.9,0,40,0z" />
                                        </g>
                                    </g>
                                    <path class="darkcolor greydark" d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z" />
                                </g>
                                <text transform="matrix(1 0 0 1 60.106 295.0121)" id="svgnumber" class="st2 st3 st4">4318 7496 5277 2196</text>
                                <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6">Jovie Strange</text>
                                <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8">cardholder name</text>
                                <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8">expiration</text>
                                <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">card number</text>
                                <g>
                                    <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire" class="st2 st5 st9">01/27</text>
                                    <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
                                    <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
                                    <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9 		" />
                                </g>
                                <g id="cchip">
                                    <g>
                                        <path class="st2" d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                        c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z" />
                                    </g>
                                    <g>
                                        <g>
                                            <rect x="82" y="70" class="st12" width="1.5" height="60" />
                                        </g>
                                        <g>
                                            <rect x="167.4" y="70" class="st12" width="1.5" height="60" />
                                        </g>
                                        <g>
                                            <path class="st12" d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                            c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                            C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                            c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                            c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z" />
                                        </g>
                                        <g>
                                            <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5" />
                                        </g>
                                        <g>
                                            <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5" />
                                        </g>
                                        <g>
                                            <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5" />
                                        </g>
                                        <g>
                                            <rect x="142" y="117.9" class="st12" width="26.2" height="1.5" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="Back">
                            </g>
                        </svg>
                        <br><br><br>
                        <!-- </div> -->
                        <!-- <div class="back"> -->
                        <svg version="1.1" id="cardback" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                            <g id="Front">
                                <line class="st0" x1="35.3" y1="10.4" x2="36.7" y2="11" />
                            </g>
                            <g id="Back">
                                <g id="Page-1_2_">
                                    <g id="amex_2_">
                                        <path id="Rectangle-1_2_" class="darkcolor greydark" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                        C0,17.9,17.9,0,40,0z" />
                                    </g>
                                </g>
                                <rect y="61.6" class="st2" width="750" height="78" />
                                <g>
                                    <path class="st3" d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5
                    C707.1,246.4,704.4,249.1,701.1,249.1z" />
                                    <rect x="42.9" y="198.6" class="st4" width="664.1" height="10.5" />
                                    <rect x="42.9" y="224.5" class="st4" width="664.1" height="10.5" />
                                    <path class="st5" d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z" />
                                </g>
                                <text transform="matrix(1 0 0 1 621.999 227.2734)" id="svgsecurity" class="st6 st7">962</text>
                                <g class="st8">
                                    <text transform="matrix(1 0 0 1 518.083 280.0879)" class="st9 st6 st10">security code</text>
                                </g>
                                <rect x="58.1" y="378.6" class="st11" width="375.5" height="13.5" />
                                <rect x="58.1" y="405.6" class="st11" width="421.7" height="13.5" />
                                <text transform="matrix(1 0 0 1 59.5073 228.6099)" id="svgnameback" class="st12 st13">Jovie Strange</text>
                            </g>
                        </svg>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>


    </section> <!-- .section -->

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
                                <li><a href="#"><span class="icon icon-phone"></span><a href="tel://1234567920">+ 1235 2355 98</a></span></a></li>
                                <li><a href="mailto:info@yoursite.com">HotWheels@gmail.com</a></li>
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