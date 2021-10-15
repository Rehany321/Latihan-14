<?php

// pemanggilan file koneksi
require_once("koneksi.php");

// Mendapatkan data ID Barang
if ( isset($_POST["id_barang"]) ) $id_barang = $_POST["id_barang"];
else {
    echo "ID Barang TIdak Ditemukan! <a href'index.php'>Kembali</a>";
    exit();
}
// Query Get Data Barang
$query = "SELECT * FROM barang WHERE id_barang = '{$id_barang}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

// Fetching Data
foreach ($result as $barang) {
    $foto = $barang["foto"];
    $name = $barang["nama_barang"];
    $harga = $barang["harga"];
}


if ( isset($_POST['name']) ) $name = $_POST['name'];

if ( isset($_POST['harga']) ) $harga = $_POST['harga'];



// mengambil data file upload
$files = $_FILES['foto'];
$path = "penyimpanan/";

// Menangani file upload
if ( !empty($files['name']) ) {
    $filepath = $path . $files["name"];
    $upload = move_uploaded_file($files["tmp_name"], $filepath);

    if ($upload) {
        unlink($foto);
    }
}
else {
    $filepath = $foto;
    $upload = false;
}

// menangani error saat mengupload
if ($upload != true && $filepath != $foto ) {
    exit("Gagal Mengupload File <a href='form_edit_barang.php?id_barang={$id_barang}'>kembali</a>");
}


// Menyiapkan Query MySQL untuk dieksekudi
$query = "
    UPDATE barang SET
        nama_barang = '{$name}',
        harga = '{$harga}',
        foto = '{$filepath}'
    WHERE id_barang = '{$id_barang}'";
    
// Mengeksekusi MySQL Query
$insert = mysqli_Query($mysqli, $query);

// Menangani ketika error saat eksekusi query
if ( $insert == false ) {
    echo "Terjadi kesalahan dalam mengubah data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: index.php");
}

?>
