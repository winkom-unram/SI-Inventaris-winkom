<?php 
include 'top.php'; 
include 'koneksi_database.php';
?>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Pengembalian barang</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content"> 
                        <!-- <div class="login_wrapper"> -->
                        <form name="form1" action="" method="post">                            
                            <table>
                                <tr>                                    
                                    <td>
                                        <select name="kode" class="form-control selectpicker">
                                            <?php
                                            $res=mysqli_query ($link,"select no_peminjaman, nama_peminjam from peminjaman");
                                            while ($row = mysqli_fetch_array($res)) 
                                            {
                                                echo "<option>";
                                                echo $row["no_peminjaman"].". " .$row["nama_peminjam"];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="submit" value="Pilih" placeholder="asd" name="submit1" class="form-control btn btn-primary" style="margin-top: 5px">
                                    </td>
                                </tr>

                            </table>

                            <?php 
                            if(isset($_POST["submit1"]))
                            {
                                $date = date('Y-m-d');

                                $res5=mysqli_query($link, "SELECT peminjaman.*, tambah_barang.* FROM peminjaman INNER JOIN tambah_barang ON peminjaman.kode_barang=tambah_barang.kode_barang WHERE no_peminjaman='$_POST[kode]'");

                                while ($row5=mysqli_fetch_array($res5)) {
                                    $no_peminjaman=$row5["no_peminjaman"];
                                    $nama_peminjam=$row5["nama_peminjam"];
                                    $tgl_peminjaman=$row5["tgl_peminjaman"];
                                    $tgl_pengembalian=$row5["tgl_pengembalian"];
                                    $nama_barang=$row5["nama_barang"];
                                    $gambar_barang=$row5["gambar_barang"];
                                    $kode_barang=$row5["kode_barang"];
                                    $banyaknya=$row5["banyaknya"];
                                }
                                ?>

                            <table class="table table-bordered">
                                <tr>
                                    <tr>
                                    <td>
                                        Kode Peminjaman
                                        <input type="text" class="form-control" placeholder="Nomor peminjam" value="<?php echo($no_peminjaman); ?>" name="no_peminjaman" disabled>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>
                                        Nama Peminjam
                                        <input type="text" class="form-control" placeholder="nama peminjam" value="<?php echo($nama_peminjam); ?>" name="nama_peminjam" required>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>
                                        Tanggal Peminjaman
                                        <input type="text" class="form-control" placeholder="Tanggal Peminjaman" value="<?php 
                                        echo ($tgl_peminjaman);
                                        ?>" name="tgl_peminjaman" disabled>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>
                                        Rencana Tanggal Pengembalian
                                        <input type="text" class="form-control" placeholder="Tanggal Peminjaman" value="<?php 
                                        echo ($tgl_pengembalian);
                                        ?>" name="tgl_peminjaman" disabled>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>
                                        Tanggal Pengembalian
                                        <input type="text" class="form-control" placeholder="Tanggal Pengembalian" value="<?php echo date("Y-m-d"); ?>" name="tgl_pengembalian" disabled>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>
                                        Nama Barang
                                        <input type="text" class="form-control" placeholder="Nama barang" value="<?php echo($nama_barang); ?>" name="nama_barang" disabled>
                                        
                                        <img src=" <?php echo ($gambar_barang); ?> "height="100">  

                                    </td>
                                    </tr>

                                    <tr>
                                    <td>
                                        banyaknya
                                        <input type="text" class="form-control" placeholder="Banyaknya" value="<?php echo($banyaknya); ?>" name="banyaknya" required>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>            
                                            <input type="submit" value="Kembalikan Barang" placeholder="asd" name="submit3" class="form-control btn btn-primary">
                                    </td>
                                    </tr>
                                </tr>
                            </table>
                        </form>

                        <?php 
                            }

                        if(isset($_POST["submit3"]))
                        {
                        $date = date('Y-m-d');

                        $res5=mysqli_query($link, "SELECT peminjaman.*, tambah_barang.* FROM peminjaman INNER JOIN tambah_barang ON peminjaman.kode_barang=tambah_barang.kode_barang WHERE no_peminjaman='$_POST[kode]'");

                        while ($row5=mysqli_fetch_array($res5)) {
                            $no_peminjaman=$row5["no_peminjaman"];
                            $nama_peminjam=$row5["nama_peminjam"];
                            $tgl_peminjaman=$row5["tgl_peminjaman"];
                            $tgl_pengembalian=$row5["tgl_pengembalian"];
                            $nama_barang=$row5["nama_barang"];
                            $gambar_barang=$row5["gambar_barang"];
                            $kode_barang=$row5["kode_barang"];
                            $banyaknya=$row5["banyaknya"];
                        }

                        mysqli_query($link,"insert into history values('','$no_peminjaman','$_POST[nama_peminjam]','$tgl_peminjaman','$date','$kode_barang','$banyaknya','Sudah Dikembalikan')");
                        mysqli_query($link,"delete from peminjaman where $no_peminjaman=$no_peminjaman ");

                        ?>

                        <script type="text/javascript">
                            alert("Barang Berhasil Dikembalikan");
                        </script>

                        <div class="alert alert-success col-lg-12 col-lg-push-0" style="text-align: center">
                            Pengembalian Barang Sukses
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

<?php  
include 'footer.php';
?>
