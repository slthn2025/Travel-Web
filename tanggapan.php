<?php
require "function.php";


$id = $_GET["id"];

$idData = query("SELECT * FROM contacperson WHERE id = $id")[0];


if (isset($_POST["submit"])) {

    if (tanggapan($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil Di Ubah');
        document.location.href = 'Cp.php';
        </script>";
    } else {
        echo "
         <script>alert('data gagal Di Ubah');
        document.location.href = 'Cp.php';
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
        <a class="navbar-brand" href="#">Tanggapan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>


    <form action="" method="post">
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $idData["Id"]; ?>">
            <label for="formGroupExampleInput">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= $idData["nama"]; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">E-Mail</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Another input" value="<?= $idData["email"]; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Isi Pesan</label>
            <textarea name="tgp" id="tgp" cols="70" rows="5" disabled><?= $idData["comment"]; ?></textarea>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Tanggapan</label>
            <textarea name="tgp" id="tgp" cols="70" rows="5"></textarea>
        </div>
        <div class="modal-footer">
            <a href="Cp.php" class="btn btn-danger">Batal</a>
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