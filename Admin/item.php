 <div class="container">

   <label class="text-info"> Manage Item </label> <br><br>

		<?php 
			include 'db.php';
			if(isset($_POST["btnInsert"]))
			{
				$name=$_POST["iname"];
        $price=$_POST["iprice"];
        $image=$_FILES["iimage"]["name"];
        $temp=$_FILES["iimage"]["tmp_name"];
        move_uploaded_file($temp,"upload/$image");
        $life=$_POST["ilife"];
        $desc=$_POST["idesc"];
        $itemtype=$_POST["iitemtype"];

					$q="SELECT ItemId FROM Item WHERE ItemName='$name'";
          $ans=mysqli_query($cn,$q);
          if($line=mysqli_fetch_assoc($ans))
          {
            echo "<h1 class='text-danger'>Item Name Already Exist!</h1>";
          }
          else{
            $query="insert into item(ItemName,ItemImage,ItemPrice,ItemLifeTime,ItemDescription,ItemTypeId) values('$name','$image','$price','$life','$desc','$itemtype')";
            mysqli_query($cn,$query);
            echo "<h1 class='text-success'>Successfully Inserted!</h1>";
          }
        }
		 ?>
		<form method="post" action="index.php" class="bg-transparent container-fluid" enctype="multipart/form-data">

		<div class="row form-group">
			<div class="col-md-2">
				Name
			</div>
			<div class="col-md-4">
				<input type="text" name="iname" required class="form-control" id="IName">
			</div>
		</div>

    <div class="row form-group">
      <div class="col-md-2">
        Price
      </div>
      <div class="col-md-4">
        <input type="text" name="iprice" required class="form-control" id="IPrice">
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-2">
        Image
      </div>
      <div class="col-md-4">
        <input type="file" name="iimage"  class="form-control" id="IImage">
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-2">
        Item Life Time
      </div>
      <div class="col-md-4">
        <input type="text" name="ilife"  class="form-control" id="ILife">
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-2">
        Description
      </div>
      <div class="col-md-4">
        <input type="text" name="idesc" required class="form-control" id="IDesc">
      </div>
    </div>
  
    <div class="row form-group">
      <div class="col-md-2">Item Type</div>
      <div class="col-md-4">
      <select name="iitemtype" class="container-fluid form-control">
        
        <?php 
          $q= "select * from itemtype";
          $ans=mysqli_query($cn,$q);
          while ($row=mysqli_fetch_assoc($ans)) 
          {
          ?>
          <option value="<?php echo $row['ItemTypeId']; ?>"> <?php echo $row['ItemTypeName']; ?></option>
          <?php
        }
        ?>
        
      </select> 
    </div>
    </div>
		<div class="row form-group">
			<div class="col-md-6 text-center">
				<input type="submit" value="Insert" name="btnInsert" class="btn btn-success" id="submitBtn">
				<input type="reset" name="btnClear" value="Clear" class="btn btn-warning">
			</div>
		</div>
		</form>
	</div>

  <?php 
      $uiid;
      if (isset($_GET["uname"]))
      {
        $iname=$_GET["uname"];
        $uiid=$_GET["uiid"];
        $_SESSION["uid"]=$uiid;
        $iprice=$_GET["uprice"];
        $ilife=$_GET["ulife"];
        $idesc=$_GET["udesc"];   
        echo "<script>setItemName('$iname');setPrice('$iprice');
        setLife('$ilife');setDesc('$idesc');
        </script>";
      }
      if (isset($_POST["btnUpdate"]))
      {
        $name=$_POST["iname"];
        
        $price=$_POST["iprice"];
        $life=$_POST["ilife"];
        $desc=$_POST["idesc"];
        $fileName=$_FILES["iimage"]["name"];
        $tmp=$_FILES["iimage"]["tmp_name"];
        $itemtype=$_POST["iitemtype"];
        $uiid=$_SESSION["uid"];

        if($tmp==NULL)
        {
          $q="UPDATE item SET ItemName='$name',ItemPrice='$price',ItemLifeTime='$life',ItemDescription='$desc',ItemTypeId='$itemtype' WHERE ItemId=$uiid";
          mysqli_query($cn,$q);
        }
        else
        {
          move_uploaded_file($tmp,"upload/$fileName");
          $q="UPDATE item SET ItemName='$name',ItemPrice='$price',ItemLifeTime='$life',ItemDescription='$desc',ItemTypeId='$itemtype',ItemImage='$fileName' WHERE ItemId=$uiid";
          $ss=mysqli_query($cn,$q);
          if($ss)
          {
           echo "<script> clearName();</script>";
          }
          else
          {
            echo "error";
          }
        }
        
      }

      if (isset($_GET["diid"]))
      {
      $iid=$_GET["diid"];
      $q="DELETE FROM item WHERE ItemId=$iid";
      mysqli_query ($cn,$q);
      echo "<h1 class='text-success'>Successfully Deleted!</h1>";
      }
  ?>
    
<div class="row">
   <table class="table table-dark table-striped table-responsive" width="100%">
     <tr>
      <th class="text-center">Number</th> 
       <th class="text-center">Name</th>
       <th class="text-center">Image</th>
       <th class="text-center">Price</th>
       <th class="text-center">LifeTime</th>
       <th class="text-center">Description</th>
       <th class="text-center">ItemType</th>
       <th class="text-center"></th>
       <th></th>
     </tr>
     
     <?php 
     $no=1;
      $q="SELECT * from item,itemtype WHERE item.ItemTypeId=itemtype.ItemTypeId Order by item.ItemId DESC";
      $ans=mysqli_query($cn,$q);
      while($row=mysqli_fetch_assoc($ans))
      {
        $iid=$row["ItemId"];
        $name=$row["ItemName"];
        $image="upload/".$row["ItemImage"];
        $price=$row["ItemPrice"];
        $life=$row["ItemLifeTime"];
        $desc=$row["ItemDescription"];
        $itemtype=$row["ItemTypeName"];
        echo "<tr>";
        echo "<td>$no</td>";
        $no++;
        echo "<td>$name</td>";
        echo "<td><img src='$image' class='container-fluid'></td>";
        echo "<td>$price</td>";
        echo "<td>$life days</td>"; 
        echo "<td>$desc</td>";
        echo "<td>$itemtype</td>";
        echo "<td>";
        echo "<a href='?uiid=$iid&uname=$name&uprice=$price&ulife=$life&udesc=$desc'&uitemtype=$itemtype class='btn btn-warning mr-2'>Update</a>  </td>"; 
        echo "<td><a href='?diid=$iid' class='btn btn-danger'>Delete</a>";
        echo"</td>";
        echo"</tr>";
      }
     ?>
   </table>
  </div>