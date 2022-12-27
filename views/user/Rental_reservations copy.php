<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
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
    <div class="container">
    <?php require_once PATH . "views/inc/messages.php" ?>
    <form method="POST" action="<?= URL . "handlers/balance/credit_card.php"; ?>">
        <label for="user_id">User id:</label><br>
        <input type="text" id="user_id" name="user_id"><br>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="cvv">CVV</label><br>
        <input type="password" id="cvv" name="cvv"><br>
        <label for="card_number">Card Number</label><br>
        <input type="text" id="card_number" name="card_number"><br>
        <label for="expiration_date">Expiration date</label><br>
        <input type="text" id="expiration_month" name="expiration_month" placeholder="month">
        <input type="text" id="expiration_year" name="expiration_year" placeholder="year"><br>
        <label for="added_balance">Balance to be added</label><br>
        <input type="text" id="added_balance" name="added_balance"><br>
        <input type="submit" name="submit" value="Confirm">
    </form>
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