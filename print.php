<?php
require 'function.php';


$id = $_GET["id"];

$query = query("SELECT * FROM penumpang WHERE Id = $id")[0];

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pemsanan tiket</title>
</head>

<body>
    <h1 style="text-align: center;"> Bukti Pemesanan tiket</h1>
    <p style="text-align: center;">Ini Adalah Bukit Pemesana untuk ' . $query["namaPenumpang"] . ' dengan tujuan ' . $query["tujuan"] . ' pada tanggal ' . $query["tanggal"] .
    ' simpan Bukti ini untuk mendapatkan fasilitas makan di temapat yang sudah di tentukan. jika terjadi kendala silahkan hubungi petugas kami
    </p><br><br>

    <p style="text-align: right;">
        Hormat Kami My Travel
    </p>
    <p style="text-align: left;">
    +6289172712712<br>
    myTravel@gmail.org<br>
    myTravel@Indonesia<br>
</p>
</body>

</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
