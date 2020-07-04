<div class="container">

<?php 

 $oid;
     if(isset($_GET['oid']))
     {
      $oid=$_GET['oid'];
     }
 ?>

 <a href="?fun=managepayment.php" class="mt-4 btn btn-primary"> Back </a> <br>

  <label class="text-info mt-4"> Check order detail for Order: OID - <?php echo $oid; ?> </label> <br><br>

  <div class="row">
   <table class="table table-dark table-striped">
     <tr>
      <th> No </th> 
       <th> Item  </th>
       <th> Image </th>
       <th> Unit Price </th>
       <th>  Ordered Qty </th>
      

     </tr>

     <?php 
  
     $count=1;
    $q =mysqli_query($cn,"SELECT ItemName,ItemPrice,OrderQuantity,ItemImage FROM orders o,orderitems ot,item i WHERE i.ItemId=ot.ItemId AND o.OrderId=ot.OrderId AND ot.OrderId=$oid AND o.OrderId=$oid");
    
      while($rod=mysqli_fetch_assoc($q))
      {
       

  $n=$rod['ItemName'];
  $p=$rod['ItemPrice'];
  $img=$rod['ItemImage'];

  $qty = $rod['OrderQuantity'];
  $tt=$p*$qty;
 ?>

 <tr>
   <td><?php echo $count; $count++; ?></td>
   <td><?php echo $n; ?></td>
   <th><img src="upload/<?php echo $img; ?>" style="height: 180px;width: 180px;"></th>
   <td><?php echo $p; ?></td>
   <td><?php echo $qty; ?> MMK </td>
   
 </tr>
      
    <?php  
  }
     ?>
   </table>
  </div>