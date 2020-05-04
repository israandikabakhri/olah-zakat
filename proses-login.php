<?php

//* Includde Koneksi Ke database
include_once("admin/config/connect-db.php");

//* Include Base Url
include_once("admin/config/base-url.php");


	$username = $_POST['username'];
	$pass     = md5($_POST['password']);

	$login = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username' AND password='$pass'");
	$row=mysqli_fetch_array($login);
	if ($row['username'] == $username AND $row['password'] == $pass)
	{


	   session_start();
	   $_SESSION['id']          = $row['id'];
	   $_SESSION['nama']        = $row['nama'];
	   $_SESSION['username']    = $row['username'];
	   $_SESSION['password']    = $row['password'];
	   $_SESSION['hak_akses']   = $row['hak_akses'];
	  
	  // Jika Sukses, redirect halaman menggunakan javascript
	  echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php" </script>';

	}

	else  
	{

	  // Jika Sukses, redirect halaman menggunakan javascript
	  //echo '<script language="javascript"> alert("Username atau Password Anda Salah!"); </script>';
	  echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/login.php?sts=false" </script>';

	}

?>