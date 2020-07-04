
     <?php 
     include "db.php";

     $sname ="";
     $semail ="";
     $saddress ="";
     $sphone ="";

     if(isset($_GET["sid"]))
     {

      
      $sid=$_GET["sid"];

      $q="SELECT * FROM supplier WHERE SuppId=$sid";
      $ans=mysqli_query($cn,$q);
      $row=mysqli_fetch_assoc($ans);
      

        $sname=$row["SuppName"];
        $semail=$row["SuppEmail"];
        $saddress=$row["SuppAddress"];
        $sphone=$row["SuppPhno"];
  }
       
     

     ?>
   



<div class="modal-dialog modal-dialog-centered" role="document">
    <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">  Detail </h5>
        <button type="button" class="close" onclick="document.getElementById('Supplier').style.display='none'">&times;</button>
        
      </div>
      <div class="modal-body">

        <?php 

        echo "<div>$sname </div></br>";
        echo "<div>$semail</div></br>";
        echo "<div>$saddress</div></br>";
        echo "<div>$sphone</div></br>";

         ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="document.getElementById('Supplier').style.display='none'">Close</button>
      </div>
    </div>

  </div>

 <script>

var modal = document.getElementById('Supplier');

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>