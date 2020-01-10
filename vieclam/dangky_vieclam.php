<?php
@session_start();
include 'db.php';
 //$_POST = json_decode(file_get_contents('php://input'), true);
 if(!isset($_POST['token']))
		$_POST = json_decode(file_get_contents('php://input'), true);

$token 		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 
$tinh 		= urldecode( (isset($_POST['tinh'])?$_POST['tinh']:"" ) ); 
$dienthoai 		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) );

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
			$query = "select * from kt_nguoidung_timviec where idnguoidung = '$idnguoidung' ";
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
			$dem = 0;
				while ($row = mysqli_fetch_array($result)) 
				{
						$dem ++;
						
				}
			if($dem == 0)
			{
				$query = "insert into kt_nguoidung_timviec (idnguoidung, tinh) values ('$idnguoidung','$tinh')";
				
			}
			else
			{
				$query = "update kt_nguoidung_timviec set tinh = '$tinh' where idnguoidung = '$idnguoidung'";
			}
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
			
			$query = "select * from kt_dangkyviec where idnguoidung = '$idnguoidung' and idvieclam ='$idvieclam' ";
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
			$dem = 0;
				while ($row = mysqli_fetch_array($result)) 
				{
						$dem ++;
						
				}
			if($dem == 1)
				echo 2;
			else
			{
				$query = "insert into kt_dangkyviec (idvieclam, idnguoidung,ngaydangky) values('$idvieclam', '$idnguoidung',now())";
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				///////////Gui thong bao dang ky cho nguoi dang tin tuyen dung/////////////
				
				guithongbaodangky($idnguoidung,$idvieclam,$con);
				echo 1;
			}
			
		}
		
}
else
	echo 0; // ung udng khong xac minh
		

	


	



?>