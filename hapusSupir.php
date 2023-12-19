<?php
require "function.php";

$id = $_GET["id"];

if (hapusSupir($id) > 0) {
    echo "
            <script>
            alert('data berhasil Di hapus');
            document.location.href = 'DaftarSopir.php';
            </script>";
} else {
    echo "
             <script>alert('data gagal Di hapus');
            document.location.href = 'DaftarSopir.php';
            </script>";
}
