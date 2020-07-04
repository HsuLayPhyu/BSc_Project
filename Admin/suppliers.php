    <div class="container">

       <label class="text-info"> Manage Supplier </label> <br><br>


		<?php 
			include 'db.php';
			if(isset($_POST["btnregister"]))
			{
				$name=$_POST["sname"];
				$email=$_POST["semail"];
				$phone=$_POST["sphone"];
				$address=$_POST["saddress"];
				
					$q="select SuppId from supplier where SuppEmail='$email'";
					$ans=mysqli_query($cn,$q);
					 if($line=mysqli_fetch_assoc($ans))
					{
						echo "<h1 class='text-danger'>Email Already Exist!</h1>";
					}
					else{

						$query="insert into supplier(SuppName,SuppEmail,SuppAddress,SuppPhno) values('$name','$email','$address','$phone')";
						mysqli_query($cn,$query);
						echo "<h1 class='text-success'>Successfully Inserted!</h1>";
					}
			}
		 ?>
		<form method="post" action="index.php" class="bg-light">

		<div class="row form-group">
			<div class="col-md-2">
				Name
			</div>
			<div class="col-md-4">
				<input type="text" name="sname" required class="form-control" id="SName">
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col-md-2">Email</div>
			<div class="col-md-4">
				<input type="email" name="semail" required="required" class="form-control" id="SEmail">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">Phone</div>
			<div class="col-md-4">
				<input type="text" name="sphone" required="required" class="form-control" id="SPhone">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">Address</div>
			<div class="col-md-4">
				<input type="text" name="saddress" required="required" class="form-control" id="SAddress">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-6 text-center">
				<input type="submit" value="REGISTER" name="btnregister" class="btn btn-success" id="submitBtn">
				<input type="reset" name="btnclear" value="CLEAR" class="btn btn-warning">
			</div>
		</div>
		</form>
	</div>
  
	<?php 
      $usid;
      if (isset($_GET["uname"]))
      {
        $sname=$_GET["uname"];
        $usid=$_GET["usid"];
        $_SESSION["usid"]=$usid;
      	$uemail=$_GET["uemail"];
      	$uaddress=$_GET["uaddress"];
      	$uphone=$_GET["uphone"];
        echo "<script>setSName('$sname');setSEmail('$uemail');setSAddress('$uaddress');setSPhone('$uphone');</script>";
        
      }
      if (isset($_POST["btnInsert"]))
      {
        echo "Insert";
      }
      else if (isset($_POST["btnUpdate"]))
      {
        $name=$_POST["sname"];
        $email=$_POST["semail"];
        $address=$_POST["saddress"];
        $phone=$_POST["sphone"];
        $usid=$_SESSION["usid"];
        $q="UPDATE supplier SET SuppName='$name',SuppEmail='$email',SuppAddress='$address',SuppPhno='$phone' WHERE SuppId=$usid";
        mysqli_query ($cn,$q);
        echo "<script> clearName();</script>";
      }

      if (isset($_GET["dsid"]))
      {
      $sid=$_GET["dsid"];
      $q="DELETE FROM supplier WHERE SuppId=$sid";
      mysqli_query ($cn,$q);
      echo "<h1 class='text-success'>Successfully Deleted!</h1>";
      }
  ?>

 <div class="row">
   <table class="table table-dark table-striped">
     <tr>
      <th class="text-center">SupplierId</th> 
       <th class="text-center">SupplierName</th>
       <th class="text-center">Email</th>
       <th class="text-center">Address</th>
       <th class="text-center">Phone</th>
       <th class="text-center"></th>
     </tr>
     <?php 
     $no=1;
      $q="SELECT * FROM supplier";
      $ans=mysqli_query($cn,$q);
      while($row=mysqli_fetch_assoc($ans))
      {
        $sid=$row["SuppId"];
        $sname=$row["SuppName"];
        $semail=$row["SuppEmail"];
        $saddress=$row["SuppAddress"];
        $sphone=$row["SuppPhno"];
        echo "<tr>";
        echo "<td> $no </td>";

        $no++;
        echo "<td>$sname</td>";
        echo "<td>$semail</td>";
        echo "<td>$saddress</td>";
        echo "<td>$sphone</td>";
        echo "<td>";
        echo "<a href='?usid=$sid&uname=$sname&uemail=$semail&uaddress=$saddress&uphone=$sphone' class='btn btn-warning mr-2'>Update</a>"; 
        echo "<a href='?dsid=$sid' class='btn btn-danger'>Delete</a>";
        echo "</td>";
        echo"</tr>";
      }
     ?>
   </table>
  </div>
