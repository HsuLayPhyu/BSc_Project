<div class="container">

  <label class="text-info"> Customer List </label> <br><br>

	
    
    
  <div class="row">
   <table class="table table-dark table-striped">
     <tr>
      <th> No </th> 
       <th class="text-center"> Customer Name </th>
       <th class="text-center"> Email</th>
       <th class="text-center"> Contact No </th>
       <th class="text-center"> Address </th>
       <th class="text-center"> City </th>

     </tr>

     <?php
     $no=1; 
      $q="SELECT * FROM customers,cityinfo WHERE customers.CityInfoId=cityinfo.CityInfoId ORDER by CustomerId";
      $ans=mysqli_query($cn,$q);
      while($row=mysqli_fetch_assoc($ans))
      {
        $name = $row['CustName'];
        $mail = $row['CustEmail'];
        $ph = $row['CustPhNo'];
        $add=$row['CustAddress'];
        $city = $row['CityName'];
    ?>
      <tr>
        <td> <?php echo $no; $no++; ?></td>
        <td> <?php echo $name; ?></td>
        <td> <?php echo $mail; ?></td>
        <td> <?php echo $ph; ?></td>
        <td> <?php echo $add; ?></td>
        <td> <?php echo $city; ?></td>
      </tr>

   <?php   }
     ?>
     
   </table>
  </div>