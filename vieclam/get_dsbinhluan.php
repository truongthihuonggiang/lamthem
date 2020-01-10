<?php
@session_start();
include 'db.php';
if(!isset($_POST['idvieclam']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	$dienthoai	  		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ); 
		$token	  		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 
		$idvieclam	  		= urldecode( (isset($_POST['idvieclam'])?$_POST['idvieclam']:"" ) ); 
	if(kiemtraungdung())
	{
				$query 	= "select * from oc_nguoidung where dienthoai = '".$dienthoai."' and kichhoat = 1";
				//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$listch = array();
				$idnguoidung = 0;
				while ($row = mysqli_fetch_array($result)) 
				{
						$idnguoidung = $row['idnguoidung'];
				}
				
				$query = "select a.idtacgia, b.tendonvi from kt_vieclam a left join kt_nguoidung_tuyendung b on a.idtacgia = b.idnguoidung where a.idvieclam = '$idvieclam'";
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$idtacgia = 0;
				$tendonvi = "";
				while ($row = mysqli_fetch_array($result)) 
				{
								$idtacgia = $row['idtacgia'];
								$tendonvi = $row['tendonvi'];
				}
				
				
				
		$query 	= "select a.* , b.ten from kt_binhluan_vieclam a left join oc_nguoidung b on a.idnguoidung = b.idnguoidung where a.congkhai = 1 and idvieclam = '$idvieclam'";
				//echo $query;
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$list = new Danhsach();
		$list->ds = array();
		
		while ($row = mysqli_fetch_array($result)) 
		{
								$idnguoidung = $row['idnguoidung'];
								$ten = $row['ten'];
								$noidung = $row['noidung'];
								$id = $row['id'];
								$ngaydang = $row['ngaydang'];
								if($idnguoidung == $idtacgia)
									$ten = $tendonvi;
								$binhluan = new Binhluan($idnguoidung, $ten,$noidung, $ngaydang, $id, $idvieclam);
								array_push($list->ds,$binhluan);
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
	class Binhluan{
		var $idnguoidung;
		var $ten;
		var $noidung;
		var $ngaydang;
		var $id;
		var $idvieclam;
		function Binhluan($idnguoidung, $ten,$noidung, $ngaydang, $id, $idvieclam)
		{
			$this->idnguoidung 	 		= $idnguoidung; 
			$this->ten 		= $ten; 
			$this->noidung 		= $noidung; 
			$this->ngaydang 		= $ngaydang; 
			$this->id 		= $id; 
			$this->idvieclam 		= $idvieclam; 
		}
	}
	
		
?>