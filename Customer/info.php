
<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Shan Goods </title>
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
    $cid=$_SESSION['customer'];
     ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span> Order </span></p>
            <h1 class="mb-0 bread"> Info </h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
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
        $no_of_records_per_page = 6;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM orders";
        $result = mysqli_query($cn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }
$sel=mysqli_query($cn,"SELECT * FROM orders WHERE CustomerId=$cid order by OrderId DESC LIMIT $offset, $no_of_records_per_page");
while($r=mysqli_fetch_assoc($sel))
{
  $oid=$r['OrderId'];
  $qrt=mysqli_query($cn,"SELECT SUM(ot.OrderQuantity*i.ItemPrice) as total,OrderItemId
FROM orders o,orderitems ot,item i WHERE i.ItemId=ot.ItemId AND o.OrderId=ot.OrderId AND ot.OrderId=$oid");
 $tt=mysqli_fetch_assoc($qrt);
 $orid=$tt['OrderItemId'];
 ?>
          <div class="col-lg-12 ftco-animate">
						<div class="row">
							<div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href=""> Order Date :</a></div>
		                  <div><a href=""> <?php echo $r['OrderDate']; ?></a></div> <br>
                      <div><a href=""> Delivery Date :</a></div>
                      <div><a href=""> <?php echo $r['DeliveryDate']; ?></a></div>

		                </div>
		                <h3 class="heading">
                      <a href="">
                        Order Amount MMK 
                      </a>
                    </h3>
		                <p> <?php echo $tt['total']; ?></p>
<?php 
$s=mysqli_query($cn,"SELECT * FROM payments WHERE OrderId=$oid");
$rn=mysqli_num_rows($s);
if($rn>0)
{
  $sn=mysqli_fetch_assoc($s);
  $pid=$sn['PaymentId'];
  $pdate =$sn['PaymentDate'];

  if($pdate!='0000-00-00')
 {?>
 <p> Payment :  Confirm  </p>
 <p> <a href="detailinfo.php?pid=<?php echo $pid; ?>&oid=<?php echo $oid; ?>&pdate=<?php echo $pdate; ?>&orid=<?php echo $orid; ?>" class="btn btn-primary py-2 px-3"> Detail </a></p>
<?php
}
}
else
{
?>

<p> Payment : Not Confirm Yet </p>
 <p> <a href="detailinfo.php?oid=<?php echo $oid; ?>&orid=<?php echo $orid; ?>" class="btn btn-primary py-2 px-3"> Detail </a></p>
<?php
}
 ?>
    
		              </div>
		            </div>
		          </div>
						</div>
          </div> 
       <?php 
       } ?> 
        </div>
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
  <a href="?pageno=<?php echo $total_pages; ?>"> <?php echo $counter; ?> </a>
   </li>
    <?php  
  }else 
   {
     ?>            
        <li>  <a href="?type=pageno=<?php echo $counter; ?>"> <?php echo $counter; ?> </a></li>       
               <?php 
  }
 }
}  ?>
              </ul>


            </div>
          </div>
        </div>
    </section> <!-- .section -->

    <footer class="ftco-footer ftco-section bg-light">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
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
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
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
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>