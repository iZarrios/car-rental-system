<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Admin Main</title>
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
	      <a class="navbar-brand" href="../car/admin.php">ADMIN<span>CONTROLSECTION</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item "><a href="../admin/admin.php" class="nav-link">Home</a></li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  Office
				</a>
				<ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
				  <li><a class="dropdown-item" href="../office/Add_office.php" class="nav-link">Add Office</a></li>
          <li><a class="dropdown-item" href="../office/delete_office.php" class="nav-link">Delete Office</a></li>
				</ul>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  Customization Tools
				</a>
				<ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
				  <li><a class="dropdown-item" href="Add_Car.php" class="nav-link active">Add car</a></li>
				  <li><a class="dropdown-item" href="Edit_car.php" class="nav-link">Customize car</a></li>
				  <li><a class="dropdown-item" href="#" class="nav-link">Delete car</a></li>
				</ul>
        
				  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  Reports
				</a>
				<ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
				  <li><a class="dropdown-item" href="#" class="nav-link">Report1</a></li>
				  <li><a class="dropdown-item" href="#" class="nav-link">Report2</a></li>
				  <li><a class="dropdown-item" href="#" class="nav-link">Report3</a></li>
	        </ul>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Search
            </a>
            <ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#" class="nav-link">Search by Car</a></li>
              <li><a class="dropdown-item" href="#" class="nav-link">Search by Customer</a></li>
              <li><a class="dropdown-item" href="#" class="nav-link">Search by Reservation</a></li>
              </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../../public/images/test1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="../admin/admin.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Add Car <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Add Car</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	
          <div class="col-md-8 block-9 mb-md-5">
            <form action="#" class="bg-light p-5 contact-form" method="POST"  >
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Plate ID" required>
             
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Brand" required>
             
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Model" required>
              
              <div class="form-group">
               <input type="text" class="form-control" placeholder="body" required>
              <div class="form-group">
                 <input type="text" class="form-control" placeholder="color" required>
              <div class="form-group">
                 <input type="number" class="form-control" placeholder="year" required>
              <div class="form-group">
                  <input type="text" class="form-control" placeholder="status" required>
              <div class="form-group">
                  <input type="number" class="form-control" placeholder="Price per day" required>
              </div>
              <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event) " style="display: none;"></p>
              <p><label for="file" style="cursor: pointer;" class="btn btn-secondary py-0 px-2">Upload Car Image</label></p>
              <p><img id="output" width="200" /></p>
              
              <script>
              var loadFile = function(event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
              };
              </script>
              
              <div class="form-group">
                <input type="submit" value="Add Car" class="btn btn-primary py-3 px-5">
              </div>   
            </form>
          
          </div>
        </div>
       
      </div>
    </section>
	

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
						<li><span class="icon icon-map-marker"></span><span class="text">678 gish road, Mandara, Alexandria, Egypt</span></li>
						<li><a href="#"><span class="icon icon-phone"></span><span class="text">+20 0106 820 8828</span></a></li>
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
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
  <script src="../../public/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../../public/js/google-map.js"></script>
  <script src="../../public/js/main.js"></script>
    
  </body>
</html>