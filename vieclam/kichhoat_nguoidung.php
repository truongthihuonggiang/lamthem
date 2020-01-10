<?php
@session_start();
include 'db.php';
//	 $_POST = json_decode(file_get_contents('php://input'), true);
	if(!isset($_POST['dienthoai']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai 		= lamsach(urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ),$con); 
		$fbid 		= lamsach(urldecode( (isset($_POST['fbid'])?$_POST['fbid']:"" ) ),$con); 
		if($dienthoai != "")
		{
				$query 	= "UPDATE oc_nguoidung set kichhoat = 1 where dienthoai = '".$dienthoai."'";
				//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				echo json_encode($result);
			
		
				if($fbid != "")
				{
					//	$query 	= "UPDATE oc_nguoidung set idfacebook = '' where idfacebook = '".$fbid."'";
						//echo $query;
					//	$result = mysqli_query($con,$query) or die(mysqli_error($con));
						$query 	= "UPDATE oc_nguoidung set idfacebook = '' where dienthoai = '".$fbid."'";
						//echo $query;
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						$query 	= "UPDATE oc_nguoidung set idfacebook = '$fbid' where dienthoai = '".$dienthoai."'";
						//echo $query;
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						
						}
		}
		else
			echo -2;
	}
	else
		echo -1;
		
?>