<?php
require 'Admin/AdminDashboard/function.php';


$query = query("SELECT * FROM gallery");

if (isset($_POST["submit"])) {

    if (gallery($_POST) > 0) {
        echo "
        <script>
        alert('Terimakasih Telah Menambahkan cerita Perjalanan anda');
        document.location.href = 'Gallery.php';
        </script>";
    } else {
        echo "
         <script>alert('ERROR');
        document.location.href = 'Gallery.php';
        </script>";
    }
}



?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>My Travel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/hero-slider.css">
    <link rel="stylesheet" href="css/templatemo-main.css">
    <link rel="stylesheet" href="css/owl-carousel.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<!--
Vanilla Template
https://templatemo.com/tm-526-vanilla
-->

<body>

    <div class="fixed-side-navbar">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="index.php"><span>Home</span></a></li>
            <li class="nav-item"><a class="nav-link" href="About.php"><span>About</span></a></li>
            <li class="nav-item"><a class="nav-link" href="Gallery.php"><span>Gallery</span></a></li>
            <li class="nav-item"><a class="nav-link" href="Promo.php"><span>Promo</span></a></li>
            <li class="nav-item"><a class="nav-link" href="artikelPost.php"><span>Post-Artikel</span></a></li>
        </ul>
    </div>

    <div class="parallax-content baner-content" id="home">
        <div class="container">
            <div class="first-content">
                <h1>My Travel</h1>
                <span><em>Friend </em> Your Journey</span>
                <div class="primary-button">
                    <a href="#Gallery">Cari Tahu Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </div>


    <div class="parallax-content projects-content" id="Gallery">
        <div class="container">
            <h1 style="text-align:center; color:white">Gallery</h1>
            <div class="row">
                <div class="col-md-12">
                    <div id="owl-testimonials" class="owl-carousel owl-theme">
                        <?php foreach ($query as $img) : ?>
                            <div class="item">
                                <div class="testimonials-item">
                                    <a href="img/<?= $img["img"]; ?>" data-lightbox="image-1"><img src="img/<?= $img["img"]; ?>" alt=""></a>
                                    <div class="text-content">
                                        <p>Di Posting Oleh <?= $img["nama"] ?></p>
                                        <p><?= $img["email"]; ?></p>
                                        <p><?= $img["message"]; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax-content contact-content" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="row">
                            <form id="contact" action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset>
                                            <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset>
                                            <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="input"></label>
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <fieldset>
                                            <button type="submit" name="submit" id="form-submit" class="btn">Send Message</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text">
                        <h1>Post Ceritakan Perjalanan anda Bersama kami!</h1>
                        <p>Berikan Cerita Anda Tentang Penglaman anda berpergian menggunkan My trevel.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="submit-button">
                        <a href="#home">Kembali</a>
                    </div>
                    <h1 style="text-align:center; color:white">Ikuti Kami</h1>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-google"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                    <p>Copyright &copy; 2023 My Travel
                </div>
            </div>
        </div>
    </footer>















    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script>
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";
        }
    </script>

    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $(".fixed-side-navbar a, .primary-button a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>

</body>

</html>