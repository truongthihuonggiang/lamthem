<?php
include 'db.php';
//	$_POST = json_decode(file_get_contents('php://input'), true);
		
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
						$thoigian = date("Y-m-d H:i:s");
						$mt = microtime(true);
						$token = (md5($mt."@1F#"));
						$token ="homnaytoibuonquadithoinhungkhongsao";
	
	$_SESSION["token"] =$token;	
	echo $_SESSION["token"];
?>

