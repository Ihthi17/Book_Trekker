 <?php
 session_start();
 include 'config.php';

 if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

$sql="SELECT * FROM user WHERE `email`='$email' and `pass`='$password' " ;
//print_r($sql);die;

    $result = mysqli_query($con,$sql);
   if(mysqli_num_rows($result)==0)
   {
    $_SESSION["error"]='Your User/Mail Or Password is wrong';
    //echo '<script language="javascript">alert(" Your username/Mail or Password is Wrong");</script> ';
   
    
       
   }
   else{
    while($row = $result->fetch_assoc()) {
         //print_r( $row);
       
//print_r($type);
       
$type = $row['type'];
$email=$row['email'];
$_SESSION["name"] =$row["name"];   
$_SESSION["email"] =$row["email"];   

$_SESSION["u_id"]=$row['u_id'];
   
 
 

 
        if($type =='admin'){
  
          $_SESSION["type"] =$type;

    
        header("location:admin/index.php");
           
        } else if($type =='user'){

         
          header("location:user/index.php") ;
    }  
  }
   
   }
}
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
       <script src="js/validation.js"></script>
       <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
       <!--sweet alert-->
       <link rel="shortcut icon" href="images/favicon.png" type="">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
      </head>
<body>
 
       <!--boostrap form start-->
       <section class="vh-100" style="background-color:  #6f42c1;">
      
        <div class="container h-100">
          
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
             
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                   
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
       <!--cancel button-->
       <div class="cancel"> <i id="click"class="fa-solid fa-xmark"></i></div>
 <!--cancel button-->
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign In</p>
      
                      <form action="login.php" method="post" class="mx-1 mx-md-4" name="register">
      
                        
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c"> Email</label>
                            <input type="email" id="form3Example3c" class="form-control" name="email" autocomplete="off" />
                           
                          </div>
                        </div>
                        
                          
      
                        <div class="d-flex flex-row align-items-center mb-4">
                        
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c">Password</label>
                            <input type="password" id="password" class="form-control" name="password" autocomplete="off" />
                            <i id="eye" class="fa-solid fa-eye-slash" style="color:black ; margin-left:-32px;cursor:pointer; float: right;
    top: -25px;
    right: 10px;
    position: relative;"></i>
                          </div>
                        </div>
      
                        <div class="col">
                            <!-- Simple link -->
                            <a href="forget_password.php">Forgot password?</a>
                          </div>
      
                       
      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button style="background-color:   #dc3545;" type="submit" class="btn btn-dark btn-lg " name="login">Log In</button>
                        </div>
      <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="register.php">Register</a></p>
    
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
       <!--boostrap form end-->
        <!--js validation-->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
       
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/sweet_alert.js"></script>
      <script>
        <?php 
if(isset($_SESSION['error'])&& $_SESSION['error']!='')
{
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