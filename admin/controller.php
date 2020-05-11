<?php
    

    include 'config/auth.php';
    include 'config/connect-db.php';
    include 'config/base-url.php';


	$page    = $_GET['page'];
	$action  = $_GET['action'];    

 
    /// PANITIA
	if($page == "panitia" && $action == "insert")
	{
		  
		  $id_user  		  = $_SESSION['id'];
		  $nama     		  = $_POST['nama'];
		  $jabatan  		  = $_POST['jabatan'];
		  $set_ttd1 		  = $_POST['set_ttd1'];
		  $set_ttd2 		  = $_POST['set_ttd2'];
		  $intensif 		  = $_POST['intensif'];
		  $sumber_pengeluaran = $_POST['sumber_pengeluaran'];

		  $result = mysqli_query($mysqli, "INSERT INTO tb_panitia_zis (id, id_user, nama, jabatan, set_ttd1, set_ttd2, intensif, sumber_pengeluaran) 
			                               VALUES(null, $id_user, '$nama', '$jabatan', '$set_ttd1', '$set_ttd2', '$intensif', '$sumber_pengeluaran')");
		  
		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/panitia.php" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "panitia" && $action == "update")
	{

		  $id                 = $_POST['id'];
		  $nama     		  = $_POST['nama'];
		  $jabatan  		  = $_POST['jabatan'];
		  $set_ttd1 		  = $_POST['set_ttd1'];
		  $set_ttd2 		  = $_POST['set_ttd2'];
		  $intensif 		  = $_POST['intensif'];
		  $sumber_pengeluaran = $_POST['sumber_pengeluaran'];



				  $result = mysqli_query($mysqli, "UPDATE tb_panitia_zis
				  									SET 
				  									   nama     		  = '$nama',
				  									   jabatan  		  = '$jabatan',
				  									   set_ttd1 		  = '$set_ttd1',
				  									   set_ttd2 		  = '$set_ttd2',
				  									   intensif 		  = '$intensif',
				  									   sumber_pengeluaran = '$sumber_pengeluaran'
				  									   WHERE id = $id
				  									") or die(mysqli_error($mysqli));



		  
		  if(isset($result)){ 

		      		echo '<script language="javascript"> 
		      				window.location.href = "'.$base_url_back.'/panitia.php" 
		      			 </script>';

		  }else{

			      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  	  echo "<br><br><a href='artikel.php'>Kembali</a>";
			  
		  
		  }

	}elseif($page == "panitia" && $action == "delete")
	{

		  $ID = $_GET['id'];


				  $result = mysqli_query($mysqli, "DELETE FROM tb_panitia_zis WHERE id = $ID
				  									") or die(mysqli_error($mysqli));

		  
		  if(isset($result)){ 

		      		echo '<script language="javascript"> 
		      				window.location.href = "'.$base_url_back.'/panitia.php" 
		      			 </script>';

		  }else{

			      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  	  echo "<br><br><a href='artikel.php'>Kembali</a>";
			  
		  
		  }


    /// PENYETORAN
	}elseif($page == "penyetoran" && $action == "insert")
	{
		  
		  $id_user             = $_SESSION['id'];
		  $tgl                 = $_POST['tgl'];
		  $nama_muzakki        = $_POST['nama_muzakki'];
		  $alamat              = $_POST['alamat'];
		  $jumlah_jiwa         = $_POST['jumlah_jiwa'];
		  $zakat_fitrah_beras  = $_POST['zakat_fitrah_beras'];	  
		  $harga_beras_dimakan = $_POST['harga_beras_dimakan'];
		  $zakat_fitrah_uang   = $_POST['zakat_fitrah_uang'];
		  $zakat_fitrah_uang_  = $_POST['zakat_fitrah_uang'];
		  $zakat_mal		   = $_POST['zakat_mal'];
		  $infaq_sedekah       = $_POST['infaq_sedekah'];
		  $arah_infaqsedekah   = $_POST['arah_infaqsedekah'];
		  $fidyah              = $_POST['fidyah'];

		  $result = mysqli_query($mysqli, "INSERT INTO tb_setoran_zis 
		  	                                (id, id_user, tgl, nama_muzakki, alamat, jumlah_jiwa, zakat_fitrah_beras, harga_beras_dimakan,
		  	                                zakat_fitrah_uang, zakat_mal, infaq_sedekah, arah_infaqsedekah, fidyah, zakat_fitrah_uang_) 
			                                VALUES
			                                (null, $id_user, '$tgl', '$nama_muzakki', '$alamat', '$jumlah_jiwa', '$zakat_fitrah_beras', 
			                                '$harga_beras_dimakan', '$zakat_fitrah_uang', '$zakat_mal', '$infaq_sedekah', '$arah_infaqsedekah', '$fidyah', '$zakat_fitrah_uang_')");
		  
		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/penyetoran.php" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "penyetoran" && $action == "update")
	{

		  $id                  = $_POST['id'];
		  $tgl                 = $_POST['tgl'];
		  $nama_muzakki        = $_POST['nama_muzakki'];
		  $alamat              = $_POST['alamat'];
		  $jumlah_jiwa         = $_POST['jumlah_jiwa'];
		  $zakat_fitrah_beras  = $_POST['zakat_fitrah_beras'];		  
		  $harga_beras_dimakan = $_POST['harga_beras_dimakan'];
		  $zakat_fitrah_uang   = $_POST['zakat_fitrah_uang'];
		  $zakat_mal		   = $_POST['zakat_mal'];
		  $infaq_sedekah       = $_POST['infaq_sedekah'];
		  $arah_infaqsedekah   = $_POST['arah_infaqsedekah'];
		  $fidyah              = $_POST['fidyah'];



				  $result = mysqli_query($mysqli, "UPDATE tb_setoran_zis
				  									SET 
				  									   tgl                 = '$tgl',
				  									   nama_muzakki        = '$nama_muzakki',
				  									   alamat 			   = '$alamat',
				  									   jumlah_jiwa 		   = '$jumlah_jiwa',
				  									   zakat_fitrah_beras  = '$zakat_fitrah_beras',
				  									   harga_beras_dimakan = '$harga_beras_dimakan',
				  									   zakat_fitrah_uang   = '$zakat_fitrah_uang',
				  									   zakat_mal 		   = '$zakat_mal',
				  									   infaq_sedekah 	   = '$infaq_sedekah',
				  									   arah_infaqsedekah   = '$arah_infaqsedekah',
				  									   fidyah 			   = '$fidyah'
				  									   WHERE id = $id
				  									") or die(mysqli_error($mysqli));



		  
		  if(isset($result)){ 

		      		echo '<script language="javascript"> 
		      				window.location.href = "'.$base_url_back.'/penyetoran.php" 
		      			 </script>';

		  }else{

			      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  	  echo "<br><br><a href='artikel.php'>Kembali</a>";
			  
		  
		  }

	}elseif($page == "penyetoran" && $action == "delete")
	{

		  $ID = $_GET['id'];


				  $result = mysqli_query($mysqli, "DELETE FROM tb_setoran_zis WHERE id = $ID
				  									") or die(mysqli_error($mysqli));

		  
		  if(isset($result)){ 

		      		echo '<script language="javascript"> 
		      				window.location.href = "'.$base_url_back.'/penyetoran.php" 
		      			 </script>';

		  }else{

			      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  	  echo "<br><br><a href='artikel.php'>Kembali</a>";
			  
		  
		  }


	
	}elseif($page == "penyetoran" && $action == "konversi")
	{


          $dt  = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $_SESSION[id]");
          $dx  = mysqli_fetch_array($dt);
          $brs = $dx['set_beras_muzakki']; 

		  $id    		= $_POST['id'];
		  $harga_beras  = $_POST['harga_beras'];		  
		  $zakat_beras  = $_POST['zakat_beras'];		  
		  $zakat_uang   = $_POST['zakat_uang'];		  
		  $beras  		= $_POST['beras'];		  
		  $uang  		= $_POST['uang'];

		  if($_POST['konv']=="uang2beras"){
		 
		  	$zakat_fitrah_beras  = $zakat_beras + ($beras * $brs);	
		  	$zakat_fitrah_uang   = $zakat_uang  - ($beras * $brs * $harga_beras);
		 
		  }elseif($_POST['konv']=="beras2uang"){

		  	$zakat_fitrah_beras  = $zakat_beras - ($uang * $brs);	
		  	$zakat_fitrah_uang   = $zakat_uang  + ($uang * $brs * $harga_beras);
		 
		  }



		  $result = mysqli_query($mysqli, "UPDATE tb_setoran_zis
				  						   SET 
				  								zakat_fitrah_beras  = '$zakat_fitrah_beras',
				  								zakat_fitrah_uang   = '$zakat_fitrah_uang'
				  								WHERE id = $id
				  							") or die(mysqli_error($mysqli));



		  
		  if(isset($result)){ 

		      		echo '<script language="javascript"> 
		      				window.location.href = "'.$base_url_back.'/konversi_beras.php?id='.$id.'" 
		      			 </script>';

		  }else{

			      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  	  echo "<br><br><a href='artikel.php'>Kembali</a>";
			  
		  
		  }

	/// PENERIMA
	}elseif($page == "penerima" && $action == "insert")
	{
		  
		  $id_user       = $_SESSION['id'];
		  $no_kupon      = $_POST['no_kupon'];

		  $result = mysqli_query($mysqli, "INSERT INTO tb_penerimaan_kupon (id_user, no_kupon) 
			                               VALUES($id_user, $no_kupon)");

		  $xc     = mysqli_query($mysqli, "SELECT COUNT(*) as t FROM tb_penerimaan_kupon WHERE id_user = $id_user");
		  $data   = mysqli_fetch_array($xc);

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/penerima.php?s=good&d='.$data['t'].'" </script>';
		  }else{
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/penerima.php?s=bad&d='.$data['t'].'" </script>';
		  }


    // pengeluaran panitia 
	}elseif($page == "pengeluaran_panitia" && $action == "insert")
	{
		  

		  $id_user            = $_SESSION['id'];
		  $uraian             = $_POST['uraian'];
		  $tgl                = $_POST['tgl'];
		  $jumlah             = $_POST['jumlah'];
		  $satuan             = $_POST['satuan'];
		  $harga_satuan       = $_POST['harga_satuan'];
		  $tot_pengeluaran    = $_POST['jumlah']*$_POST['harga_satuan'];
		  $sumber_pengeluaran = $_POST['sumber_pengeluaran'];


		  $result = mysqli_query($mysqli, "INSERT INTO tb_pengeluaran_panitia (id, id_user, uraian, tgl, jumlah, satuan, harga_satuan, tot_pengeluaran, sumber_pengeluaran) 
			                               VALUES(null, $id_user, '$uraian', '$tgl', $jumlah, '$satuan', $harga_satuan, $tot_pengeluaran, '$sumber_pengeluaran')");
		  
		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/pengeluaran_panitia.php" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }
	  

	}elseif($page == "pengeluaran_panitia" && $action == "update")
	{

		  $id                 = $_POST['id'];
		  $uraian             = $_POST['uraian'];
		  $tgl                = $_POST['tgl'];
		  $jumlah             = $_POST['jumlah'];
		  $satuan             = $_POST['satuan'];
		  $harga_satuan       = $_POST['harga_satuan'];
		  $tot_pengeluaran    = $_POST['jumlah']*$_POST['harga_satuan'];
		  $sumber_pengeluaran = $_POST['sumber_pengeluaran'];



				  $result = mysqli_query($mysqli, "UPDATE tb_pengeluaran_panitia
				  									SET 
				  									   uraian              = '$uraian',
				  									   tgl                 = '$tgl',
				  									   jumlah              = $jumlah,
				  									   satuan       	   = '$satuan',
				  									   harga_satuan 	   = $harga_satuan,
				  									   tot_pengeluaran 	   = $tot_pengeluaran,
				  									   sumber_pengeluaran  = '$sumber_pengeluaran'
				  									   WHERE id = $id
				  									") or die(mysqli_error($mysqli));



		  
		  if(isset($result)){ 

		      		echo '<script language="javascript"> 
		      				window.location.href = "'.$base_url_back.'/pengeluaran_panitia.php" 
		      			 </script>';

		  }else{

			      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  	  echo "<br><br><a href='artikel.php'>Kembali</a>";
			  
		  
		  }


	}elseif($page == "pengeluaran_panitia" && $action == "delete")
	{

		  $ID = $_GET['id'];


				  $result = mysqli_query($mysqli, "DELETE FROM tb_pengeluaran_panitia WHERE id = $ID
				  									") or die(mysqli_error($mysqli));

		  
		  if(isset($result)){ 

		      		echo '<script language="javascript"> 
		      				window.location.href = "'.$base_url_back.'/pengeluaran_panitia.php" 
		      			 </script>';

		  }else{

			      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  	  echo "<br><br><a href='artikel.php'>Kembali</a>";
			  
		  
		  }


	
	}
	

?>