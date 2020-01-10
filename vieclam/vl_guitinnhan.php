<?php
	@session_start();
   	include 'db.php';
	if(!isset($_POST['idnguoidung']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	 $noidungtinnhan	= urldecode( (isset($_POST['noidungtinnhan'])?$_POST['noidungtinnhan']:"" ) );
	 $idtacgia 		= urldecode( (isset($_POST['idtacgia'])?$_POST['idtacgia']:"" ) );
	 $idhoithoai 		= urldecode( (isset($_POST['idhoithoai'])?$_POST['idhoithoai']:"" ) );
	if ($noidungtinnhan!='' && $idtacgia!='' && $idhoithoai!='') {
		
						
							$colums = array(
								'idhoithoai' 		=> "'".$idhoithoai."'",
								'message' 		=> "'".$noidungtinnhan."'",
								'idnguoigui' 		=> "'".$idtacgia."'",
								'thoigian' 		=> "now()",
							);

							$keys 	= implode(", ",array_keys($colums));
							$values = implode(", ",array_values($colums));
							$query2 = "INSERT INTO oc_noidunghoithoai($keys) values ($values)";
							
							$result2 = mysqli_query($con,$query2) or die(mysqli_error($con));	
							$query1 = " update oc_hoithoai set noidung = '$noidungtinnhan', thoigian = now() where id = '$idhoithoai'";
							$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));	
												
					
					 guitinnhan($idtacgia,$idhoithoai,$noidungtinnhan,$con);
				
	}

?>
