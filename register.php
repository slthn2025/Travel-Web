<?php
require 'Admin/AdminDashboard/function.php';




if (isset($_POST["submit"])) {
    if (register($_POST) > 0) {
        echo "
        <script>
        alert('berhasil registrasi ');
        document.location.href = 'login.php';
        </script>";
    } else {
        echo "
         <script>alert('gagal registrasi');
        document.location.href = 'login.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login Admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <style>
            #intro {
                background-image: url(img/Bus.jpg);
                height: 108vh;
            }

            /* Height for devices larger than 576px */
            @media (min-width: 992px) {
                #intro {
                    margin-top: -58.59px;
                }
            }

            .navbar .nav-link {
                color: #fff !important;
            }
        </style>
        <!-- Background image -->
        <div id="intro" class="bg-image shadow-2-strong">
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-md-8">
                            <form class="bg-white rounded shadow-5-strong p-5" method="post" action="">
                                <h1 style="margin-bottom: 50px;">Register My Travel Admin</h1>
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form1Example1" name="username">Username</label>
                                    <input type="text" name="Username" id="Username" class="form-control" required>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form1Example2" nama="email">email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form1Example2" nama="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                        <!-- Checkbox -->

                                    </div>

                                    <div class="col text-center">
                                        <!-- Simple link -->
                                        <a href="login.php">Kembali</a>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>