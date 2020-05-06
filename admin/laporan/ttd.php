
<!--   <table style="float: right;" border="1">
  	<center>
 
  	 <br><br><br><br><br>
  	 <u>Isra Andika Bakhri</u><br>
  	 Ketua Panitia
  	 </center>
  </table> -->

<?php

      $y  = mysqli_query($mysqli, "SELECT * FROM tb_panitia_zis WHERE id_user = $id AND set_ttd1 = 'YA' AND set_ttd2 = 'TIDAK' LIMIT 1");
      $dy = mysqli_fetch_array($y);

      $x  = mysqli_query($mysqli, "SELECT * FROM tb_panitia_zis WHERE id_user = $id AND set_ttd1 = 'TIDAK' AND set_ttd2 = 'YA' LIMIT 1");
      $dx = mysqli_fetch_array($x);
?>


<br><br>
<table width="100%" border="0">
	<tr>
		<td>	
		<br><br>
		<div align="lift">
		<table style="padding-left: 30px;font-family: calibri;font-size: 15px;">
		  <tr>
		    <td style="padding-bottom: 0px;">MENGETAHUI</td>
		  </tr>
		  <tr>
		    <td style="padding-bottom: 65px;"><?php echo $dy['jabatan']; ?></td>
		  </tr>
		  <tr>
		    <td><b><u><?php echo $dy['nama']; ?></u></b></td>
		  </tr>
		</table>
		</div>
		</td>


		<td>
		<div align="right">
		<table style="padding-right: 50px;font-family: calibri;font-size: 15px;">
		  <tr>
		    <td style="padding-bottom: 20px;"><?php echo $da['kota']; ?>, <?php echo TanggalIndo2(date('Y-m-d')); ?></td>
		  </tr>
		  <tr>
		    <td style="padding-bottom: 65px;"><?php echo $dx['jabatan']; ?></td>
		  </tr>
		  <tr>
		    <td><b><u><?php echo $dx['nama']; ?></u></b></td>
		  </tr>
		</table>
		</div>
		</td>

	</tr>	
</table>