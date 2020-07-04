
<?php 
$month =array();
$month =['January','February','March','April','May','June','July','August','September','Octorber','November','December'];
 ?>

<div class="container">


  <label class="text-info">Monthly Income </label> <br><br>
<?php
include('mfunction.php');

if(!isset($_POST['see']))
  {
?>

  <form class="mt-3 mb-5" method="post" action="">
    <div class="row">
      <div class="col-md-4">
      <label> Choose Month </label>
      <select name="frmonth" class="form-control" id="mt">
        <option> ---- </option>
        <option value="1"> January </option>
        <option value="2">February </option>
        <option value="3"> March </option>
        <option value="4">April </option>
        <option value="5"> May </option>
        <option value="6">June </option>
        <option value="7"> July </option>
        <option value="8">August </option>
        <option value="9"> September </option>
        <option value="10">October </option>
        <option value="11"> November </option>
        <option value="12">December </option>
      </select>
      </div>

      <div class="col-md-4">
      <label> Choose Month </label>
      <select name="tomonth" class="form-control" id="mt">
        <option> ---- </option>
        <option value="1"> January </option>
        <option value="2">February </option>
        <option value="3"> March </option>
        <option value="4">April </option>
        <option value="5"> May </option>
        <option value="6">June </option>
        <option value="7"> July </option>
        <option value="8">August </option>
        <option value="9"> September </option>
        <option value="10">October </option>
        <option value="11"> November </option>
        <option value="12">December </option>
      </select>
      </div>
      <div class="col-md-4"> 
       <br><br>
        <input type="submit" name="see" value="View" class="btn btn-info">
      </div>
    </div>
  </form>
    
    
  <div class="row">
   <table class="table table-dark table-striped">

     <tr>
       <th class="text-center"> No </th> 
       <th class="text-center"> Month  </th>
       <th class="text-center"> Income </th>
      
     </tr>
      <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      </tr>

   </table>
  </div>



 <?php } 

else
{
  $frm=$_POST['frmonth'];
  $to = $_POST['tomonth'];

 ?>

	<form class="mt-3 mb-5" method="post" action="">
    <div class="row">
      <div class="col-md-4">
      <label> Choose Month </label>
      <select name="frmonth" class="form-control" id="mt">
   <option value="<?php echo htmlentities($frm); ?>"> <?php $sm=choose($frm); echo $sm; ?></option>

        <option value="01"> January </option>
        <option value="02">February </option>
        <option value="03"> March </option>
        <option value="04">April </option>
        <option value="05"> May </option>
        <option value="06">June </option>
        <option value="07"> July </option>
        <option value="08">August </option>
        <option value="09"> September </option>
        <option value="10">October </option>
        <option value="11"> November </option>
        <option value="12">December </option>
      </select>
      </div>
      <div class="col-md-4">
      <label> Choose Month </label>
      <select name="tomonth" class="form-control" id="mt">

        <option value="<?php echo htmlentities($to); ?>"> <?php $sm=choose($to); echo $sm; ?></option>
        
        <option value="1"> January </option>
        <option value="2">February </option>
        <option value="3"> March </option>
        <option value="4">April </option>
        <option value="5"> May </option>
        <option value="6">June </option>
        <option value="7"> July </option>
        <option value="8">August </option>
        <option value="9"> September </option>
        <option value="10">October </option>
        <option value="11"> November </option>
        <option value="12">December </option>
      </select>
      </div>
      <div class="col-md-4"> 
       <br><br>
        <input type="submit" name="see" value="View" class="btn btn-info">
      </div>
    </div>
  </form>
    

    
  <div class="row">
   <table class="table table-dark table-striped">
     <tr>
       <th class="text-center"> No </th> 
       <th class="text-center"> Month  </th>
       <th class="text-center"> Income </th>
      
     </tr>

     <?php
     $no=1; 
    $y=date('Y');
    $alltotal=0;
    $q="SELECT SUM(ItemPrice*OrderQuantity) as total,month(PaymentDate) as mm
    FROM orders o,orderitems oit,item i,itemtype t,payments p
    WHERE o.OrderId=oit.OrderId AND oit.ItemId=i.ItemId AND t.ItemTypeId=i.ItemTypeId AND p.OrderId=o.OrderId AND month(PaymentDate) BETWEEN '$frm' AND '$to' AND year(PaymentDate)='$y' GROUP BY month(PaymentDate) ";
      $ans=mysqli_query($cn,$q);
      while($row=mysqli_fetch_assoc($ans))
      {
        $m = $row['mm']-1;
        $imonth= $month[$m];
        $total = $row['total'];
        $alltotal+=$total;
    ?>
      <tr>
        <td> <?php echo $no; $no++; ?></td>
        <td> <?php echo $imonth; ?></td>
        <td> <?php echo $total; ?></td>
      </tr>
   <?php   }
     ?>
     <tr>
       <td colspan="2"> Total Income </td>
       <td> <?php echo $alltotal; ?></td>
     </tr>
   </table>
  </div>
  <?php }
  ?>

<script type="text/javascript" rel="js/jquery.min.js"></script>

