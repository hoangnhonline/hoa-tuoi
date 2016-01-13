<?php 
session_start();
$lang = $_POST['lang'];
if($lang == "vi" || $lang == "en"){
	setcookie("nguyentin-lang", $lang, time()+3600*24*2);
	$_SESSION['nguyentin-lang'] = $lang;
}else{
	$lang = "vi";
}
?>