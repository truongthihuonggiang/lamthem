<?php

include 'db.php';
if(!isset($_POST['dienthoai']))
	 $_POST = json_decode(file_get_contents('php://input'), true);
	if(/*kiemtraungdung()*/1)
	{
		$dienthoai 		= lamsach(urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:0 ) ),$con); 
	//	echo "dienthoai". $dienthoai;
	//	$dienthoai="0911155078";
		if($dienthoai != "")
		{
				$query 	= "select a.idnguoidung, b.traphi, a.email from (select * from oc_nguoidung  where dienthoai = '".$dienthoai."' and kichhoat = 1) as a left join 	kt_nguoidung_kiemthem b on a.idnguoidung = b.idnguoidung";
				//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$listch = array();
				$i = 0;
				$k = -1;
				$kq = 0;
				while ($row = mysqli_fetch_array($result)) 
				{
					if($row["traphi"] == "null")
						$row["traphi"] = "0";
					$nguoidung = new Nguoidung($row["idnguoidung"],$row["email"],$row["traphi"]);
					$i++;
					echo json_encode($nguoidung);
				}
				if( $i == 0)
					echo -1;
				
				
		}
		else
			echo -2;	
	}		
	else
		echo -3;
	
	class Nguoidung{
		var $idnguoidung;
		var $email;
		var $maso;
		
	
		
		function Nguoidung($idnguoidung, $email, $maso)
		{
			$this->idnguoidung 	 		= $idnguoidung; 
			$this->email 		= $email; 
			$this->maso 		= $maso; 
			
		}
	}
	
		
?>