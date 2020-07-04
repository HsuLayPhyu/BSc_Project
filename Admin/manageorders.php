<?php 

if(isset($_GET['oid']))
{
  $oid=$_GET['oid'];
  $pdate=date("Y-m-d");

  $upd=mysqli_query($cn,"INSERT INTO payments(PaymentDate,OrderId) VALUES('$pdate',$oid)");
  if($upd)
  {
    echo "<script> location.assign('?fun=managepayment.php'); </script>";
  }
}

 ?>



<div class="container">

  <label class="text-info"> Manage Orders </label> <br><br>

  <div class="row">
   <table class="table table-dark table-striped">
     <tr>
      <th> No </th> 
       <th class="text-center"> Customer Name </th>
       <th class="text-center"> Contact No </th>
       <th class="text-center"> Order Date </th>
       <th class="text-center"> Request Delivery Date </th>
       <th class="text-center"> Order Amount </th>
       <th class="text-center"> Check Detail </th>
       <th class="text-center"> Add to Payment </th>

     </tr>

     <?php 
     $count=1;
$q="SELECT orders.OrderId FROM orders LEFT OUTER JOIN payments ON (orders.OrderId=payments.OrderId) WHERE payments.OrderId IS NULL";
  $ans=mysqli_query($cn,$q);
  while($row=mysqli_fetch_assoc($ans)){
  $oid=$row['OrderId'];
 $qrt=mysqli_query($cn,"SELECT SUM(ot.OrderQuantity*i.ItemPrice) as total,OrderItemId,DeliveryDate,OrderDate,CustName,CustPhNo
FROM orders o,orderitems ot,item i,customers c WHERE i.ItemId=ot.ItemId AND o.OrderId=ot.OrderId AND ot.OrderId=$oid AND o.CustomerId=c.CustomerId");
 while($rod=mysqli_fetch_assoc($qrt)){
  $n=$rod['CustName'];
  $p=$rod['CustPhNo'];
  $total = $rod['total'];
  $ddate=$rod['DeliveryDate'];
  $odate=$rod['OrderDate'];
 ?>
 <tr>
   <td><?php echo $count; $count++; ?></td>
   <td><?php echo $n; ?></td>
   <td><?php echo $p; ?></td>
   <td><?php echo $odate; ?></td>
   <td><?php echo $ddate; ?></td>
   <td><?php echo $total; ?> MMK</td>
   <td> <a href="?fun=checkdetail.php&oid=<?php echo $oid; ?>"> Check Detail</a></td>
   <td>  <a href="?oid=<?php echo $oid; ?>&check=active"> Add Payment</a></td>
 </tr>   
    <?php  }
  }
     ?>
   </table>
  </div>