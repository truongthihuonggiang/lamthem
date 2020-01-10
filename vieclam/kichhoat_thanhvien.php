<?php
include 'db.php';
//	 $_POST = json_decode(file_get_contents('php://input'), true);
	
		$code 		= lamsach(urldecode( (isset($_POST['code'])?$_POST['code']:"" ) ),$con); 
		$madangky 		= lamsach(urldecode( (isset($_POST['madangky'])?$_POST['madangky']:"" ) ),$con);
		$mamay 		= lamsach(urldecode( (isset($_POST['mamay'])?$_POST['mamay']:"" ) ),$con); 
		$sotien 		= lamsach(urldecode( (isset($_POST['sotien'])?$_POST['sotien']:"" ) ),$con); 
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$ngaynhap = date("Y-m-d H:i:s");
	
		
	
		if( kiemtraungdung() && $mamay != "" && $code == md5('12@b') && $madangky != "")
		{
				$query = "select a.idthanhvien, b.thoigian from oc_dangky a, oc_loaithanhvien b where  and a.madangky = '$madangky' and a.idloai = b.id and b.giatien = '$sotien'";
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$idnguoidung = 0;			
				while ($row = mysqli_fetch_array($result)) 
				{
					$idnguoidung = $row['idthanhvien'];
					$idthanhvien = $row['idthanhvien'];
					$thoigian = $row['thoigian'];
					
				}
				if($idnguoidung != 0 || $idnguoidung != "0")
				{
					$query = "select * from oc_thanhvien where id =  ".$idnguoidung ." and tghethan < now()";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					$i = 0;
					while ($row = mysqli_fetch_array($result)) 
					{
						$query = "update oc_thanhvien set tghethan = DATE_ADD(now(), INTERVAL $thoigian DAY) where id = $idnguoidung";
						mysqli_query($con,$query) or die(mysqli_error($con));
						$i ++;
					}
					if($i == 0)
					{
						$query = "update oc_thanhvien set tghethan = DATE_ADD(tghethan, INTERVAL $thoigian DAY) where id = $idnguoidung";
						mysqli_query($con,$query) or die(mysqli_error($con));
					}
					$query = "update oc_dangky set dadangky = 1 where madangky = '$madangky'";
						mysqli_query($con,$query) or die(mysqli_error($con));
					echo 1;
				}
				else
					echo 0;
			
					
			
		}
		else
			echo 3;
		
	
	
?>