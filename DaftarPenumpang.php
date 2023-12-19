<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location:../../login.php");
    exit;
}
require 'function.php';

$query = query("SELECT * FROM penumpang");


if (isset($_POST["submit"])) {
    if (tambahDataPenumpang($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil Di tambahkan');
        document.location.href = 'DaftarPenumpang.php';
        </script>";
    } else {
        echo "
         <script>alert('data gagal Di tambahkan');
        document.location.href = 'DaftarPenumpang.php';
        </script>";
    }
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
        <a class="navbar-brand" href="#">Data Penumpang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="nav-link active" href="DaftarPenumpang.php">Daftar Penumpang <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jadwal.php">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="DaftarSopir.php">Daftar Supir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Cp.php">Contact Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="promo.php">Promo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="artikel.php">Artikel</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Nama Atau Tujuan" name="search" id="search" aria-label="Search">
            </form>
            <a href="logout.php" class="btn btn-danger" onclick="return confirm('anda yakin ingin Keluar?')">Logout</a>
        </div>
    </nav>

    <button type="button" class="btn btn-secondary button" data-toggle="modal" data-target="#exampleModal">Tambah Penumpang</button>

    <div id="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Penumpang</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Jumlah Kursi</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">No. Handphone</th>
                    <th scope="col">Tanggal Keberangkatan</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($query as $pnp) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pnp["namaPenumpang"]; ?></td>
                        <td><?= $pnp["tujuan"]; ?></td>
                        <td><?= $pnp["jumlahKursi"]; ?></td>
                        <td><?= $pnp["email"]; ?></td>
                        <td><?= $pnp["noHandphone"]; ?></td>
                        <td><?= $pnp["tanggal"]; ?></td>
                        <td>
                            <a href="hapusPenumpang.php?id=<?= $pnp["Id"]; ?>" class="btn btn-danger" onclick="return confirm('anda yakin? Data akan Di hapus')">Hapus</a>

                            <a href="UbahPenumpang.php?id=<?= $pnp["Id"]; ?>" class="btn btn-success">Edit</a>

                            <a href="print.php?id=<?= $pnp["Id"]; ?>" target="_blank" class="btn btn-primary">Print</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Supir</h5>
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
        <div class="footer bg-dark">
            <h5 style="color: white; text-align:center">copyRight @ 2023</h5>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="js/scriptPng.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>