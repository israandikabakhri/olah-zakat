<?php include('template/top.php') ?>


<style type="text/css">
  .vc{
    font-size: 17px;
  }
  .linkkk{
    cursor: pointer;
    background-color: #2196f3;
    color: #fff;
    border-radius: 1.6em;
    padding: 5px;
  }
  .linkkk:hover{
    color: white;
  }
</style>


    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">
            <div class="container-fluid">
                <div class="row">
                    <div class="mbr-section-full col-md-12 col-lg-11">
                        <h1 class="mbr-section-title display-2" style="padding-top: 90px;">Data Penerimaan ZIS</h1>
                        
<!-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"></div> -->
  <a href="tambah_penyetoran.php" class="btn btn-lg btn-warning"><span class="fa fa-plus"></span>&nbsp;TAMBAH PENERIMAAN</a>


 <div class="row">
    <div class="col-md-7">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-inline" >
            <div class="form-group">
              <select class="form-control" id="Kolom" name="Kolom" required="">
                <?php
                  $kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
                ?>
                <option value="nama_muzakki" <?php if ($kolom=="nama_muzakki") echo "selected"; ?>>Nama Muzakki</option>
                <option value="zakat_fitrah_beras" <?php if ($kolom=="zakat_fitrah_beras") echo "selected"; ?>>Zakat Beras</option>
                <option value="zakat_fitrah_uang" <?php if ($kolom=="zakat_fitrah_Uang") echo "selected"; ?>>Zakat Uang</option>
                <option value="jumlah_jiwa" <?php if ($kolom=="jumlah_jiwa") echo "selected";?>>Jumlah Jiwa</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="penyetoran.php" class="btn btn-danger">Reset</a>
          </form>
        </div>
      </div>
    </div>
  </div>
                        
                        <br>
                        <!-- <h6 style="font-weight: bold;font-size: 16px;">
                        Keterangan: TTD #1 Adalah Yang Bertanda Tangan Pada Laporan Di Posisi Kiri Sedangkan TTD #2 Sebelah Kanan</h6> -->
                        <br>
                        <div class="mbr-section-nopadding">
                            
                            <table class="gigo-responsive" style="margin-right: 10px;">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Data Muzakki</th>
                                  <th scope="col">Zakat Fitrah</th>
                                  <th scope="col">Tot. Mal</th>
                                  <th scope="col">Tot. Infaq Sedekah</th>
                                  <th scope="col">Tot. Fidyah</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>

                              <tbody>
                              <?php
                                $no=1;
                                $id=$_SESSION['id']; 
                                //$dt = mysqli_query($mysqli, "SELECT * FROM tb_setoran_zis WHERE id_user = $id order by id DESC");
                                //while($data = mysqli_fetch_array($dt)){


                                $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
                                $kolomCari=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
                                $kolomKataKunci=(isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";
                                // Jumlah data per halaman
                                $limit = 10;
                                $limitStart = ($page - 1) * $limit;
      
                                //kondisi jika parameter pencarian kosong
                                if($kolomCari=="" && $kolomKataKunci==""){
                                  $SqlQuery = mysqli_query($mysqli, "SELECT * FROM tb_setoran_zis WHERE id_user = $id order by id DESC LIMIT ".$limitStart.",".$limit);
                                }else{
                                  //kondisi jika parameter kolom pencarian diisi
                                  $SqlQuery = mysqli_query($mysqli, "SELECT * FROM tb_setoran_zis WHERE $kolomCari LIKE '%$kolomKataKunci%' AND id_user = $id order by id DESC LIMIT ".$limitStart.",".$limit);
                                }
                                
                                $no = $limitStart + 1;
                                
                                while($row = mysqli_fetch_array($SqlQuery)){ 

                              ?>
                                <tr>
                                  <td data-label="No" scope="row" ><?php echo $no; ?></td>
                                  <td data-label="Data Muzakki"><?php echo $row['nama_muzakki']; ?><br>
                                                                <b>Tgl:</b> <?php echo TanggalIndo($row['tgl']); ?><br>
                                                                <b>Tanggungan:</b> <?php echo number_format($row['jumlah_jiwa'],0); ?> Orang
                                                              </td>
                                  <td data-label="Zakat Fitrah"><b>Tot. Beras:</b> <?php echo number_format($row['zakat_fitrah_beras'],0); ?> Liter<br>
                                                                <b>Tot. Uang:</b> <br><br><a class="linkkk" href="konversi_beras.php?id=<?php echo $row['id']; ?>">Rp. <?php echo number_format($row['zakat_fitrah_uang'],0); ?></a>
                                  </td>
                                  <td data-label="Mal">Rp. <?php echo number_format($row['zakat_mal'],0); ?></td>
                                  <td data-label="Infaq Sedekah">Rp. <?php echo number_format($row['infaq_sedekah'],0); ?></td>
                                  <td data-label="Fidyah">Rp. <?php echo number_format($row['fidyah'],0); ?></td>
                                  
                                  <td data-label="Aksi">
                                    <a href="edit_penyetoran.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                                    <a href="controller.php?page=penyetoran&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger confirmation">Hapus</a>
                                  </td>
                                </tr>
                              <?php $no++; } ?>
                              
                              </tbody>

                            </table>


  <style type="text/css">
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }
    .pagination>li {
        display: inline;
    }
    ul .pagination {
        display: block;
        list-style-type: disc;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }
    li {
    display: list-item;
    text-align: -webkit-match-parent;
}
ul {
    list-style-type: disc;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
a {
    color: #337ab7;
    text-decoration: none;
}
  </style>


  <div align="left">
    <ul class="pagination">
      <?php
        // Jika page = 1, maka LinkPrev disable
        if($page == 1){ 
      ?>        
        <!-- link Previous Page disable --> 
        <li class="disabled"><a href="#">Previous</a></li>
      <?php
        }
        else{ 
          $LinkPrev = ($page > 1)? $page - 1 : 1;  

          if($kolomCari=="" && $kolomKataKunci==""){
          ?>
            <li><a href="penyetoran.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
       <?php     
          }else{
        ?> 
          <li><a href="penyetoran.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
         <?php
           } 
        }
      ?>

      <?php
        //kondisi jika parameter pencarian kosong
        if($kolomCari=="" && $kolomKataKunci==""){
          $SqlQuery = mysqli_query($mysqli, "SELECT * FROM tb_setoran_zis WHERE id_user = $id order by id DESC");
        }else{
          //kondisi jika parameter kolom pencarian diisi
          $SqlQuery = mysqli_query($mysqli, "SELECT * FROM tb_setoran_zis WHERE $kolomCari LIKE '%$kolomKataKunci%' AND id_user = $id order by id DESC");
        }     
      
        //Hitung semua jumlah data yang berada pada tabel Sisawa
        $JumlahData = mysqli_num_rows($SqlQuery);
        
        // Hitung jumlah halaman yang tersedia
        $jumlahPage = ceil($JumlahData / $limit); 
        
        // Jumlah link number 
        $jumlahNumber = 1; 

        // Untuk awal link number
        $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
        
        // Untuk akhir link number
        $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
        
        for($i = $startNumber; $i <= $endNumber; $i++){
          $linkActive = ($page == $i)? ' class="active"' : '';

          if($kolomCari=="" && $kolomKataKunci==""){
      ?>
          <li<?php echo $linkActive; ?>><a href="penyetoran.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

      <?php
        }else{
          ?>
          <li<?php echo $linkActive; ?>><a href="penyetoran.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
        }
      }
      ?>
      
      <!-- link Next Page -->
      <?php       
       if($page == $jumlahPage){ 
      ?>
        <li class="disabled"><a href="#">Next</a></li>
      <?php
      }
      else{
        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
       if($kolomCari=="" && $kolomKataKunci==""){
          ?>
            <li><a href="penyetoran.php?page=<?php echo $linkNext; ?>">Next</a></li>
       <?php     
          }else{
        ?> 
           <li><a href="penyetoran.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $linkNext; ?>">Next</a></li>
      <?php
        }
      }
      ?>
    </ul>
  </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div id="dialog_penjelasan" class="modal fade">
    <div class=" vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Penjelasan Evaluator Penilaian Proposal</h4>
                </div>
                <div class="modal-body">
                    <strong>Penjelasan Segmen 1</strong>
                    <div id="penjelasan1"></div>
                    <strong>Penjelasan Segmen 2</strong>
                    <div id="penjelasan2"></div>
                    <strong>Penjelasan Segmen 3</strong>
                    <div id="penjelasan3"></div>
                    <strong>Penjelasan Segmen 4</strong>
                    <div id="penjelasan4"></div>
                    <strong>Penjelasan Segmen 5</strong>
                    <div id="penjelasan5"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.confirmation').on('click', function(e) {
       return confirm('Anda Yakin Menghapus Data Ini?');
    });
