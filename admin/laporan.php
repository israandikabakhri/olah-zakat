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
                    <div class="mbr-section-full col-md-8 col-lg-8">
                        <h1 class="mbr-section-title display-2" style="padding-top: 90px;">Cetak Laporan & Kupon</h1>
                        
                        <br>
                        <div class="mbr-section-nopadding">
                            
                            <table class="gigo-responsive" style="margin-right: 10px;">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Laporan</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>

                              <tbody>
                              
                                <!-- <tr>
                                  <td data-label="No" scope="row" >1</td>
                                  <td data-label="Nama Laporam">Laporan Dashboard Analisis</td>
                                  <td data-label="Aksi">
                                    <a href="laporan/dashboard.php" target="_blank" class="btn btn-success">Cetak</a>
                                  </td>
                                </tr> -->

                                <tr>
                                  <td data-label="No" scope="row" >1</td>
                                  <td data-label="Nama Laporam">Laporan Rincian Muzakki/Penyetor ZIS</td>
                                  <td data-label="Aksi">
                                    <a href="laporan/penyetor.php" target="_blank" class="btn btn-success">Cetak</a>
                                  </td>
                                </tr>
                              <!-- 
                                <tr>
                                  <td data-label="No" scope="row" >3</td>
                                  <td data-label="Nama Laporam">Laporan Rincian Penerima ZIS</td>
                                  <td data-label="Aksi">
                                    <a href="laporan/penerima.php" target="_blank" class="btn btn-success">Cetak</a>
                                  </td>
                                </tr> -->
                              
                                <!-- <tr>
                                  <td data-label="No" scope="row" >2</td>
                                  <td data-label="Nama Laporam">Laporan Pertanggujawaban ZIS</td>
                                  <td data-label="Aksi">
                                    <a href="laporan/realisasi.php" target="_blank" class="btn btn-success">Cetak</a>
                                  </td>
                                </tr> -->

                                <tr>
                                  <td data-label="No" scope="row" >2</td>
                                  <td data-label="Nama Laporam">Cetak Kupon Penerima ZIS</td>
                                  <td data-label="Aksi">
                                    <a href="laporan/kupon.php" target="_blank" class="btn btn-success">Cetak</a>
                                  </td>
                                </tr>

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