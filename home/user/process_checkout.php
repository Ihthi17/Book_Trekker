<?php
session_start();
include 'config.php';

if (isset($_POST['orderId'], $_POST['total'], $_POST['address'], $_POST['phone'], $_POST['date'], $_POST['status'], $_SESSION['u_id'])) {
    $order_id = $_POST['orderId'];
    $total = $_POST['total'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $user = $_SESSION['u_id'];
    $date = $_POST['date'];

//  echo  $order_id;


    $sql = "INSERT INTO `order` (`order_id`, `user_id`, `total`, `address`, `phone`,`status`,`date`)
     VALUES ('$order_id','$user','$total','$address','$phone','$status','$date')";

    if ($con->query($sql) === true) {
        echo 'Order data inserted successfully';
    } else {
        echo 'Error: ' . $con->error;
    }
}
?>
<?php
if (isset($_POST['orderId']) && isset($_SESSION['cart'])) {
    $order_id = $_POST['orderId'];
    $order_items = $_SESSION['cart'];

    $values = array();
    foreach ($order_items as $item) {
        $book_id = $item['book_id'];
        $qty = $item['qty'];
        $total_amount = $item['total_amount'];

        // Verify that the book with the specified book_id exists in the book table
        $verifyQuery = "SELECT * FROM `book` WHERE `b_id` = '$book_id'";
        $result = $con->query($verifyQuery);

        if ($result->num_rows > 0) {
            $values[] = "('$order_id', '$book_id', '$qty', '$total_amount')";
        } else {
            echo 'Error: Book with ID ' . $book_id . ' does not exist.';
        }
    }

    // If there are order items, insert them into the order_list table
    if (!empty($values)) {
        $values = implode(', ', $values);
        $sql = "INSERT INTO `order_list` (`order_id`, `book_id`, `qty`, `total_amount`)
                VALUES $values";

        if ($con->query($sql) === true) {
            echo 'Order data inserted successfully';
        } else {
            echo 'Error: ' . $con->error;
        }
    }
} else {
    echo 'Error: No order ID or cart items found.';
}