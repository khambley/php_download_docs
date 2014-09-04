<!doctype html>
<html>
<head>
<title>Acme, Inc.</title>
<link rel="stylesheet" href="http://students.oreillyschool.com/resource/php_lesson.css" type="text/css" />
</head>
<body>
<?php 
function checkUserInfo() {
	$user_ip = 0;
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	/*echo $user_agent;*/
	$user_ip = $_SERVER['HTTP_X_FORWARDED_FOR']; //"202"; to test preg_match HTTP_X_FORWARDED_FOR doesn't work on my localhost (undefined index)
	$platform = "Platform Unknown";
	$browser = "Browser Unknown";
	$ip = 1;
	
	//First, check the IP address
	if(preg_match('/^[202]/', $user_ip)) {
		$ip = 0;
		echo "Access Denied";
		exit();
		}
	//Second get the platform
	if(preg_match('/Macintosh/', $user_agent)) {
		$platform = 'Macintosh';
	} else if(preg_match('/Windows/', $user_agent)) {
		$platform = 'Windows';
		} else {
			echo $platform . "<br>You need to use a Mac or Windows platform with this plug-in.<br/>Your platform is not compatible with this plug-in.\n";
			}
	
	//Third, get the browser
	if(preg_match('/Firefox/', $user_agent)) {
		$browser = 'Firefox';
	//MSIE check for IE10 and under
	} else if (preg_match('/MSIE/', $user_agent) || preg_match('/Mozilla/', $user_agent) && preg_match('/Trident/', $user_agent)) { // check for Mozilla & Trident token for IE11
		$browser = "Internet Explorer";
	} else if ($platform == 'Macintosh' && $browser != "Firefox") {
		echo "Please download the Firefox browser on your Mac.<br/>Click the link <a href='http://www.mozilla.org/en-US/firefox/new/' target='_blank'>here</a> to download.";
	} else if ($platform == 'Windows' && $browser != "Internet Explorer" || $browser != "Firefox") {
		echo "Please download the Internet Explorer browser on your PC.<br/>Click the link <a href='http://windows.microsoft.com/ie' target='_blank'>here</a> to download.";
	} else {
		echo $browser . "<br>Your browser is not compatible with this plug-in.\n";
	}
	
	//Fourth, check user platform / browser / IP combo
	if ($ip == 1 && $platform == "Macintosh" && $browser == "Firefox" || ($ip == 1 && $platform == "Windows" && $browser == "Internet Explorer" || $browser == "Firefox" )) {
		echo 'Your platform and browser are compatible.<br/>Click the button to download.<br/><br/><a href="download.php"><b>Download our PDF brochure!</b></a>';
		} 
}
?>
<div class="topbar">
ACME, INC.
</div>
<table>
<tr><td class="sidebar" valign="top">

links go here

</td><td class="content">
<h3>Welcome to Acme Plug-In Company!</h3><br/>
<?php
  checkUserInfo();
?>
</td></tr></table>
<div class="bottombar">
</div>
</body>
</html>