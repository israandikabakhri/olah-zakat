<?php 
	session_start();
    
    include("base-url.php");

	if(!isset($_SESSION['username'])){
		// fungsi redirect menggunakan javascript
		echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php" </script>';
	}

?>