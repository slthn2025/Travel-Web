<?php
require 'Admin/AdminDashboard/function.php';

$query = query("SELECT * FROM artikel");
$promo = query("SELECT * FROM promo");


if (isset($_POST["submit"])) {
    if (tambahDataPenumpang($_POST) > 0) {
        echo "
        <script>
        alert('Terimakasih, Pesanan Anda Sudah Kami Terima');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
         <script>alert('Harap Konfirmasi Ulang');
        document.location.href = 'index.php';
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
                    <a href="#services">Cari Tahu Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </div>


    <div class="service-content" id="services">
        <div class="container">
            <h1 style="text-align: center; color: white;">Artikel</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php foreach ($query as $art) : ?>
                            <div class="col-md-4">
                                <div class="service-item">
                                    <h4><?= $art["judul"] ?></h4>
                                    <h5>Oleh : <?= $art["nama"]; ?></h5>
                                    <div class="line-dec"></div>
                                    <img src="img/<?= $art["img"]; ?>" alt="">
                                    <p><?= $art["message"]; ?></p>
                                    <a href="<?= $art["url"]; ?>">Selengkapnya</a>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="tabs-content" id="our-story">
        <h1 style="text-align:center; color:white">Promo!</h1>
        <div class="container">
            <div class="row">
                <?php foreach ($promo as $prm) : ?>
                    <div class="col-md-8 mx-auto">
                        <div class="wrapper">
                            <section id="first-tab-group" class="tabgroup">
                                <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-interval="200">
                                            <img src="admin/AdminDashboard/img/<?= $prm["img"]; ?>" class="d-block w-100" alt="..." width="900vh">
                                            <p><?= $prm["pesan"]; ?> <a href="" data-toggle="modal" data-target="#exampleModal">Pesan Sekarang</a></p>
                                        </div>
                                    </div>
                            </section>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Penumpang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Example input">
                        </div>
                        <label for="exampleFormControlSelect1">Tujuan</label>
                        <select class="form-control" id="tujuan" name="tujuan">
                            <option>Jakarta</option>
                            <option>Bekasi</option>
                            <option>Bandung</option>
                            <option>Surabaya</option>
                            <option>Bali</option>
                            <option>Jogja</option>
                        </select>
                        <label for="exampleFormControlSelect1">Jumlah Kursi</label>
                        <select class="form-control" id="jmlhK" name="jumlahKursi">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">E-Mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Another input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">No.Handphone</label>
                            <input type="text" class="form-control" name="noHandphone" id="nohp" placeholder="Another input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Keberangkatan</label>
                            <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Another input">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
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