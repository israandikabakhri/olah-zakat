<?php 
      include "../config/auth.php"; 
      include '../config/connect-db.php';

      $id=$_SESSION['id'];
      $dt = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");
      $da = mysqli_fetch_array($dt);


      $dx = mysqli_query($mysqli, "SELECT * FROM tb_profile WHERE id = 1");
      $dy = mysqli_fetch_array($dx);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cetak Kupon ZIS <?php echo $dy['tahun_masehi'].'/'.$dy['tahun_hijriah']; ?></title>
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
  <style type="text/css">
    body{
      font-family: calibri;
    }
  </style>
<style type="text/css">
<!--
.garis_tepi1 {     border: 4px solid black;
}
-->
</style>
</head>

<body>
<table width="916" height="1609" align="center">
  <tr>
    <td><table  class="garis_tepi1">
      <tr>
        <td colspan="4"><div align="center">PANITIA ZAKAT FITRAH &amp; SHADAQOH <?php echo strtoupper($dy['tahun_hijriah']); ?> H </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center"><?php echo strtoupper($da['nama']); ?> </div></td>
      </tr>
      <tr>
        <td height="40" colspan="4"><div align="center"><b>
          <hr thick="thick"/>
          KUPON ZAKAT</b> </div></td>
      </tr>
      <tr>
        <td width="73" height="38" ><div align="left">NO</div></td>
        <td width="13" ><div align="center">:</div></td>
        <td width="204" ><input type="text" name="no_kupon" /></td>
        <td width="83" >&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">WILAYAH</div></td>
        <td><div align="center">:</div></td>
        <td> </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>Panitia Zakat </td>
      </tr>
      <tr>
        <td height="48">Catatan</td>
        <td><div align="center">:</div></td>
        <td style="font-size: 12px;">Untuk Pengambilan Zakat Tidak Dapat Diwakili </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><hr /></td>
      </tr>
    </table></td>
    <td><table  class="garis_tepi1">
      <tr>
        <td colspan="4"><div align="center">PANITIA ZAKAT FITRAH &amp; SHADAQOH <?php echo strtoupper($dy['tahun_hijriah']); ?> H </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center"><?php echo strtoupper($da['nama']); ?> </div></td>
      </tr>
      <tr>
        <td height="40" colspan="4"><div align="center"><b>
          <hr thick="thick"/>
          KUPON ZAKAT</b> </div></td>
      </tr>
      <tr>
        <td width="73" height="38" ><div align="left">NO</div></td>
        <td width="13" ><div align="center">:</div></td>
        <td width="204" ><input type="text" name="no_kupon2" /></td>
        <td width="83" >&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">WILAYAH</div></td>
        <td><div align="center">:</div></td>
        <td> </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>Panitia Zakat </td>
      </tr>
      <tr>
        <td height="48">Catatan</td>
        <td><div align="center">:</div></td>
        <td style="font-size: 12px;">Untuk Pengambilan Zakat Tidak Dapat Diwakili </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><hr /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table  class="garis_tepi1">
      <tr>
        <td colspan="4"><div align="center">PANITIA ZAKAT FITRAH &amp; SHADAQOH <?php echo strtoupper($dy['tahun_hijriah']); ?> H </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center"><?php echo strtoupper($da['nama']); ?> </div></td>
      </tr>
      <tr>
        <td height="40" colspan="4"><div align="center"><b>
          <hr thick="thick"/>
          KUPON ZAKAT</b> </div></td>
      </tr>
      <tr>
        <td width="73" height="38" ><div align="left">NO</div></td>
        <td width="13" ><div align="center">:</div></td>
        <td width="204" ><input type="text" name="no_kupon3" /></td>
        <td width="83" >&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">WILAYAH</div></td>
        <td><div align="center">:</div></td>
        <td> </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>Panitia Zakat </td>
      </tr>
      <tr>
        <td height="48">Catatan</td>
        <td><div align="center">:</div></td>
        <td style="font-size: 12px;">Untuk Pengambilan Zakat Tidak Dapat Diwakili </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><hr /></td>
      </tr>
    </table></td>
    <td><table  class="garis_tepi1">
      <tr>
        <td colspan="4"><div align="center">PANITIA ZAKAT FITRAH &amp; SHADAQOH <?php echo strtoupper($dy['tahun_hijriah']); ?> H </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center"><?php echo strtoupper($da['nama']); ?> </div></td>
      </tr>
      <tr>
        <td height="40" colspan="4"><div align="center"><b>
          <hr thick="thick"/>
          KUPON ZAKAT</b> </div></td>
      </tr>
      <tr>
        <td width="73" height="38" ><div align="left">NO</div></td>
        <td width="13" ><div align="center">:</div></td>
        <td width="204" ><input type="text" name="no_kupon4" /></td>
        <td width="83" >&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">WILAYAH</div></td>
        <td><div align="center">:</div></td>
        <td> </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>Panitia Zakat </td>
      </tr>
      <tr>
        <td height="48">Catatan</td>
        <td><div align="center">:</div></td>
        <td style="font-size: 12px;">Untuk Pengambilan Zakat Tidak Dapat Diwakili </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><hr /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table  class="garis_tepi1">
      <tr>
        <td colspan="4"><div align="center">PANITIA ZAKAT FITRAH &amp; SHADAQOH <?php echo strtoupper($dy['tahun_hijriah']); ?> H </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center"><?php echo strtoupper($da['nama']); ?> </div></td>
      </tr>
      <tr>
        <td height="40" colspan="4"><div align="center"><b>
          <hr thick="thick"/>
          KUPON ZAKAT</b> </div></td>
      </tr>
      <tr>
        <td width="73" height="38" ><div align="left">NO</div></td>
        <td width="13" ><div align="center">:</div></td>
        <td width="204" ><input type="text" name="no_kupon5" /></td>
        <td width="83" >&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">WILAYAH</div></td>
        <td><div align="center">:</div></td>
        <td> </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>Panitia Zakat </td>
      </tr>
      <tr>
        <td height="48">Catatan</td>
        <td><div align="center">:</div></td>
        <td style="font-size: 12px;">Untuk Pengambilan Zakat Tidak Dapat Diwakili </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><hr /></td>
      </tr>
    </table></td>
    <td><table  class="garis_tepi1">
      <tr>
        <td colspan="4"><div align="center">PANITIA ZAKAT FITRAH &amp; SHADAQOH <?php echo strtoupper($dy['tahun_hijriah']); ?> H </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center"><?php echo strtoupper($da['nama']); ?> </div></td>
      </tr>
      <tr>
        <td height="40" colspan="4"><div align="center"><b>
          <hr thick="thick"/>
          KUPON ZAKAT</b> </div></td>
      </tr>
      <tr>
        <td width="73" height="38" ><div align="left">NO</div></td>
        <td width="13" ><div align="center">:</div></td>
        <td width="204" ><input type="text" name="no_kupon6" /></td>
        <td width="83" >&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">WILAYAH</div></td>
        <td><div align="center">:</div></td>
        <td> </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>Panitia Zakat </td>
      </tr>
      <tr>
        <td height="48">Catatan</td>
        <td><div align="center">:</div></td>
        <td style="font-size: 12px;">Untuk Pengambilan Zakat Tidak Dapat Diwakili </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><hr /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table  class="garis_tepi1">
      <tr>
        <td colspan="4"><div align="center">PANITIA ZAKAT FITRAH &amp; SHADAQOH <?php echo strtoupper($dy['tahun_hijriah']); ?> H </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center"><?php echo strtoupper($da['nama']); ?> </div></td>
      </tr>
      <tr>
        <td height="40" colspan="4"><div align="center"><b>
          <hr thick="thick"/>
          KUPON ZAKAT</b> </div></td>
      </tr>
      <tr>
        <td width="73" height="38" ><div align="left">NO</div></td>
        <td width="13" ><div align="center">:</div></td>
        <td width="204" ><input type="text" name="no_kupon7" /></td>
        <td width="83" >&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">WILAYAH</div></td>
        <td><div align="center">:</div></td>
        <td> </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>Panitia Zakat </td>
      </tr>
      <tr>
        <td height="48">Catatan</td>
        <td><div align="center">:</div></td>
        <td style="font-size: 12px;">Untuk Pengambilan Zakat Tidak Dapat Diwakili </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><hr /></td>
      </tr>
    </table></td>
    <td><table  class="garis_tepi1">
      <tr>
        <td colspan="4"><div align="center">PANITIA ZAKAT FITRAH &amp; SHADAQOH <?php echo strtoupper($dy['tahun_hijriah']); ?> H </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center"><?php echo strtoupper($da['nama']); ?> </div></td>
      </tr>
      <tr>
        <td height="40" colspan="4"><div align="center"><b>
          <hr thick="thick"/>
          KUPON ZAKAT</b> </div></td>
      </tr>
      <tr>
        <td width="73" height="38" ><div align="left">NO</div></td>
        <td width="13" ><div align="center">:</div></td>
        <td width="204" ><input type="text" name="no_kupon8" /></td>
        <td width="83" >&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">WILAYAH</div></td>
        <td><div align="center">:</div></td>
        <td> </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>Panitia Zakat </td>
      </tr>
      <tr>
        <td height="48">Catatan</td>
        <td><div align="center">:</div></td>
        <td style="font-size: 12px;">Untuk Pengambilan Zakat Tidak Dapat Diwakili </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><hr /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
