<?php
@session_start();
include 'db.php';
//	 $_POST = json_decode(file_get_contents('php://input'), true);
if(!isset($_POST['idvieclam']))
		$_POST = json_decode(file_get_contents('php://input'), true);
		
$idvieclam 		= urldecode( (isset($_POST['idvieclam'])?$_POST['idvieclam']:"" ) ); 

	if(/*kiemtraungdung()*/1)
	{
		$query 	= " select d.ten, d.ngaysinh, b.*, e.url from (SELECT idnguoidung FROM `kt_dangkyviec` WHERE idvieclam = '$idvieclam' and duyet = 1) as a left join kt_nguoidung_timviec b on a.idnguoidung = b.idnguoidung left join oc_nguoidung d on a.idnguoidung = d.idnguoidung left join oc_hinhanh e on b.idhinhanh = e.idhinh ";
				//echo $query;
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$list = new Danhsach();
		$list->ds = array();
		
		while ($row = mysqli_fetch_array($result)) 
		{
								$idnguoidung = $row['idnguoidung'];
								$tendutuyen = $row['ten'];
								$ngaysinh = $row['ngaysinh'];
								$ngoaingu = $row['ngoaingu'];
								$hocvan = $row['hocvan'];
								$congviechientai = $row['congviechientai'];
								$hinhanh = $IMAGE_URL . $row['url'];
								$diachi = $row['diachi'];
								$tinh = $row['tinh'];
								$query1 =  "select count(idnguoidung) as soviecxong from kt_dangkyviec where idvieclam = '$idvieclam' and duyet = 3";
								$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
								$soviecxong = 0;
								while ($row = mysqli_fetch_array($result1)) 
								{
									$soviecxong = $row['soviecxong'];
								}
		
								$ban = new Timviec($idnguoidung, $tendutuyen,$ngaysinh,$ngoaingu,$hocvan,$congviechientai,$soviecxong,$hinhanh,$tinh,$diachi);
								array_push($list->ds,$ban);
		}
		///////////////////tra ve danh sach san pham moi /////////////
		echo json_encode ($list);
						
		
	
	}		
	else
		echo -3;
	class Danhsach{
		var $ds;
		var $dscon;
		function Danhsach()
		{
		}
	}
	class Timviec{
		var $idnguoidung;
		var $tendutuyen;
		var $ngaysinh;
		var $ngoaingu;
		var $hocvan;
		var $congviechientai;
		var $soviecxong;
		var $hinhanh;
		var $diachi;
		var $tinh;
		
		function Timviec($idnguoidung, $tendutuyen,$ngaysinh,$ngoaingu,$hocvan,$congviechientai,$soviecxong,$hinhanh,$tinh,$diachi)
		{
			$this->idnguoidung 	 		= $idnguoidung; 
			$this->tendutuyen 		= $tendutuyen; 
			$this->ngaysinh 		= $ngaysinh; 
			$this->ngoaingu 		= $ngoaingu; 
			$this->hocvan 		= $hocvan; 
			$this->congviechientai 		=$congviechientai; 
			$this->soviecxong 		=  $soviecxong;
			$this->hinhanh 		=  $hinhanh;
			$this->diachi 		=  $diachi;
			$this->tinh 		=  $tinh;
		}
	}
	
		
?>