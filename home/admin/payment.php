<?php include 'config.php';?>

<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
    <br><br>
    <?php
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE `order` SET status = $status WHERE id = $id";

    // Execute the SQL query to update the status in the database

    // Assuming you have a database connection object called $con
    if ($con->query($sql) === true) {
        // Status updated successfully
    } else {
        // Error updating status
    }
}
?>

    <?php
$sql = "SELECT * FROM `order` LEFT JOIN user ON user.u_id = order.user_id";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    ?>
    <table class="table table-dark">
        <tr>
            <th>Order ID</th>
            <th>User </th>
            <th>Total</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
                <?php
if ($row['status'] == 0) {
            echo '<button><a href="payment.php?id=' . $row['id'] . '&status=1" class="btn btn-warning">Pending</a></button>';
        } elseif ($row['status'] == 1) {
            echo '<button><a href="payment.php?id=' . $row['id'] . '&status=2" class="btn btn-primary">Packed</a></button>';
        } elseif ($row['status'] == 2) {
            echo '<button><a href="payment.php?id=' . $row['id'] . '&status=0" class="btn btn-success">Delivered</a></button>';
        }
        ?>
            </td>
            <td>
                <button class="btn btn-dark ">
                    <a href="view_order.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-success">
                        <i class="fa-solid fa-paperclip rounded-circle"></i>
                    </a>
                </button>
            </td>
        </tr>
        <?php
}
    ?>
    </table>
    <?php
} else {
    echo "Result not found";
}
?>
    </table>

</div>
<?php include('includes/footer.php');?>