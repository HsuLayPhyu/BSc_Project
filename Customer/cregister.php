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
			include 'db.php';
			if(isset($_POST["btnregister"]))
			{
				$name=$_POST["cname"];
				$email=$_POST["cemail"];
				$phone=$_POST["cphone"];
				$address=$_POST["caddress"];
				$city=$_POST["ccity"];
				$pass=$_POST["cpass"];
				$repass=$_POST["crepass"];
				if($pass!=$repass)
				{
					echo "<h1 class='text-danger'>Try Again!</h1>";
				}
				else{
					$q="select CustomerId from customers where CustEmail='$email'";
					$ans=mysqli_query($cn,$q);
					if($line=mysqli_fetch_assoc($ans))
					{
						echo "<h1 class='text-danger'>Email Already Exist!</h1>";
					}
					else{
						$passd=md5($pass);
						$query="insert into customers(CustName,CustPhNo,CustEmail,CustAddress,CustPassword,CityInfoId) values('$name','$phone','$email','$address','$pass','$city')";
						mysqli_query($cn,$query);
						echo "<h1 class='text-success'>Successfully Inserted!</h1>";
					}
				}
			}
		 ?>
		<form method="post" action="cregister.php" class="bg-light">

		<div class="row form-group">
			<div class="col-md-2">
				Name
			</div>
			<div class="col-md-4">
				<input type="text" name="cname" required class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">Phone</div>
			<div class="col-md-4">
				<input type="text" name="cphone" required="required" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">Address</div>
			<div class="col-md-4">
				<input type="text" name="caddress" required="required" class="form-control">
		</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">City</div>
			<div class="col-md-4">
			<select name="ccity" class="container-fluid form-control">
				
				<?php 
					$q= "select * from cityinfo";
					$ans=mysqli_query($cn,$q);
					while ($row=mysqli_fetch_assoc($ans)) {
					?>
					<option value="<?php echo $row['CityInfoId']; ?>"> <?php echo $row['CityName']; ?></option>
					<?php
				}
				?>
				
			</select>	
		</div>
		</div>
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
			<div class="col-md-2">Re_Password</div>
			<div class="col-md-4">
				<input type="password" name="crepass" required="required" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-6 text-center">
				<input type="submit" value="REGISTER" name="btnregister" class="btn btn-success">
				<input type="reset" name="btnclear" value="CLEAR" class="btn btn-warning">
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


		