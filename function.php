<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "travel");



//untuk menampilkan data penumpang
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//untuk menampilkan data jadwal
function jadwal($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//untuk menampilkan data supir

function supir($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//untuk menampilkan contact person
function cP($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//tambah Data untuk Supir
function tambahDataSupir($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $alamat =  htmlspecialchars($data["alamat"]);
    $email =  htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHandphone"]);

    $query = "INSERT INTO supir VALUES
        ('','$nama','$alamat','$email','$noHp')
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}
//tambah data untuk penumpang

function tambahDataPenumpang($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $tujuan =  htmlspecialchars($data["tujuan"]);
    $jmlhKrs =  htmlspecialchars($data["jumlahKursi"]);
    $email = htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHandphone"]);
    $tgl = htmlspecialchars($data["tgl"]);

    $query = "INSERT INTO penumpang VALUES
        ('','$nama','$tujuan','$jmlhKrs','$email','$noHp','$tgl')
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}

//ubah data penumpang
function UbahPenumpang($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $tujuan =  htmlspecialchars($data["tujuan"]);
    $jmlhKrs =  htmlspecialchars($data["jumlahKursi"]);
    $email = htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHandphone"]);
    $tgl = htmlspecialchars($data["tgl"]);



    $query = "UPDATE penumpang SET
            namaPenumpang = '$nama',
            tujuan = '$tujuan',
            jumlahKursi = '$jmlhKrs',
            email = '$email',
            noHandphone = '$noHp',
            tanggal = '$tgl'
             WHERE Id = $id
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}
function ubahJadwal($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $asal = htmlspecialchars($data["asal"]);
    $tujuan =  htmlspecialchars($data["tujuan"]);
    $noarmada =  htmlspecialchars($data["armada"]);
    $email = htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHandphone"]);
    $tgl = htmlspecialchars($data["tgl"]);



    $query = "UPDATE jadwal SET
            namaSupir = '$nama',
            asalberangakt = '$asal',
            Tujuan = '$tujuan',
            nomerArmada = '$noarmada',
            email = '$email',
            noHandphone = '$noHp',
            tanggal = '$tgl'
            WHERE id = $id
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}

function ubahSupir($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHp"]);


    $query = "UPDATE supir SET
    nama = '$nama',
    alamat = '$alamat',
    email = '$email',
    noHp = '$noHp'
    WHERE id = $id";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM penumpang WHERE Id = $id");
    return mysqli_affected_rows($conn);
}
function hapusJadwal($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM jadwal WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapusSupir($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM supir WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapusComent($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM contacperson WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapusPromo($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM promo WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapusGallery($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapusArtikel($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM artikel WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function kirimEmail($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $tujuan =  htmlspecialchars($data["tujuan"]);
    $noarmada =  htmlspecialchars($data["armada"]);
    $email = htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHandphone"]);
    $tgl = htmlspecialchars($data["tgl"]);

    $mail = new PHPMailer(true);

    //Enable SMTP debugging. 
    $mail->SMTPDebug = 2;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com"; //host mail server
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = "TesstingMen@gmail.com";   //nama-email smtp          
    $mail->Password = "rpsvwrtjrkaknnbz";           //password email smtp
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to 
    $mail->Port = 587;

    $mail->From = "AdminTravel@gmail.com"; //email pengirim
    $mail->FromName = "Admin"; //nama pengirim

    $mail->addAddress($email, $nama); //email penerima

    $mail->isHTML(true);

    $mail->Subject = "Penugasan Menuju Kota " . $tujuan; //subject
    $mail->Body    = $nama . " Anda Di Tugaskan Menuju Kota " . $tujuan . " Dengan Armada " . $noarmada . " Pada tanggal " . $tgl; //isi email
    $mail->AltBody = "PHP mailer"; //body email (optional)

    if (!$mail->send()) {
        echo "
        <script>
        alert('notofiaksi tidak berhasil dikirim');
        document.location.href = 'Jadwal.php';
        </script>";
    } else {
        echo "
        <script>
        alert('notofiaksi berhasil dikirim');
        document.location.href = 'Jadwal.php';
        </script>";
    }
}
function tugas($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $asal = htmlspecialchars($data["asal"]);
    $tujuan =  htmlspecialchars($data["tujuan"]);
    $armada = htmlspecialchars($data["armada"]);
    $email = htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHp"]);
    $tgl = htmlspecialchars($data["tgl"]);

    $query = "INSERT INTO jadwal VALUES
        ('','$nama','$asal','$tujuan','$armada','$email','$noHp','$tgl')
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}
//car supir

function cariSupir($search)
{
    $query = "SELECT * FROM supir WHERE 
        nama  LIKE'%$search%'  
    ";
    return query($query);
}
function comment($data)
{
    global $conn;

    $nama = htmlspecialchars($data["name"]);
    $email =  htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHp"]);
    $message = htmlspecialchars($data["message"]);


    $query = "INSERT INTO contacperson VALUES
        ('','$nama','$email','$noHp','$message')
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}
function gallery($data)
{
    global $conn;

    $nama = htmlspecialchars($data["name"]);
    $email =  htmlspecialchars($data["email"]);
    $msg = htmlspecialchars($data["message"]);


    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    $query = "INSERT INTO gallery VALUES
        ('','$nama','$email','$msg','$gambar')
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}

function artikel($data)
{
    global $conn;

    $nama = htmlspecialchars($data["name"]);
    $judul = htmlspecialchars($data["judul"]);
    $email =  htmlspecialchars($data["email"]);
    $url = htmlspecialchars($data["url"]);
    $msg = htmlspecialchars($data["message"]);


    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    $query = "INSERT INTO artikel VALUES
        ('','$nama','$judul','$email','$url','$msg','$gambar')
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}



function upload()
{
    $file = $_FILES['gambar']['name'];
    $ukuranFiles = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    //cek adakah gambar yang di upload?

    if ($error === 4) {
        echo "<script>
        alert('Pilih Gambar Terlebih Dahulu');
    </script>";
        return false;
    }

    //cek ekstensi file 
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $file);
    $ekstensiGambar = strtolower(end($ekstensiGambar));


    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar');
    </script>";
    }
    //cek ukuran gambar
    if ($ukuranFiles > 1000000) {
        echo "<script>
        alert('Ukuran Gambar anda Terlalu Besar usahakan Kurang Dari 1Mb');
    </script>";
    }

    //lolos pengecekan, file siap di upload
    //merubah dnama gambar
    $namaRandom = uniqid();
    $namaRandom .= '.';
    $namaRandom .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaRandom);

    return $namaRandom;
}
function promo($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $msg = htmlspecialchars($data["msg"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    $query = "INSERT INTO promo VALUES
        ('','$nama','$msg','$gambar')
        ";

    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}
function ubahpromo($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $msg =  htmlspecialchars($data["msg"]);
    $gambarLama = $data["gambarLama"];
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE promo SET
            nama = '$nama',
            pesan = '$msg',
            img = '$gambar'
            WHERE id=$id
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}


// ini adalah tanggapan
function tanggapan($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $tgp = htmlspecialchars($data["tgp"]);

    $mail = new PHPMailer(true);

    //Enable SMTP debugging. 
    $mail->SMTPDebug = 2;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com"; //host mail server
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = "TesstingMen@gmail.com";   //nama-email smtp          
    $mail->Password = "rpsvwrtjrkaknnbz";           //password email smtp
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to 
    $mail->Port = 587;

    $mail->From = "AdminTravel@gmail.com"; //email pengirim
    $mail->FromName = "Admin"; //nama pengirim

    $mail->addAddress($email, $nama); //email penerima

    $mail->isHTML(true);

    $mail->Subject = "Respon Atas Masukan Dari  " . $nama; //subject
    $mail->Body    = "Salam Sejahtera untuk" . $nama . " Terimakasih atas saran dan masukan anda " . $tgp . " Terimakasih Sekali lagi atas masukan anda.  "; //isi mail
    $mail->AltBody = "PHP mailer"; //body email (optional)

    if (!$mail->send()) {
        echo "
        <script>
        alert('balasan tidak berhasil dikirim');
        document.location.href = 'Cp.php';
        </script>";
    } else {
        echo "
        <script>
        alert('balasan berhasil dikirim');
        document.location.href = 'Cp.php';
        </script>";
    }
}
function register($data)
{
    global $conn;

    $username = htmlspecialchars($data["Username"]);
    $email =  htmlspecialchars($data["email"]);
    $password =  mysqli_escape_string($conn, $data["password"]);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO admin VALUES
        ('','$username','$email','$password')
        ";
    //cek adakah perubahan
    mysqli_query($conn, $query);
    //kembalikan nilai function ini dan kirim ke halaman tambah data
    return mysqli_affected_rows($conn);
}
