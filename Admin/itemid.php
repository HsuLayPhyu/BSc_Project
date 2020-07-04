
     <?php 
     include "db.php";
     $name=" ";
     $image=" ";
     $price=" ";
     $life=" ";
     $desc=" ";

     if (isset($_GET["iid"]))
     {
      
      $iid=$_GET["iid"];

      $q="SELECT * FROM item WHERE ItemId=$iid";
      $ans=mysqli_query($cn,$q);
      $row=mysqli_fetch_assoc($ans);

        // $iid=$row["ItemId"];
        $name=$row["ItemName"];
        $image=$row["ItemImage"];
        $price=$row["ItemPrice"];
        $life=$row["ItemLifeTime"];
        $desc=$row["ItemDescription"];

      }
        ?>

<div class="modal-dialog modal-dialog-centered" role="document">
    <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">  Detail </h5>
        <button type="button" class="close" onclick="document.getElementById('Item').style.display='none'">&times;</button>
        
      </div>
      <div class="modal-body">

       <?php
       
        echo "<div>$name</div></br>";
        echo "<div>$image</div></br>";
        echo "<div>$price</div></br>";
        echo "<div>$life</div></br>";
        echo "<div>$desc</div></br>";
    
     ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="document.getElementById('Item').style.display='none'">Close</button>
      </div>
    </div>

  </div>

 <script>

var modal = document.getElementById('Item');

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>