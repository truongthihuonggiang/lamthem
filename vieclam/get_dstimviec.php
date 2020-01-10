<?php
@session_start();
include 'db.php';
//	 $_POST = json_decode(file_get_contents('php://input'), true);
$ss = 0.2;
if(!isset($_POST['tinh']))
		$_POST = json_decode(file_get_contents('php://input'), true);
$v0 		= urldecode( (isset($_POST['v0'])?$_POST['v0']:"" ) ); 
$v1 		= urldecode( (isset($_POST['v1'])?$_POST['v1']:"" ) ); 		
$tinh 		= urldecode( (isset($_POST['tinh'])?$_POST['tinh']:"" ) ); 
$iddanhmuc 		= urldecode( (isset($_POST['iddanhmuc'])?$_POST['iddanhmuc']:0 ) ); 
	if(kiemtraungdung())
	{
		if($iddanhmuc == 0)
		{
			$query 	= " select g.* from (select d.ten, d.ngaysinh, b.*, e.url from  (select * from kt_nguoidung_timviec where tinh ='$tinh' or (v0 - $v0 + v1 - $v1) < $ss ) as b  left join oc_nguoidung d on b.idnguoidung = d.idnguoidung left join oc_hinhanh e on b.idhinhanh = e.idhinh limit 0,100 )as g inner join oc_vi as h on g.idnguoidung = h.idsohuu order by h.sotien desc";
		}
		else
		{
			$query =  "select g.* from ( select * from ( select idnguoidung from kt_nguoidung_timviec_loaiviec where idloai = '$iddanhmuc') as a left join ( select d.ten, d.ngaysinh, b.*, e.url from  (select * from kt_nguoidung_timviec where tinh ='$tinh' or (v0 - $v0 + v1 - $v1) < $ss ) as b  left join oc_nguoidung d on b.idnguoidung = d.idnguoidung left join oc_hinhanh e on b.idhinhanh = e.idhinh) as f on a.idnguoidung = f.idnguoidung limit 0,100) as g inner join oc_vi as h on g.idnguoidung = h.idsohuu order by h.sotien desc ";
		}
	
		//		echo $query;
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
								$query1 =  "select count(a.idvieclam) as soviecxong from kt_dangkyviec a, kt_vieclam b where a.idnguoidung = '$idnguoidung' and  a.idvieclam = b.idvieclam and b.congkhai > 2";
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