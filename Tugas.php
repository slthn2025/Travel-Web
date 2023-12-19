<?php
require "function.php";


$id = $_GET["id"];

$idData = query("SELECT * FROM supir WHERE id = $id")[0];


if (isset($_POST["submit"])) {

    if (tugas($_POST) > 0) {
        echo "
        <script>
        alert('tugas Berhasil Di Kirim ');
        document.location.href = 'jadwal.php';
        </script>";
    } else {
        echo "
             <script>alert('tugas gagal  Di kirim');
            document.location.href = 'jadwal.php';
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
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>


    <form action="" method="post">
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $idData["id"]; ?>">
            <label for="formGroupExampleInput">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= $idData["nama"]; ?>">
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
        </select>
        <label for="exampleFormControlSelect1">Asal Keberangkatan</label>
        <select class="form-control" id="asal" name="asal">
            <option>Jakarta</option>
            <option>Bekasi</option>
            <option>Bandung</option>
            <option>Surabaya</option>
            <option>Bali</option>
            <option>Jogja</option>
        </select>
        </select>
        <div class="form-group">
            <label for="formGroupExampleInput2">Nomer Armada</label>
            <input type="text" class="form-control" name="armada" id="armada" placeholder="Another input">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">E-Mail</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Another input" value="<?= $idData["email"]; ?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">No.Handphone</label>
            <input type="text" class="form-control" name="noHp" id="noHp" placeholder="Another input" value="<?= $idData["noHp"]; ?>">
        </div>
        </select>
        <div class="form-group">
            <label for="formGroupExampleInput2">Tanggal Keberangkatan</label>
            <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Another input">
        </div>
        <div class="modal-footer">
            <a href="DaftarSopir.php" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>


    <footer>
        <div class="footer bg-dark">
            <h5 style="color: white; text-align:center">copyRight @ 2023</h5>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>