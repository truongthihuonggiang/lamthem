<?php
@session_start();
include 'db.php';
//	 $_POST = json_decode(file_get_contents('php://input'), true);

	if(/*kiemtraungdung()*/1)
	{
		$query 	= "select * from kt_loaicongviec";
				//echo $query;
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$list = new Danhsach();
		$list->ds = array();
		
		while ($row = mysqli_fetch_array($result)) 
		{
								$id = $row['idloaiviec'];
								$tenloaiviec = $row['tenloaiviec'];
								$ban = new Loaiviec($id,$tenloaiviec);
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
	class Loaiviec{
		var $idloai;
		var $tenloai;
		
		
		function Loaiviec($idloai, $tenloai)
		{
			$this->idloai 	 		= $idloai; 
			$this->tenloai 		= $tenloai; 
			
		}
	}
	
		
?>