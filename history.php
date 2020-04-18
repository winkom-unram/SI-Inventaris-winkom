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
                        <h2>History Peminjaman</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form name="form1" action="" method="post">
                            <input type="text" name="t1" class="form-control" placeholder="Nama Peminjam / Nama barang">
                            <input type="submit" name="submit1" value="Cari" class="btn btn-primary">
                        </form>

                        <?php
                        if (isset($_POST["submit1"])) {
                            $res=mysqli_query($link,"select * from history where nama_peminjam like('%$_POST[t1]%') order by no_peminjaman");
                            echo "<table class=table table-primary table-bordered>";
                            echo "<tr>";
                            echo "<th>";echo "Kode Pinjam";echo "</th>";
                            echo "<th>";echo "Nama Peminjam";echo "</th>";
                            echo "<th>";echo "Tanggal Peminjaman";echo "</th>";
                            echo "<th>";echo "Tanggal Pengembalian";echo "</th>";
                            echo "<th>";echo "Kode Barang";echo "</th>";
                            echo "<th>";echo "Banyaknya";echo "</th>";
                            echo "<th>";echo "Status";echo "</th>";
                            echo "</tr>";

                            while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>";echo $row['no_peminjaman'];echo "</td>";
                                echo "<td>";echo $row['nama_peminjam'];echo "</td>";
                                echo "<td>";echo $row['tgl_peminjaman'];echo "</td>";
                                echo "<td>";echo $row['tgl_pengembalian'];echo "</td>";
                                echo "<td>";echo $row['kode_barang'];echo "</td>";
                                echo "<td>";echo $row['banyaknya'];echo "</td>";
                                echo "<td>";echo $row['status'];echo "</td>";
                                echo "</tr>";
                            }
                            echo"</table>";
                        }

                        else{
                            // $res=mysqli_query($link,"select from history.*, tambah_barang.* from history inner join tambah_barang on history.kode_barang =  tambah_barang.kode_barang order by no_peminjaman");
                            $res=mysqli_query($link,"select * from history order by no_peminjaman");
                            echo "<table class=table table-bordered>";
                            echo "<tr>";
                            echo "<th>";echo "Kode Pinjam";echo "</th>";
                            echo "<th>";echo "Nama Peminjam";echo "</th>";
                            echo "<th>";echo "Tanggal Peminjaman";echo "</th>";
                            echo "<th>";echo "Tanggal Pengembalian";echo "</th>";
                            echo "<th>";echo "Kode Barang";echo "</th>";
                            echo "<th>";echo "Banyaknya";echo "</th>";
                            echo "<th>";echo "Status";echo "</th>";
                            echo "</tr>";

                            while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>";echo $row['no_peminjaman'];echo "</td>";
                                echo "<td>";echo $row['nama_peminjam'];echo "</td>";
                                echo "<td>";echo $row['tgl_peminjaman'];echo "</td>";
                                echo "<td>";echo $row['tgl_pengembalian'];echo "</td>";
                                echo "<td>";echo $row['kode_barang'];echo "</td>";
                                echo "<td>";echo $row['banyaknya'];echo "</td>";
                                echo "<td>";echo $row['status'];echo "</td>";
                                echo "</tr>";
                            }
                            echo"</table>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  
include 'footer.php';
?> 