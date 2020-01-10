<?php
@session_start();
include 'db.php';
//	 $_POST = json_decode(file_get_contents('php://input'), true);
if(!isset($_POST['tenmay']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	if(/*kiemtraungdung()*/1)
	{
		$tenmay 		= lamsach(urldecode( (isset($_POST['tenmay'])?$_POST['tenmay']:"" ) ),$con); 
		$idfacebook 		= lamsach(urldecode( (isset($_POST['idfacebook'])?$_POST['idfacebook']:"" ) ),$con); 
		$ten 		= lamsach(urldecode( (isset($_POST['ten'])?$_POST['ten']:"" ) ),$con); 
		$ungdung 		= lamsach(urldecode( (isset($_POST['ungdung'])?$_POST['ungdung']:"" ) ),$con); 
		$email	  		= urldecode( (isset($_POST['email'])?$_POST['email']:"" ) ); 
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$ngaynhap = date("Y-m-d H:i:s");
	
		
		
	/*	$loai = "2";
		$gioitinh="1";
		$ten ="vina data";
		$dienthoai="0929495584";
		$matkhau="abc123";
		$ngaysinh="22\/11\/1995";
	*/	
	//	echo 'idfacebook' .$idfacebook;
		if($idfacebook != "" && $ten != "")
		{
				$query = "select * from oc_nguoidung where idfacebook = '$idfacebook'";
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$idnguoidung = 0;			
				while ($row = mysqli_fetch_array($result)) 
				{
					$idnguoidung = $row['idnguoidung'];
				}
			//	echo 'idnguoidung' .$idnguoidung;
				if ($idnguoidung > 0)
				{
					///da ton tai và thuc hien dang nhap
					
							$query 	= "select * from oc_nguoidung where idfacebook = '".$idfacebook."' ";
							//echo $query;
							$result = mysqli_query($con,$query) or die(mysqli_error($con));
							$listch = array();
							$i = 0;
							$k = -1;
							$kq = 0;
							while ($row = mysqli_fetch_array($result)) 
							{
									$listch[$i] = new stdClass();
									$listch[$i]->dienthoai = $row['dienthoai'];
									$listch[$i]->loai = $row['loai'];
									$listch[$i]->ten = $row['ten'];
									$listch[$i]->idfacebook = $row['idfacebook'];
									$listch[$i]->kichhoat = $row['kichhoat'];
									$listch[$i]->idnguoidung = $row['idnguoidung'];
									if($listch[$i]->idfacebook == $idfacebook)
										$k = $i;
									$i++;
							}
						 
							if ($k != -1 )
							{
								$kq = 1;
										date_default_timezone_set('Asia/Ho_Chi_Minh');
										$thoigian = date("Y-m-d H:i:s");
										$mt = microtime(true);
										$token = $listch[$k]->loai. (md5($mt."@1F#"));
										$query="INSERT INTO oc_dangnhap (dienthoai,tenmay,token,thoigian,ungdung)VALUES ('".$listch[$k]->dienthoai."','$tenmay','$token','$thoigian','$ungdung')
											ON DUPLICATE KEY UPDATE token = '$token', thoigian = '$thoigian'";
										//	echo $query;
										$result = mysqli_query($con,$query) or die(mysqli_error($con));
										if($result)
										{
											//$dn = new dangnhap($dienthoai,$tenmay,$token,$trangthai);
											$nguoidung = new Nguoidung($listch[$k]->idnguoidung,$listch[$k]->ten,$listch[$k]->dienthoai,$listch[$k]->loai,$token);
											echo json_encode($nguoidung);
											
									//		($idnguoidung,$ten,$dienthoai,$loai,$token)
										}
									
									else
									{
											$nguoidung = new Nguoidung($idnguoidung,$ten,$idfacebook,0,"");
											echo json_encode($nguoidung);
									}
							}
							else
								echo 2;
								
								
							
							
					
					
				}
				else
				{
					///thuc hien them moi
						$query 	= "INSERT INTO oc_thucthe (loai) VALUES('oc_nguoidung')";
						//echo $query;
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						$idthucthe =  mysqli_insert_id($con);
						$colums = array(
							'idnguoidung' 		=> "'".$idthucthe."'", 
							'ten' 		=> "'".$ten."'", 
							'idfacebook'=> "'".$idfacebook."'",
							'dienthoai' 		=> "'".$idfacebook."'",
							
							'email' 		=> "'".$email."'",
							'ngaydangky'=> "'".$ngaynhap."'",
							
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
						
							$nguoidung = new Nguoidung($idthucthe,$ten,$idfacebook,0,"");
							echo json_encode($nguoidung);
							
				}
				
			
			
		}
		else
			echo 1;
	}
	else
		echo 0;
	class Nguoidung
	{
		var $idnguoidung;
		var $ten;
		var $dienthoai;
		var $loai;
		var $token;
		function Nguoidung($idnguoidung,$ten,$dienthoai,$loai,$token)
		{
			$this->idnguoidung = $idnguoidung;
			$this->ten = $ten;
			$this->dienthoai = $dienthoai;
			$this->loai = $loai;
			$this->token = $token;
		}
		
	}
?>