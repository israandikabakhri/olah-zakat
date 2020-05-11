<?php 
      include "../config/auth.php"; 
      include '../config/connect-db.php';

      $id=$_SESSION['id'];
      $dt = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");
      $da = mysqli_fetch_array($dt);


      $dx = mysqli_query($mysqli, "SELECT * FROM tb_profile WHERE id = 1");
      $dy = mysqli_fetch_array($dx);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pengeluaran Panitia Zakat Fitrah <?php echo $dy['tahun_masehi'].'/'.$dy['tahun_hijriah']; ?></title>
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
	<style type="text/css">
		body{
			font-family: calibri;
		}
	</style>
</head>
<body>
 
    <center>
    <h1>LAPORAN PENGELUARAN <br>
      PANITIA ZAKAT FITRAH <?php echo strtoupper($da['nama']); ?> <?php echo $dy['tahun_masehi'].' M/'.$dy['tahun_hijriah'].' H'; ?><br>
        <?php echo strtoupper($da['alamat']); ?></h1>
            <b>Tanggal Cetak:</b> <?php echo TanggalIndo2(DATE('Y-m-d')).' '.date('H:i:s'); ?><br><br>
    </center>


    <center>
		<table border="1" style="width: 100%;font-family: calibri;border-collapse: collapse;">
			<tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Uraian</th>
          <th scope="col">Sumber Pengeluaran</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Harga Satuan</th>
          <th scope="col">Total Pengeluaran</th>
			</tr>

		 <?php
                                $no=1;$tot=0;
                                $id=$_SESSION['id'];
                                $dt = mysqli_query($mysqli, "SELECT * FROM tb_pengeluaran_panitia WHERE id_user = $id ORDER BY tgl");
                                while($data = mysqli_fetch_array($dt)){
                                $tot = $tot+$data['tot_pengeluaran'];
                              ?>
                                <tr>
                                  <td data-label="No" scope="row"><center><?php echo $no; ?></td>
                                  <td data-label="Tanggal"><center><?php echo TanggalIndo($data['tgl']); ?></td>
                                  <td data-label="Uraian"><?php echo $data['uraian']; ?></td>
                                  <td data-label="Sumber Pengeluaran"><center><?php echo $data['sumber_pengeluaran']; ?></td>
                                  <td data-label="Jumlah"><center><?php echo $data['jumlah'].' '.$data['satuan']; ?></td>
                                  <td data-label="Harga Satuan"><center>Rp. <?php echo number_format($data['harga_satuan']); ?></td>
                                  <td data-label="Total Pengeluaran"><center>Rp. <?php echo number_format($data['tot_pengeluaran']); ?></td>
                                </tr>
                              <?php $no++; } 

                                $dtx = mysqli_query($mysqli, "SELECT * FROM tb_panitia_zis WHERE id_user = $id");
                                while($xcv = mysqli_fetch_array($dtx)){
                                $tot = $tot+$xcv['intensif'];
                              ?>
                                <tr>
                                  <td data-label="No" scope="row"><center><?php echo $no; ?></td>
                                  <td data-label="Tanggal"><center><?php echo TanggalIndo($xcv['updated_at']); ?></td>
                                  <td data-label="Uraian">Intensif Panitia (<?php echo $xcv['nama']; ?>)</td>
                                  <td data-label="Sumber Pengeluaran"><center><?php echo $xcv['sumber_pengeluaran']; ?></td>
                                  <td data-label="Jumlah"><center>-</td>
                                  <td data-label="Harga Satuan"><center>-</td>
                                  <td data-label="Total Pengeluaran"><center>Rp. <?php echo number_format($xcv['intensif']); ?></td>
                                </tr>
                              <?php $no++; } ?>

		  <tr>
        <td colspan="6" style="text-align: right;padding-right: 10px;"><b>TOTAL</b></td>
        <td style="text-align: center;"><b>Rp. <?php echo number_format($tot,0); ?></b></td>  
      </tr>

    </table> 


    </center>

  <?php include 'ttd.php'; ?>

<?php 

    function TanggalIndo($date){
    
          $BulanIndo = array( 
                            "01", 
                            "02", 
                            "03", 
                            "04", 
                            "05", 
                            "06", 
                            "07", 
                            "08", 
                            "09", 
                            "10", 
                            "11", 
                            "12"
                            );

          $tahun = substr($date, 2, 2);
          $bulan = substr($date, 5, 2);
          $tgl   = substr($date, 8, 2);

          $result = $tgl . "/" . $BulanIndo[(int)$bulan-1] . "/". $tahun;   
          return($result);
    
    }


    function TanggalIndo2($date){
    
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

?>


</body>
</html>