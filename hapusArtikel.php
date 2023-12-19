<?php
require "function.php";

$id = $_GET["id"];

if (hapusArtikel($id) > 0) {
    echo "
            <script>
            alert('data berhasil Di hapus');
            document.location.href = 'artikel.php';
            </script>";
} else {
    echo "
             <script>alert('data gagal Di hapus');
            document.location.href = 'artikel.php';
            </script>";
}
