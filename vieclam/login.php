<html>
<head>
</head>
<body>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1591170551113305',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.3'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});
function statusChangeCallback(response)
{
	console.log(response);
}
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
</script>

<fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>
<?php
	$access = $_GET['access'];
	echo "<div id='access'>".$access."  </div>";
?>
</body>
</html>