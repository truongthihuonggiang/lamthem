<?php
@session_start();
include 'db.php';
 //$_POST = json_decode(file_get_contents('php://input'), true);
 if(!isset($_POST['token']))
		$_POST = json_decode(file_get_contents('php://input'), true);

$token 		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 
$ungdung 		= urldecode( (isset($_POST['ungdung'])?$_POST['ungdung']:"" ) ); 
$dienthoai 		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) );
$idvieclam 		= urldecode( (isset($_POST['idvieclam'])?$_POST['idvieclam']:"" ) );
$iddanhgia 		= urldecode( (isset($_POST['iddanhgia'])?$_POST['iddanhgia']:"" ) );
$hailong 		= urldecode( (isset($_POST['hailong'])?$_POST['hailong']:"" ) );
$nhanxet 		= urldecode( (isset($_POST['nhanxet'])?$_POST['nhanxet']:"" ) );
$loai 		= urldecode( (isset($_POST['loai'])?$_POST['loai']:"" ) );

if($dienthoai != "" && kiemtraungdung())
{

		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$ngaynhap = date("Y-m-d H:i:s");
	
	
		$query 	= "select idnguoidung from oc_nguoidung a  , (select * from oc_dangnhap where token = '$token' and dienthoai = '$dienthoai' and ungdung = '$ungdung') as b where a.dienthoai = b.dienthoai ";
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
			$query = "insert into kt_danhgia_vieclam_tuyendung (idnguoidung,iddanhgia,hailong,nhanxet,idvieclam,ngaydang,loai) values('$idnguoidung','$iddanhgia','$hailong','$nhanxet','$idvieclam',now(),'$loai')";
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
			echo 1;
			
		}
		else
	
			echo 2; //khong tim thay nguoi dung
			
	
}
else
	echo 0; // ung udng khong xac minh
		

	


	



?>