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
		<div class="container py-1 bg-primary">
	    <div>  <a class="navbar-brand text-light" href="alogin.php">SHANGOODS</a></div>
     </div>
 
   
    <div class="container mt-5">

		<?php 
			include 'db.php';
			if(isset($_POST["btnregister"]))
			{
				$name=$_POST["aname"];
				$email=$_POST["aemail"];
				$pass=$_POST["apass"];
				$repass=$_POST["arepass"];
				if($pass!=$repass)
				{
					echo "<h1 class='text-danger'>Try Again!</h1>";
				}
				else{
					$q="select AdminId from admin where AdminEmail='$email'";
					$ans=mysqli_query($cn,$q);
					if($line=mysqli_fetch_assoc($ans))
					{
						echo "<h1 class='text-danger'>Email Already Exist!</h1>";
					}
					else{
						$passd=md5($pass);
						$query="insert into admin(AdminName,AdminEmail,AdminPass) values('$name','$email','$pass')";
						mysqli_query($cn,$query);
						echo "<h1 class='text-success'>Successfully Inserted!</h1>";}
				}
			}
		 ?>



<div class="container h-100 bg-light">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				
				<div class="d-flex justify-content-center form_container">
					<form method="post" action=""> 
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"> Name </span>
							</div>
							<input type="text" name="aname" required class="form-control">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"> Email </span>
							</div>
						<input type="email" name="aemail" required="required" class="form-control">
						</div>



						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"> Password  </span>
							</div>
							<input type="password" name="apass" required="required" class="form-control">
						</div>



						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"> Re_Password </span>
							</div>
						<input type="password" name="arepass" required="required" class="form-control">
						</div>

							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit" value="REGISTER" name="btnregister" class="btn btn-success">
				<input type="reset" name="btnclear" value="CLEAR" class="btn btn-warning">
				   </div>
					</form>
				</div>
		
				
			</div>
		</div>
	</div>
		
	</div>
   





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


		