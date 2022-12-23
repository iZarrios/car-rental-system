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
  <title>Sign Up</title>
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
      color: rgb(245, 245, 245);
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
      background: rgba(255, 255, 255);
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
    // function validateForm1() {
    //   var x1 = document.forms["myform1"]["lname"].value;
    //   var x2 = document.forms["myform1"]["fname"].value;
    //   var y = document.forms["myform1"]["pass"].value;
    //   var z = document.forms["myform1"]["email"].value;
    //   if (x1 == null || x1 == "") {
    //     alert("Last name must be filled out");
    //     return false;
    //   }
    //   if (x2 == null || x2 == "") {
    //     alert("First name must be filled out");
    //     return false;
    //   }
    //   if (y == null || y == "") {
    //     alert("password must be filled out");
    //     return false;
    //   }
    //   var emailRegEx = /^[A-Z0-9_-]+@[A-Z0-9]+\.[A-Z]{2,4}$/i;
    //   if (z.search(emailRegEx) == -1) {
    //     alert("Please enter a valid email address.");
    //     return false;
    //   }
    //   return true;
    // }
  </script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">Car<span>Book</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="pricing.php" class="nav-link">Pricing</a></li>
          <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          <li class="nav-item"><a href="LogIn.php" class="nav-link">Log in</a></li>
          <li class="nav-item"><a href="SignUp.php" class="nav-link">Sign UP</a></li>
          <li class="nav-item"><a href="../user/Welcome_User.php" class="nav-link">My profile</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../../public/images/yellowCar.jpeg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <div class="container">
            <!-- <div class='alert alert-success'>hii</div> -->
            <?php require_once PATH . "views/inc/messages.php" ?>
            <form class="form1" method="POST" action="<?= URL . "handlers/auth/register.php" ?>">
              <p class="sign" align="center">Sign Up</p>
              <div class="d-flex">
                <input class="un" type="text" name="fname" id="fname" placeholder="First name" required />
                <br />
                <input class="un" type="text" name="lname" id="lname" placeholder="Last name" required />
                <br />
              </div>
              <div class="d-flex">
                <input class="un" type="text" name="email" id="email" placeholder="Email" required />
                <br />
                <input class="un" type="password" name="password" id="password" placeholder="password" required />
                <br />
              </div>
              <div class="d-flex">
                <input class="un" type="date" name="bdate" id="bdate" placeholder="bdate" required />
                <input class="un" type="country" name="country" id="country" placeholder="country" required />
              </div>
              <input class="gender" type="radio" id="gender" name="gender" value="male" required> Male
              <div class="d-flex">
              </div>
              <input class="gender" type="radio" id="gender" name="gender" value="female" required> Female
              <br />

              <input class="submit" type="submit" id="submit" name="submit" value="Sign Up" />
              <p class="forgot" align="center"><a href="LogIn.php">Old User, Login?</p>
            </form>
          </div>

        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
            <p>A small new car rent office which provide multiple types of car to rent starting from low end to high end and luxurious cars .</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Information</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Services</a></li>
              <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
              <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Customer Support</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">FAQ</a></li>
              <li><a href="#" class="py-2 d-block">Payment Option</a></li>
              <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
              <li><a href="#" class="py-2 d-block">How it works</a></li>
              <li><a href="#" class="py-2 d-block">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">

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