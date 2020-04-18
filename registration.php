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
                        <h2>Form Tambah Aggota</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="login_wrapper">

    <section class="login_content" style="margin-top: -40px;">
        <form name="form1" action="" method="post" enctype="multipart/form-data">

            <div>
                <input type="text" class="form-control" placeholder="Nama" name="firstname" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Jabatan" name="lastname" required=""/>
            </div>

            <div>
                <input type="text" class="form-control" placeholder="email" name="email" required=""/>
            </div>

            <div>
                <input type="text" class="form-control" placeholder="No. Hp" name="contact" required=""/>
            </div>
            
          <div>
            <div style="text-align: left">Pas Foto :</div>
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
    $dst="./foto_anggota/".$tm.$fnm;
    $dst1="foto_anggota/".$tm.$fnm;
    move_uploaded_file($_FILES["foto"]["tmp_name"], $dst);
    
    mysqli_query($link,"insert into data_anggota values('','$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[contact]','$dst1')");
   ?>
   <script type="text/javascript">
     alert("Anggota Berhasil Ditambahkan");
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
