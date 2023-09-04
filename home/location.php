<?php
include 'config.php';
if (isset($_POST["submit_address"])) {
    $orderID = $_POST["order_id"];

    // Assuming you have a database connection, you can retrieve the address using the order ID
    $sql = "SELECT `address` FROM `order` WHERE order_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $orderID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $address = $row['address'];
        $address = str_replace(" ", "+", $address);
        ?>

<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>

<?php
} else {
        echo "Failed to retrieve the address from the database.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

<body>
    <br><br>
    <button class="btn btn-dark text-light" id="click">GoTo Home</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#click").click(function() {
            window.location.href = 'index.php';
        });
    });
    </script>



</body>

</html>