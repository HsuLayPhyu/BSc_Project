<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Shan Good</title>
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
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

<?php  $type=0;
      if(isset($_GET['type']))
      {
          $type=$_GET['type'];
      } ?>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">

    					<li><a href="?type=0" class="<?php if($type==0){echo 'active';} ?>">All</a></li>
    					
              <?php 
             

              $sel=mysqli_query($cn,"SELECT * FROM itemtype");
              while($r=mysqli_fetch_assoc($sel))
              { 
                ?>

              <li><a href="?type=<?php echo $r['ItemTypeId']; ?>" class="<?php if($r['ItemTypeId']==$type){ echo 'active';} ?>"> <?php echo $r['ItemTypeName']; ?></a></li>
            <?php 
            } ?>
    					
    				</ul>
    			</div>
    		</div>
    		<div class="row">

  <?php 
    $total_pages;
    $total_pages_sql;
        if (isset($_GET['pageno'])) {
         $pageno = $_GET['pageno'];
        } 
        else 
        {
            $pageno = 1;
        }
        $no_of_records_per_page = 4;
        $offset = ($pageno-1) * $no_of_records_per_page;

        if($type==0)
        {
          $total_pages_sql = "SELECT COUNT(*) FROM item";
        }
        else
        {
          $total_pages_sql = "SELECT COUNT(*) FROM item WHERE item.ItemTypeId=$type";
        }
        
        $result = mysqli_query($cn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

$rest;

if($type==0)
{
  $rest = mysqli_query($cn,"SELECT * FROM item,itemtype WHERE item.ItemTypeId=itemtype.ItemTypeId LIMIT $offset, $no_of_records_per_page");
}

else
{
  $rest = mysqli_query($cn,"SELECT * FROM item,itemtype WHERE item.ItemTypeId=itemtype.ItemTypeId AND item.ItemTypeId=$type LIMIT $offset, $no_of_records_per_page");
}


 while ($rr=mysqli_fetch_assoc($rest))
 {
  $itid=$rr['ItemId'];
           ?>

    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod">
                <img class="img-fluid" src="../Admin/upload/<?php echo $rr['ItemImage']; ?>" alt="Colorlib Template" style="height: 180px;width: 180px;">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"> <?php echo $rr['ItemName']; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale"> <?php echo $rr['ItemPrice']; ?> MMK</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="product-single.php?item=<?php echo $itid; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>

        <?php } ?>
    			
    		</div>


    <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
          <?php 
    if ($total_pages <= 10)
      {       
    for ($counter = 1; $counter <= $total_pages; $counter++)
    {
    if ($counter == $pageno) 
    {
 ?>
   <li class='active'> <a> <?php echo $counter; ?></a> </li>
    <?php 
    
    }

    elseif($counter == $total_pages)
    {
    ?>
<li>
  <a href="?type=<?php echo $type; ?>&pageno=<?php echo $total_pages; ?>"> <?php echo $counter; ?> </a>
   </li>

    <?php  
 
  }
     else
    
   {
     ?>       
           
        <li>  <a href="?type=<?php echo $type; ?>&pageno=<?php echo $counter; ?>"> <?php echo $counter; ?> </a></li>
               
               <?php 
  }
 }
}
   ?>
              </ul>


            </div>
          </div>
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
    
  </body>
</html>