<?php
@session_start();
include 'db.php';
 //$_POST = json_decode(file_get_contents('php://input'), true);
 if(!isset($_POST['token']))
		$_POST = json_decode(file_get_contents('php://input'), true);

$token 		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 
 $duyet 		= urldecode( (isset($_POST['duyet'])?$_POST['duyet']:"" ) ); 
$dienthoai 		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) );
$idnguoilam 		= urldecode( (isset($_POST['idnguoilam'])?$_POST['idnguoilam']:0 ) );
$idvieclam 		= urldecode( (isset($_POST['idvieclam'])?$_POST['idvieclam']:0 ) );

//echo 'dienthoai'.$dienthoai;
//echo $uploaddir = realpath("image/banner");
//echo 'aa'. $muctuongt;
if($dienthoai != "" && kiemtraungdung())
{

		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$ngaynhap = date("Y-m-d H:i:s");
	
	
		$query 	= "select idnguoidung from oc_nguoidung a  , (select * from oc_dangnhap where token = '$token' and dienthoai = '$dienthoai' and ungdung ='kiemthem') as b where a.dienthoai = b.dienthoai ";
		//echo $query;
				//echo $query;
				$idnguoidung = 0;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				while ($row = mysqli_fetch_array($result)) 
				{
						$idnguoidung = $row['idnguoidung'];
						
				}
		if($idnguoidung > 0)
		{
			
			
			$query = "update kt_dangkyviec set duyet = '$duyet' where idnguoidung = '$idnguoilam' and idvieclam ='$idvieclam' ";
			//echo $query;
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
			
			echo $result;
			guithongbaokichhoat($idnguoidung,$idnguoilam,$idvieclam,$duyet,$con);
		}
		
}
else
	echo 0; // ung udng khong xac minh
		

	


	



?>