<?php 
include 'top.php'; 
include 'koneksi_database.php'; ?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Inventaris</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form name="form1" action="" method="post">
                            <input type="text" name="t1" class="form-control" placeholder="Nama Barang">
                            <input type="submit" name="submit1" value="Cari" class="btn btn-primary">
                        </form>

                        <?php

                        if (isset($_POST["submit1"])) {
                            $res=mysqli_query($link,"select * from tambah_barang where nama_barang like('%$_POST[t1]%')order by kategori");
                            echo "<table class=table table-bordered>";
                            echo "<tr>";
                            // echo "<th>";echo "Kode";echo "</th>";
                            echo "<th>";echo "Nama Barang";echo "</th>";
                            echo "<th>";echo "Kategori";echo "</th>";
                            echo "<th>";echo "Jumlah Barang";echo "</th>";
                            echo "<th>";echo "Gambar";echo "</th>";
                            echo "<th>";echo "Sinopsis";echo "</th>";
                            echo "</tr>";

                            while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                // echo "<td>";echo $row['kode_barang'];echo "</td>";
                                echo "<td>";echo $row['nama_barang'];echo "</td>";
                                echo "<td>";echo $row['kategori'];echo "</td>";
                                echo "<td>";echo $row['jumlah_barang'];echo "</td>";
                                echo "<td>";
                                ?> <img src=" <?php echo $row["gambar_barang"]; ?> "height="70">  <?php
                                echo "</td>";
                                echo "<td>";echo $row['sinopsis'];echo "</td>";
                                echo "</tr>";
                            }
                                echo "</table>";
                        }

                        else {
                            $res=mysqli_query($link,"select * from tambah_barang order by kategori");
                            echo "<table class=table table-bordered>";
                            echo "<tr>";
                            // echo "<th>";echo "Kode";echo "</th>";
                            echo "<th>";echo "Nama Barang";echo "</th>";
                            echo "<th>";echo "Kategori";echo "</th>";
                            echo "<th>";echo "Jumlah Barang";echo "</th>";
                            echo "<th>";echo "Gambar";echo "</th>";
                            echo "<th>";echo "Sinopsis";echo "</th>";
                            echo "<th>";echo " ";echo "</th>";
                            echo "</tr>";

                                while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                // echo "<td>";echo $row['kode_barang'];echo "</td>";
                                echo "<td>";echo $row['nama_barang'];echo "</td>";
                                echo "<td>";echo $row['kategori'];echo "</td>";
                                echo "<td>";echo $row['jumlah_barang'];echo "</td>";
                                echo "<td>";
                                ?> <img src=" <?php echo $row["gambar_barang"]; ?> "height="70">  <?php
                                echo "</td>";
                                echo "<td>";echo $row['sinopsis'];echo "</td>";
                                echo "<td>";
                                ?> 
                                <a href="hapus_barang.php?kode_barang= <?php echo $row["kode_barang"]; ?>">Hapus </a>
                                <!-- <a href="edit_barang.php?kode_barang= <?php echo $row["kode_barang"]; ?>">Edit</a> -->
                                <?php 
                                echo "</td>";
                                echo "</tr>";
                                }
                            echo "</table>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <ul class="pagination pull-right" >
  <li class="disabled"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>  -->
<?php  
include 'footer.php';
?>

