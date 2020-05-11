<?php include('template/top.php') ?>


<style type="text/css">
  .vc{
    font-size: 17px;
  }
</style>


    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">
            <div class="container-fluid">
                <div class="row">
                    <div class="mbr-section-full col-md-12 col-lg-11">
                        <h1 class="mbr-section-title display-2" style="padding-top: 90px;">Data Panitia</h1>
                        
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><a href="tambah_panitia.php" name="Update" class="col-xs-12 btn btn-lg btn-warning"><span class="fa fa-plus"></span>&nbsp;TAMBAH PANITIA</a></div>
                        
                        <br>
                        <h6 style="font-weight: bold;font-size: 16px;">
                        Keterangan: TTD #1 Adalah Yang Bertanda Tangan Pada Laporan Di Posisi Kiri Sedangkan TTD #2 Sebelah Kanan</h6>
                        <br>
                        <div class="mbr-section-nopadding">
                            
                            <table class="gigo-responsive" style="margin-right: 10px;">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Jabatan</th>
                                  <th scope="col">TTD #1</th>
                                  <th scope="col">TTD #2</th>
                                  <th scope="col">Intensif</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>

                              <tbody>
                              <?php
                                $no=1;
                                $id=$_SESSION['id'];
                                $dt = mysqli_query($mysqli, "SELECT * FROM tb_panitia_zis WHERE id_user = $id");
                                while($data = mysqli_fetch_array($dt)){
                              ?>
                                <tr>
                                  <td data-label="No" scope="row" ><?php echo $no; ?></td>
                                  <td data-label="Nama"><?php echo $data['nama']; ?></td>
                                  <td data-label="Jabatan"><?php echo $data['jabatan']; ?></td>
                                  <td data-label="TTD #1"><?php echo $data['set_ttd1']; ?></td>
                                  <td data-label="TTD #2"><?php echo $data['set_ttd2']; ?></td>
                                  <td data-label="Intensif">Rp. <?php echo number_format($data['intensif'],0).'<br><b>('.$data['sumber_pengeluaran'].')'; ?></td>
                                  
                                  <td data-label="Aksi">
                                    <a href="edit_panitia.php?id=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a>
                                    <a href="controller.php?page=panitia&action=delete&id=<?php echo $data['id']; ?>" class="btn btn-danger confirmation">Hapus</a>
                                  </td>
                                </tr>
                              <?php $no++; } ?>
                              
                              </tbody>

                            </table>


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
                            "Januari", 
                            "Februari", 
                            "Maret", 
                            "April", 
                            "Mei", 
                            "Juni", 
                            "Juli", 
                            "Agustus", 
                            "September", 
                            "Oktober", 
                            "November", 
                            "Desember"
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