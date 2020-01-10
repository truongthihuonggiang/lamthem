<?php
@session_start();
include 'db.php';
//	 $_POST = json_decode(file_get_contents('php://input'), true);
if(!isset($_POST['dienthoai']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai 		= lamsach(urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:0 ) ),$con); 
		$ten 		= lamsach(urldecode( (isset($_POST['ten'])?$_POST['ten']:0 ) ),$con); 
		$matkhau	  		= urldecode( (isset($_POST['matkhau'])?$_POST['matkhau']:"" ) ); 
		$gioitinh	  		= urldecode( (isset($_POST['gioitinh'])?$_POST['gioitinh']:"" ) ); 
		$loai	  		= lamsach(urldecode( (isset($_POST['loai'])?$_POST['loai']:"" ) ),$con); 
		$ngaysinh	  		= urldecode( (isset($_POST['ngaysinh'])?$_POST['ngaysinh']:"" ) ); 
		$email	  		= urldecode( (isset($_POST['email'])?$_POST['email']:"" ) ); 
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$ngaynhap = date("Y-m-d H:i:s");
		//$ten = $matkhau;
		$matkhau = md5($matkhau . "!@1a3B");
		$idfacebook	  		= urldecode( (isset($_POST['fbid'])?$_POST['fbid']:"" ) ); 
		$idnguoidung	  		= urldecode( (isset($_POST['idnguoidung'])?$_POST['idnguoidung']:0 ) ); 
		
		
	/*	$loai = "2";
		$gioitinh="1";
		$ten ="vina data";
		$dienthoai="0929495584";
		$matkhau="abc123";
		$ngaysinh="22\/11\/1995";
	*/	
		
		if($dienthoai != "" && $ten != "" && checkngaythang($ngaysinh) && checkemail($email))
		{
			if($idnguoidung == 0)
			{
				$query 	= "INSERT INTO oc_thucthe (loai) VALUES('oc_nguoidung')";
				//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$idthucthe =  mysqli_insert_id($con);
				$idnguoidung = $idthucthe;
			
				$colums = array(
					'idnguoidung' 		=> "'".$idnguoidung."'", 
					'ten' 		=> "'".$ten."'", 
					'matkhau' 		=> "'".$matkhau."'",
					'dienthoai' 		=> "'".$dienthoai."'",
					'loai' 		=> "'".$loai."'",
					'ngaysinh' 		=> "'".$ngaysinh."'",
					'email' 		=> "'".$email."'",
					'ngaydangky'=> "'".$ngaynhap."'",
					'gioitinh'=> "'".$gioitinh."'",
					'kichhoat'=> "0"
				);
		 
				$keys 	= implode(", ",array_keys($colums));
				$values = implode(", ",array_values($colums));

				$query 	= "INSERT INTO oc_nguoidung ($keys) VALUES($values) ";
			//	echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				//echo json_encode($result);
				$colums = array(
					'idnguoidung' 		=> "'".$idthucthe."'", 
					'banner' 		=> "'banner.png'", 
					'avatar' 		=> "'avatar.png'"
					
					);
				
				$keys 	= implode(", ",array_keys($colums));
				$values = implode(", ",array_values($colums));
				$query 	= "INSERT INTO oc_page_canhan ($keys) VALUES($values) ";
			//	echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
			
				$colums = array(
					'idnguoidung' 		=> "'".$idthucthe."'", 
					'd1' 		=> "20", 
					'd2' 		=> "20", 
					'd3' 		=> "20", 
					'd4' 		=> "20", 
					'd5' 		=> "20", 
					'level' 		=> "1", 
					'sublevel' 		=> "1", 
					
					
					);
					
				$keys 	= implode(", ",array_keys($colums));
				$values = implode(", ",array_values($colums));
				$query 	= "INSERT INTO oc_diem ($keys) VALUES($values) ";
			//	echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				
				$colums = array(
					'idvi' 		=> "'".$idthucthe."'", 
					'sotien' 		=> "100", 
					
					'idsohuu' 		=> "'$idthucthe'"
					
					);
					
				$keys 	= implode(", ",array_keys($colums));
				$values = implode(", ",array_values($colums));
				$query 	= "INSERT INTO oc_vi ($keys) VALUES($values) ";
			//	echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				
				$colums = array(
					'idcanhan' 		=> "'".$idthucthe."'", 
					'iddiadiem' 		=> "55", 
					
					
					
					);
					
				$keys 	= implode(", ",array_keys($colums));
				$values = implode(", ",array_values($colums));
				$query 	= "INSERT INTO oc_canhan_diadiem ($keys) VALUES($values) ";
			//	echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				if($idnguoidung != '0' && $idnguoidung != 0)
				{
					$query = "insert into kt_nguoidung_kiemthem (idnguoidung,traphi,danhgia) values ('$idnguoidung','0','0') ON DUPLICATE KEY UPDATE traphi = traphi";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
				//	echo json_encode($result);
				}		
				if($loai == 2 || $loai == '2')
				{
					$query 	= "INSERT INTO oc_thucthe (loai) VALUES('oc_nguoidung')";
					//echo $query;
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					$idthucthe =  mysqli_insert_id($con);
					$query = "insert into oc_diamdiem (iddiadiem, idtacgia,loai) values ('$idthucthe','$idnguoidung','2')";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					
				}
				echo json_encode($result);
			}
			else
			{
				$query = "update oc_nguoidung set dienthoai='$dienthoai',matkhau='$matkhau',ngaysinh='$ngaysinh',
				gioitinh='$gioitinh', ten='$ten', loai = '$loai' where idnguoidung='$idnguoidung' and idfacebook='$idfacebook'";
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				echo json_encode($result);
				
			}
		}
		else
			echo -3;
	}
	else
		echo -2;
		
?>