<?php
@session_start();
include 'db.php';
	// $_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai	  		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ); 
		$email	  		= urldecode( (isset($_POST['email'])?$_POST['email']:"" ) );
		$maso	  		= urldecode( (isset($_POST['maso'])?$_POST['maso']:"" ) ); 
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
					$query = "insert into tkb_nguoidung_thongtin (idnguoidung,maso) values ('$idnguoidung','$maso') ON DUPLICATE KEY UPDATE maso = '$maso'";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					//echo json_encode($result);
					$kq = 1;
				}
				if($matkhaucu != "")
				{
					$matkhaucu = md5($matkhaucu . "!@1a3B");
					$matkhaumoi = md5($matkhaumoi . "!@1a3B");
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
					//	echo $query;
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						if($result == true) $kq = 2;
					}
					
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