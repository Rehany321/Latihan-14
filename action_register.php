<?php

// pemanggilan file koneksi
require_once("koneksi.php");

// Status tidak error
$error = 0;

// Memvalidasi inputan
if ( isset($_POST['email']) ) $email = $_POST['email'];
else $error = 1; // Status error

if ( isset($_POST['name']) ) $name = $_POST['name'];
else $error = 1; // Status error

if ( isset($_POST['password']) ) $password = $_POST['password'];
else $error = 1; // Status error

if ( isset($_POST['re-password']) ) $repassword = $_POST['re-password'];
else $error = 1; // Status error

// Mengatasi jika terdapat error pada input
if ($error == 1) {
    echo "Terjadi kesalahan pada proses input data <a href='registration.php'>Kembali</a>";
    exit();
}

// pengecekan password dan konfirmasi password
if ($password != $repassword) {
    echo "Password tidak sama, ulangi mengisi form pendaftaran! <a href='registration.php'>Kembali</a>";
    exit();
}
else {
    $password = hash("sha256", $password);
}

// Menyiapkan Query MySQL untuk dieksekudi
$query = "
    INSERT INTO petugas
    (email, nama, password)
    VALUES
    ('{$email}', '{$name}', '{$password}');";
    
// Mengeksekusi MySQL Query
$insert = mysqli_Query($mysqli, $query);

// Menangani ketika error saat eksekusi query
if ( $insert == false ) {
    echo "Error dalam menambahkan data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: index.php");
}
?>