</script>

<?php 

    function TanggalIndo($date){
    
          $BulanIndo = array( 
                            "Jan", 
                            "Feb", 
                            "Mar", 
                            "Apr", 
                            "Mei", 
                            "Jun", 
                            "Jul", 
                            "Agu", 
                            "Sep", 
                            "Okt", 
                            "Nov", 
                            "Des"
                            );

          $tahun = substr($date, 0, 4);
          $bulan = substr($date, 5, 2);
          $tgl   = substr($date, 8, 2);

          $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
          return($result);
    
    }

    function tampilhari($date){
        $day = date('D', strtotime($date));
        switch($day){
        case 'Sun':
            $hari_ini = "Minggu";
        break;

        case 'Mon':         
            $hari_ini = "Senin";
        break;

        case 'Tue':
            $hari_ini = "Selasa";
        break;

        case 'Wed':
            $hari_ini = "Rabu";
        break;

        case 'Thu':
            $hari_ini = "Kamis";
        break;

        case 'Fri':
            $hari_ini = "Jumat";
        break;

        case 'Sat':
            $hari_ini = "Sabtu";
        break;
        
        default:
            $hari_ini = "Tidak di ketahui";     
        break;
        }

        return $hari_ini;
    }

?>

<?php $tinggi = '610px'; include('template/bottom.php') ?>