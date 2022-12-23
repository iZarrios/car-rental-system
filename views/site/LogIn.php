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
  <title>Log in</title>
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
      color: rgb(254, 254, 254);
      background-color: transparent;
      text-decoration: none;
    }

    a:hover {
      color: rgb(196, 207, 212);
      background-color: transparent;
      text-decoration: underline;
    }

    .sign {
      width: 87%;
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
      margin-left: 35%;
      font-size: 13px;
      box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }

    .forgot {
      width: 87%;
      padding-top: 15px;
    }
  </style>
  </script>
  <script type="text/javascript">
    function validateForm2() {
      var y = document.forms["myform2"]["pass"].value;
      var z = document.forms["myform2"]["email"].value;
      var emailRegEx = /^[A-Z0-9_-]+@[A-Z0-9]+\.[A-Z]{2,4}$/i;
      if (z.search(emailRegEx) == -1 || z == null || z == "") {
        alert("Please enter a valid email address.");
        return false;
      }
      if (y == null || y == "") {
        alert("password must be filled out");
        return false;
      }
      return true;
    }
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

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../../public/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
        </div>
      </div>
    </div>
    </div>
  </section>


  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <div class="card-body">
            <?php require_once PATH . "views/inc/messages.php" ?>
            <form class="form1" name="myform2" id="myform2" method="post" action="login.php" onsubmit="return validateForm2();">
            <p class="sign" align="center">Log in</p>
            <input class="un " type="text" name="email" id="email" placeholder="Email" />
            <br />
            <input class="un " type="password" name="pass" id="pass" placeholder="password" />
            <br />
            <input class="submit" type="submit" id="submitButton" value="Log in" />
            <p class="forgot" align="center"><a href="SignUp.php">New User, Register ?</p>
            <div id="result"></div>
          </form>
          </div>
        </div>
      </div>
  </section> <!-- .section -->
  
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