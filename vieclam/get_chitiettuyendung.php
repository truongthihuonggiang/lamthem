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
		$idtuyendung		= lamsach(urldecode( (isset($_POST['idtuyendung'])?$_POST['idtuyendung']:0 ) ),$con); 
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
						$query 	= " select * from kt_nguoidung_tuyendung where idnguoidung = '$idtuyendung' ";
				
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						$list = new Danhsach();
						$list->ds = array();
						$list->dscon = array();
					//	$idnguoidung = 0;
						while ($row = mysqli_fetch_array($result)) 
						{
							$tendonvi = $row['tendonvi'];
							$diachi = $row['diachi'];
							$mota = $row['mota'];
							
							$query1 =  "select count(b.idvieclam) as soviecxong from kt_vieclam b where b.idtacgia = '$idtuyendung' and b.congkhai > 2";
							
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							$soviecxong = 0;
							
							while ($row = mysqli_fetch_array($result1)) 
							{
									$soviecxong = $row['soviecxong'];
							}
		
							$soviectocao = 0;
							$soviechailong = 0;
							//////////tim viec hai long /////////////////
							$query1 =  "select count(a.idvieclam) as soviechailong from kt_danhgia_vieclam_tuyendung a  where a.iddanhgia = '$idtuyendung' and a.loai = 2 and hailong = 1";
							
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							
							while ($row = mysqli_fetch_array($result1)) 
							{
									$soviechailong = $row['soviechailong'];
							}
							////////////tim viec bi tocao///////////////
							
								////////////tim viec bi tocao///////////////
							$query1 =  "select count(a.idvieclam) as soviectocao from kt_danhgia_vieclam_tuyendung a  where a.iddanhgia = '$idtuyendung' and a.loai = 2 and hailong = 2";
							
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							
							while ($row = mysqli_fetch_array($result1)) 
							{
									$soviectocao = $row['soviectocao'];
							}
							
								////////////songuoitheogioi///////////////
							$query1 =  "select count(idnguoidung) as sotheogioi from kt_nguoidung_theogioi  where idtheogioi = '$idtuyendung' and giatri = '1'";
							$sotheogioi = 0;
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							
							while ($row = mysqli_fetch_array($result1)) 
							{
									$sotheogioi = $row['sotheogioi'];
							}
							/////////tim theo gioi viec/////////////
							$query1 =  "select giatri from kt_nguoidung_theogioi where idtheogioi = '$idtuyendung' and idnguoidung = '$idnguoidung'";
							
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							$theogioi = 0;
							while ($row = mysqli_fetch_array($result1)) 
							{
									$theogioi = $row['giatri'];
							}
							//////lay diem hien thi/////////////////
								$query1 = "select sotien as diem from oc_vi where idvi = '$idtuyendung'";
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							$diem = 0;
							while ($row1 = mysqli_fetch_array($result1)) 
							{
									$diem = $row1['diem'];
							}
							
							$ban = new Tuyendung($idtuyendung, $tendonvi,$diachi,$mota,"",$soviecxong,$soviectocao,$soviechailong,$theogioi,$sotheogioi,$diem);
							array_push($list->ds,$ban);
							///////lay danh sach binh luan	
							$query1 =  "select a.idnguoidung, a.nhanxet,a.ngaydang, b.ten from kt_danhgia_vieclam_tuyendung a left join oc_nguoidung b on a.idnguoidung = b.idnguoidung where a.iddanhgia = '$idtuyendung' and a.loai = 2 ";
							
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							
							
							while ($row = mysqli_fetch_array($result1)) 
							{
									$idnhanxet = $row['idnguoidung'];
									$loinhanxet = $row['nhanxet'];
									$ngaydang = $row['ngaydang'];
									$tendonvi = $row['ten'];
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
	
	class Tuyendung{
		var $idnguoidung;
		var $tendonvi;
		var $diachi;
		var $mota;
		var $tinh;
		var $soviectocao;
		var $soviecxong;
		var $soviechailong;
		var $theogioi;
		var $sotheogioi;
		var $diem;
		function Tuyendung($idnguoidung, $tendonvi,$diachi,$mota,$tinh,$soviecxong,$soviectocao,$soviechailong,$theogioi,$sotheogioi,$diem)
		{
			$this->idnguoidung 	 		= $idnguoidung; 
			$this->tendonvi 		= $tendonvi; 
			$this->diachi 		= $diachi; 
			$this->mota 		= $mota; 
			$this->tinh 		= $tinh; 
			$this->soviectocao 		=$soviectocao; 
			$this->soviecxong 		=  $soviecxong;
			$this->soviechailong 		=  $soviechailong;
			$this->theogioi 		=  $theogioi;
			$this->sotheogioi 		=  $sotheogioi;
			$this->diem 		=  $diem;
		}
	}
	
		
?>