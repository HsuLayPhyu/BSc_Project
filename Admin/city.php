<div class="container">

 <label class="text-info"> Manage City </label> <br><br>


		<form method="post" action="" class="bg-light">

		<div class="row form-group">
			<div class="col-md-2">
				 City Name
			</div>
			<div class="col-md-4">
				<input type="text" name="cname" required class="form-control" id="CtName">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">Number Of Day</div>
			<div class="col-md-4">
				<input type="text" name="cday" required="required" class="form-control" id="CtDay">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-6 text-center">
				<input type="submit" value="INSERT" name="btninsert" class="btn btn-success" id="submitBtn">
				<input type="reset" name="btnclear" value="CLEAR" class="btn btn-warning">
			</div>
		</div>
		</form>

		<?php 
			include 'db.php';
			if(isset($_POST["btninsert"]))
			{
				$name=$_POST["cname"];
				$day=$_POST["cday"];

          $q="SELECT CityInfoId FROM cityinfo WHERE CityName='$name'";
          $ans=mysqli_query($cn,$q);
          if($line=mysqli_fetch_assoc($ans))
          {
            echo "<h1 class='text-danger'>City Name Already Exist!</h1>";
          }
          else{
            $query="INSERT INTO cityinfo(CityName,NumOfDay) VALUES('$name','$day')";
            mysqli_query($cn,$query);
            echo "<h1 class='text-success'>Successfully Inserted!</h1>";
          }
				
					}
		 ?>
	</div>

	<?php 
      $ucid;
      if (isset($_GET["uname"]))
      {
        $cname=$_GET["uname"];
        $cday=$_GET["uday"];
        $ucid=$_GET["ucid"];
        $_SESSION["ucid"]=$ucid;
      
        echo "<script>setCName('$cname');setDay('$cday');</script>";
        
      }
      if (isset($_POST["btnInsert"]))
      {
        echo "Insert";
      }
      else if (isset($_POST["btnUpdate"]))
      {
        $name=$_POST["cname"];
        $day=$_POST["cday"];
        $ucid=$_SESSION["ucid"];
        $q="UPDATE cityinfo SET CityName='$name',NumOfDay='$day' WHERE CityInfoId=$ucid";
        mysqli_query ($cn,$q);
        echo "<script> clearName();</script>";
      }

      if (isset($_GET["dcid"]))
      {
      $cid=$_GET["dcid"];
      $q="DELETE FROM cityinfo WHERE CityInfoId=$cid";
      mysqli_query ($cn,$q);
      echo "<h1 class='text-success'>Successfully Deleted!</h1>";
      }
  ?>
    
    
  <div class="row">
   <table class="table table-dark table-striped">
     <tr>
      <th class="text-center">City Id</th> 
       <th class="text-center">City Name</th>
       <th class="text-center">Num Of Day</th>
       <th></th>
     </tr>
     
     <?php 
     $no=1;
      $q="SELECT * from cityinfo Order by CityInfoId DESC";
      $ans=mysqli_query($cn,$q);
      while($row=mysqli_fetch_assoc($ans))
      {
        $cid=$row["CityInfoId"];
        $name=$row["CityName"];
        $day=$row["NumOfDay"];
        echo "<tr>";
        echo "<td>$no</td>";
        $no++;
        echo "<td>$name</td>";
        echo "<td>$day</td>";
        echo "<td>";
        echo "<a href='?ucid=$cid&uname=$name&uday=$day' class='btn btn-warning mr-2'>Update</a>"; 
        echo "<a href='?dcid=$cid' class='btn btn-danger'>Delete</a>";
        echo "</td>";
        echo"</tr>";
      }
     ?>
   </table>
  </div>