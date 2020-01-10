<?php
@session_start();
include 'db.php';
if(!isset($_POST['dienthoai']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	
	if(kiemtraungdung())
	{
		
		$dienthoai	  		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ); 
		$email	  		= urldecode( (isset($_POST['email'])?$_POST['email']:"" ) );
		
		$matkhaucu	  		= urldecode( (isset($_POST['matkhaucu'])?$_POST['matkhaucu']:"" ) ); 
		$matkhaumoi	  		= urldecode( (isset($_POST['matkhau'])?$_POST['matkhau']:"" ) ); 
	/*	$tenmay="Galaxy A7 2016";
		$dienthoai="0911155078";
		$matkhau="123456";
		*/
		
		$kq = 0;
		if($dienthoai != "" )
		{
			$query 	= "select * from oc_nguoidung where dienthoai = '".$dienthoai."' and kichhoat = 1";
				//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
			
				$idnguoidung = 0;
				while ($row = mysqli_fetch_array($result)) 
				{
						
						$idnguoidung = $row['idnguoidung'];
						
				}
				
				if($idnguoidung != '0' && $idnguoidung != 0)
				{
					$query = "insert into kt_nguoidung_kiemthem (idnguoidung,traphi,danhgia) values ('$idnguoidung','0','0') ON DUPLICATE KEY UPDATE traphi = traphi";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					//echo json_encode($result);				

					//echo json_encode($result);
					$kq = 1;
				}
				
				if($matkhaucu != ""  || ($matkhaucu == "" && $matkhaumoi != "") )
				{
					//echo 'mkc:'.$matkhaucu;
					//echo ':m:'.$matkhaumoi;
					$matkhaucu = md5($matkhaucu . "!@1a3B");
					$matkhaumoi = md5($matkhaumoi . "!@1a3B");
					//echo 'mkc:'.$matkhaucu;
					//echo ':m:'.$matkhaumoi;
					$query = "select idnguoidung from oc_nguoidung where matkhau = '$matkhaucu' and dienthoai = '$dienthoai' and kichhoat = 1";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
			
					$idnguoidung = 0;
					while ($row = mysqli_fetch_array($result)) 
					{
						$idnguoidung = $row['idnguoidung'];
					}
					
					if($email != "")
					{
						$query = "update oc_nguoidung set email = '$email' where idnguoidung = '$idnguoidung' and kichhoat = 1";
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						if($result == true)
							$kq = 1;
					}
					if($idnguoidung != 0)
					{
						$query = "update oc_nguoidung set matkhau = '$matkhaumoi' where idnguoidung = '$idnguoidung' and kichhoat = 1";
						//echo $query;
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						if($result == true) $kq = 2; 
					}
					else
						$kq = 3;
					
				}
				else
				{
					if($email != "")
					{
						$query = "update oc_nguoidung set email = '$email' where dienthoai = '$dienthoai' and kichhoat = 1";
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						if($result == true)
							$kq = 1;
					}
					
				}
				echo $kq;
			
		}
		else
			echo 0;
	}
	else
		echo 0;
		
?>