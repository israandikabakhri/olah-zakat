<?php include('template/top.php') ?>



<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
<input type="hidden" name="CSRF_TOKEN" value="53bd213a1ba949757bff4637fb19f452" style="display:none;" />
    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">
            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">
                        <h1 class="mbr-section-title display-1">Profil User</h1>
                        <div class="mbr-section-text">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-user"></span> Nama lengkap anda</label>
                                        <input type="text" class="form-control" id="input_1" name="nama" placeholder="Nama lengkap" value="<?php echo $_SESSION['nama']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-phone"></span> Kontak</label>
                                        <input type="text" class="form-control" id="input_2" name="kontak" placeholder="Contoh: (+6221) 7398381 - 89" value="<?php echo $_SESSION['kontak']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-envelope-o"></span> Email anda</label>
                                        <input type="email" class="form-control" id="input_3" name="email" placeholder="Email@domain.extension" value="<?php echo $_SESSION['email']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-building-o"></span> Nama Unit</label>
                                        <input type="text" class="form-control" id="input_4" name="nama_unit" placeholder="Nama unit" value="<?php echo $_SESSION['nama_unit']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-user"></span> Username</label>
                                        <input type="text" class="form-control" id="input_1" name="username" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" required>
                                    </div>
                                </div>
                            </div>
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
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><button type="submit" name="Update" class="col-xs-12 btn btn-lg btn-warning"><span class="fa fa-refresh"></span>&nbsp;PERBAHARUI PROFILE</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<?php $tinggi = '1130px'; include('template/bottom.php') ?>


<?php 

include 'config/connect-db.php';

if(isset($_POST['Update'])) {

  // Memasukkan Data Inputan ke Varibael
  $id         = $_POST['id'];
  $nama       = $_POST['nama'];
  $username   = $_POST['username'];
  $kontak     = $_POST['kontak'];
  $email      = $_POST['email'];
  $nama_unit  = $_POST['nama_unit'];

  if($_POST['new_pass'] <> "")
  {
    $new_pass   = MD5($_POST['new_pass']);
      
      // Memasukkan data kedatabase berdasarakan variabel tadi
      $result = mysqli_query($mysqli, "UPDATE users SET 
                                       nama      =  '$nama',
                                       username  =  '$username',
                                       kontak    =  '$kontak',
                                       email     =  '$email',
                                       nama_unit =  '$nama_unit',
                                       password  =  '$new_pass'
                                       WHERE id=$id");
  }else{
      
      // Memasukkan data kedatabase berdasarakan variabel tadi
      $result = mysqli_query($mysqli, "UPDATE users SET 
                                       nama      =  '$nama',
                                       username  =  '$username',
                                       kontak    =  '$kontak',
                                       email     =  '$email',
                                       nama_unit =  '$nama_unit'
                                       WHERE id=$id");

  }    
  // Cek jika proses simpan ke database sukses atau tidak   
  if($result){ 
       // Jika Sukses, redirect halaman menggunakan javascript
      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/profile_user.php" </script>';
  }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      //echo "<br><a href='tambah_tok.php'>Kembali Ke Form</a>";
  }


}

?>