<?php
@session_start();
include 'db.php';
	if(!isset($_POST['ungdung']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	// $_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		$ungdung 		= lamsach(urldecode( (isset($_POST['ungdung'])?$_POST['ungdung']:"" ) ),$con); 
		$firebase 		= lamsach(urldecode( (isset($_POST['firebase'])?$_POST['firebase']:"" ) ),$con); 
		
		$tenmay 		= lamsach(urldecode( (isset($_POST['tenmay'])?$_POST['tenmay']:"" ) ),$con); 
		$dienthoai 		= lamsach(urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ),$con); 
		$matkhau	  		= urldecode( (isset($_POST['matkhau'])?$_POST['matkhau']:"" ) ); 
	/*	$tenmay="Galaxy A7 2016";
		$dienthoai="0911155078";
		$matkhau="123456";
		*/
		$matkhau = md5($matkhau . "!@1a3B");
		if($dienthoai != "")
		{
				$query 	= "select * from oc_nguoidung where matkhau = '".$matkhau."' and kichhoat = 1";
			//	echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$listch = array();
				$i = 0;
				$k = -1;
				$kq = 0;
				while ($row = mysqli_fetch_array($result)) 
				{
						$listch[$i] = new stdClass();
						$listch[$i]->dienthoai = $row['dienthoai'];
						$listch[$i]->ten = $row['ten'];
						$listch[$i]->idnguoidung = $row['idnguoidung'];
						$listch[$i]->loai = $row['loai'];
						if($listch[$i]->dienthoai == $dienthoai)
							$k = $i;
						$i++;
				}
				if ($k != -1)
				{
					if($listch[$k]->dienthoai == $dienthoai)
					{
						$idnguoidung = $listch[$k]->idnguoidung;
						$kq = 1;
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$thoigian = date("Y-m-d H:i:s");
						$mt = microtime(true);
						$token = $listch[$k]->loai. (md5($mt."@1F#"));
						$query="INSERT INTO oc_dangnhap (dienthoai,tenmay,token,thoigian,ungdung,	firebasetoken)VALUES ('".$dienthoai."','$tenmay','$token','$thoigian','$ungdung','$firebase')
							ON DUPLICATE KEY UPDATE token = '$token', thoigian = '$thoigian', firebasetoken = '$firebase'";
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						if($result)
						{
							$loai = 0;
							$query= "select * from kt_nguoidung_kiemthem where idnguoidung = '$idnguoidung'";
							$result = mysqli_query($con,$query) or die(mysqli_error($con));
							while ($row = mysqli_fetch_array($result)) 
							{
								$loai = $row['traphi'];
								
							}
							//$dn = new dangnhap($dienthoai,$tenmay,$token,$trangthai);
							$nguoidung = new Nguoidung($listch[$k]->idnguoidung,$listch[$k]->ten,$token,$loai,$listch[$k]->dienthoai);
							echo json_encode($nguoidung);
						}
						else
							echo -5;
					
					}
					else
						echo -4;
					
				}
				else
					echo -3;
				 
		}
		else
			echo -1;
		
	}
	else
		echo -2;
	
	class Nguoidung{
			var $nguoidungid;
			var $ten;
			var $token;
			var $loai;
			var $dienthoai;
			function Nguoidung($nguoidungid,$ten,$token,$loai,$dienthoai)
			{
				$this->nguoidungid = $nguoidungid;
				$this->ten= $ten;
				$this->token= $token;
				$this->loai= $loai;
				$this->dienthoai= $dienthoai;
				
			}		
		}

	
		
?>