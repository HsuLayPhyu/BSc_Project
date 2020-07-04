<?php session_start();?>
<!-- <!DOCTYPE html>
<html>
<head>
    <title></title> --> 
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.js"></script>
     <script src="js/popper.min.js"></script>
    <script type="text/javascript"></script>
<!-- </head>
<body>
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">+ 95 9962404764</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text">shangoods@email.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">3-5 Business days delivery </span>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.html">SHANGOODS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="Shop.html" class="nav-link">Shop</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">Contact/About</a></li>
            <li class="nav-item"><a href="register.html" class="nav-link">Register</a></li>
    
              <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

            </ul>
          </div>
        </div>
      </nav> -->
      <style type="text/css">
          .header{
            height:50px;
            background: #F2F2F2;
          }
          .cart{
            float:right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
            columns: green;
          }
      </style>

<?php 
    include 'db.php';
 ?>
 <div class="header">
     <div class="cart">
      <a href="bill.php">
         CART
         <img src="">
         <?php 
         $total=0;
            if(isset($_GET["item_id"]))
            {
                $id=$_GET["item_id"];
            
            if (isset($_SESSION["item"]["$id"]))
            {
                $c=$_SESSION["item"]["$id"];
                $c++;
                $_SESSION["item"]["$id"]=$c;

            }
            else
            {
                $_SESSION["item"]["$id"]=1;
            }

            }

            if(isset($_SESSION["item"]))
            {
                foreach ($_SESSION["item"] as $id => $count) 
                {
                    $total+=$count;
                }
            }

            echo $total;
         ?>
         </a>
     </div>
 </div>
 <div class="col-md-2">
    <h3>Item Type</h3>
    <?php 
        $q= "SELECT * FROM itemtype";
        $ans=mysqli_query($cn,$q);
        while ($row=mysqli_fetch_assoc($ans)) 
        {
            $name=$row["ItemTypeName"];
            $id=$row["ItemTypeId"];

            echo "<div><a href='?ItemTypeId=$id' class='btn btn-primary container-fluid mb-1'>$name</a></div>";

        }
    ?>
 </div>
 <div class="col-md-9">
     <h3>Items</h3>
     <?php 

     $q;
     $id;
     if (isset($_GET["ItemTypeId"]))
     {
        $id=$_GET["ItemTypeId"];
        $q="SELECT * FROM item WHERE ItemTypeId=$id";

     }
     else
     {
        $q="SELECT * FROM item";
     }
            

            $ans=mysqli_query($cn,$q);
            while($row=mysqli_fetch_assoc($ans))
            {  
                $name=$row["ItemName"];
                $price=$row["ItemPrice"];
                $life=$row["ItemLifeTime"];
                $desc=$row["ItemDescription"];
                $image="../Admin/upload/".$row["ItemImage"];
        ?>
            <div class="col-md-3  bg-light p-3">
            <div style="height: 180px; width: 250px;">
                <img src="<?php echo $image;?>" alt="image not found" class="container-fluid">
            </div>
            <div style="height: 250px;">
            <div class="mb-3 item">
                Item Name : <?php echo $name; ?>
            </div>
            <div class="mb-3 item">
                Price: <?php echo $price; ?>
            </div>
            <div class="mb-3 item">
                Life Time : <?php echo $life; ?>
            </div>
            <div class="mb-3 item">
                Description : <?php echo $desc; ?>
            </div>
            </div>
            <div>
                <a href="?ItemTypeId=<?php echo $id; ?>&item_id=<?php echo $row['ItemId']; ?>" class="btn btn-primary">Order</a>
            </div>

        </div>

        <?php
            }
         ?>
 </div>


 </body>
</html>