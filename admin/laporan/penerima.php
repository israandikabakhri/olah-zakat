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
	<title>Laporan Penerima ZIS <?php echo $dy['tahun_masehi'].'/'.$dy['tahun_hijriah']; ?></title>
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
	<style type="text/css">
		body{
			font-family: calibri;
		}
	</style>
</head>
<body>
 
    <center>
    <h1>LAPORAN RINCIAN PENERIMA ZIS <br>
      PANITIA ZAKAT FITRAH <?php echo strtoupper($da['nama']); ?> <?php echo $dy['tahun_masehi'].' M/'.$dy['tahun_hijriah'].' H'; ?><br>
        <?php echo strtoupper($da['alamat']); ?></h1>
            <b>Tanggal Cetak:</b> <?php echo TanggalIndo2(DATE('Y-m-d')).' '.date('H:i:s'); ?><br><br>
    </center>


    <center>
		<table border="1" style="width: 70%;font-family: calibri;border-collapse: collapse;">
			<tr>
				<th width="30">No</th>
				<th width="250">No KK</th>
				<th width="300">Nama Penerima</th>
				<th width="100">Jumlah Jiwa</th>
				<th>Alamat</th>
			</tr>

			<?php
	            $no=1;
	            $dt = mysqli_query($mysqli, "SELECT * FROM tb_penerima_zis WHERE id_user = $id ORDER BY nama_penerima");
	            while($d = mysqli_fetch_array($dt)){

	        ?>
			<tr>
				<td><center><?php echo $no; ?>.</td>
				<td><center><?php echo $d['no_kk']; ?></td>
				<td style="padding-left: 10px;"><?php echo $d['nama_penerima']; ?></td>
				<td><center><?php echo $d['jumlah_jiwa']; ?> Orang</td>
				<td style="padding-left: 10px;"><?php echo $d['alamat']; ?></td>
			</tr>
			<?php $no++; } ?>

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