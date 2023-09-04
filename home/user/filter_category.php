<?php
session_start();
if(!isset($_SESSION["u_id"]))
{
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
    <style>
    .small-input {
        width: 50px;
        /* Adjust the width as needed */
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
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
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
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0" id="selected-category">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">

                        </div>

                        <?php
                      $sql = "SELECT * FROM categories";
                      $result = $con->query($sql);
                      if ($result->num_rows > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                              $category_id = $row['c_id'];
                              $category_name = $row['categories'];
                              $category_url = 'filter_category.php?c_id=' . urlencode($category_id);
                              echo "<a href=\"$category_url\" class=\"nav-item nav-link fectval\" onclick=\"document.getElementById('selected-category').innerHTML='$category_name';\">$category_name</a>";
                            }
                      } else {
                          echo "No categories found";
                      }
    ?>

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">BOOK</span>Trekker</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link active">Shop</a>
                            <a href="detail.php" class="nav-item nav-link">Shop Detail</a>

                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="index.php" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 "><?php echo ($_SESSION["name"]) ;?></span>

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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">





            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="search.php" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for Books" name="q">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>

                    </div>

                    <?php
                 
                 $category_id = isset($_GET['c_id']) ? $_GET['c_id'] : ''; // Get the selected category ID from the URL parameter
                 $sql = "SELECT * FROM `categories` LEFT JOIN book ON book.category_id = categories.c_id";
                 if (!empty($category_id)) {
                     $sql .= " WHERE categories.c_id = '$category_id'";
                 }
                 $result = $con->query($sql);
                 if ($result->num_rows > 0) {
                     while ($row = mysqli_fetch_assoc($result)) {
    ?>


                    <a href="index.php?search=<?php echo $search; ?>"></a>

                    <?php echo ' 
                    
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1 "  >
                  
                        <div class="card product-item border-0 mb-4" >
                       
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="../admin/'.$row['image'].'" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">'.$row['b_name'].'</h6>
                                <div class="d-flex justify-content-center">
                                    <h6 class=" text-danger">'.$row['price'].'</h6><h6 class="text-muted ml-2"></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="detail.php?id='.$row['b_id'].'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <form action="cart.php" method="post">
                                <input type="hidden" name="book_id" value="'.$row['b_id'].'">
                                <input type="hidden" name="book_name" value="'.$row['b_name'].'">
                                <input type="hidden" name="book_price" value="'.$row['price'].'">
                                <input type="hidden" name="book_image" value="'.$row['image'].'">
                                <input type="number" name="qty" value="1" min="1" class="small-input" >
                                <button type="submit" name="add_cart" id="cart" class="btn btn-sm text-dark p-0">
                                    <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                   
  ';

  ?>

                    <?php
                    }
                } else {
                    echo "No books found";
                }
                    ?>






                    <div class="col-12 pb-1">

                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>

    <!-- Shop End -->


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

    <script>
    $(document).ready(function() {
        $('#search-form').keyup(function(e) {
            e.preventDefault();
            //alert("hi");
            $.ajax({
                type: "POST",
                url: "function.php",
                data: $(this).serialize(),
                success: function(response) {
                    $('#search-results').html(response);

                }
            });
        });
    });
    </script>





</body>

</html>