<?php
require "function.php";

$id = $_GET["id"];

if (hapusGallery($id) > 0) {
    echo "
            <script>
            alert('data berhasil Di hapus');
            document.location.href = 'gallery.php';
            </script>";
} else {
    echo "
             <script>alert('data gagal Di hapus');
            document.location.href = 'gallery.php';
            </script>";
}
