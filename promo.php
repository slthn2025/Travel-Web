<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location:../../login.php");
    exit;
}
require 'function.php';

$query = query("SELECT * FROM promo");

if (isset($_POST["submit"])) {
    if (promo($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil Di tambahkan');
        document.location.href = 'Promo.php';
        </script>";
    } else {
        echo "
         <script>alert('data gagal Di tambahkan');
        document.location.href = 'Promo.php';
        </script>";
    }
}
if (isset($_POST["button-search"])) {
    $query = cariSupir($_POST["search"]);
}



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .footer {
            position: relative;
            top: 500px;
            height: 50px;
        }

        h5 {
            padding: 5px;
            position: relative;
            top: 10px;
        }

        .button {
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 10px;
        }
    </style>

    <title>Admin Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Promo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="nav-link" href="DaftarPenumpang.php">Daftar Penumpang <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Jadwal.php">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="DaftarSopir.php">Daftar Supir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Cp.php">Contact Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="promo.php">Promo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="artikel.php">Artikel</a>
                </li>
            </ul>
            <a href="logout.php" class="btn btn-danger" onclick="return confirm('anda yakin ingin Keluar?')">Logout</a>
        </div>
    </nav>

    <button type="button" class="btn btn-secondary button" data-toggle="modal" data-target="#exampleModal">Data Promo</button>
    <div id="container">
        <h4>Promo Yang Sedang Berlangsung</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Pesan Promo</th>
                    <th scope="col">img</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($query as $prm) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $prm["nama"]; ?></td>
                        <td><?= $prm["pesan"]; ?></td>
                        <td><img src="img/<?= $prm["img"]; ?>" alt="" width="200px" height="100px"></td>

                        <td>
                            <a href="hapuspromo.php?id=<?= $prm["id"]; ?>" class="btn btn-danger" onclick="return confirm('anda yakin? Data akan Di hapus')">Hapus</a>

                            <a href="ubahpromo.php?id=<?= $prm["id"]; ?>" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama</label>
                            <input type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Message</label>
                            <textarea name="msg" id="msg" cols="50" rows="5"></textarea>
                        </div>
                        <div class="custom-file">
                            <label class="custom-file-label" for="input"></label>
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
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
        <div class="footer bg-dark">
            <h5 style="color: white; text-align:center">copyRight @ 2023</h5>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/script.js"></script>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>