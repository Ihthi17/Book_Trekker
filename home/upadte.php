<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <link rel="stylesheet" href="css/login.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
     <script src="js/validation.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <!--sweet alert-->
     <link rel="shortcut icon" href="images/favicon.png" type="">
     <link rel="stylesheet" type="text/css"
         href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 </head>

 <body>

     <!--boostrap form start-->
     <?php
include 'config.php';

if(isset($_GET['email']) && isset($_GET['reset_token']))
{

  date_default_timezone_set('Asia/colombo');
  $date =date('Y-m-d');
  $sql="SELECT * FROM `user` WHERE`email`='$_GET[email]' AND `reset_token`='$_GET[reset_token]' 
  AND `reset_tokenexpaire`='$date'";
  $result= mysqli_query($con,$sql);
  if($result)
  {
    if(mysqli_num_rows($result)==1)
    {
        echo '
        <section class="vh-100" style="background-color:  #6f42c1;">

         <div class="container h-100">

             <div class="row d-flex justify-content-center align-items-center h-100">
                 <div class="col-lg-12 col-xl-11">

                     <div class="card text-black" style="border-radius: 25px;">
                         <div class="card-body p-md-5">

                             <div class="row justify-content-center">
                                 <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                     <!--cancel button-->
                                     <div class="cancel"> <i id="click" class="fa-solid fa-xmark"></i></div>
                                     <!--cancel button-->
                                     <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                                        Update Password
                                     </p>

                                     <form action="upadte.php" method="post" class="mx-1 mx-md-4" name="register">



                                         <div class="d-flex flex-row align-items-center mb-4">

                                             <div class="form-outline flex-fill mb-0">
                                                 <label class="form-label" for="form3Example3c"> Password</label>
                                                 <input type="password" id="form3Example3c" class="form-control"
                                                     name="pass" autocomplete="off" />

                                                     <input type="hidden" name = "email" value='.$_GET['email'].'>
                                             </div>
                                         </div>



                                         <div class="d-flex flex-row align-items-center mb-4">

                                             <div class="form-outline flex-fill mb-0">
                                                 <label class="form-label" for="form3Example4c">Confirm Password</label>
                                                 <input type="password" id="password" class="form-control"
                                                     name="con_pass" autocomplete="off" />


                                             </div>
                                         </div>





                                         <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                             <button style="background-color:   #dc3545;" type="submit"
                                                 class="btn btn-dark btn-lg " name="u_password">Update Password</button>
                                         </div>


                                     </form>

                                 </div>
                                 <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                     <img src="img/national-library-workers-day-cartoon-vector-1nt91.webp"
                                         class="img-fluid" alt="Sample image">

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
       ';
            
    }
  
  else{
    echo "<script>alert('invalid or Expaire date');
   
    </script>";
  }
}
}
?>
  
  <?php
if(isset($_POST['u_password']))
{
    $pass = $_POST['pass'];
    $c_password = $_POST['con_pass'];

    $update = "UPDATE `user` SET `pass`='$pass',`c_pass`='$c_password',`reset_token`=NULL,`reset_tokenexpaire`=NULL WHERE `email`='$_POST[email]'";
    if(mysqli_query($con,$update))
    {
        echo "<script>alert('password updated successfully');
       
        </script>";
    }
    else{
        echo "<script>alert('invalid or Expaire date');
      
        </script>";
    }
}


?>
     <!--boostrap form end-->
     <!--js validation-->
     <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="js/sweet_alert.js"></script>
     <script>
     <?php
if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
    ?>

     swal({
         title: "<?php echo $_SESSION['error']; ?>",
         text: "Wrong Data!",
         icon: "error",
         button: "done!",
     });

     <?php
unset($_SESSION['error']);
}
?>
     </script>
 </body>

 </html>