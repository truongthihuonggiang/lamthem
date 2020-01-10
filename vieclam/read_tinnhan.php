<?php
	@session_start();
   	include 'db.php';
	if(!isset($_POST['idtacgia']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	 $idtacgia 		= urldecode( (isset($_POST['idtacgia'])?$_POST['idtacgia']:"" ) );
	  $idhoithoai 		= urldecode( (isset($_POST['idhoithoai'])?$_POST['idhoithoai']:"" ) );
	 $idnguoinhan 		= urldecode( (isset($_POST['idnguoinhan'])?$_POST['idnguoinhan']:"" ) );
	 $tentacgia 		= urldecode( (isset($_POST['tentacgia'])?$_POST['tentacgia']:"" ) );
	
	if (($idtacgia !='' && $idnguoinhan != ''  ) || $idhoithoai != '')
	{
			$list =new  Danhsach();
			$list->nd= array();
			$i = 0;
			if($idtacgia !='' && $idnguoinhan != ''  )
			{
				
				$query = "SELECT	a.idhoithoai FROM (select  * from oc_chitiethoithoai where idnguoidung = '$idtacgia') as a inner join (select  * from oc_chitiethoithoai where idnguoidung = '$idnguoinhan') as  b on a.idhoithoai = b.idhoithoai";
				//echo $query;
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				if ($result->num_rows != 0) {
				while ($row = mysqli_fetch_array($result))
						{
							$idhoithoai = $row['idhoithoai'];
							$i ++;
						}
				}
				if ($i == 0)
				{
					$colums = array(
					'tennd' =>"'".$tentacgia."'",
					'thoigian' 		=> "now()",
					);

					$keys 	= implode(", ",array_keys($colums));
					$values = implode(", ",array_values($colums));
					$query = "INSERT INTO oc_hoithoai($keys) values ($values)";

					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					$id =  mysqli_insert_id($con);
			//		echo '1';
			//		echo $query;
					$query2 = "INSERT INTO `oc_chitiethoithoai`(`idhoithoai`, `idnguoidung`) VALUES ('$id','$idtacgia')";

					$result2 = mysqli_query($con,$query2) or die(mysqli_error($con));
//	echo '2';	echo $query2;		
				$query3 = "INSERT INTO `oc_chitiethoithoai`(`idhoithoai`, `idnguoidung`) VALUES ('$id','$idnguoinhan')";

					$result3 = mysqli_query($con,$query3) or die(mysqli_error($con));
//echo '3';echo $query3;
				}
			}
				
				
					
									$noidung = new noidung($idhoithoai);
									
									$query2 = "SELECT * FROM (select * from `oc_noidunghoithoai` where idhoithoai = '$idhoithoai' order by thoigian desc limit 0,100) as a INNER JOIN oc_nguoidung b on a.idnguoigui=b.idnguoidung  order by a.thoigian asc ";
									
								//	echo '4';
								//	echo $query2;
								//	echo '5';
									$result2 = mysqli_query($con,$query2) or die(mysqli_error($con));
									while ($row2 = mysqli_fetch_array($result2))
												{
														$IDn = $row2['idhoithoai'];
														$IDngui= $row2['idnguoigui'];
														$Noidung = $row2['message'];
														$Thoigian = $row2['thoigian'];
														$Tennd= $row2['ten'];
														$noidungtinnhan = new noidungtinnhan($IDn,$IDngui,$Noidung,$Thoigian,$Tennd);

														array_push($noidung->Noidungtinnhan, $noidungtinnhan);

												}

									array_push($list->nd, $noidung);

					
				
			



									

			
			echo json_encode($list);

	}
	
	

	


class Danhsach{
		var $nd;
		//var $dscon;
		function Danhsach()
		{
		}
	}

	class noidung{
			var $ID;
			var $Noidungtinnhan;

			function noidung($ID)
			{
				$this->ID= $ID;
				$this->Noidungtinnhan = array();
			}
	}
	class noidungtinnhan{
		var $ID;
		var $IDngui;
		var $Noidung;
		var $Thoigian;
		var $Tennd;
		function noidungtinnhan($ID,$IDngui,$Noidung,$Thoigian,$Tennd){
			$this->ID = $ID;
			$this->IDngui = $IDngui;
			$this->Noidung = $Noidung;
			$this->Thoigian = $Thoigian;
			$this->Tennd = $Tennd;
		}
	}

?>