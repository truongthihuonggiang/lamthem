<html>
<head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-5437344106154965",
          enable_page_level_ads: true
     });
</script>
</head>
<body>
<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//
//$_POST = json_decode(file_get_contents('php://input'), true);

$quangcao = '<center><div style="border: 1px dotted grey; width:90%; padding:4px; margin:10px  "> <div style="text-align:left"> <span > Quảng cáo </span> </div> 
		
		<div style=" width:90%;">
		
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
			 style="display:block; text-align:center;"
			 data-ad-layout="in-article"
			 data-ad-format="fluid"
			 data-ad-client="ca-pub-5437344106154965"
			 data-ad-slot="2423444320"></ins>
		<script>
			 (adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		</div>
		
		</div></center>';

?>
<style>
code {
    display: inline-block;
    font-size: 37px;
    margin-bottom: 0.5em;
}
code {
    color: #c7254e;
    padding: 2px 4px;
    font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
    font-size: 190%;
    background-color: #f9f2f4;
    border-radius: 4px;
}
h2 {color:Green; font-size:120%}
</style>
<div style="float: left; width:49%">
<h2> Tìm UID của page, group, profile </h2>

<form method="post" action-xhr="/" target="_top" novalidate="" class="i-amphtml-form">
<span> Điền link cần tìm: </span>
        <input name="page" type="text" placeholder=" link " class="input-lg form-control" required="">
        <input class="btn btn-primary" type="submit" value="Tìm ID →">
    </form>
	
	<br/>
	<h2> Download Video từ facebook </h2>

<form action="" method="POST" id="form_download">
                  <div class="input-group col-lg-10 col-md-10 col-sm-10">
            			<input name="url" class="form-control input-md ht53" placeholder="Enter Facebook Video URL ..." type="text" value="" required="">
            			<span class="input-group-btn"><button class="btn btn-primary input-md btn-download ht53" type="submit" id="btn_submit">Download</button></span>
  					      </div>
                </form>
				
<?php
if(isset($_POST['page']))
{
	
	$page 		= urldecode( (isset($_POST['page'])?$_POST['page']:"" ) ); 
//echo $page;
	$url = 'https://findmyfbid.net/get-id-facebook.php?url='.$page 	;
	//echo $url;
	$response = file_get_contents($url);
	//$response = curl_exec( $ch );
	echo '<code>'.substr($response,8,strlen($response)-10).'</code>';
}
else
	
if(isset($_POST['url']))
{
	echo 'video';
	$page 		= urldecode( (isset($_POST['url'])?$_POST['url']:"" ) ); 

	$url = 'https://www.getfvid.com/downloader' 	;

	 $ch = curl_init();
     

	$post = [
		'url' => $page 
		
	];
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);


	$response = curl_exec($ch);
	$pos1 = strpos($response,"<video",0);
	$pos2 = strpos($response,"</video>",0)+8;
	$video = substr($response,$pos1 ,$pos2 -$pos1);
	echo $video ;
	
	curl_close($ch);
}
?>
</div>
<div style="float:right; width:49%">
<?php
echo $quangcao;
echo "<br/><br/>";
echo $quangcao;
?>
</div>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- cuoituan4 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5437344106154965"
     data-ad-slot="4750403653"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>