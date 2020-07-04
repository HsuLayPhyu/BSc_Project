<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.js"></script>
     <script src="js/popper.min.js"></script>
    <script type="text/javascript"></script>
</head>
<body>
	<style type="text/css">
		.pimage{
			height: 180px; 
			width: 300px;
		}
	</style>
	
	<?php 
		if(isset($_GET["cid"]))
		{
			$id=$_GET["cid"];
			unset($_SESSION["item"][$id]);
		}
		else if (isset($_GET["fun"]))
		{
			unset($_SESSION["item"]);
			echo "<script>location.assign('items.php')</script>";
		}
	?>
	<table class="table table-dark">
		<thead>
			<tr>
			<th>No</th>
			<th>Item</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
			<th></th>
		</tr>
	
		</thead>
		<tbody>
	<?php 
		include'db.php';
		$no=1;
		$alltotal=0;
		foreach ($_SESSION["item"] as $id => $qty) {
			$q="SELECT * FROM item WHERE ItemId=$id";
			$ans=mysqli_query($cn,$q);
			if($row=mysqli_fetch_assoc($ans))
			{
				$price=$row["ItemPrice"];
				$image="../Admin/upload/".$row["ItemImage"];
				$tot=$price*$qty; 
				$alltotal+=$tot;
				echo "<tr>";
				echo "<td> $no </td>";
				$no++;
				echo "<td><img src='$image' class='pimage'></td>";
				echo "<td>$price</td>";
				echo "<td style='color:black;'><input type='number' value='$qty' min='1'></td>";
				echo "<td>$tot</td>";
				echo "<td><a href='bill.php?cid=$id' class='btn btn-warning'>Cancel</a></td>";
				echo "</tr>";

			}
		} 
	?>
	<tr>  
		<td colspan="4">Total</td>
		<td><?php echo $alltotal; ?></td>;
		<td><a href="bill.php?fun=all" class="btn btn-warning">Clear All</a></td>
	</tr>
	</tbody>
</table>

</body>
</html>