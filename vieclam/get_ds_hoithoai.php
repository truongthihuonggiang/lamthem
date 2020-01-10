<?php
	@session_start();
   	include 'db.php';
	if(!isset($_POST['idnguoidung']))
		$_POST = json_decode(file_get_contents('php://input'), true);

	 $idnguoidung 		= urldecode( (isset($_POST['idnguoidung'])?$_POST['idnguoidung']:"" ) );
	if (1 )
	{
	 	$list =new  Danhsach();
	 	$list->nd= array();
	 	$query = "SELECT * FROM oc_hoithoai a , (select * from oc_chitiethoithoai where idnguoidung ='$idnguoidung') as b where a.id = b.idhoithoai ";
		$baseurl = $IMAGE_URL ;
	 	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	 	while ($row = mysqli_fetch_array($result)) 
					{
						 	$ID = $row['id'];
							$query1 = "select  e.ten, g.avatar, e.idnguoidung  from oc_nguoidung e inner join (select * from oc_chitiethoithoai where idnguoidung <> '$idnguoidung' and idhoithoai ='$ID') b on e.idnguoidung = b.idnguoidung inner join oc_page_canhan g on e.idnguoidung = g.idnguoidung ";
							//echo $query1;
						 	$Tennd = "";
							$avatar = "";
							$i = 0;
								$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
							while ($row1 = mysqli_fetch_array($result1)) 
							{
								if($i > 0)
									$Tennd = $Tennd . ",";
								$Tennd = $Tennd. $row1['ten'];
								$avatar =$row1['avatar'];
								if(strlen($avatar ) > 0)
								{
									$Hinhanh = $baseurl .$avatar ;
								}
								else
								{
									$Hinhanh = "https://cuoituan.vn/media/images/avatar.png";
								}
								$query1 = "SELECT * FROM oc_hoithoai where id = '$ID'";
								$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
								while ($row1 = mysqli_fetch_array($result1)) 
								{
									$thoigian = $row1['thoigian'];
									$tinnhan = $row1['noidung'];
								}
								
								if( strlen($Tennd) > 0)
								{
									$noidung = new noidung($ID,$Tennd,$Hinhanh,$tinnhan,$thoigian);
									array_push($list->nd, $noidung);
								}
							}
							
							
							
						
					}
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
			var $Tennd;
			var $Hinhanh;
			var $tinnhan;
			var $thoigian;

			function noidung($ID,$Tennd,$Hinhanh,$tinnhan,$thoigian)
			{	
				$this->ID= $ID;
				$this->Tennd = $Tennd;
				$this->Hinhanh = $Hinhanh;
				$this->tinnhan = $tinnhan;
				$this->thoigian = $thoigian;
			
			}
	}
	
?>