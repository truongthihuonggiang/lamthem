<?php
@session_start();
include 'db.php';
	// $_POST = json_decode(file_get_contents('php://input'), true);
	if(1)
	{
		$user 		= lamsach(urldecode( (isset($_POST['user'])?$_POST['user']:"" ) ),$con); 
		
		$matkhau	  		= urldecode( (isset($_POST['matkhau'])?$_POST['matkhau']:"" ) ); 
	/*	$tenmay="Galaxy A7 2016";
		$dienthoai="0911155078";
		$matkhau="123456";
		*/
		//$matkhau = md5($matkhau . "!@1a3B");
			$query 	= "select * from oc_banmedma_user where password = '".$matkhau."' and public = 1";
			//	echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$listch = array();
				$i = 0;
				$k = -1;
				$kq = 0;
				while ($row = mysqli_fetch_array($result)) 
				{
						$listch[$i] = new stdClass();
						$listch[$i]->username = $row['username'];
						
						if($listch[$i]->username == $user)
							$k = $i;
						$i++;
				}
				if ($k != -1)
				{
					echo 1;
				}
				else
				{
					echo 0;
				}
	}
	
		
?>