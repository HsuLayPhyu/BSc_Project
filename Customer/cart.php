<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
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
		
    <?php 
    include('nav.php'); 
    ?>
    <?php 

 if(isset($_GET['action']))
{
  unset($_SESSION['carting']);
  echo "<script> location.href='cart.php';</script>";
}


if(isset($_POST['action']) && $_POST['action'] =='remove')
{
  
  $fpid=$_POST['itid'];
  unset($_SESSION['carting'][$itid]);
  echo "<script> location.href='cart.php';</script>";
}

if(isset($_POST['action']) && $_POST['action'] =='update')
{

  $itid=$_POST['itid'];
  $qty = $_POST['quantity'];

  $c=$_SESSION['carting'][$itid];
  $c=$qty;
  $_SESSION['carting'][$itid]=$c;
  echo "<script> location.href='cart.php';</script>";
} ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

<?php if(isset($_SESSION['carting']))
{ ?>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
                    <th></th>
						      </tr>
						    </thead>
						    <tbody>
  <?php 
  $wtotal = 0;
  foreach ($_SESSION['carting'] as $itid => $no) {
  
  $sel=mysqli_query($cn,"SELECT * FROM item WHERE ItemId=$itid");
  while($ct=mysqli_fetch_assoc($sel))
  {
    $total = $no*$ct['ItemPrice'];
    $wtotal += $total;
   ?>
						      <tr class="text-center">
						        <td class="product-remove">
                      <a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod">
                      <div class="img" style="background-image:url(../Admin/upload/<?php echo $ct['ItemImage']; ?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3> <?php echo $ct['ItemName']; ?></h3>
						        	
						        </td>
						        
						        <td class="price"> <?php echo $ct['ItemPrice']; ?> MMK</td>
						        
						        <td class="quantity">


                      <form method="post" action="">
                      <input type="hidden" name="action" value="update">
                      <input type="hidden" name="itid" value="<?php echo $itid; ?>">
                      <div class="input-group mb-3">
                      <input type="number" name="quantity" class="quantity form-control input-number" min="1" max="100" value="<?php echo $no; ?>" onchange="this.form.submit();">  
                        </div>      
                    </form> 
					          
					          </td>
						        
						        <td class="total"> <?php echo $total; ?> MMK </td>
                    <td class="total"> 
                      <form method='post' action='' style="margin-top: 10px;">
<input type='hidden' name='itid' value="<?php echo $itid; ?>" />

<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove' onclick="this.form.submit();"> 
  <img src="images/delete.png"> 
</button>
</form>
                    </td>
						      </tr><!-- END TR-->
  
<?php }} ?>

<tr>
  <td colspan="8"> <a href="?action=yes" class="btn btn-danger"> Remove all  </a></td>
</tr>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    		
    			<div class="col-lg-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3> Choose Delivery Date </h3>
    				
  						<form action="#" class="info" method="post">
	              <div class="form-group">
	              	<label for=""> Desired Delivery Date </label>
	                <input type="date" class="form-control text-left px-3" name="deldate">
	              </div>
	             
	          
    				</div>
    				
    			</div>
    			<div class="col-lg-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span> Total </span>

    						<span> <?php echo $wtotal; ?> MMK </span>
                
    					</p>
    				</div>
    				<p>

              <?php 
              if(isset($_SESSION['customer']))
              { ?>
              <button type="submit" class="btn btn-primary py-3 px-4"  name="checkcart"> Proceed to Checkout </button>

              <?php 
             }
              else 
              {
                echo "You need to register or login to check out this order"; ?>
                
                <div>
                <button class=" btn btn-warning"><a href="cregister.php" class="nav-link"> Register</a></button>
                <button class=" btn btn-warning"><a href="clogin.php" class="nav-link"> Login</a></button>
              </div>
                <?php

              } ?>

            </p>
              </form>
    			</div>
    		</div>
			</div>
		</section>

<?php }
else 
{
  echo '<section class="ftco-section ftco-cart"> No Cart Items </section>';
 } ?>	

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

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>


<?php
$cid;
$odate=date('Y-m-d');
if(isset($_SESSION['customer']))
{
  $cid = $_SESSION['customer'];
}

if(isset($_POST['checkcart']))
{
  $deldate = $_POST['deldate'];

  $insord = mysqli_query($cn,"INSERT INTO orders(OrderDate,CustomerId,DeliveryDate) VALUES('$odate',$cid,'$deldate')");

  if($insord)
  {
    $oid = mysqli_insert_id($cn);
    foreach ($_SESSION['carting'] as $itid => $no) 
    {
     mysqli_query($cn,"INSERT INTO orderitems(OrderId,OrderQuantity,ItemId) VALUES($oid,$no,$itid)");
    }
    
  }
  echo "<script> alert('Order Checkout Complete!'); 
        location.href='info.php';
        </script>";
        unset($_SESSION['carting']);
}
 ?>