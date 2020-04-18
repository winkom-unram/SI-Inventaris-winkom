<?php
include 'koneksi_database.php';

if(isset($_GET["kode_barang"])){
    $kode_barang = $_GET["kode_barang"];
    mysqli_query($link,"delete from tambah_barang where kode_barang=$kode_barang");
    ?>

    <script type="text/javascript">
        window.location="data_inventaris.php";
    </script>
<?php
}
else{
    ?>
    <script type="text/javascript">
        window.location="data_inventaris.php";
    </script>
    <?php
}

