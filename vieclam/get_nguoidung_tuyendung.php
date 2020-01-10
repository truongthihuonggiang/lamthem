<?php

include 'db.php';
if(!isset($_POST['dienthoai']))
	 $_POST = json_decode(file_get_contents('php://input'), true);
//	 $_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		$dienthoai 		= lamsach(urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:0 ) ),$con); 
	//	echo "dienthoai". $dienthoai;
	//	$dienthoai="0911155078";
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
						$query 	= "select * from kt_nguoidung_tuyendung where idnguoidung ='$idnguoidung' ";
				//echo $query;
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						$listch = array();
						$i = 0;
						$k = -1;
						$kq = 0;
					//	$idnguoidung = 0;
						while ($row = mysqli_fetch_array($result)) 
						{
				//			$idnguoidung = $row['idnguoidung'];
							$tendonvi = $row['tendonvi'];
							$diachi = $row['diachi'];
							$mota = 
							$row['mota'];
								$nguoidung = new Tuyendung($idnguoidung,$tendonvi,$diachi,$mota);
							$i ++;
							echo json_encode($nguoidung);
						}
				//		echo $i;
						if($i == 0)
						{
							$nguoidung = new Tuyendung($idnguoidung,'','','');
							echo json_encode($nguoidung);
						}
				}
				
		}
		else
			echo -2;	
	}		
	else
		echo -3;
	
	class Tuyendung{
		var $idnguoidung;
		var $tendonvi;
		var $diachi;
		var $mota;
		
	
		
		function Tuyendung($idnguoidung, $tendonvi, $diachi,$mota)
		{
			$this->idnguoidung 	 		= $idnguoidung; 
			$this->tendonvi 		= $tendonvi; 
			$this->diachi 		= $diachi; 
			$this->mota 		= $mota; 
		}
	}
	
		
?>