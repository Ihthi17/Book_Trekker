<?
include 'config.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- sweet alert CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/dist/js/alertify.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/dist/css/alertify.css" />
</head>

<body>

    <!--boostrap form start-->
    <section class="vh-100" style="background-color: #6f42c1;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <!--cancel button-->
                                    <div class="cancel"> <i id="click" class="fa-solid fa-xmark"></i></div>
                                    <!--cancel button-->
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" id="register-form" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c"> Name</label>
                                                <input type="text" id="name" name="name" class="form-control" required
                                                    autocomplete="off" />
                                                <input type="hidden" id="type" name="type" value="user">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c"> Email</label>
                                                <input type="email" id="mail" name="email" class="form-control" required
                                                    autocomplete="off" />

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <input type="password" id="password" name="password"
                                                    class="form-control" required autocomplete="off" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Confirm_Password</label>
                                                <input type="password" id="confirm_passowrd" name="confirm_password"
                                                    class="form-control" required autocomplete="off" />

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button style="background-color:  #dc3545;" type="submit"
                                                class="btn btn-dark btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="img/national-library-workers-day-cartoon-vector-1nt91.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--boostrap form end-->

    <!--js validation-->

    <script src="js/validation.js"></script>

    <script>
    $(document).ready(function() {

        $.validator.addMethod("letters", function(value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
        });

        $(function() {
            // Setup form validation on the #register-form element
            $('#register-form').validate({ //#register-form is form id
                // Specify the validation rules
                rules: {
                    name: {
                        required: true,
                        letters: true,
                    },
                    password: {
                        required: true,
                        minlength: 5,

                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },

                    email: {
                        required: true,
                        email: true,
                        minlength: 10
                    },


                },
                // Specify the validation error messages
                messages: {
                    name: {
                        required: "Enter Valid Name",
                        letters: "please enter letters only",
                    },
                    password: {
                        required: "Enter Passowrd",
                        minlength: "Minimum character 5",
                    },
                    confirm_password: {
                        required: "Enter Passowrd",
                        equalTo: "Password not match",
                    },
                    email: "Enter Valid Email ID",

                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: 'function.php',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response === 'duplicate') {
                                alertify.set('notifier', 'position',
                                    'top-center');
                                alertify.error(
                                    'Email already exists. Please choose a different email.'
                                );
                            } else if (response === 'success') {
                                alertify.set('notifier', 'position',
                                    'top-center');
                                alertify.success('Register Successful');
                                $("#register-form")[0].reset();
                                window.location.href = 'login.php';
                            } else {
                                alertify.set('notifier', 'position',
                                    'top-center');
                                alertify.error(
                                    'Error occurred during registration');
                            }
                        }
                    });
                }
            });

        });
    })
    </script>
</body>

</html>