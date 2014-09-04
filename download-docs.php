<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Acme Plug-In</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<!--Acme Plug-In Script - Lesson 10 - OBJ 2 - by Katherine Hambley superdesigngirl@mac.com-->

<style>
* {margin: 0; padding: 0;}
body {font-family: 'Oswald', sans-serif; font-weight: 400; letter-spacing: 3; background: #09F;}
#container {margin: 0px auto; width: 500px; padding: 15px; background: #FFF;}
form input[type="submit"] {width: 375px; text-align: center; border: 1px solid #8e8e46; background: #9c9f4e; color: #FFF; -webkit-border-radius: 2px; border-radius: 2px; font-size: 14px; text-transform: uppercase; padding: 14px; }
</style> 
</head>

<body>
<?php 
function checkUserInfo() {
	$user_ip = 0;
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	/*echo $user_agent;*/
	$user_ip = $_SERVER['HTTP_X_FORWARDED_FOR']; //"202"; to test preg_match 
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
		echo 'Your platform and browser are compatible.<br/>Click the button to download.<br/><br/><input type="submit" value="Download Now!" />';
		} else {
			
			} 
}
?>
<div id="container">
<h3>Welcome to Acme Plug-In Company!</h3><br/>
	<?php
  checkUserInfo();
  ?>
</div>

</body>
</html>