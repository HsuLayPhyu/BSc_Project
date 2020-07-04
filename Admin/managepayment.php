<?php 

$aid = $_SESSION['aid'];

if(isset($_GET['pid']))
{
  $pid=$_GET['pid'];

  $upd=mysqli_query($cn,"UPDATE payments SET AdminId=$aid WHERE PaymentId=$pid");
  if($upd)
  {
    echo "<script> location.assign('?fun=managepayment.php'); </script>";
  }
}

 ?>





<div class="container">

  <label class="text-info"> Manage Payment </label> <br><br>

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
       <th class="text-center"> Confirm Payment </th>
       <th class="text-center"> Delivery Date </th>
  </tr>

    <?php 
     $count=1;
     $q="SELECT orders.OrderId,PaymentId,AdminId FROM orders,payments WHERE payments.OrderId=orders.OrderId Order by payments.PaymentId DESC";
  $ans=mysqli_query($cn,$q);
  while($row=mysqli_fetch_assoc($ans)){
  $pid=$row['PaymentId'];;
  $oid=$row['OrderId'];
  $caid = $row['AdminId'];
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
   <td> 

<?php if($caid==0){ ?>
    <a href="?pid=<?php echo $pid; ?>&check=confirm" class="btn btn-sm btn-primary"> Confirm </a>
  <?php }
  else
  {
    echo "<label class='text-info'> Payment Confirm </label>";
  } ?>
  </td>
   <td> 
<?php
if($caid!=0)
{
  $deldate="";

  $sd=mysqli_query($cn,"SELECT DeliveryDate FROM deliverys WHERE PaymentId=$pid");
  $cond=mysqli_num_rows($sd);
  if($cond>0)
  {
  $dp = mysqli_fetch_assoc($sd);
  $deldate = $dp['DeliveryDate'];

  echo "<label class='text-info'> $deldate</label>";
  }
  else{
 
?>

<form action="" method="post">
  <div class="form-group">
    <label> Delivery Date: </label>
    <input type="date" name="cdate" class="form-control"><br>
    
    <input type="hidden" name="pid" value="<?php echo $pid;?>">
    <input type="submit" name="add" value="Add" class="btn btn-sm btn-info">
  </div>
</form>

<?php
}
}
 ?>
   </td>
 </tr>
    <?php  }
  }
     ?>
   </table>
  </div>
  <?php 
  if(isset($_POST['add']))
  {
    $pid=$_POST['pid'];
    $d=$_POST['cdate'];

    $in=mysqli_query($cn,"INSERT INTO deliverys(DeliveryDate,PaymentId) VALUES('$d',$pid)");
    if($in)
    {
      echo "<script> location.assign('?fun=managepayment.php');</script>";
    }
  } ?>