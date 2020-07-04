<div class="container">

  <label class="text-info"> Manage Item Type </label> <br><br>
<form method="post" class="bg-transparent">

		<div class="row form-group">
			<div class="col-md-2">
				Name
			</div>
			<div class="col-md-4">
				<input type="text" name="itname" required class="form-control" id="ITName">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-6 text-center">
				<input type="submit" value="Insert" name="btnInsert" class="btn btn-success" id="submitBtn">
				<input type="reset" name="btnClear" value="Clear" class="btn btn-warning">
			</div>
		</div>
</form>

		<?php 
			include 'db.php';

			if(isset($_POST["btnInsert"]))
			{
				$name=$_POST["itname"];

        $q="SELECT ItemTypeId FROM ItemType WHERE ItemTypeName='$name'";
        $ans=mysqli_query($cn,$q);

        if($line=mysqli_fetch_assoc($ans))
          {
            echo "<h1 class='text-danger'>Item Type Name Already Exist!</h1>";
          }
          else{
            $query="INSERT INTO itemtype(ItemTypeName) VALUES('$name')";
            mysqli_query($cn,$query);
            echo "<h1 class='text-success'>Successfully Inserted!</h1>";
          }	
			}
		 ?>

</div>

	<?php 
      $uitid;
      if (isset($_GET["uname"]))
      {
        $itname=$_GET["uname"];
        $uitid=$_GET["uitid"];
      
        echo "<script>setName('$itname')</script>";
        
      }
      if (isset($_POST["btnInsert"]))
      {
        echo " ";
      }
      else if (isset($_POST["btnUpdate"]))
      {
        $name=$_POST["itname"];

        $q="UPDATE itemtype SET ItemTypeName='$name' WHERE ItemTypeId=$uitid";
        mysqli_query ($cn,$q);
        echo "<script> clearName();</script>";
      }

      if (isset($_GET["ditid"]))
      {
      $itid=$_GET["ditid"];
      $q="DELETE FROM itemtype WHERE ItemTypeId=$itid";
      mysqli_query ($cn,$q);
      echo "<h1 class='text-success'>Successfully Deleted!</h1>";
      }
  ?>
    
    
  <div class="row">
   <table class="table table-dark table-striped">
     <tr>
      <th class="text-center">Item Type Id</th> 
       <th class="text-center">Item Type Name</th>
       <th></th>
     </tr>

     <?php 
     $no=1;
      $q="SELECT * from itemtype Order by ItemTypeId DESC";
      $ans=mysqli_query($cn,$q);
      while($row=mysqli_fetch_assoc($ans))
      {
        $itid=$row["ItemTypeId"];
        $name=$row["ItemTypeName"];
        echo "<tr>";
        echo "<td>$no</td>";
        $no++;
        echo "<td>$name</td>";
        echo "<td>";
        echo "<a href='?uitid=$itid&uname=$name' class='btn btn-warning mr-2'>Update</a>"; 
        echo "<a href='?ditid=$itid' class='btn btn-danger'>Delete</a>";
        echo "</td>";
        echo"</tr>";
      }
     ?>
     
   </table>
  </div>