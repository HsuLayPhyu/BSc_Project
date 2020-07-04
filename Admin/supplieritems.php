<script type="text/javascript">
  
        function showsupplier()
        {
         
         var sup =document.getElementById("supplier").value;
         
           
    $('#Supplier').load('supplierid.php?sid=' + sup,
          function() {
           
            $('#Supplier').show();
           /* $('#Mymodal').modal({
              show : true
          });*/
       });
           
        }


         function showitem()
        {
         
         var sup =document.getElementById("item").value;
         
           
    $('#Item').load('itemid.php?iid=' + sup,
          function() {
            
            $('#Item').show();
           /* $('#Mymodal').modal({
              show : true
          });*/
       });
           
        }


</script>
  


<div class="container">

   <label class="text-info"> Manage Supplier and Items  </label> <br><br>

      <?php 
      include 'db.php';
      if(isset($_POST["btnInsert"]))
      {
        $supplier=$_POST["supplier"];
        $item=$_POST["item"];

            $query="insert into supplieritem(SuppId,ItemId) values('$supplier','$item')";
            mysqli_query($cn,$query);
            echo "<h1 class='text-success'>Successfully Inserted!</h1>";
          
        }
     ?>

<form method="post" action="index.php" class="bg-light" enctype="multipart/form-data">

    <div class="row form-group">
      <div class="col-md-2">Supplier</div>
      <div class="col-md-4">
      <select name="supplier" class="container-fluid form-control" id="supplier">
        
        <?php 
          $q= "select * from supplier";
          $ans=mysqli_query($cn,$q);
          while ($row=mysqli_fetch_assoc($ans)) 
          {
          ?>
          <option value="<?php echo $row['SuppId']; ?>"> <?php echo $row['SuppName']; ?></option>
          <?php
        }
        ?>

      </select> 
    </div>

    <button type="button" class="btn btn-success" data-toggle="modal" onclick="showsupplier();"> Detail </button>
    </div>



<div class="modal" role="dialog" tabindex="-1" aria-hidden="true" id="Supplier">

</div>



    <div class="row form-group">
      <div class="col-md-2">Item</div>
      <div class="col-md-4">
      <select name="item" class="container-fluid form-control" id="item">
        
        <?php 
          $q= "select * from item";
          $ans=mysqli_query($cn,$q);
          while ($row=mysqli_fetch_assoc($ans)) 
          {
          ?>
          <option value="<?php echo $row['ItemId']; ?>"> <?php echo $row['ItemName']; ?></option>

          <?php

        }
        ?>
        
      </select> 
    </div>
 <!--  <input type="button" value="Detail" name="btnInsert" class="btn btn-success" onclick="showitem();"> -->
  <button type="button" class="btn btn-success" data-toggle="modal" onclick="showitem();"> Detail </button>
    </div>
<div class="modal" role="dialog" tabindex="-1" aria-hidden="true" id="Item">

</div>

   <div class="row form-group">
      <div class="col-md-6 text-center">
        <input type="submit" value="Insert" name="btnInsert" class="btn btn-success" id="submitBtn">
        
    </div> 
    </form>
</div>

<?php
if (isset($_GET["dsiid"]))
      {
      $siid=$_GET["dsiid"];
      $q="DELETE FROM supplieritem WHERE SuppItemId=$siid";
      mysqli_query ($cn,$q);
      echo "<h1 class='text-success'>Successfully Deleted!</h1>";
      }
?>

 <div class="row">
   <table class="table table-dark table-striped">
    <tr>
      <th class="text-center">Supplier Id</th> 
       <th class="text-center">Item Id</th>
       <th class="text-center">Supplier Name</th>
       <th class="text-center">Item Name</th>
       <th></th>
     </tr>

     <?php 
     $no=1;
      $q="SELECT * FROM supplier s, Item i, supplieritem si WHERE s.SuppId=si.SuppId AND i.ItemId=si.ItemId ";
      $ans=mysqli_query($cn,$q);
      while($row=mysqli_fetch_assoc($ans))
      {
         $siid=$row["SuppItemId"];
        $sid=$row["SuppId"];
        $iid=$row["ItemId"];
        $suppname=$row["SuppName"];
        $itemname=$row["ItemName"];
       
        echo "<tr>";
        echo "<td>$no</td>";
        $no++;
        echo "<td>$sid</td>";
        echo "<td>$suppname</td>";
        echo "<td>$itemname</td>";
        
        echo "<td>";
        echo "<a href='?dsiid=$siid' class='btn btn-danger'>Delete</a>";
        echo "</td>";
        echo"</tr>";
      }
     ?>
     
   </table>
  </div>

 <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script> 

