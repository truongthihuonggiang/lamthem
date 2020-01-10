<?php

include 'db.php';
if(!isset($_POST['dienthoai']))
	 $_POST = json_decode(file_get_contents('php://input'), true);
	// $_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai	  		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ); 
		$token	  		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 
		$idloai	  		= urldecode( (isset($_POST['idloai'])?$_POST['idloai']:"" ) ); 
		$giatri	  		= urldecode( (isset($_POST['giatri'])?$_POST['giatri']:"" ) ); 
			$solan	  		= urldecode( (isset($_POST['solan'])?$_POST['solan']:0 ) ); 
		
		
		if($dienthoai != "" )
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
				
				if($idnguoidung != '0' && $idnguoidung != 0)
				{
					$query = "insert into kt_nguoidung_timviec_loaiviec (idnguoidung,idloai,mongmuon,solan) values ('$idnguoidung','$idloai','$giatri','0') ON DUPLICATE KEY UPDATE mongmuon = '$giatri', solan = '$solan' ";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					if($result == true)
					echo json_encode(1);
				}
				
			
		}
		else
			echo -1;
	}
	else
		echo -2;
		
?>