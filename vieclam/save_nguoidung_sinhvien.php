<?php
@session_start();
include 'db.php';
	// $_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai	  		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ); 
		
		$maso	  		= urldecode( (isset($_POST['mssv'])?$_POST['mssv']:"" ) ); 
		
	//	$maso="08000328";
	//	$dienthoai="0929495584";
	/*	$idnguoidung = "2";
		$gioitinh="1";
		$ten ="vina data";
		$dienthoai="0929495584";
		$matkhau="abc123";
		$ngaysinh="22\/11\/1995";
	*/	
		
		if($dienthoai != "" )
		{
			$query 	= "select * from oc_nguoidung where dienthoai = '".$dienthoai."' and kichhoat = 1";
				//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$listch = array();
				$idnguoidung = 0;
				while ($row = mysqli_fetch_array($result)) 
				{
						
						$idnguoidung = $row['idnguoidung'];
						
				}
				
				if($idnguoidung != '0' && $idnguoidung != 0)
				{
					$query = "insert into tkb_nguoidung_thongtin (idnguoidung,maso) values ('$idnguoidung','$maso') ON DUPLICATE KEY UPDATE maso = '$maso'";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					echo json_encode($result);
				}
			
		}
		else
			echo 0;
	}
	else
		echo 0;
		
?>