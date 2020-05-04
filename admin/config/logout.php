<?php 
    
    include("base-url.php");

    session_start();
	session_destroy();
	// fungsi redirect menggunakan javascript
	echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php" </script>';
?>