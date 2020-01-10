<?php
include 'db.php';
//$_POST 		= json_decode(file_get_contents('php://input'), true);
if(!isset($_POST['firebasetoken']))
		$_POST = json_decode(file_get_contents('php://input'), true);
$token 		= urldecode( (isset($_POST['token'])?$_POST['token']:"" ) ); 
$firebasetoken 		= urldecode( (isset($_POST['firebasetoken'])?$_POST['firebasetoken']:"" ) ); 
$tenmay =  urldecode( (isset($_POST['tenmay'])?$_POST['tenmay']:"" ) );
$ungdung =  urldecode( (isset($_POST['ungdung'])?$_POST['ungdung']:"" ) );
$dienthoai =  urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:"" ) );
//$firebasetoken="cbIVfRTllC0:APA91bFbkQla76_xTLRRS0FxJmF0Eht5TGBgwwhR8KDpr0DFoq8IFlswcNAtHnbg9z31nobgZDRDTLxKMPtcTZy3OA0Jw_yGo0hGC4Mf2MrAioGXdDAsQ4RUM0-sC7VdUqMc9dWrTsqp";
//$token="1e64d37b74c4feff599a7356556aeee7f";
//$dienthoai="1234";


//echo 'dienthoai'.$dienthoai;
//echo $uploaddir = realpath("image/banner");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$ngaynhap = date("Y-m-d H:i:s");


if($dienthoai != "")
{
	
	//$query = "ALTER TABLE `oc_chitietdathang`  DROP PRIMARY KEY, ADD PRIMARY KEY(`idsanpham`,`iddathang`)";
	//	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	
		$query 	= "update oc_dangnhap set firebasetoken = '' where firebasetoken = '$firebasetoken'  ";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$query 	= "update oc_dangnhap set firebasetoken = '$firebasetoken' where token = '$token' and dienthoai = '$dienthoai' and ungdung ='$ungdung' and tenmay ='$tenmay' ";
		echo $query;
	
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
}		



?>