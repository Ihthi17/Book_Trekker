<?php
session_start();
include 'config.php';
if(isset($_POST['book_id'])&& isset($_POST['book_name'])&& isset($_POST['book_price'])&& isset($_POST['book_image'])&& isset($_POST['qty']))
{
  $book_id = $_POST['book_id'];
  $book_name = $_POST['book_name'];
  $book_price = $_POST['book_price'];
  $book_image = $_POST['book_image'];
  $qty = $_POST['qty'];
  
  // Check if the book is already in the cart
  if(isset($_SESSION['cart']) && array_key_exists($book_id, $_SESSION['cart'])) {
    echo "This book is already in your cart.";
  } else {
    // Add book to cart
    $cart_item = array(
      'book_id' => $book_id,
      'book_name' => $book_name,
      'book_price' => $book_price,
      'book_image' => $book_image,
      'qty' => $qty
    );
    $total_amount = $qty * $book_price;
    $cart_item['total_amount'] = $total_amount;
  
    $_SESSION['cart'][$book_id] = $cart_item;
    
    echo "Book added to cart.";
  }
}

//review book
if (isset($_SESSION['u_id'])&& isset($_POST['rating'])&& isset($_POST['message'])&& isset($_POST['bookId'])) {
  // Check if the user is logged in
 
      $user = $_SESSION['u_id'];
      $rating = $_POST['rating'];
      $message = $_POST['message'];
      $item = $_POST['bookId'];
      $current_time = date('Y-m-d H:i:s');

      $sql = "INSERT INTO `review`(`user_id`,`book_id`,`rating`,`message`,`time`) VALUES ('$user','$item','$rating','$message','$current_time')";
//print_r($sql);die;
      if ($con->query($sql) === TRUE) {
          echo 'Review Successfully';
         
      } else {
          echo "<script type='text/javascript'>alert('Error: " . mysqli_error($con) . "');</script>";
      }
  } else {
      // User is not logged in, handle accordingly
  }




 ?>