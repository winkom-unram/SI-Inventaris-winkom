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
                        <h2>Data Anggota</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form name="form1" action="" method="post">
                            <input type="text" name="t1" class="form-control" placeholder="Nama Anggota">
                            <input type="submit" name="submit1" value="Cari" class="btn btn-primary">
                        </form>

                        <?php
                        if (isset($_POST["submit1"])) {
                            $res=mysqli_query($link,"select * from data_anggota where nama like('%$_POST[t1]%')");
                        echo "<table class=table table-bordered>";
                        echo "<tr>";
                        echo "<th>";echo "Foto";echo "</th>";
                        echo "<th>";echo "Nama";echo "</th>";
                        echo "<th>";echo "Divisi";echo "</th>";
                        echo "<th>";echo "Email";echo "</th>";
                        echo "<th>";echo "No. HP";echo "</th>";
                        echo "</tr>";

                        while ($row=mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>";
                        ?> <img src=" <?php echo $row["foto_anggota"]; ?> "height="100">  <?php
                        echo "</td>";
                        echo "<td>";echo $row['nama'];echo "</td>";
                        echo "<td>";echo $row['jabatan'];echo "</td>";
                        echo "<td>";echo $row['email'];echo "</td>";
                        echo "<td>";echo $row['no_hp'];echo "</td>";
                        echo "</tr>";
                        }
                        echo"</table>";
                        }

                        else{
                        $res=mysqli_query($link,"select * from data_anggota");
                        echo "<table class=table table-bordered>";
                        echo "<tr>";
                        echo "<th>";echo "Foto";echo "</th>";
                        echo "<th>";echo "Nama";echo "</th>";
                        echo "<th>";echo "Divisi";echo "</th>";
                        echo "<th>";echo "Email";echo "</th>";
                        echo "<th>";echo "No. HP";echo "</th>";
                        echo "</tr>";

                        while ($row=mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>";
                        ?> <img src=" <?php echo $row["foto_anggota"]; ?> "height="100">  <?php
                        echo "</td>";
                        echo "<td>";echo $row['nama'];echo "</td>";
                        echo "<td>";echo $row['jabatan'];echo "</td>";
                        echo "<td>";echo $row['email'];echo "</td>";
                        echo "<td>";echo $row['no_hp'];echo "</td>";
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

        <!-- /page content -->
<?php  
include 'footer.php';
?> 
