<?php 
	session_start();

	if(isset($_SESSION['aid']))
	{
		
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" href="css/bootstrap.min.css">


	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.js"></script>
     <script src="js/popper.min.js"></script>
     <script src="js/jquery.min.js"></script>
	<script type="text/javascript">


		function setName(n)
		{
		var inputElement=document.getElementById("ITName");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";

		}
		function clearName()
		{
		var inputElement=document.getElementById("ITName");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

       function setItemName(n)
       {
       	var inputElement=document.getElementById("IName");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";
       }
       function clearItemName()
		{
		var inputElement=document.getElementById("IName");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

		function setPrice(n)
       {
       	var inputElement=document.getElementById("IPrice");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";
       }
       function clearPrice()
		{
		var inputElement=document.getElementById("IPrice");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

		function setLife(n)
       {
       	var inputElement=document.getElementById("ILife");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";
       }
       function clearLife()
		{
		var inputElement=document.getElementById("ILife");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

		function setDesc(n)
       {
       	var inputElement=document.getElementById("IDesc");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";
       }
       function clearDesc()
		{
		var inputElement=document.getElementById("IDesc");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

		function setSName(n)
       {
       	var inputElement=document.getElementById("SName");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";
       }
       function clearSName()
		{
		var inputElement=document.getElementById("SName");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

		function setSEmail(n)
       {
       	var inputElement=document.getElementById("SEmail");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";
       }
       function clearSEmail()
		{
		var inputElement=document.getElementById("SEmail");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

		function setSAddress(n)
       {
       	var inputElement=document.getElementById("SAddress");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";
       }
       function clearSAddress()
		{
		var inputElement=document.getElementById("SAddress");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

		function setSPhone(n)
       {
       	var inputElement=document.getElementById("SPhone");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";
       }
       function clearSPhone()
		{
		var inputElement=document.getElementById("SPhone");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

		function setCName(n)
		{
		var inputElement=document.getElementById("CtName");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";

		}
		function clearCName()
		{
		var inputElement=document.getElementById("CtName");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}

		function setDay(n)
		{
		var inputElement=document.getElementById("CtDay");
			inputElement.value=n;
		var btn=document.getElementById("submitBtn");
			btn.value="UPDATE";
			btn.name="btnUpdate";

		}
		function clearDay()
		{
		var inputElement=document.getElementById("CtDay");
			inputElement.value="";
		var btn=document.getElementById("submitBtn");
			btn.value="Insert";
			btn.name="btnInsert";
		}
	</script>

   <link rel="stylesheet" href="css/style.css"> 

</head>
<body>
	<div class="py-4 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    		
					    <div class="col-md-10 pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text"> Admin : <?php echo $_SESSION['amail']; ?></span>
					    </div>
					    <div class="col-md-2 pr-4 d-flex topper align-items-center text-lg-right">
						    <a href="logout.php" class="text-light text-lg-right">Logout </a> 
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">SHANGOODS</a>
	    </div>
	  </nav>
	  <div >

<?php include 'db.php' ?>
<div class="container-fluid">
<div class="row">
	<div class="col-md-2 bg-light border text-info">
		<?php include 'function.php' ?>
	</div>
	<div class="col-md-10">
	<?php
		if(!isset($_SESSION["page"]))
			$_SESSION["page"]="itemtype.php"; 
		if(isset($_GET["fun"]))
		{
			$pageName=$_GET["fun"];
			$_SESSION["page"]=$pageName;
		}
		include $_SESSION["page"];
	 ?>
	 
	</div>
</div>
</div>
</div>

 
 
</body>
</html>

<?php 
}
else
{

	header("location:alogin.php");
} ?>