<?php
@session_start();
include 'db.php';
	if(!isset($_POST['dienthoai']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	if(kiemtraungdung())
	{
		
		$dienthoai	  		= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) ); 
		$token	  		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 
		$idvieclam	  		= urldecode( (isset($_POST['idvieclam'])?$_POST['idvieclam']:"" ) ); 
		$noidung	  		= urldecode( (isset($_POST['noidung'])?$_POST['noidung']:"" ) ); 
		$noidung = mysqli_real_escape_string( $con,$noidung );
		
		
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
				
				if($idnguoidung != '0' && $idnguoidung != 0 && strlen($noidung) > 0)
				{
					$query = "insert into kt_binhluan_vieclam (idnguoidung,idvieclam,noidung,ngaydang,congkhai) values ($idnguoidung,'$idvieclam','$noidung',now(),1) ";
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