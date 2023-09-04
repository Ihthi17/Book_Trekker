<?php 
session_start();
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
    <!-- sweet alert CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



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
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="detail.php" class="nav-item nav-link active">Shop Detail</a>

                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">

                            <a href="login.php" class="nav-item nav-link">Login</a>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <?php 
             if(isset($_POST['add_cart']))
             {
                 // Check if the book is already in the cart
                 if(isset($_SESSION['cart']) && array_key_exists($_POST['book_id'], $_SESSION['cart']))
                 {
                     // Display alert message
                     echo "<script>alert('This book is already in your cart.');
                      window.location.href = 'cart.php?';
                     </script>";
                     
                 }
                 else
                 {
                     // Add book to cart
                     $cart_item = array(
                        'book_id' => $_POST['book_id'],
                         'book_name' => $_POST['book_name'],
                         'book_price' => $_POST['book_price'],
                         'book_image' => $_POST['book_image'],
                         'qty' => $_POST['qty']
                     );
                     $total_amount = $_POST['qty'] * $_POST['book_price'];
                     $cart_item['total_amount'] = $total_amount;
             
                     $_SESSION['cart'][$_POST['book_id']] = $cart_item;
                     
                     // Display success message
                     echo "<script>alert('Book added to cart.');
                     window.location.href = 'cart.php?';
                     </script>";
                     //header("location:cart.php");
                 }
             }
             ?>

            <?php
             
            
                 if(isset($_GET['id']))
                 {
                    $sql="SELECT * FROM book WHERE b_id={$_GET["id"]}";
                    $result=$con->query($sql);
                    if($result->num_rows>0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) {
                     

                       ?>

            <?php echo '                  
                      
            <div class="col-lg-5 pb-5">
            <form action="'.($_SERVER['REQUEST_URI']).'" method="post">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    
                        
             <img class="w-100 h-100" src="./admin/'.$row['image'].'" alt="Image">
                        
                    
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">'.$row['b_name'].'</h3>
                <div class="d-flex mb-3">
                   
                   
                </div>
                <h3 class="font-weight-semi-bold mb-4">RS-'.$row['price'].'</h3>
                <p class="mb-4">'.$row['description'].'</h3></p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Author:</p>
                    <h6>'. $row['author'].'</h3></h6> 
                    
                 
                        <div class="custom-control custom-radio custom-control-inline">
                           
                        </div>
                        
                   
                </div>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Publisher:</p>
                    <h6>'.$row['publisher'].'</h6>
                        <div class="custom-control custom-radio custom-control-inline">
                            
                            
                        </div>
                        
                    
                </div>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Publish Date:</p>
                    <h6>'.$row['p_date'].'</h3></h6> 
                   
                        <div class="custom-control custom-radio custom-control-inline">
                           
                            
                        </div>
                        
                    
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                <input type="hidden" name="book_id" value="'.$row['b_id'].'">
                <input type="hidden" name="book_name" value="'.$row['b_name'].'">
                <input type="hidden" name="book_price" value="'.$row['price'].'">
                <input type="hidden" name="book_image" value="'.$row['image'].'">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" name="qty" value="1" required>
                        
                        
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary px-3" name="add_cart" id="add_cart"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                   
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
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
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Review </a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                       
                        <p> <h6>'.$row['description'].'</h3></h6> </p>
                        </form>
';
?>
            <?php
                        }
                        
                    }
                    
                    else{
                        echo "Sorry, the requested book could not be found.";

                    }
                }
                else
                {
                    echo "Sorry, the requested book could not be found.";
                }
                  
                 
                
            ?>

            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-pane-3">
            <div class="row">

                <!-- </div> -->
                <div class="col-md-6">
                    <h4 class="mb-4">Leave a review</h4>
                    <div class="d-flex my-3">
                        <p class="mb-0 mr-2">Your Rating * :</p>
                        <form id="review-form">
                            <div class="text-primary">
                                <i class="far fa-star star" data-star="1"></i>
                                <i class="far fa-star star" data-star="2"></i>
                                <i class="far fa-star star" data-star="3"></i>
                                <i class="far fa-star star" data-star="4"></i>
                                <i class="far fa-star star" data-star="5"></i>
                            </div>
                            <input type="hidden" name="rating" id="rating" value="" required>
                            <input type="hidden" name="bookId" value="<?php echo $_GET['id']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="message">Your Review *</label>
                        <textarea id="message" name="message" cols="30" rows="5" class="form-control"
                            required> </textarea>
                    </div>

                    <div class="form-group mb-0">
                        <input type="submit" name="rate" value="Leave Your Review" class="btn btn-primary px-3">
                    </div>

                    </form>

                </div>
                <div class="col-md-6">
                    <?php 
     $bookId = $_GET['id']; 

     $sql = "SELECT * FROM review 
             INNER JOIN user ON review.user_id = user.u_id 
             WHERE review.book_id = '$bookId'";
$result=mysqli_query($con,$sql);
if($result->num_rows>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $rating = $row['rating'];
        $stars = "";

        // Generate star icons based on rating value
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                $stars .= '<i class="fas fa-star text-primary"></i>';
            } else {
                $stars .= '<i class="far fa-star text-muted"></i>';
            }
        }
        ?>
                    <?php echo ' 
        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">'.$row['name'].'</h6>
        <div class="d-flex justify-content-center">
            <h6 class=" text-danger">'. $stars .'</h6><h6 class="text-muted ml-2"></h6>
        </div>
        <div class="d-flex justify-content-center">
            <h6 class=" text-dark">'.$row['message'].'</h6><h6 class="text-muted ml-2"></h6>
        </div>
';
?>

                    <?php
 } 
}
else{
   echo "Review not found";
}
?>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Shop Detail End -->





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
    //review
    $(document).ready(function() {
        $('.star').click(function() {
            var rating = $(this).data('star');
            $('#rating').val(rating);
            $('.star').removeClass('fas').addClass('far');
            $(this).prevAll('.star').addBack().removeClass('far').addClass('fas');
        });

        $('#review-form').submit(function(event) {
            event.preventDefault();

            // Check if the user is logged in
            var loggedIn = <?php echo isset($_SESSION['u_id']) ? 'true' : 'false'; ?>;
            if (!loggedIn) {
                alertify.error('Please Login After you can Review book..');
                return;
            }

        });
    });
    </script>
    <!-- <script>
    $(document).ready(function() {
        $('#add_cart').click(function() {
            var book_id = $(this).data('bookid');
            var book_name = $(this).data('bookname');
            var book_price = $(this).data('bookprice');
            var book_image = $(this).data('bookimage');
            var qty = $(this).data('qty');

            $.ajax({
                url: 'function.php',
                type: 'POST',
                data: {
                    book_id: book_id,
                    book_name: book_name,
                    book_price: book_price,
                    book_image: book_image,
                    qty: qty,
                    add_cart: true
                },
                success: function(status, data) {
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success("status");
                    location.reload("cart.php");




                }

            });

        });
    });
    </script> -->

</body>

</html>

<?php


?>