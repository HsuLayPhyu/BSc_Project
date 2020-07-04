<div class="container">

  <label class="text-info"> Feedback List </label> <br><br>

	
    
    
  <div class="row">
   <table class="table table-dark table-striped">
     <tr>
      <th> No </th> 
       <th class="text-center"> Item  </th>
       <th class="text-center"> Customer Name </th>
       <th class="text-center"> Contact No </th>
       <th class="text-center"> Feedback Message  </th>
     </tr>

     <?php
     $no=1; 
      $q="SELECT * FROM customers,feedbacks,item,orderitems WHERE customers.CustomerId=feedbacks.CustomerId AND orderitems.OrderItemId=feedbacks.OrderItemId AND orderitems.ItemId=item.ItemId ORDER by CommentId DESC";
      $ans=mysqli_query($cn,$q);
      while($row=mysqli_fetch_assoc($ans))
      {
        
        $name = $row['CustName'];
        $ph = $row['CustPhNo'];
        $msg=$row['Status'];
        $item = $row['ItemName'];
       
    ?>
      <tr>
        <td> <?php echo $no; $no++; ?></td>
        <td> <?php echo $item; ?></td>
        <td> <?php echo $name; ?></td>
        <td> <?php echo $ph; ?></td>
        <td> <?php echo $msg; ?></td>
       
      </tr>

   <?php   }
     ?>
     
   </table>
  </div>