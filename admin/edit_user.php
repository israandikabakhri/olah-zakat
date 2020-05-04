<?php include('template/top.php') ?>



<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
<input type="hidden" name="CSRF_TOKEN" value="53bd213a1ba949757bff4637fb19f452" style="display:none;" />
    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">
            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">
                        <h1 class="mbr-section-title display-1">Ubah Password</h1>
                        <div class="mbr-section-text">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id_akses']; ?>">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-key"></span> Password Baru</label>
                                        <input type="password" class="form-control" id="input_5" name="new_pass" placeholder="Password Baru.." value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mbr-section-btn">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><a href="index.php" class="col-xs-12 btn btn-lg btn-black-outline"><span class="fa fa-backward"></span>&nbsp;KEMBALI</a></div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><button type="submit" name="Update" class="col-xs-12 btn btn-lg btn-warning"><span class="fa fa-pencil"></span>&nbsp;UBAH</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<?php $tinggi = '130px'; include('template/bottom.php') ?>


<?php 

include 'config/connect-db.php';

if(isset($_POST['Update'])) {

  // Memasukkan Data Inputan ke Varibael
  $id = $_POST['id'];

  if($_POST['new_pass'] <> "")
  {
    $new_pass   = MD5($_POST['new_pass']);
      
      // Memasukkan data kedatabase berdasarakan variabel tadi
      $result = mysqli_query($mysqli, "UPDATE users SET 
                                       password     =  '$new_pass'
                                       WHERE id=$id") or die(mysqli_error($mysqli));

      if($result){ 
          echo '<script language="javascript"> alert("Berhasil Ubah Password..") </script>';
      }else{
          echo '<script language="javascript"> alert("Gagal Ubah Password..") </script>';
      }

  }



}

?>