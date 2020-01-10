<?php
@session_start();
include 'db.php';
 //$_POST = json_decode(file_get_contents('php://input'), true);
 if(!isset($_POST['dienthoai']))
		$_POST = json_decode(file_get_contents('php://input'), true);

$token 		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 
$token = mysqli_real_escape_string( $con,$token );
$dienthoai 		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) );
$dienthoai = mysqli_real_escape_string( $con,$dienthoai );
$idloaiviec 		= urldecode( (isset($_POST['idloaiviec'])?$_POST['idloaiviec']:"" ) );
$idloaiviec = mysqli_real_escape_string( $con,$idloaiviec );
$tencongviec 		= urldecode( (isset($_POST['tencongviec'])?$_POST['tencongviec']:"" ) );
$tencongviec = mysqli_real_escape_string( $con,$tencongviec );
$tgbatdau 		= urldecode( (isset($_POST['tgbatdau'])?$_POST['tgbatdau']:"" ) );
$tgbatdau = mysqli_real_escape_string( $con,$tgbatdau );
$tgketthuc 		= urldecode( (isset($_POST['tgketthuc'])?$_POST['tgketthuc']:"" ) );
$tgketthuc = mysqli_real_escape_string( $con,$tgketthuc );
$soluong 		= urldecode( (isset($_POST['soluong'])?$_POST['soluong']:"" ) );
$soluong = mysqli_real_escape_string( $con,$soluong );
$mucluongh 		= urldecode( (isset($_POST['mucluongh'])?$_POST['mucluongh']:"" ) );
$mucluongh = mysqli_real_escape_string( $con,$mucluongh );
$muctuongt 		= urldecode( (isset($_POST['mucluongt'])?$_POST['mucluongt']:"" ) );
$muctuongt = mysqli_real_escape_string( $con,$muctuongt );
$diachi 		= urldecode( (isset($_POST['diachi'])?$_POST['diachi']:"" ) );
$diachi = mysqli_real_escape_string( $con,$diachi );
$tinh 		= urldecode( (isset($_POST['tinh'])?$_POST['tinh']:"" ) );
$tinh = mysqli_real_escape_string( $con,$tinh );
$quanhuyen 		= urldecode( (isset($_POST['quanhuyen'])?$_POST['quanhuyen']:"" ) );
$quanhuyen = mysqli_real_escape_string( $con,$quanhuyen );
$phuongxa 		= urldecode( (isset($_POST['phuongxa'])?$_POST['phuongxa']:"" ) );
$phuongxa = mysqli_real_escape_string($con, $phuongxa );
$v0 		= urldecode( (isset($_POST['v0'])?$_POST['v0']:"" ) );
$v1 		= urldecode( (isset($_POST['v1'])?$_POST['v1']:"" ) );
$hinhanh 		= urldecode( (isset($_POST['hinhanh'])?$_POST['hinhanh']:"" ) );
$mota 		= urldecode( (isset($_POST['mota'])?$_POST['mota']:"" ) );
$mota = mysqli_real_escape_string($con, $mota );
$idvieclam 		= urldecode( (isset($_POST['idvieclam'])?$_POST['idvieclam']:0 ) );
$idvieclam = mysqli_real_escape_string($con, $idvieclam );
//echo 'dienthoai'.$dienthoai;
//echo $uploaddir = realpath("image/banner");
//echo 'aa'. $muctuongt;
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
			if($idvieclam == 0)
			{
				$idhinh = 0;
				$name = "";
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
				
				}
				
				
				$query 	= "INSERT INTO oc_thucthe (loai) VALUES('oc_nguoidung')";
					//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$idthucthe =  mysqli_insert_id($con);
				$idvieclam = $idthucthe;
				
					$colums = array(
						'idvieclam' 		=> "'".$idvieclam."'", 
						'tenvieclam' 		=> "'".$tencongviec."'", 
						'mota' 		=> "'".$mota."'",
						'v0' 		=> "'".$v0."'",
						'v1' 		=> "'".$v1."'",
						'songuoi' 		=> "'".$soluong."'",
						
						'phuongxa' 		=> "'".$phuongxa."'",
						'thanhpho' 		=> "'".$quanhuyen."'",
						'tinh'=> "'".$tinh."'",
						'idtacgia'=> "'".$idnguoidung."'",
						'luonggio'=> "'".$mucluongh."'",
						'luongtrongoi'=> "'".$muctuongt."'",
						'ngaydang'=> "'".$ngaynhap."'",
						'ngaybatdau'=> "'".$tgbatdau."'",
						'ngayketthuc'=> "'".$tgketthuc."'",
						'nhaduong'=> "'".$diachi."'",
						
						'idhinhanh'=> "'".$idhinh."'",
						'nhaduong'=> "'".$diachi."'",
						'congkhai'=> "'1'",
						'idloaiviec'=> "'".$idloaiviec."'"
					);
			 
					$keys 	= implode(", ",array_keys($colums));
					$values = implode(", ",array_values($colums));

					$query 	= "INSERT INTO kt_vieclam ($keys) VALUES($values) ";
				//	echo $query;
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					//echo json_encode($result);
				
					guithongbaoviecmoi($idnguoidung,$idvieclam,$tencongviec,$con);
			
				
				
				echo "true";
			}
			else
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
				
				}
				
			 
				
					$query 	= "update kt_vieclam set tenvieclam = '$tencongviec', mota= '$mota'
							, v0 = '$v0', v1 = '$v1', songuoi ='$soluong', phuongxa = '$phuongxa',
							thanhpho= '$quanhuyen', tinh = '$tinh', luonggio='$mucluongh', luongtrongoi = '$muctuongt', ngaybatdau = '$tgbatdau', ngayketthuc = '$tgketthuc',
							nhaduong ='$diachi', idloaiviec = '$idloaiviec' ";
					if($idhinh > 0)
						$query .= " , idhinhanh = '$idhinh' ";
					$query .= " where idvieclam = '$idvieclam'
							
							";
					//echo $query;
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					//echo json_encode($result);
					//////////////gui thong bao cho nhung nguoi theo gioi co viec lam moi
					
					guithongbaoviecmoi($idnguoidung,$idvieclam,$tencongviec,$con);
					
				echo 'true';
			}
		}
		else
	
			echo 2; //khong tim thay nguoi dung
			
	
}
else
	echo 0; // ung udng khong xac minh
		

	


	



?>