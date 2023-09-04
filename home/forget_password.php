<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendMail($email,$reset_token)
{
    
    $mail = new PHPMailer(true);

    try {
        //$mail->SMTPDebug = 4; \
        //$mail->SMTPDebug = 4;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mohamedihthisham17@gmail.com';                     //SMTP username
        $mail->Password   = 'ptfgwpjzhlslglrm';                               //SMTP password
        $mail->SMTPSecure = 'tls';                           //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('mohamedihthisham17@gmail.com', 'Book Trekker');
        $mail->addAddress($email);     //Add a recipient
       
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password rest link from online Book Trekker';
        $mail->Body    = "We got a request link from you to create password<br>
        click the link below:<br>
        <a href='http://localhost/Book_Trekker/home/upadte.php?email=$email &reset_token=$reset_token'>
        Reset password </a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
<?php
 include 'config.php';
if(isset($_POST['submit']))
{
  $resetmail=$_POST['email'];
    $sql="SELECT * FROM `user` WHERE `email`='$resetmail'";
    //echo"$sql";
    $result =mysqli_query($con,$sql);
    
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            /**Email found*/
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/colombo');
            $date =date('Y-m-d');
      
            $update = "UPDATE `user` SET `reset_token`='$reset_token',`reset_tokenexpaire`='$date' WHERE `email` ='$resetmail'";
            if(mysqli_query($con,$update) && sendMail($resetmail,$reset_token))
            {
                echo "<script>alert('Password rest link send to mail');
                
                </script>" ;
              
            }
            else{
                echo "<script>alert('server down please try again letter ');
            window.location.href='login.php';
            </script>";
          
            }
            
        }
        else{
            echo "<script>alert('Email Not found');
            window.location.href='forget_password.php';
            </script>"; 
        }
      }
    else
    {
        echo '<script>alert("can not run query");
        window.location.href="forget_password.php";
        </script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/validation.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                                    <div class="cancel"> <i id="click" class="fa-solid fa-xmark"></i></div>
                                    <!--cancel button-->
                                    <p class="text-center h1  mb-5 mx-1 mx-md-4 mt-4">Lost your password? Please enter
                                        your email address. You will receive a link to create a new password via email.
                                    </p>

                                    <form class="mx-1 mx-md-4" name="register" method="POST">



                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c"> Email</label>
                                                <input type="email" id="form3Example3c" class="form-control"
                                                    name="email" autocomplete="off" />

                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button style="background-color:  #dc3545;" type="submit" name="submit"
                                                class="btn btn-dark btn-lg">Reset Password</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="img/national-library-workers-day-cartoon-vector-1nt91.webp"
                                        class="img-fluid" alt="Sample image" height="300px">

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


</body>

</html>