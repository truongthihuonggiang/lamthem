<?php
include 'db.php';
	 if(!isset($_POST['noidungtl']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	
	if(kiemtraungdung())
	{
		$id 		= lamsach(urldecode( (isset($_POST['id'])?$_POST['id']:0 ) ),$con); 
		$id_cauhoinho 		= lamsach(urldecode( (isset($_POST['id_cauhoinho'])?$_POST['id_cauhoinho']:"" ) ),$con);
		$noidung 		= lamsach(urldecode( (isset($_POST['noidungtl'])?$_POST['noidungtl']:"" ) ),$con); 
		$dung 		= lamsach(urldecode( (isset($_POST['dung'])?$_POST['dung']:"" ) ),$con); 
		$congkhai 		= lamsach(urldecode( (isset($_POST['congkhai'])?$_POST['congkhai']:"" ) ),$con); 
		$noidung = mysqli_real_escape_string( $con,$noidung );
		
		
	//	echo '$noidung'. $noidung.$id_cauhoinho.$dung;
		
		
		
		
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$ngaynhap = date("Y-m-d H:i:s");
		
		$nameamthanh = "";
		$namehinh = "";
		if(isset($_FILES['hinhanh']['name']))
		{
			$infohinh = pathinfo($_FILES['hinhanh']['name']);
			$ext = $infohinh['extension']; // get the extension of the file
			if($ext == "jpg" || $ext == "png")
			{
				$namehinh = "hinhtl_".rand().".".$ext ;
				$uploaddir = $SAVE_HOCVUI.$namehinh ;
			
				move_uploaded_file( $_FILES['hinhanh']['tmp_name'], $uploaddir);
			}
		}
		
	
		if( $noidung != "")
		{
					$query = "insert into hv_traloi  ( id,id_cauhoinho,noidungtl, hinhanhtl,congkhai, dung) values('$id','$id_cauhoinho','$noidung','$namehinh','$congkhai',$dung) ON DUPLICATE KEY UPDATE noidungtl = '$noidung',id_cauhoinho = '$id_cauhoinho',hinhanhtl='$namehinh', congkhai = '$congkhai' ,dung = '$dung'";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					echo $result;
		
		}
		else
			echo -1;
	}
	else
		echo -2;
	
?>