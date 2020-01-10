<?php
@session_start();
include 'db.php';
 //$_POST = json_decode(file_get_contents('php://input'), true);
 if(!isset($_POST['idvieclam']))
		$_POST = json_decode(file_get_contents('php://input'), true);

	
$token 		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 

$dienthoai 		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) );
$idvieclam 		= urldecode( (isset($_POST['idvieclam'])?$_POST['idvieclam']:"" ) );

//echo 'dienthoai'.$dienthoai;
//echo $uploaddir = realpath("image/banner");
//echo 'aa'. $muctuongt;
//echo 'ktund'.kiemtraungdung();
if($dienthoai != "" && kiemtraungdung())
{

		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$ngaynhap = date("Y-m-d H:i:s");
	
	
		$query 	= "select idnguoidung from oc_nguoidung a  , (select * from oc_dangnhap where token = '$token' and dienthoai = '$dienthoai') as b where a.dienthoai = b.dienthoai ";
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
			
				$query 	= "update kt_dangkyviec set duyet = 2 where idvieclam = ".$idvieclam;
		//		echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				//echo json_encode($result);
			
			///////thong bao rut viec lam ////////////////
			guithongbaorut($idnguoidung,$idvieclam,$con);
		
			
			
			echo "true";
		}
		else
	
			echo 2; //khong tim thay nguoi dung
			
	
}
else
	echo 0; // ung udng khong xac minh
		

	


	



?>