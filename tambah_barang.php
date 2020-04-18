<?php 
include 'top.php'; 
include 'koneksi_database.php';
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <!--<div class="page-title">
                    <div class="title_left">
                         <h3>Plain Page</h3> 
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                     <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span> 
                            </div>
                        </div>
                    </div> 
                </div> -->

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Tambah barang</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post" enctype="multipart/form-data">

                    <div>
                        <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" required=""/>
                    </div>

                    <div class="form-group" > 
                            <select class="form-control" name="kategori">
                                <option>Elektronika</option>
                                <option>ATK</option>
                                <option>Aksesories</option>
                                <option>Furniture</option>
                            </select>
                    </div>

                    <div>
                        <input type="text" class="form-control" placeholder="Jumlah Barang" name="jumlah_barang" required=""/>
                    </div>

                    <!--
                    <div>
                        <input type="text" class="form-control" placeholder="Sinopsis" name="sinopsis" required=""/>
                    </div>
                    -->   

                    <div class="form-group">
                        <div>
                        <textarea class="form-control" rows="3" placeholder="Sinopsis ..." name="sinopsis"></textarea>
                        </div>
                    </div>
                    
                    <div>
                        <div style="text-align: left"> Foto Barang :</div>
                        <input type="file" name="foto" required=""/>
                        <p></p>
                    </div>
                    
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-primary submit " type="submit" name="submit1" value="Tambah">
                   </div>

                </form>
            </section>

   <?php 
   if(isset($_POST["submit1"]))
   {

    $tm=md5(time());
    $fnm=$_FILES["foto"]["name"];
    $dst="./foto_barang/".$tm.$fnm;
    $dst1="foto_barang/".$tm.$fnm;
    move_uploaded_file($_FILES["foto"]["tmp_name"], $dst);
    
    mysqli_query($link,"insert into tambah_barang values('','$_POST[kategori]','$_POST[nama_barang]','$_POST[jumlah_barang]','$_POST[sinopsis]','$dst1')");
   ?>
   <script type="text/javascript">
     alert("Barang Berhasil Ditambahkan");
   </script>
   <div class="alert alert-success col-lg-12 col-lg-push-0" style="text-align: center">
        Registration successfully
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
