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

    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.php">Product</a></span> <span>Product Detail</span></p>
            <h1 class="mb-0 bread">Product Detail</h1>
          </div>
        </div>
      </div>
    </div>
<?php 
    include('nav.php');
    $itid;
    $typeid;
    if(isset($_GET['item']))
    {
      $itid=$_GET['item'];
    }

    $selitem = mysqli_query($cn,"SELECT * FROM item WHERE ItemId=$itid");
    while($item=mysqli_fetch_assoc($selitem))
    {  
    $typeid=$item['ItemTypeId'];   ?>
    
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="../Admin/upload/<?php echo $item['ItemImage']; ?>" class="image-popup">
              <img src="../Admin/upload/<?php echo $item['ItemImage']; ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
            <form action="" method="post">
    				<h3> <?php echo $item['ItemName']; ?></h3>
    		
    				<p class="price"><span> <?php echo $item['ItemPrice']; ?></span></p>
    				<p>
              <?php echo $item['ItemDescription']; ?>
						</p>
						<div class="row mt-4">
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;"> Life Time : <?php echo $item['ItemLifeTime']; ?></p>
	          	</div>
          	</div>
            <input type="hidden" name="itid" value="<?php echo $itid; ?>">
          	<p><button type="submit" class="btn btn-info text-dark" name="addcart">Add to Cart
            </button></p>
          </form>
    			</div>
    		</div>
    	</div>
    </section>

  <?php } ?>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Related Products</h2>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
<?php 
$seltype=mysqli_query($cn,"SELECT * FROM item WHERE ItemTypeId=$typeid AND ItemId <>$itid LIMIT 6");
while($rt=mysqli_fetch_assoc($seltype))
{
  $id=$rt['ItemId'];
 ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod">
                <img class="img-fluid" src="../Admin/upload/<?php echo $rt['ItemImage']; ?>" alt="Colorlib Template">
    						
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"> <?php echo $rt['ItemName']; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale"> <?php echo $rt['ItemPrice']; ?> MMK</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    						
	    							<a href="?item=<?php echo $id; ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    						
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
  <?php } ?>  			
    		</div>
    	</div>
    </section>

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

		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		            $('#quantity').val(quantity + 1);

		        
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

if(isset($_POST['addcart']))
{
  $itid=$_POST['itid'];
  $qty = $_POST['quantity'];

  if(isset($_SESSION['carting'][$itid]))
  {
    $no=$_SESSION['carting'][$itid];
    $_SESSION['carting'][$itid]=$no+$qty;
    echo "<script> location.href='product-single.php?item=$itid'; </script>";

  }
  else
  {
    $_SESSION['carting'][$itid]=$qty;
     echo "<script> location.href='product-single.php?item=$itid'; </script>";

  }


} ?>