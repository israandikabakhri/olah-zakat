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
	<title>Laporan Penyetor ZIS <?php echo $dy['tahun_masehi'].'/'.$dy['tahun_hijriah']; ?></title>
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
	<style type="text/css">
		body{
			font-family: calibri;
		}
	</style>
</head>
<body>
 
 
    <center>
		<h1>LAPORAN RINCIAN MUZAKKI/PENYETOR ZIS <br>
			PANITIA ZAKAT FITRAH <?php echo strtoupper($da['nama']); ?> <?php echo $dy['tahun_masehi'].' M/'.$dy['tahun_hijriah'].' H'; ?><br>
		    <?php echo strtoupper($da['alamat']); ?></h1>
            <b>Tanggal Cetak:</b> <?php echo TanggalIndo2(DATE('Y-m-d')).' '.date('H:i:s'); ?><br><br>
	</center>

	<table border="1" style="width: 100%;font-family: calibri;border-collapse: collapse;">
		<tr>
			<th rowspan="2" width="30">No</th>
			<th rowspan="2" width="60">Tanggal</th>
			<th rowspan="2" width="200">Nama Muzakki</th>
			<th rowspan="2" >Alamat</th>
			<th rowspan="2" width="80">Jumlah Jiwa</th>
			<th colspan="2">Zakat Fitrah</th>
			<th rowspan="2" width="120">Zakat Mal</th>
			<th rowspan="2" width="200">Infaq/Sedekah</th>
			<th rowspan="2" width="120">Fidyah</th>
		</tr>
		<tr>
			<th width="80">Beras</th>
			<th width="120">Uang</th>
		</tr>

		<?php
            $no=1;
            $masjid=0;
            $fakir=0;
            $yatim=0;
            $dt = mysqli_query($mysqli, "SELECT * FROM tb_setoran_zis WHERE id_user = $id ORDER BY tgl");
            while($d = mysqli_fetch_array($dt)){

            if($d['arah_infaqsedekah']=="MASJID"){ $masjid = $masjid + $d['infaq_sedekah']; }	
            elseif($d['arah_infaqsedekah']=="FAKIR/MISKIN"){ $fakir = $fakir + $d['infaq_sedekah']; }	
            elseif($d['arah_infaqsedekah']=="YATIM PIATU"){ $yatim = $yatim + $d['infaq_sedekah']; }	
        ?>
		<tr>
			<td><center><?php echo $no; ?>.</td>
			<td><center><?php echo TanggalIndo($d['tgl']); ?></td>
			<td style="padding-left: 10px;"><?php echo $d['nama_muzakki']; ?></td>
			<td style="padding-left: 10px;"><?php echo $d['alamat']; ?></td>
			<td><center><?php echo $d['jumlah_jiwa']; ?> Orang</td>
			<td><center><?php echo $d['zakat_fitrah_beras']; ?> Liter</td>
			<td><center>Rp. <?php echo number_format($d['zakat_fitrah_uang'],0); ?></td>
			<td><center>Rp. <?php echo number_format($d['zakat_mal'],0); ?></td>
			<td><center>Rp. <?php echo number_format($d['infaq_sedekah'],0).'<br>(Ke '.strtolower(ucwords($d['arah_infaqsedekah'])).')'; ?></td>
			<td><center>Rp. <?php echo number_format($d['fidyah'],0); ?></td>
		</tr>
		<?php $no++; } ?>

		<?php
            $no=1;
            $ds = mysqli_query($mysqli, "SELECT 
										  SUM(jumlah_jiwa) AS tot_jml_jiwa, 
										  SUM(zakat_fitrah_uang) AS tot_fitrah_uang,
										  SUM(zakat_fitrah_beras) AS tot_fitrah_beras,
										  SUM(zakat_mal) AS tot_zakat_mal,
										  SUM(infaq_sedekah) AS tot_infaq_sedekah,
										  SUM(fidyah) AS tot_fidyah
										FROM tb_setoran_zis 
										WHERE id_user = $id ");
            $dd = mysqli_fetch_array($ds);
        ?>

		<tr>
			<th colspan="4">Total</th>
			<th><?php echo $dd['tot_jml_jiwa']; ?> Orang</th>
			<th><?php echo $dd['tot_fitrah_beras']; ?> Liter</th>
			<th>Rp. <?php echo number_format($dd['tot_fitrah_uang'],0); ?></th>
			<th>Rp. <?php echo number_format($dd['tot_zakat_mal'],0); ?></th>
			<td style="text-align: left;font-size: 14px;">
				<table>
					<tr>
						<td><b>Masjid</td>
						<td>:</td>
						<td>Rp. <?php echo number_format($masjid,0); ?></td>
					</tr>
					<tr>
						<td><b>Fakir/Miskin</td>
						<td>:</td>
						<td>Rp. <?php echo number_format($fakir,0); ?></td>
					</tr>
					<tr>
						<td><b>Yatim Piatu</td>
						<td>:</td>
						<td>Rp. <?php echo number_format($miskin,0); ?></td>
					</tr>
					<tr>
						<td><b>Total Semua</td>
						<td>:</td>
						<td>Rp. <?php echo number_format($dd['tot_infaq_sedekah'],0); ?></td>
					</tr>
			    </table>
			</td>
			<th>Rp. <?php echo number_format($dd['tot_fidyah'],0); ?></th>
		</tr>

	</table>

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