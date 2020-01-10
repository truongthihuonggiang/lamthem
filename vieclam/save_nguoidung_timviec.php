<?php

include 'db.php';
if(!isset($_POST['dienthoai']))
	 $_POST = json_decode(file_get_contents('php://input'), true);
	// $_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai	  		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ); 
		$ngoaingu	  		= urldecode( (isset($_POST['ngoaingu'])?$_POST['ngoaingu']:"" ) ); 
		$hocvan	  		= urldecode( (isset($_POST['hocvan'])?$_POST['hocvan']:"" ) ); 
		$congviechientai	  		= urldecode( (isset($_POST['congviechientai'])?$_POST['congviechientai']:"" ) ); 
		$diachi	  		= urldecode( (isset($_POST['diachi'])?$_POST['diachi']:"" ) ); 

		$mota	  		= urldecode( (isset($_POST['mota'])?$_POST['mota']:"" ) ); 
		$tinh	  		= urldecode( (isset($_POST['tinh'])?$_POST['tinh']:"" ) ); 
		$v0	  		= urldecode( (isset($_POST['v0'])?$_POST['v0']:"" ) ); 
		$v1	  		= urldecode( (isset($_POST['v1'])?$_POST['v1']:"" ) ); 
		$hinhanh	  		= urldecode( (isset($_POST['hinhanh'])?$_POST['hinhanh']:"" ) ); 
		
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
					
					$idhinh = 0;
					if(strlen($hinhanh) > 0)
					{
						//echo $hinhanh;
						//echo $hinhanh;
						$name = $dienthoai."/kiemthem_".rand().".jpg" ;
					
						$uploaddir = $IMAGE_REALPATH.$name ;
						$uploaddir1 = $IMAGE_REALPATH.$dienthoai ;
						
						if (!file_exists($uploaddir1 )) {
							mkdir($uploaddir1, 0755, true);
						}
				

						$data = str_replace('data:image/jpg;base64,', '', $hinhanh);

						$data = str_replace(' ', '+', $data);

						$data = base64_decode($data);

						//$success = file_put_contents($lienphoto, $data);
						file_put_contents($uploaddir,$data);
					
					//////////insert vao hinh anh ///////////////////////
							$query 	= "INSERT INTO oc_thucthe (loai) VALUES('oc_nguoidung')";
					//echo $query;
							$result = mysqli_query($con,$query) or die(mysqli_error($con));
							$idhinh =  mysqli_insert_id($con);
								$colums = array(
										'idhinh' 		=> "'".$idhinh."'", 
										'url' 		=> "'".$name."'", 
										
										'v0' 		=> "'".$v0."'",
										'v1' 		=> "'".$v1."'",
										'idtacgia' => "'".$idnguoidung."'",
										'congkhai' 		=> "'1'"
									);
									$keys 	= implode(", ",array_keys($colums));
									$values = implode(", ",array_values($colums));
									
									$query 	= "INSERT INTO oc_hinhanh ($keys) VALUES($values)";
									$result = mysqli_query($con,$query) or die(mysqli_error($con));
						$query = "insert into kt_nguoidung_timviec (idnguoidung,ngoaingu,hocvan,congviechientai,diachi,mota,tinh,v0,v1,idhinhanh) values ('$idnguoidung','$ngoaingu','$hocvan','$congviechientai','$diachi','$mota','$tinh','$v0','$v1','$idhinh') ON DUPLICATE KEY UPDATE ngoaingu = '$ngoaingu', hocvan = '$hocvan', congviechientai='$congviechientai', diachi = '$diachi', mota = '$mota', tinh = '$tinh', v0 = '$v0', v1 = '$v1',idhinhanh = '$idhinh' ";		
					}
					else
					{
						$query = "insert into kt_nguoidung_timviec (idnguoidung,ngoaingu,hocvan,congviechientai,diachi,mota,tinh,v0,v1) values ('$idnguoidung','$ngoaingu','$hocvan','$congviechientai','$diachi','$mota','$tinh','$v0','$v1') ON DUPLICATE KEY UPDATE ngoaingu = '$ngoaingu', hocvan = '$hocvan', congviechientai='$congviechientai', diachi = '$diachi', mota = '$mota', tinh = '$tinh', v0 = '$v0', v1 = '$v1' ";
					}
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