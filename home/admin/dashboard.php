   <?php
include 'config.php';
   ?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>

       </style>
   </head>

   <body>

   </body>

   </html>
   <div class="content-header">
       <div class="container-fluid">
           <div class="row mb-2">
               <div class="col-sm-6">
                   <h1 class="m-0">Dashboard</h1>
               </div><!-- /.col -->
               <div class="col-sm-6">
                   <ol class="breadcrumb float-sm-right">

                   </ol>
               </div><!-- /.col -->
           </div><!-- /.row -->
       </div><!-- /.container-fluid -->
   </div>
   <!-- Content Header (Page header) -->
   <br>
   <!--Main contents Start-->
   <!-- Main content -->
   <section class="content">
       <div class="container-fluid">
           <!-- Small boxes (Stat box) -->
           <div class="row">
               <div class="col-lg-4 col-6">
                   <!-- small box -->
                   <div class="small-box bg-info">
                       <div class="inner">
                           <h3><?php 
                          $currentDate = date('Y-m-d');
$sql = "SELECT COUNT(*) as count FROM `order` WHERE DATE(`date`) = '$currentDate'";

if ($result = mysqli_query($con, $sql)) {
    $row = mysqli_fetch_assoc($result);
    $rowcount = $row['count'];

    // Display result
    echo $rowcount;
}
?></h3>

                           <p>New Orders</p>
                       </div>
                       <div class="icon">
                           <i class="fa-sharp fa-solid fa-cart-shopping fa-3x "></i>

                       </div>
                   </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                   <!-- small box -->
                   <div class="small-box bg-success">
                       <div class="inner">
                           <h3><?php $sql = "SELECT * FROM `user` where type='user'";


if ($result = mysqli_query($con, $sql)) {

    $rowcount = mysqli_num_rows($result);

    // Display result
    printf($rowcount);
}
?>
                           </h3>

                           <p>Total Users</p>
                       </div>
                       <div class="icon">
                           <i class="fa-solid fa-users fa-3x "></i>
                       </div>
                   </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                   <!-- small box -->
                   <div class="small-box bg-warning">
                       <div class="inner">
                           <h3><?php $sql = "SELECT * from `book` ";

if ($result = mysqli_query($con, $sql)) {

    $rowcount = mysqli_num_rows($result);

    // Display result
    printf($rowcount);
}
?>
                           </h3>

                           <p>Total Books</p>
                       </div>
                       <div class="icon">
                           <i class="fa-solid fa-book fa-3x "></i>
                       </div>
                   </div>
               </div>
               <!-- ./col -->


               <div class="col-lg-4 col-6">
                   <!-- small box -->
                   <div class="small-box bg-orange">
                       <div class="inner">
                           <h3><?php $sql = "SELECT * from `review` ";

if ($result = mysqli_query($con, $sql)) {

    $rowcount = mysqli_num_rows($result);

    // Display result
    printf($rowcount);
}
?>
                           </h3>

                           <p>Total Reviews</p>
                       </div>
                       <div class="icon">
                           <i class="fa-regular fa-pen-to-square fa-3x "></i>
                       </div>
                   </div>
               </div>
               <!-- ./col -->
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                   <!-- small box -->
                   <div class="small-box bg-purple">
                       <div class="inner">
                           <h3><?php $sql = "SELECT * from `categories` ";

if ($result = mysqli_query($con, $sql)) {

    $rowcount = mysqli_num_rows($result);

    // Display result
    printf($rowcount);
}
?>
                           </h3>

                           <p>Total Categories</p>
                       </div>
                       <div class="icon">
                           <i class="fa-solid fa-arrow-down-a-z fa-3x "></i>
                       </div>
                   </div>
               </div>
               <!-- ./col -->
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                   <!-- small box -->
                   <div class="small-box bg-dark">
                       <div class="inner">
                           <h3>
                               <?php
                               $sql = "SELECT * FROM `order` LEFT JOIN `user` ON `user`.`u_id` = `order`.`user_id`";
                               if ($result = mysqli_query($con, $sql)) {
                               $totalSum = 0;
                               while ($row = mysqli_fetch_assoc($result)) {
                               $totalSum += $row['total'];
                               }
                               printf($totalSum);
                               }
                                  ?>



                           </h3>

                           <p>Total Sasle</p>
                       </div>
                       <div class="icon">
                           <i class="fa fa-chart-pie fa-3x "></i>
                       </div>
                   </div>
               </div>
               <!-- ./col -->
           </div>
           <!-- /.row -->
           <!-- Main row -->
           <div class="container-fluid pt-4 px-4">
               <div class="row g-4">
                   <div class="col-sm-12 col-md-12 col-xl-5">
                       <div class="h-100 rounded p-4 bg-dark">
                           <div class="d-flex align-items-center justify-content-between mb-2">
                               <h3 class="mb-0 text-info">Messages</h3>

                           </div>



                           <div class="d-flex align-items-center pt-3">

                               <div class="w-100 ms-12">
                                   <div class="d-flex w-200 justify-content-between">
                                       <?php 
                                      $sql="SELECT * FROM `contact`";
                                      $result=mysqli_query($con,$sql);
                                      if(mysqli_num_rows($result)>0)
                                      {
                                        while($row = mysqli_fetch_assoc($result)){
                                               
                                      ?>

                                       <div class="row">
                                           <div class="col-md-4">

                                               <h6 class="mb-0"><?php echo $row['name']; ?></h6>
                                           </div>
                                           <div class="col-md-4">
                                               <small><?php echo $row['time'];?></small>
                                           </div>
                                           <div class="col-md-4">
                                               <p>
                                                   <?php echo $row['message']; ?>
                                               </p>
                                           </div>
                                       </div>
                                   </div>






                                   <?php
    }
}
?>

                               </div>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>
       <!-- Widgets End -->



       </div>
       <!-- Content End -->


       <!-- Back to Top -->
       </div>