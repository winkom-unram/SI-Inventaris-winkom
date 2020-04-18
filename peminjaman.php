<?php 
include 'top.php'; 
include 'koneksi_database.php';
?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Peminjaman barang</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="login_wrapper">
                            <section class="login_content" style="margin-top: -40px;">
                                <form name="form1" action="" method="post" enctype="multipart/form-data">

                                    <div style="text-align: left">Nama Peminjam</div>
                                        <select name="nama_peminjam" class="form-control selectpicker">
                                            <?php
                                            $res=mysqli_query ($link,"select nama from data_anggota");
                                            while ($row = mysqli_fetch_array($res)) 
                                            {
                                                echo "<option>";
                                                echo $row["nama"];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    <br>
                                    
                                    <div>
                                    <div style="text-align: left;">Tanggal Peminjaman :</div>
                                    <input type="text" placeholder="<?php date_default_timezone_set("Asia/Makassar");echo date("d / m / Y"); ?>" class="form-control" name="tgl_peminjaman" disabled/>
                                    </div>

                                    <div>
                                        <div style="text-align: left;">Tanggal Pengembalian (Rencana) :</div> 
                                        <input type="date" class="form-control" placeholder="Tanggal Pengembalian" name="tgl_pengembalian" required=""/>
                                    </div>

                                    <br>

                                    <div style="text-align: left">Nama Barang</div>
                                    <select name="kode_barang" class="form-control selectpicker">
                                        <?php
                                        $res=mysqli_query ($link,"select nama_barang, kode_barang from tambah_barang");
                                        while ($row = mysqli_fetch_array($res)) 
                                        {
                                            echo "<option>";
                                            echo $row["kode_barang"] .". ". $row["nama_barang"];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    
                                    <div>
                                        <input type="text" class="form-control" placeholder="Banyaknya" name="banyaknya" required=""/>
                                    </div>

                                    <div class="col-lg-12  col-lg-push-3">
                                        <input class="btn btn-primary submit " type="submit" name="submit1" value="Tambah">
                                    </div>

                                </form>
                            </section>            

                            <?php 
                            if(isset($_POST["submit1"]))
                            {
                                $date = date('Y-m-d');
                                mysqli_query($link,"insert into peminjaman values('','$_POST[nama_peminjam]','$date','$_POST[tgl_pengembalian]','$_POST[kode_barang]','$_POST[banyaknya]')");
                            ?>

                            <script type="text/javascript">
                                alert("Barang Berhasil Dipinjam");
                            </script>
                            <div class="alert alert-success col-lg-12 col-lg-push-0" style="text-align: center">
                                    Peminjaman Sukses
                            </div>
                            <?php 
                            }                                
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php  
include 'footer.php';
?>
