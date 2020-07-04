<?php 

session_start();

unset($_SESSION['aid']);
unset($_SESSION['amail']);
unset($_SESSION['page']);

header("location:index.php");

 ?>