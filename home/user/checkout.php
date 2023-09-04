<?php
session_start();
if (!isset($_SESSION["u_id"])) {
    header("location:/Book_Trekker/home/login.php");
}
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Book Trekker</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <style>
    #status {
        display: none;
    }
    </style>

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">

            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>


                </div>


            </div>

        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">BOOK</span>Trekker</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">

            </div>
            <div class="col-lg-3 col-6 text-right">
                <!-- <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a> -->
                <?php
if (isset($_SESSION['cart'])) {
    // Get the number of items in the cart
    $cart_count = count($_SESSION['cart']);
} else {
    // If the cart doesn't exist, set the count to 0
    $cart_count = 0;
}
?>
                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?php echo $cart_count; ?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">

            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">BOOk</span>Trekker</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="detail.php" class="nav-item nav-link">Shop Detail</a>

                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="index.php" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 "><?php echo ($_SESSION["name"]); ?></span>

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="view_order.php">
                                        <i class="fa-thin fa-shop"></i>
                                        Orders
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/Book_Trekker/home/logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- product cart start-->
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>

                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        <?php
if (isset($_SESSION['cart'])) {
    $total_price = 0;
    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if (isset($cart_item['book_image']) && isset($cart_item['book_name']) && isset($cart_item['book_price']) && isset($cart_item['qty']) && isset($cart_item['book_id']) && isset($cart_item['total_amount'])) {
            $total_price += (float) $cart_item['total_amount'];
            $book_id = $cart_item['book_id'];
            ?>
                        <tr>
                            <td class="align-middle"><img src="../admin/<?php echo $cart_item['book_image']; ?>" alt=""
                                    style="width: 50px;"></td>
                            <td class="align-middle" id="book_name"><?php echo $cart_item['book_name']; ?></td>
                            <td class="align-middle"><?php echo $cart_item['book_price']; ?></td>
                            <td class="align-middle qty"><?php echo $cart_item['qty']; ?></td>
                            <td class="align-middle t_price"><?php echo $cart_item['total_amount']; ?></td>
                            <td class="align-middle book_id"><?php  $cart_item['book_id']; ?></td>


                        </tr>
                        <?php
}
    }
    if ($total_price > 0) {
        // Display the total price here
        ?>

                        <?php
} else {
        echo '<tr><td colspan="6">Your cart is empty.</td></tr>';
    }
} else {
    echo '<tr><td colspan="6">Your cart is empty.</td></tr>';
}
?>



                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><?php echo $total_price; ?>.00</h6>
                        </div>

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold" id="total"><?php echo $total_price; ?>.00</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    <!--payment method-->
    <div class="form-box">
        <form id="checkoutForm">

            <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control" id="phone" type="tel" name="phone">
                <small class="text-danger" id="phoneError"></small>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address"></textarea>
                <small class="text-danger" id="addressError"></small>
            </div>
            <div class="form-group">
                <label for="address">Select Date</label>
                <input type="date" class="form-control" id="date" name="date">
                <small class="text-danger" id="dateError"></small>
            </div>
            <select id="status">
                <option value=0>pending</option>
                <option value=1>Packed</option>
                <option value=2>Delivered</option>
            </select>

            <button type=" submit" class="btn btn-primary">PayHere Pay</button>

        </form>
    </div>

    <!--payment method-->





    <!-- product cart end-->
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border border-white px-3 mr-1">BOOK</span>Trekker</h1>
                </a>
                <p>An online book store is a web application that allows customers to buy books online. Customers can
                    search for a book by title or author using a web browser, add it to their shopping cart, and then
                    purchase it using a debit or credit card transaction.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>20 Main Street, Collombo11 ,
                    SRILANKA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>mohamedihthisham17@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+94 75 566 5748</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">

                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-dark mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Shopping
                                Cart</a>
                            <a class="text-dark" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; . All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" target="_blank"
                        href="https://ihthi17.github.io/Mohamed-Ihthisham/#">Mohamed Ihthisham</a><br>

                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <!--payhere script link-->
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script>
    $(document).ready(function() {
        var cart_items = [];
        $("#checkoutForm").submit(function(e) {
            e.preventDefault();

            var phone = $("#phone").val();
            var address = $("#address").val();
            var date = $("#date").val();
            var status = $("#status").val();
            var book_name = $("#book_name").text();
            var total = $("#total").text();
            var book_id = $(".book_id").text();
            var qty = $(".qty").text();
            var t_price = $(".t_price").text();

            // console.log(book_id,qty,t_price);

            // Validate form fields
            if (phone.trim() === '') {
                $('#phoneError').text('Please enter a phone number.');
                return false;
            } else {
                $('#phoneError').empty();
            }

            if (address.trim() === '') {
                $('#addressError').text('Please enter an address.');
                return false;
            } else {
                $('#addressError').empty();
            }
            if (date.trim() === '') {
                $('#dateError').text('Please fill the date.');
                return false;
            } else {
                $('#dateError').empty();
            }

            var paymentData = {
                phone: phone,
                address: address,
                date: date,
                status: status,
                total: total,
                cart_items: cart_items
            };

            // Send payment data to the PHP script for processing
            $.ajax({
                url: 'payment.php',
                type: 'POST',
                data: paymentData,
                success: function(response) {
                    // Handle the response from the server
                    var obj = JSON.parse(response);
                    // console.log(obj.user_name);

                    // TODO Payment completed. It can be a successful failure.
                    payhere.onCompleted = function onCompleted(orderId) {
                        console.log("Payment completed. OrderID: " + orderId);
                        // Note: validate the payment and show success or failure page to the customer
                        paymentdone(orderId, total, address, phone, date, status,
                            book_id,
                            qty, t_price);
                    };

                    // !Payment window closed
                    payhere.onDismissed = function onDismissed() {
                        // Note: Prompt user to pay again or show an error page
                        alertify.set("notifier", "position", "top-right");
                        alertify.error("Payment dismissed");
                        $("#checkoutForm")[0].reset();
                    };

                    // Error occurred
                    payhere.onError = function onError(error) {
                        // Note: show an error page
                        console.log("Error:" + error);
                    };

                    // Redirect to the payment gateway using the necessary parameters and API calls
                    var payment = {
                        sandbox: true,
                        merchant_id: 1223327, // Replace with your Merchant ID
                        return_url: undefined, // Important
                        cancel_url: undefined, // Important
                        notify_url: "http://sample.com/notify",
                        order_id: obj.order_id,
                        items: "",
                        amount: obj.total,
                        currency: "LKR",
                        hash: obj
                            .hash, // *Replace with generated hash retrieved from backend
                        first_name: obj.user_name,
                        last_name: obj.user_name,
                        email: obj.user_email,
                        phone: obj.user_Mobile,
                        address: obj.address,
                        city: "Colombo",
                        country: "Sri Lanka",
                        delivery_address: obj.address,
                        delivery_city: obj.address,
                        delivery_country: "Sri Lanka",
                    };

                    // Show the PayHere payment popup
                    payhere.startPayment(payment);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        function paymentdone(orderId, total, address, phone, date, status, book_id, qty, t_price) {
            // ! append data into form
            var form = new FormData();
            form.append("orderId", orderId);
            form.append("total", total);
            form.append("address", address);
            form.append("date", date);
            form.append("status", status);
            form.append("phone", phone);
            form.append("book_id", book_id);
            form.append("qty", qty);
            form.append("t_price", t_price);

            console.log(form);

            // console.log(orderid)




            $.ajax({
                type: "POST",
                url: "process_checkout.php",
                data: form,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(response);

                    window.location.href = 'view_order.php';
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log(xhr.responseText);

                }
            });
            unset($_SESSION['cart']);

        }




    });
    </script>

</body>
</htmal>