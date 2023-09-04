<?php include 'config.php';?>

<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
    <br><br>
    <?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id']; // Get the order_id from the query parameter

   $sql = "SELECT * FROM `order_list`
    LEFT JOIN `book` ON `book`.`b_id` = `order_list`.`book_id`
    LEFT JOIN `order` ON `order`.`order_id` = `order_list`.`order_id`
    WHERE `order_list`.`order_id` = '$order_id'";
 // Use the correct variable

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        ?>
    <table class="table table-dark">
        <tr>
            <th>Image</th>
            <th>Book</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
        <?php
$bookIds = array(); // Track book IDs to avoid duplicate rows

        while ($row = mysqli_fetch_assoc($result)) {
            $bookId = $row['book_id'];

            // Check if the book ID is already processed
            if (!in_array($bookId, $bookIds)) {
                ?>
        <tr>
            <td><img class="img-responsive" width="100" height="80" src="./<?php echo $row['image']; ?>"></td>
            <td><?php echo $row['b_name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td><?php echo $row['total_amount']; ?></td>
        </tr>
        <?php

                // Add the book ID to the tracked array
                $bookIds[] = $bookId;
            }
        }
        ?>
    </table>
    <?php
} else {
        echo "Result not found";
    }
}
?>


</div>
<?php include('includes/footer.php');?>