<?php
include 'db.php';

	//$_POST = json_decode(file_get_contents('php://input'), true);
	if(!isset($_POST['tenmay']))
		$_POST = json_decode(file_get_contents('php://input'), true);
	$token 		= mysqli_real_escape_string($con, (isset($_POST['token'])?$_POST['token']:0 ) ); 	
	
 //$token ="ZwgIUz0lWvzSOsLVJXdHWJXcrEF4wtP95XHMkSiNAOfn4n2zb+VCCyWKUo7epGfjRXVJr+x1Me5nj7roY+5lm/Na/akmvkbZKNoZN3TubGL+UfNqMW+nPpho7jBx+ZEx2Xi8poimqssCjrMHv0jGdpD/LLeXh/HhpxgpHpe2PPo=";
$token = giaimai($token);
//echo 'giai ma:';
// echo $token;
$token = substr($token,0,strlen($token)-1);
/*
echo $token;
echo $_SESSION["token"];

$str = $_SESSION["token"]."";

echo 'len1:'.strlen($token);
echo 'len2:'.strlen($str);
echo strcmp($token, $str);
*/

	$_SESSION["hople"] = "0";
	if(isset($_SESSION["token"]) && $_SESSION["token"]."" == $token."")
			$_SESSION["hople"] = "1";
	
			
		
	echo $_SESSION["hople"];
		
?>