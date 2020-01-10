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
		$idtimviec 		= lamsach(urldecode( (isset($_POST['idtimviec'])?$_POST['idtimviec']:0 ) ),$con); 
		if($dienthoai != "")
		{
				$query 	= "select idnguoidung from oc_nguoidung a  , (select * from oc_dangnhap where token = '$token' and dienthoai = '$dienthoai' and ungdung ='kiemthem') as b where a.dienthoai = b.dienthoai ";
		
				$idnguoidung = 0;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				while ($row = mysqli_fetch_array($result)) 
				{
						$idnguoidung = $row['idnguoidung'];
						
				}
				if($idnguoidung > 0)
				{
						$query 	= " select a.*, b.ten, b.ngaysinh, b.dienthoai , b.gioitinh,e.url from (select * from kt_nguoidung_timviec where idnguoidung ='$idtimviec') as a left join oc_nguoidung b on a.idnguoidung = b.idnguoidung left join oc_hinhanh e on a.idhinhanh = e.idhinh ";
				
				
				//$query 	= "select * from (select * from kt_nguoidung_timviec where idnguoidung ='$idnguoidung') as a  left join oc_hinhanh e on a.idhinhanh = e.idhinh ";
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						$list = new Danhsach();
						$list->ds = array();
						$list->dscon = array();
					//	$idnguoidung = 0;
						while ($row = mysqli_fetch_array($result)) 
						{
							$tendutuyen = $row['ten'];
							$ngaysinh = $row['ngaysinh'];
							$dienthoai = $row['dienthoai'];
							$ngoaingu = $row['ngoaingu'];
							$hocvan = $row['hocvan'];
							$congviechientai = $row['congviechientai'];
							$mota = $row['mota'];
							$tinh = $row['tinh'];
							$diachi = $row['diachi'];
							$gioitinh = $row['gioitinh'];
							$hinhanh = $IMAGE_URL . $row['url'];
							$query1 =  "select count(a.idvieclam) as soviecxong from kt_dangkyviec a, kt_vieclam b where a.idnguoidung = '$idtimviec' and  a.idvieclam = b.idvieclam and b.congkhai > 2";
							
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							$soviecxong = 0;
							
							while ($row1 = mysqli_fetch_array($result1)) 
							{
									$soviecxong = $row1['soviecxong'];
							}
		
							$soviectocao = 0;
							$soviechailong = 0;
							//////////tim viec hai long /////////////////
							$query1 =  "select count(a.idvieclam) as soviechailong from kt_danhgia_vieclam_tuyendung a  where a.iddanhgia = '$idtimviec' and loai = 1 and hailong = 1";
							
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							
							while ($row1 = mysqli_fetch_array($result1)) 
							{
									$soviechailong = $row1['soviechailong'];
							}
							////////////tim viec bi tocao///////////////
							$query1 =  "select count(a.idvieclam) as soviectocao from kt_danhgia_vieclam_tuyendung a  where a.iddanhgia = '$idtimviec' and loai = 1 and hailong = 2";
							
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							
							while ($row1 = mysqli_fetch_array($result1)) 
							{
									$soviectocao = $row1['soviectocao'];
							}
							//////lay diem hien thi/////////////////
							$query1 = "select sotien as diem from oc_vi where idvi = '$idtimviec'";
							$query1 = "select sotien as diem from oc_vi where idvi = '$idtimviec'";
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							$diem = 0;
							while ($row1 = mysqli_fetch_array($result1)) 
							{
									$diem = $row1['diem'];
							}
							///////////////
							$ban = new Timviec($idtimviec, $ngoaingu, $hocvan,$congviechientai,$mota,$tinh,$diachi,$soviechailong,$soviectocao,$soviecxong,$tendutuyen,$ngaysinh,$dienthoai,$hinhanh,$gioitinh,$diem);
							array_push($list->ds,$ban);
							///////lay danh sach binh luan
							$query1 =  "select a.idnguoidung, a.nhanxet,a.ngaydang, b.tendonvi from kt_danhgia_vieclam_tuyendung a left join kt_nguoidung_tuyendung b on a.idnguoidung = b.idnguoidung where a.iddanhgia = '$idtimviec' and loai = 1 ";
							
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							
							while ($row1 = mysqli_fetch_array($result1)) 
							{
									$idnhanxet = $row1['idnguoidung'];
									$loinhanxet = $row1['nhanxet'];
									$ngaydang = $row1['ngaydang'];
									$tendonvi = $row1['tendonvi'];
									$nhanxet = new Nhanxet($idnguoidung,$tendonvi,$loinhanxet,$ngaydang );
									array_push($list->dscon,$nhanxet);
							}
							
						}
						echo json_encode ($list);
				
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
	
	class Nhanxet{
		var $idnguoidung;
		var $tentuyendung;
		var $loinhanxet;
		var $ngaydang;
		
		function Nhanxet($idnguoidung,$tentuyendung,$loinhanxet,$ngaydang)
		{
			$this->idnguoidung = $idnguoidung;
			$this->tentuyendung = $tentuyendung;
			$this->loinhanxet = $loinhanxet;	
			$this->ngaydang = $ngaydang;
		}
	}
	
	class Timviec{
		var $idnguoidung;
		var $ngoaingu;
		var $hocvan;
		var $congviechientai;
		var $mota;
		var $tinh;
		var $soviecxong;
		var $diachi;
		var $soviechailong;
		var $soviectocao;
		var $tendutuyen;
		var $ngaysinh;
		var $dienthoai;
		var $hinhanh;
		var $gioitinh;
		var $diem;
		function Timviec($idnguoidung, $ngoaingu, $hocvan,$congviechientai,$mota,$tinh,$diachi,$soviechailong,$soviectocao,$soviecxong,$tendutuyen,$ngaysinh,$dienthoai,$hinhanh,$gioitinh,$diem)
		{
			$this->idnguoidung 	 		= $idnguoidung; 
			$this->ngoaingu 		= $ngoaingu; 
			$this->hocvan 		= $hocvan; 
			$this->congviechientai 		= $congviechientai; 
			$this->mota 		= $mota; 
			$this->tinh 		= $tinh; 
			$this->diachi 		= $diachi; 
			$this->soviechailong 		= $soviechailong; 
			$this->soviectocao 		= $soviectocao; 
			$this->soviecxong 		= $soviecxong; 
			$this->tendutuyen 		= $tendutuyen; 
			$this->ngaysinh 		= $ngaysinh; 
			$this->dienthoai 		= $dienthoai; 
			$this->hinhanh 		= $hinhanh; 
			$this->gioitinh 		= $gioitinh; 
			$this->diem 		= $diem; 
		}
	}
	
		
?>