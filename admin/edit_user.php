<?php include('template/top.php') ?>


            <?php
                $id = $_SESSION['id'];
                $dt = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");
                $d  = mysqli_fetch_array($dt);
            ?>


<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
<input type="hidden" name="CSRF_TOKEN" value="53bd213a1ba949757bff4637fb19f452" style="display:none;" />
    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">
            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-6 text-xs-center">
                        <h4 class="mbr-section-title display-3">PROFILE MASJID</h4>
                        <hr>
                        <div class="mbr-section-text">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                            <div class='row'>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-building"></span> Nama Masjid</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Masjid.." value="<?php echo $d['nama'];?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-user"></span> Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username.." value="<?php echo $d['username'];?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-home"></span> Alamat</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat.." value="<?php echo $d['alamat'];?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-home"></span> Kota</label>
                                        <input type="text" class="form-control" name="kota" placeholder="Alamat.." value="<?php echo $d['kota'];?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-phone"></span> No Hp</label>
                                        <input type="text" class="form-control" name="no_hp" placeholder="No Handphone Pengurus.." value="<?php echo $d['no_hp'];?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-key"></span> Password Baru <i>(Kosongkan Jika Tidak Ingin Mengubah)</i></label>
                                        <input type="password" class="form-control" id="input_5" name="new_pass" placeholder="Password Baru (Kosongkan Jika Tidak Ingin Mengubah).." value="">
                                    </div>
                                </div>

                                <hr>

                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                      function onlyNumbers(evt) {
                        var e = event || evt;
                        var charCode = e.which || e.keyCode;

                        if(charCode > 31 && (charCode < 48 || charCode > 57))
                          return false;
                          return true;

                      }
                    </script>

                    <div class="mbr-section col-md-5 col-md-offset-1">
                        <h1 class="mbr-section-title display-3" style="font-size: 28px;">ATURAN PENYALURAN MASJID</h1>
                        <hr>
                        <div class="mbr-section-text">
                            <div class='row'>

                                <div class="col-lg-12">
                       
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><span class="fa fa-mosque"></span> Aturan Penyaluran Zakat Beras (LITER)</label>
                                        <input type="text" class="form-control" name="set_fitrah_beras" placeholder="Aturan Penyaluran Zakat Beras (LITER).." value="<?php echo $d['set_fitrah_beras'];?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"><!-- <span class="fa fa-money"></span> --> Aturan Penyaluran Zakat Uang (RUPIAH)</label>
                                        <input type="number" class="form-control" name="set_fitrah_uang" min="0" placeholder="Aturan Penyaluran Zakat Uang (RUPIAH).." onkeypress="return onlyNumbers();" value="<?php echo $d['set_fitrah_uang'];?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left">Aturan Penerimaan Beras Per Orang (Liter)</label>
                                        <input type="number" class="form-control" name="set_beras_muzakki" min="0" placeholder="Aturan Penerimaan Beras Per Orang.." onkeypress="return onlyNumbers();" value="<?php echo $d['set_beras_muzakki'];?>">
                                    </div>
                                </div>
<!-- 
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-static pull-left"> Perkiraan Penerima Zakat (ORANG)</label>
                                        <input type="text" class="form-control" name="perkiraan_penerima" placeholder="Perkiraan Penerima Zakat (ORANG).." value="<?php echo $d['perkiraan_penerima'];?>">
                                    </div>
                                </div> -->

                                <span style="text-align: left!important;font-family: calibri;">
                                  <b>Ket:</b> <br> 
                                    <b>Aturan Penyaluran Zakat Beras</b> Adalah Jumlah Beras Dalam Satuan Liter Yang Diterima Per KK Begitupun Dengan <b>Aturan Penyaluran Zakat Uang</b> Adalah Jumlah Uang Yang Diterima Per KK Bersamaan Dengan Beras.
                                    <br><br>
                                    <!-- 2. <b>Perkiraan Penerima Zakat</b> Adalah Rumus Penunjang Untuk Menghasilkan Jumlah Hasil Penyaluran Berdasarkan Ketetapan Aturan Di atasnya Yaitu Jumlah Beras dan Uang Bagi Penerima, Namun ini Diisi Jika Belum Memiliki Database Penerima Zakat Dalam APlikasi Ini.  -->
                                </span>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="mbr-section-text">
                            <div class='row'>
                              <center>
                              <div class="mbr-section-btn" style="float: center;">
<!-- 
                                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><a href="index.php" class="col-xs-12 btn btn-lg btn-black-outline"><span class="fa fa-backward"></span>&nbsp;KEMBALI</a></div> -->
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button type="submit" name="Update" class="col-xs-12 btn btn-lg btn-warning"><span class="fa fa-pencil"></span>&nbsp;UBAH</button></div>
                              </div>

                            </div>
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
  $id                 = $_POST['id'];
  $nama               = $_POST['nama'];
  $username           = $_POST['username'];
  $alamat             = $_POST['alamat'];
  $kota               = $_POST['kota'];
  $no_hp              = $_POST['no_hp'];
  $set_fitrah_beras   = $_POST['set_fitrah_beras'];
  $set_fitrah_uang    = $_POST['set_fitrah_uang'];
  $perkiraan_penerima = $_POST['perkiraan_penerima'];

    
          if($_POST['new_pass'] <> "")
          {
              $new_pass   = MD5($_POST['new_pass']);
              
              $result = mysqli_query($mysqli, "UPDATE users SET 
                                               nama                 =  '$nama',
                                               username             =  '$username',
                                               alamat               =  '$alamat',
                                               kota                 =  '$kota',
                                               no_hp                =  '$no_hp',
                                               set_fitrah_beras     =  '$set_fitrah_beras',
                                               set_fitrah_uang      =  '$set_fitrah_uang',
                                               password     =  '$new_pass'
                                               WHERE id=$id") or die(mysqli_error($mysqli));

          }else{
            $result = mysqli_query($mysqli, "UPDATE users SET 
                                       nama                 =  '$nama',
                                       username             =  '$username',
                                       alamat               =  '$alamat',
                                       kota                 =  '$kota',
                                       no_hp                =  '$no_hp',
                                       set_fitrah_beras     =  '$set_fitrah_beras',
                                       set_fitrah_uang      =  '$set_fitrah_uang'
                                       WHERE id=$id") or die(mysqli_error($mysqli));
      
          }

      if($result){ 
      
       echo '<script language="javascript"> alert("Berhasil Ubah Data..") </script>';
       echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/edit_user.php" </script>';
         

      }else{
          echo '<script language="javascript"> alert("Gagal Ubah Data..") </script>';
      }






}

?>