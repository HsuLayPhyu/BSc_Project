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

    $oid=0;
    $pid=0;
    $pdate;
    $orid;

    if(isset($_GET['pid']))
    {
      $oid=$_GET['oid'];
      $pid=$_GET['pid'];
      $pdate= $_GET['pdate'];
      $orid = $_GET['orid'];
    }
    if(isset($_GET['oid']))
    {
      $oid=$_GET['oid'];
      $orid = $_GET['orid'];
      
    }


     ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span> Info</span></p>
            <h1 class="mb-0 bread">Info Detail</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
          
            <div class="about-author d-flex p-4 bg-light">
              
              <div class="desc align-self-md-center">

                <?php 
                if($pid!=0)
                  {
                    echo "Delivery Date : $pdate";
                  }
                  else
                  {
                    echo "<span class='text-info'> Delivery Date : Not Deliver Yet </span>";
                  }


                  ?>


              </div>
            </div>

            <div class="pt-5">
              <?php 
               if($pid!=0)
                  { ?>
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a Feedback for your ordered items </h3>
                <form action="" method="post" class="p-5 bg-light">

                  <select name="orid" class="form-control">
                    <option> ---- Select Item ----- </option>
                    <?php 
                    $selorditem =mysqli_query($cn,"SELECT ItemName,OrderItemId FROM orders o,orderitems ot,item i WHERE i.ItemId=ot.ItemId AND o.OrderId=ot.OrderId AND ot.OrderId=$oid AND o.OrderId=$oid");
                    while($rno=mysqli_fetch_assoc($selorditem))
                    {
                     ?>

                     <option value="<?php echo $rno['OrderItemId']; ?>"> <?php echo $rno['ItemName']; ?></option>
                    <?php } ?>
                  </select>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary" name="post">
                  </div>

                </form>
              </div>
            <?php } ?>
            </div>


          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            
            <div class="sidebar-box ftco-animate">
            	<h3 class="heading"> Order Items </h3>
              <ul class="categories">
                <li>
                <a href=""> Item:  <span>  Qty</span> </a>
              </li>
            <?php 
            $selorditem =mysqli_query($cn,"SELECT ItemName,ItemPrice,OrderQuantity FROM orders o,orderitems ot,item i WHERE i.ItemId=ot.ItemId AND o.OrderId=ot.OrderId AND ot.OrderId=$oid AND o.OrderId=$oid");
            $to=0;
            while($rt=mysqli_fetch_assoc($selorditem))
            {
              $to+=$rt['ItemPrice']*$rt['OrderQuantity'];

             ?>
                <li>
                  <a href=""> <?php echo $rt['ItemName'];?>

                   <span>(<?php echo $rt['OrderQuantity']; ?>)</span>
                   
                 </a></li>
           <?php } ?>

              <li>
                <a href=""> Total:  <span> <?php echo $to; ?> MMK </span> </a>
              </li>
              </ul>
             
            </div>

          </div>

        </div>
      </div>
    </section> <!-- .section -->

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

<?php 
  
  if(isset($_POST['post']))
  {
    $orid=$_POST['orid'];
    $msg=$_POST['message'];
    $cid = $_SESSION['customer'];

$ins=mysqli_query($cn,"INSERT INTO feedbacks(Status,OrderItemId,CustomerId) VALUES('$msg',$orid,$cid)");
if($ins)
{
  echo "<script> alert('Feedback Success'); </script>";
}

  }
 ?>