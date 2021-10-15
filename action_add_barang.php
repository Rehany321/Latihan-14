<?php

// pemanggilan file koneksi
require_once("koneksi.php");

// Status tidak error
$error = 0;

// Memvalidasi inputan
if ( isset($_POST['id_barang']) ) $id_barang = $_POST['id_barang'];
else $error = 1; // Status error

if ( isset($_POST['name']) ) $name = $_POST['name'];
else $error = 1; // Status error

if ( isset($_POST['harga']) ) $harga = $_POST['harga'];
else $error = 1; // Status error

// Mengatasi jika terdapat error pada input
if ($error == 1) {
    echo "Terjadi kesalahan pada proses input data";
    exit();
}

// Mengambil data file upload
$files = $_FILES['foto'];
$path = "penyimpanan/";

// Menangani file upload
if ( !empty($files['name']) ) {
    $filepath = $path . $files["name"];
    $upload = move_uploaded_file($files["tmp_name"], $filepath);
}
else {
    $filepath = "";
    $upload = false;
}

// menangani error saat mengupload
if ($upload != true && $filepath != "" ) {
    exit("Gagal Mengupload File <a href='form_add_barang.php'>kembali</a>");
}

// Menyiapkan Query MySQL untuk dieksekudi
$query = "
    INSERT INTO barang
    (id_barang, nama_barang, harga, foto)
    VALUES
    ('{$id_barang}', '{$name}', '{$harga}', '{$filepath}');";
    
// Mengeksekusi MySQL Query
$insert = mysqli_Query($mysqli, $query);

// Menangani ketika error saat eksekusi query
if ( $insert == false ) {
    echo "Terjadi kesalahan dalam menambahkan data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: index.php");
}
?>