<?php
@session_start();
include 'db.php';
//	 $_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai 		= lamsach(urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:0 ) ),$con); 
		$contrycode 		= lamsach(urldecode( (isset($_POST['contrycode'])?$_POST['contrycode']:"" ) ),$con); 
		$matkhau 		= lamsach(urldecode( (isset($_POST['matkhau'])?$_POST['matkhau']:0 ) ),$con); 
		
		/*$contrycode="84";
		$dienthoai="84911155078";
		$matkhau="12345678";
		*/
		$matkhau = md5($matkhau . "!@1a3B");
		$dienthoai1 = "0".substr($dienthoai,2);
		$dienthoai2 = $contrycode."0".substr($dienthoai,2);
		

		if($dienthoai != "")
		{
				$query 	= "UPDATE oc_nguoidung set matkhau = '' where dienthoai = '$dienthoai' or dienthoai = 
				'$dienthoai1' or dienthoai = '$dienthoai2'";
				//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$query 	= "UPDATE oc_nguoidung set matkhau = '$matkhau' where dienthoai = '$dienthoai'
				or dienthoai = '$dienthoai1' or dienthoai = '$dienthoai2'";
			//	echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				echo mysqli_affected_rows($con);
			
		}
		else
			echo 0;
	}
	else
		echo 0;
		
?>