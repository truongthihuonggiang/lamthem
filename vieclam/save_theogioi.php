<?php
@session_start();
include 'db.php';
	if(!isset($_POST['dienthoai']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai	  		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ); 
		$token	  		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 
		$idtheogioi	  		= urldecode( (isset($_POST['idtheogioi'])?$_POST['idtheogioi']:"" ) ); 
		$giatri	  		= urldecode( (isset($_POST['giatri'])?$_POST['giatri']:"" ) ); 
		
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
				
				if($idnguoidung != '0' && $idnguoidung != 0 )
				{
					$query = "insert into kt_nguoidung_theogioi(idnguoidung,idtheogioi,giatri) values ($idnguoidung,'$idtheogioi',$giatri) ON DUPLICATE KEY UPDATE giatri = '$giatri'";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					echo json_encode($result);
				}
			
		}
		else
			echo -2;
	}
	else
		echo -3;
		
?>