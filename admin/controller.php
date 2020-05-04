<?php
    
    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';
 
	$page    = $_GET['page'];
	$action  = $_GET['action'];

	if($page == "panitia" && $action == "insert")
	{
		  
		  $id_user  = $_SESSION['id'];
		  $nama     = $_POST['nama'];
		  $jabatan  = $_POST['jabatan'];
		  $set_ttd1 = $_POST['set_ttd1'];
		  $set_ttd2 = $_POST['set_ttd2'];
		  $intensif = $_POST['intensif'];

		  $result = mysqli_query($mysqli, "INSERT INTO tb_panitia_zis (id, id_user, nama, jabatan, set_ttd1, set_ttd2, intensif) 
			                               VALUES(null, $id_user, '$nama', '$jabatan', '$set_ttd1', '$set_ttd2', '$intensif')");
		  
		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/panitia.php" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "panitia" && $action == "update")
	{

		  $id       = $_POST['id'];
		  $nama     = $_POST['nama'];
		  $jabatan  = $_POST['jabatan'];
		  $set_ttd1 = $_POST['set_ttd1'];
		  $set_ttd2 = $_POST['set_ttd2'];
		  $intensif = $_POST['intensif'];



				  $result = mysqli_query($mysqli, "UPDATE tb_panitia_zis
				  									SET 
				  									   nama     = '$nama',
				  									   jabatan  = '$jabatan',
				  									   set_ttd1 = '$set_ttd1',
				  									   set_ttd2 = '$set_ttd2',
				  									   intensif = '$intensif'
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

	}
	

?>