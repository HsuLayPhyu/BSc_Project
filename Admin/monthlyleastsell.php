<div class="container">

  <label class="text-info">Monthly Least Selling Items </label> <br><br>

<?php
include('mfunction.php');

if(!isset($_POST['see']))
  {
?>

  <form class="mt-3 mb-5" method="post" action="">
    <div class="row">
      <div class="col-md-4">
      <label> Choose Month </label>
      <select name="month" class="form-control" id="mt">
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
       <th class="text-center"> Item Name  </th>
       <th class="text-center"> Item Type </th>
       <th class="text-center"> Image </th>
       <th class="text-center"> Ordered Qty </th>
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
  $m=$_POST['month'];

 ?>


    <?php echo "<script> callmonth($m); </script>"; ?>

   

	<form class="mt-3 mb-5" method="post" action="">
    <div class="row">
      <div class="col-md-4">
      <label> Choose Month </label>
      <select name="month" class="form-control" id="mt">

   <option value="<?php echo htmlentities($m); ?>"> <?php $sm=choose($m); echo $sm; ?></option>

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
       <br><br>
        <input type="submit" name="see" value="View" class="btn btn-info">
      </div>
    </div>
  </form>
    

    
  <div class="row">
   <table class="table table-dark table-striped">
     <tr>
       <th class="text-center"> No </th> 
       <th class="text-center"> Item Name  </th>
       <th class="text-center"> Item Type </th>
       <th class="text-center"> Image </th>
       <th class="text-center"> Ordered Qty </th>
     </tr>
     
     <?php
     $no=1; 
     $y=date('Y');
    
    $q="SELECT SUM(OrderQuantity) as ot,ItemName,ItemTypeName,ItemImage
    FROM orders o,orderitems oit,item i,itemtype t
    WHERE o.OrderId=oit.OrderId AND oit.ItemId=i.ItemId AND t.ItemTypeId=i.ItemTypeId AND MONTH(OrderDate)='$m' and YEAR(OrderDate)='$y' GROUP BY oit.ItemId Order By ot ASC LIMIT 10";
      $ans=mysqli_query($cn,$q);
      while($row=mysqli_fetch_assoc($ans))
      {
        $name = $row['ItemName'];
        $type = $row['ItemTypeName'];
        $tt = $row['ot'];
        $img=$row['ItemImage'];     
    ?>
      <tr>
        <td> <?php echo $no; $no++; ?></td>
        <td> <?php echo $name; ?></td>
        <td> <?php echo $type; ?></td>
        <td> <img src='upload/<?php echo $img; ?>' style="height: 180px;width: 180px;"></td>
        <td> <?php echo $tt; ?></td>
      
      </tr>
   <?php   }
     ?>
   </table>
  </div>
  <?php }
  ?>

<script type="text/javascript" rel="js/jquery.min.js"></script>

