<?php
session_start();
include 'config.php';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['type'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $type = $_POST['type'];

    // Check if the email already exists in the database
    $checkQuery = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = $con->query($checkQuery);

    if ($result->num_rows > 0) {
        echo 'duplicate';
    } else {
        // Insert the data into the database
        $sql = "INSERT INTO `user`(`name`,`email`,`pass`,`c_pass`,`type`) VALUES ('$name','$email','$password','$confirm_password','$type')";
        if ($con->query($sql) === true) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}










//search data
// if(isset($_POST['search']))
// {
//   $search = $_POST['search'];

//   $sql = "SELECT * FROM `book` WHERE `b_name` LIKE '%$search%'";
//   $result = mysqli_query($con, $sql);
  
//   if (mysqli_num_rows($result) > 0) {
//       $response = "";
  
//       while ($row = mysqli_fetch_assoc($result)) {
//           $response .= '
//           <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
//               <div class="card product-item border-0 mb-4">
//                   <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
//                       <img class="img-fluid w-100" src="./admin/' . $row['image'] . '" alt="">
//                   </div>
//                   <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
//                       <h6 class="text-truncate mb-3">' . $row['b_name'] . '</h6>
//                       <div class="d-flex justify-content-center">
//                           <h6 class=" text-danger">' . $row['price'] . '</h6><h6 class="text-muted ml-2"></h6>
//                       </div>
//                   </div>
//                   <div class="card-footer d-flex justify-content-between bg-light border">
//                       <a href="detail.php?id=' . $row['b_id'] . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
//                       <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
//                   </div>
//               </div>
//           </div>';
//       }
  
//       echo $response;
//   } else {
//       echo "Data not found";
//   }
  
//   mysqli_close($con);
// }

//contact form data insert
if(isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['subject'])&& isset($_POST['message']))
{
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];
   $current_time = date('Y-m-d H:i:s');

    $sql="INSERT INTO `contact`(`name`, `email`, `subject`, `message`,`time`) VALUES ('$name','$email','$subject','$message','$current_time')";
    if($con->query($sql)==true)
    {
      echo 'Your Message Added Successfully';
    }
    else {
        echo "<script type='text/javascript'>alert('error');</script>";
        echo  "Error: " . $sql . "<br>" . mysqli_error($con);
      }
}


 ?>