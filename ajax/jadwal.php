<?php
require '../function.php';

$cari = $_GET['search'];
$query = "SELECT * FROM jadwal WHERE 
         namaSupir  LIKE'%$cari%'OR 
         Tujuan LIKE '%$cari%'

";
$jadwal = query($query);

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
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Supir</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Nomer Armada</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Nomer Handphone</th>
                <th scope="col">Tanggal</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($jadwal as $jdwl) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $jdwl["namaSupir"]; ?></td>
                    <td><?= $jdwl["Tujuan"]; ?></td>
                    <td><?= $jdwl["nomerArmada"]; ?></td>
                    <td><?= $jdwl["email"]; ?></td>
                    <td><?= $jdwl["noHandphone"]; ?></td>
                    <td><?= $jdwl["tanggal"]; ?></td>
                    <td>
                        <a href="hapusJadwal.php?id=<?= $jdwl["id"]; ?>" class="btn btn-danger" onclick="return confirm('anda yakin? Data akan Di hapus')">Hapus</a>

                        <a href="ubahJadwal.php?id=<?= $jdwl["id"]; ?>" class="btn btn-success">Edit</a>

                        <a href="kirimemail.php?id=<?= $jdwl["id"]; ?>" class="btn btn-primary">Notif</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

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