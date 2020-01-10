<?php
@session_start();
include 'db.php';
$ss = 0.2;
//	 $_POST = json_decode(file_get_contents('php://input'), true);
if(!isset($_POST['tinh']))
		$_POST = json_decode(file_get_contents('php://input'), true);
$v0 		= urldecode( (isset($_POST['v0'])?$_POST['v0']:"" ) ); 
$v1 		= urldecode( (isset($_POST['v1'])?$_POST['v1']:"" ) ); 		
$tinh 		= urldecode( (isset($_POST['tinh'])?$_POST['tinh']:"" ) ); 
	if(/*kiemtraungdung()*/1)
	{
		$query 	= "select * from kt_nguoidung_tuyendung a inner join oc_vi b on a.idnguoidung = b.idsohuu order by b.sotien desc ";
				//echo $query;
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$list = new Danhsach();
		$list->ds = array();
		
		while ($row = mysqli_fetch_array($result)) 
		{
								$idnguoidung = $row['idnguoidung'];
								$tendonvi = $row['tendonvi'];
								$diachi = $row['diachi'];
								$mota = $row['mota'];
								$tinh = $row['tinh'];
								$query = "select count(idtacgia) as soviecchuaxong from kt_vieclam where idtacgia = '$idnguoidung' and congkhai = 1";
								$soviecchuaxong = 0;
								$result1 = mysqli_query($con,$query) or die(mysqli_error($con));
								while ($row = mysqli_fetch_array($result1)) 
								{
									$soviecchuaxong = $row['soviecchuaxong'];
								}
								$soviecxong = 0;
								$query = "select count(idtacgia) as soviecxong from kt_vieclam where idtacgia = '$idnguoidung' and congkhai > 2";
								$result1 = mysqli_query($con,$query) or die(mysqli_error($con));
								while ($row = mysqli_fetch_array($result1)) 
								{
									$soviecxong = $row['soviecxong'];
								}
								$ban = new Tuyendung($idnguoidung,$tendonvi,$diachi,$mota,$tinh,$soviecchuaxong,$soviecxong);
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
	class Tuyendung{
		var $idnguoidung;
		var $tendonvi;
		var $diachi;
		var $mota;
		var $tinh;
		var $soviecchuaxong;
		var $soviecxong;
		function Tuyendung($idnguoidung, $tendonvi,$diachi,$mota,$tinh,$soviecchuaxong,$soviecxong)
		{
			$this->idnguoidung 	 		= $idnguoidung; 
			$this->tendonvi 		= $tendonvi; 
			$this->diachi 		= $diachi; 
			$this->mota 		= $mota; 
			$this->tinh 		= $tinh; 
			$this->soviecchuaxong 		=$soviecchuaxong; 
			$this->soviecxong 		=  $soviecxong;
		}
	}
	
		
?>