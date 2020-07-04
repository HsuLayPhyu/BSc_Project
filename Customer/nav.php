<?php 

session_start();
include 'db.php';
$cno=0;

if(isset($_SESSION['carting']))
{
foreach ($_SESSION['carting'] as $itid => $cc) 
{
	$cno+=$cc;
}
}



 ?>



<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						     <span class="text">+ 95 9962404764</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						     <span class="text">shangoods@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery </span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"> SHANGOODS</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item active dropdown">
              <a class="nav-link" href="shop.php" id="dropdown04" >Shop</a>
            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

	          <?php if(!isset($_SESSION['customer']))
	          { ?>
               <li class="nav-item"><a href="cregister.php" class="nav-link">Register</a></li>
               <li class="nav-item"><a href="clogin.php" class="nav-link">Login</a></li>
           <?php }
           else{ ?>

               <li class="nav-item"><a href="info.php" class="nav-link">Info</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            <?php } ?>


	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link bg-success text-light"> Cart[<?php echo $cno; ?>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>