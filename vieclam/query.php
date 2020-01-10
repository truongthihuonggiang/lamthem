<?php
@session_start();
ini_set('display_errors', 1);

include 'db.php';
	//$_POST = json_decode(file_get_contents('php://input'), true);
	$token 		= mysqli_real_escape_string($con, (isset($_POST['token'])?$_POST['token']:0 ) ); 	
	$query = "ALTER TABLE oc_dangnhap DROP PRIMARY KEY, ADD PRIMARY KEY(dienthoai, ungdung, tenmay)";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
				
		
?>