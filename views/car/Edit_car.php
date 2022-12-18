<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add_Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="admin.html">ADMIN<span>CONTROLSECTION</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item "><a href="admin.html" class="nav-link">Home</a></li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  Customization Tools
				</a>
				<ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
				  <li><a class="dropdown-item" href="Add_Car.html" class="nav-link">Add car</a></li>
				  <li><a class="dropdown-item active" href="Edit_car.html" class="nav-link">Customize car</a></li>
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
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/test1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="admin.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Edit Car <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Edit Car</h1>
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
                <input type="submit" value="Edit Car" class="btn btn-primary py-3 px-5">
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


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>