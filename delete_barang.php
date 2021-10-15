<?php

// mengecek dan medapatkan data session
require_once("session_check.php");

// pemanggilan file koneksi
require_once("koneksi.php");


// cek apakah petugas telah login
if ( $sessionStatus == true ) {
    // Mendapatkan data ID Barang
    if ( isset($_GET["id_barang"]) ) $id_barang = $_GET["id_barang"];
    else {
        echo "ID Barang TIdak Ditemukan! <a href'index.php'>Kembali</a>";
        exit();
    }
    // Query Get Data Barang
    $query = "DELETE FROM barang WHERE id_barang = '{$id_barang}'";

    // Eksekusi Query
    $result = mysqli_query($mysqli, $query);

    if (! $result) {
        exit("Gagal Menghapus Data!");
    }

    header("Location: index.php");
}
else if ( $sessionStatus == false ) {
    header("Location: index.php");
}

?>
