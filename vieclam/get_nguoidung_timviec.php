<?php
////////////lay thong tin cua nguoi dung tim viec ///////////////////////////////
include 'db.php';
if(!isset($_POST['dienthoai']))
	 $_POST = json_decode(file_get_contents('php://input'), true);
//	 $_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		$dienthoai 		= lamsach(urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:0 ) ),$con); 
		$token 		= lamsach(urldecode( (isset($_POST['token'])?$_POST['token']:0 ) ),$con); 
	
		if($dienthoai != "")
		{
				$query 	= "select a.idnguoidung,  a.email from (select * from oc_nguoidung  where dienthoai = '".$dienthoai."' and kichhoat = 1) as a  ";
				//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$listch = array();
				$i = 0;
				$k = -1;
				$kq = 0;
				$idnguoidung = 0;
				while ($row = mysqli_fetch_array($result)) 
				{
					$idnguoidung = $row['idnguoidung'];
				}
				
				if($idnguoidung > 0)
				{
						$query 	= "select * from (select * from kt_nguoidung_timviec where idnguoidung ='$idnguoidung') as a  left join oc_hinhanh e on a.idhinhanh = e.idhinh ";
				//echo $query;
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						$listch = array();
						$i = 0;
						$k = -1;
						$kq = 0;
					//	$idnguoidung = 0;
					$list = new Danhsach();
						$list->ds = array();
						$list->dscon = array();
						while ($row = mysqli_fetch_array($result)) 
						{
			
							$ngoaingu = $row['ngoaingu'];
							
							$hocvan = $row['hocvan'];
							
							$congviechientai = $row['congviechientai'];
							$hinhanh = $IMAGE_URL . $row['url'];
							$mota = $row['mota'];
							
							$tinh = $row['tinh'];
							$diachi = $row['diachi'];
							
							$nguoidung = new Timviec($idnguoidung,$ngoaingu,$hocvan,$congviechientai,$mota, $tinh, $diachi,$hinhanh);
							$i ++;
							array_push($list->ds,$nguoidung);
							//echo json_encode($nguoidung);
						}
				//		echo $i;
						if($i == 0)
						{
							$nguoidung = new Timviec($idnguoidung,'','','','','','');
							array_push($list->ds,$nguoidung);
							//echo json_encode($nguoidung);
						}
						$query = "select * from kt_loaicongviec a left join  (select * from kt_nguoidung_timviec_loaiviec  where idnguoidung ='$idnguoidung') as b on a.idloaiviec = b.idloai";
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						while ($row = mysqli_fetch_array($result)) 
						{
			
							$idnguoidung = $row['idnguoidung'];
							$idloai = $row['idloaiviec'];
							$tenloaiviec = $row['tenloaiviec'];
							$mongmuon = $row['mongmuon'];
							$solan = $row['solan'];
							$loaiviec = new Loaiviec($idloai,$tenloaiviec,$idnguoidung,$mongmuon,$solan);
							array_push($list->dscon,$loaiviec);
						}
						echo json_encode($list);
				}
				
		}
		else
			echo -2;	
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
	class Loaiviec
	{
		
		var $idloai;
		var $tenloaiviec;
		var $idnguoidung;
		var $mongmuon;
		var $solan;
		function Loaiviec($idloai,$tenloaiviec,$idnguoidung,$mongmuon,$solan)
		{
			$this->idloai = $idloai;
			$this->idnguoidung = $idnguoidung;
			$this->tenloaiviec = $tenloaiviec;
			$this->mongmuon = $mongmuon;
			$this->solan = $solan;
		}
	}
	class Timviec{
		var $idnguoidung;
		var $ngoaingu;
		var $hocvan;
		var $congviechientai;
		var $mota;
		var $tinh;
		var $hinhanh;
		var $diachi;
		
		
		function Timviec($idnguoidung, $ngoaingu, $hocvan,$congviechientai,$mota,$tinh,$diachi,$hinhanh)
		{
			$this->idnguoidung 	 		= $idnguoidung; 
			$this->ngoaingu 		= $ngoaingu; 
			$this->hocvan 		= $hocvan; 
			$this->congviechientai 		= $congviechientai; 
			$this->mota 		= $mota; 
			$this->tinh 		= $tinh; 
			$this->diachi 		= $diachi; 
			$this->hinhanh 		= $hinhanh; 
		}
	}
	
		
?>