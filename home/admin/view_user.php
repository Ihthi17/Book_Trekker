<?php include 'config.php';?>

<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">

    <br><br>

    <?php
$sql="SELECT * FROM `user` where type='user'";


$result=$con->query($sql);
if($result->num_rows>0)
{
    ?>
    <table class="table table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Con_Password</th>
        </tr>

        <?php
while($row=mysqli_fetch_assoc($result))
{
    ?>
        <tr>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['pass']; ?></td>
            <td><?php echo $row['c_pass']; ?></td>
        </tr>
        <?php
    }
?>
        <?php
}
else{
echo "Result not found";
}


?>
    </table>
</div>
<?php include('includes/footer.php');?>