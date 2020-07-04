<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

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
  <body class="goto-here">
		
		<?php include('nav.php'); ?>
		
    <div class="container">
		<?php 
			
			if(isset($_POST["btnlogin"]))
			{
				
				$email=$_POST["cemail"];

				$pass=$_POST["cpass"];

					$q="SELECT * FROM customers WHERE CustEmail='$email' AND CustPassword='$pass'";
					$ans=mysqli_query($cn,$q);
					$sr=mysqli_num_rows($ans);

					if($sr>0)
					{
					
						$line=mysqli_fetch_assoc($ans);
						$_SESSION['customer']=$line['CustomerId'];

						echo "<script> alert('Login Successful! You can order the product'); 
						 location.href='shop.php';
						 </script>";
					}
					else{
						
						echo "<h1 class='text-danger'>Login Failed!</h1>";
					}
				}
		 ?>
		<form method="post" action="" class="bg-light mt-5">
		
		<div class="row form-group">
			<div class="col-md-2">Email</div>
			<div class="col-md-4">
				<input type="email" name="cemail" required="required" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">Password</div>
			<div class="col-md-4">
				<input type="password" name="cpass" required="required" class="form-control">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-6 text-center">
				<input type="submit" value=" login" name="btnlogin" class="btn btn-success">
			</div>
		</div>
		</form>
	</div>

  <?php include('footer.php'); ?>
    
  

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
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>		


		