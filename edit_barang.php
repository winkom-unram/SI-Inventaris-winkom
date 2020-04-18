<?php
include 'koneksi_database.php';

    $kode_barang = $_GET["kode_barang"];
    $kategori = $_GET["kategori"];
    $nama_barang = $_GET["nama_barang"];
    $jumlah_barang = $_GET["jumlah_barang"];
    $sinopsis = $_GET["sinopsis"];

    mysqli_query($link,"update tambah_barang set kategori=$kategori, nama_barang = $nama_barang, jumlah_barang = $jumlah_barang, sinopsis = $sinopsis where kode_barang=$kode_barang");
    ?>

    <script type="text/javascript">
        window.location="data_inventaris.php";
    </script>
