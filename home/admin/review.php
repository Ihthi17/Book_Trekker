<?php include 'config.php';?>

<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
    <br><br>
    <?php
$sql = "SELECT * FROM `review` left join user on user.u_id=review.user_id left join book on book.b_id=review.book_id";

$result = $con->query($sql);
if ($result->num_rows > 0) {
    ?>
    <table class="table table-dark">
        <tr>
            <th>User Name</th>
            <th>Book_Name</th>
            <th>Rating</th>
            <th>Message</th>
        </tr>

        <?php
while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['b_name']; ?></td>
            <td><?php echo $row['rating']; ?></td>
            <td><?php echo $row['message']; ?></td>
        </tr>
        <?php
}
    ?>
        <?php
} else {
    echo "Result not found";
}

?>
    </table>

</div>
<?php include('includes/footer.php');?>