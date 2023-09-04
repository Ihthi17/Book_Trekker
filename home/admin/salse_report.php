<?php include 'config.php';?>

<?php include 'includes/header.php';?>
<?php include 'includes/side_bar.php';?>
<div class="content-wrapper">
    <br><br>
    <form method="GET">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date">From Date:</label>
                    <input type="date" class="form-control" name="start_date" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date">To Date:</label>
                    <input type="date" class="form-control" name="end_date" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <br><br>
    <?php
if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = date('Y-m-d', strtotime($_GET['start_date']));
    $end_date = date('Y-m-d', strtotime($_GET['end_date']));

    $start_datetime = $start_date . ' 00:00:00';
    $end_datetime = $end_date . ' 23:59:59';

    $sql = "SELECT * FROM `order` LEFT JOIN `user` ON `user`.`u_id` = `order`.`user_id` WHERE `date` BETWEEN '$start_datetime' AND '$end_datetime'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $total_sales = 0; // Initialize total sales amount

        ?>
    <table class="table table-dark">
        <tr>
            <th>Order ID</th>
            <th>User Name</th>
            <th>Total</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Date</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $total_sales += $row['total']; // Accumulate the total sales amount

                ?>
        <tr>
            <td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><button class="btn btn-dark ">
                    <a href="view_order.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-success">
                        <i class="fa-solid fa-paperclip rounded-circle"></i>
                    </a>
                </button></td>
        </tr>
        <?php
            }
            ?>

        <tr>
            <td colspan="2">Total Sales Amount:</td>
            <td>
                <?php echo $total_sales; ?></td>
        </tr>


    </table>
    <?php
    } else {
        echo "No orders found for the specified date range.";
    }
}
?>
</div>
<?php include 'includes/footer.php';?>