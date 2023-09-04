<?php
session_start();
include 'config.php';
if (isset($_POST['submit'])) {
   
    $psw_o = $_POST["current_password"];
    $psw_n = $_POST["new_password"];
    $session_id = $_SESSION["u_id"];
    $sql = mysqli_query($con, "SELECT `pass` FROM user where `pass`='$psw_o' && u_id='$session_id'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $con = mysqli_query($con, "update user set pass='$psw_n' where u_id='$session_id'");

        $_SESSION['success'] = "Password Changed Successfully !!";
    } else {
        $_SESSION['error'] = "Old Password not match !!";
    }
}



?>



<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/home/admin/assets/dist/js/sweetalert.js"></script>
</head>

<body>

</body>

</html>
<div class="content-wrapper">
    <br><br>
    <b>
        <h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">
            Change Password</h1>
    </b>
    <br><br>
    <table class="table">
        <form id="change_password_form" method="post">
            <tr>
                <div class="col-sm-4 form-group">
                    <td> <label for="">Old Password</label></td>
                    <td><input type="password" name="current_password" class="form-control" id="o_pass" required>
                        <i id="dot" class="fa-solid fa-eye-slash" style="color:black ; margin-left:-32px;cursor:pointer; float: right;
    top: -25px;
    right: 10px;
    position: relative;"></i>
                    </td>
                </div>
            </tr>
            <div class="col-sm-4 form-group">
                <td> <label for="">New Password</label></td>
                <td><input type="password" name="new_password" class="form-control" id="n_pass" required>
                    <i id="dott" class="fa-solid fa-eye-slash" style="color:black ; margin-left:-32px;cursor:pointer; float: right;
    top: -25px;
    right: 10px;
    position: relative;"></i>
                </td>
            </div>
            </tr>
            <tr>
                <td><button class="btn btn-primary" type="submit" name="submit">Change</button>
        </form>
        <table>
</div>
<?php include('includes/footer.php');?>
<script>
$(document).ready(function() {
    $('#dot').click(function() {

        if ($(this).hasClass('fa-eye-slash')) {

            $(this).removeClass('fa-eye-slash');

            $(this).addClass('fa-eye');

            $('#o_pass').attr('type', 'text');

        } else {

            $(this).removeClass('fa-eye');
            console.log('hello');
            $(this).addClass('fa-eye-slash');

            $('#o_pass').attr('type', 'password');
        }
    });

});
//new password
$(document).ready(function() {
    $('#dott').click(function() {

        if ($(this).hasClass('fa-eye-slash')) {

            $(this).removeClass('fa-eye-slash');

            $(this).addClass('fa-eye');

            $('#n_pass').attr('type', 'text');

        } else {

            $(this).removeClass('fa-eye');
            console.log('hello');
            $(this).addClass('fa-eye-slash');

            $('#n_pass').attr('type', 'password');
        }
    });

});
</script>
<!--sweet alert-->

<?php 
if(isset($_SESSION['success'])&& $_SESSION['success']!='')
{
?>
<script>
swal({
    title: "<?php echo $_SESSION['success']; ?>",
    text: "your password changed successfully!",
    icon: "success",
    button: "done!",
});
</script>
<?php
unset($_SESSION['success']);
}
?>
<?php
if(isset($_SESSION['error'])&& $_SESSION['error']!='')
{
?>
<script>
swal({
    title: "<?php echo $_SESSION['error']; ?>",
    text: "your password  not changed !",
    icon: "error",
    button: "done!",
});
</script>
<?php
unset($_SESSION['error']);
}
 ?>