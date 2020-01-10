<?php

include 'db.php';
if(!isset($_POST['dienthoai']))
	 $_POST = json_decode(file_get_contents('php://input'), true);
	// $_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai	  		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ); 
		$tendonvi	  		= urldecode( (isset($_POST['tendonvi'])?$_POST['tendonvi']:"" ) ); 

		$diachi	  		= urldecode( (isset($_POST['diachi'])?$_POST['diachi']:"" ) ); 

		$mota	  		= urldecode( (isset($_POST['mota'])?$_POST['mota']:"" ) ); 
		$tinh	  		= urldecode( (isset($_POST['tinh'])?$_POST['tinh']:"" ) ); 
		//$maso	  		= urldecode( (isset($_POST['mssv'])?$_POST['mssv']:"" ) ); 
		
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
					$query = "insert into kt_nguoidung_tuyendung (idnguoidung,tendonvi,diachi,mota,tinh) values ('$idnguoidung','$tendonvi','$diachi','$mota','$tinh') ON DUPLICATE KEY UPDATE tendonvi = '$tendonvi',diachi = '$diachi', mota = '$mota', tinh = '$tinh' ";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					if($result == true)
					echo json_encode(1);
				}
				
			
		}
		else
			echo -1;
	}
	else
		echo -2;
		
?>