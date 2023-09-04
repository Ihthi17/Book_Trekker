<?php
include 'config.php';
session_start();
if(!isset($_SESSION["type"]))
{
   header("location:../index.php") ;
}


?>
<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
  <?php include('dashboard.php');?>
  
</div>
<?php include('includes/footer.php');?>