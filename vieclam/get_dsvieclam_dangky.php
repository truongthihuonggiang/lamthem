 <?php

include 'db.php';
if(!isset($_POST['dienthoai']))
		$_POST = json_decode(file_get_contents('php://input'), true);

	
	$dienthoai	= urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:0 ) ); 
	$token	= urldecode( (isset($_POST['token'])?$_POST['token']:0 ) ); 	
	if(kiemtraungdung())
	{
		
			$query1 	= "select idnguoidung from oc_nguoidung a  , (select * from oc_dangnhap where token = '$token' and dienthoai = '$dienthoai') as b where a.dienthoai = b.dienthoai ";
	
				//echo $query; 
				$idnguoidung = 0;
				$result = mysqli_query($con,$query1) or die(mysqli_error($con));
				while ($row = mysqli_fetch_array($result)) 
				{
						$idnguoidung = $row['idnguoidung'];
						
				}
			if($idnguoidung > 0)
			{
				
					$query 	= " 
					select c.*, d.url from (select a.* ,b.duyet, b.ngaydangky, e.tendonvi from (select idvieclam, duyet, ngaydangky from kt_dangkyviec where idnguoidung = '$idnguoidung') as b left join kt_vieclam a  on b.idvieclam = a.idvieclam left join kt_nguoidung_tuyendung e on a.idtacgia = e.idnguoidung ) as c left join oc_hinhanh d on c.idhinhanh = d.idhinh order by c.ngaydangky  desc limit 0,100


					 ";
				
			}
		
	
		
	//	echo $query;
		if($query != "")
		{
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
			$list = new Danhsach();
			$list->ds = array();
			
			while ($row = mysqli_fetch_array($result)) 
			{
									$id = $row['idvieclam'];
									$tenvieclam = $row['tenvieclam'];
									$mota = $row['mota'];
									$v0 = $row['v0'];
									$v1 = $row['v1'];
									$nhaduong = $row['nhaduong'];
									$phuongxa = $row['phuongxa'];
									$thanhpho = $row['thanhpho'];
									$tinh = $row['tinh'];
									$idtacgia = $row['idtacgia'];
									$tentacgia = $row['tendonvi'];
									$luonggio = $row['luonggio'];
									$luongtrongoi = $row['luongtrongoi'];
									$songuoi = $row['songuoi'];
									$ngaydang = $row['ngaydang'];
									$ngaybatdau = $row['ngaybatdau'];
									$ngayketthuc = $row['ngayketthuc'];
									$hinhanh = $IMAGE_URL . $row['url'];
									$idloai = $row['idloaiviec'];
									$congkhai = $row['congkhai'];
									
									$chuaduyet = $row['duyet'];
									
									$query1 = "select count(*) as dadangky from kt_dangkyviec where idvieclam = '$id' and duyet = 1";
									$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
									$dadangky = 0;
									while ($row = mysqli_fetch_array($result1)) 
									{
											$dadangky = $row['dadangky'];
											
									}
									$conviec = new Vieclam($id,$tenvieclam, $mota,$v0,$v1,$nhaduong,$phuongxa,$thanhpho,$tinh,$idtacgia,$tentacgia,$luonggio,$luongtrongoi,$songuoi,$ngaydang,$ngaybatdau,$ngayketthuc,$hinhanh,$idloai,$congkhai,$dadangky,$chuaduyet);
									
									array_push($list->ds,$conviec);
			}
			///////////////////tra ve danh sach san pham moi /////////////
			echo json_encode ($list);
		}
		else
			echo '-2';
		
	
	}		
	else
		echo -3;
	class Danhsach{
		var $ds;
		var $dscon;
		function Danhsach()
		{
		}
	}
	class Vieclam{
		var $id ;
		var $tenvieclam ;
		var $mota;
		var $v0 ;
		var	$v1 ;
		var $nhaduong ;
		var $phuongxa ;
		var $thanhpho ;
		var $tinh ;
		var $idtacgia ;
		var $tentacgia ;
		var $luonggio ;
		var $luongtrongoi ;
		var $songuoi ;
		var $ngaydang ;
		var $ngaybatdau ;
		var $ngayketthuc ;
		var $hinhanh ;
		var $idloaiviec ;
		var $dadangky ;
								
		var $chuaduyet ;
		var $congkhai;
		function Vieclam($id,$tenvieclam, $mota,$v0,$v1,$nhaduong,$phuongxa,$thanhpho,$tinh,$idtacgia,$tentacgia,$luonggio,$luongtrongoi,$songuoi,$ngaydang,$ngaybatdau,$ngayketthuc,$hinhanh,$idloaiviec,$congkhai,$dadangky,$chuaduyet )
		{
			
			$this->id = $id;
			$this->tenvieclam =$tenvieclam ;
			$this->mota=$mota;
			$this->v0=$v0 ;
			$this->v1=$v1 ;
			$this->nhaduong = $nhaduong;
			$this->phuongxa = $phuongxa ;
			$this->thanhpho = $thanhpho ;
			$this->tinh = $tinh ;
			$this->idtacgia = $idtacgia ;
			$this->tentacgia = $tentacgia ;
			$this->luonggio=$luonggio ;
			$this->luongtrongoi=$luongtrongoi ;
			$this->songuoi=$songuoi ;
			$this->ngaydang=$ngaydang ;
			$this->ngaybatdau=$ngaybatdau ;
			$this->ngayketthuc=$ngayketthuc ;
			$this->hinhanh=$hinhanh ;
			$this->idloaiviec=$idloaiviec ;
			$this->dadangky=$dadangky ;
			$this->chuaduyet=$chuaduyet ;
			$this->congkhai=$congkhai ;
		}
	}
	
		
?>