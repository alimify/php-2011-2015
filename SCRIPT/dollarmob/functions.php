<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/
ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Etc/GMT-6');
//Modify these lines and go to hell!
$Adminmail='support@dollarmob.com';
$dollarrate='75';
$SiteName=file_get_contents('http://'.$_SERVER["HTTP_HOST"].'/sitename.txt');

function headtag($headtitle) {
if(empty($headtitle)){
$headtitle='DollarMob - Buy & Sell Traffic ';
}
echo '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<title>'.$headtitle.'</title>
<link rel="stylesheet" type="text/css" href="/web/style.css" />
</head><body><div class="foot" align="center"><a href="/"><img src="/web/logo.png" alt="logo" width="180" height="36"/></a></div>';

$news=mysql_query("SELECT * FROM news ORDER BY id DESC");
$newsf=mysql_fetch_array($news);


echo '<div class="ok"><b><font color="black">NEWS :</font></b><a href="/news/'.$newsf["id"].'"><b>'.$newsf["title"].'</b></a></div>';





}

function formget($val){
$val2=$_GET["$val"];
$get=mysql_real_escape_string(addslashes(htmlspecialchars($val2)));
return $get;
}

function formpost($val1){
$val3=$_POST["$val1"];
$post=mysql_real_escape_string(addslashes(htmlspecialchars($val3)));
return $post;
}
function dump_error($erro){
echo '<div class="error">';
foreach($erro as $errr){
echo ''.$errr.'<br/>';
}
echo '</div>';
}
function dump_udata($udataname){
$uemail=mysql_real_escape_string($_SESSION['adsgem_email']);

$udata=mysql_query("SELECT * FROM userdata WHERE email='$uemail'");
$ufdata=mysql_fetch_array($udata);
return $ufdata["$udataname"];
}


$chssuser=mysql_real_escape_string($_SESSION['adsgem_email']);
$chsspass=mysql_real_escape_string($_SESSION['adsgem_password']);
$chsslog=mysql_query("SELECT * FROM userdata WHERE email='$chssuser'");
$admu=mysql_real_escape_string($_SESSION['adsgem_rony']);
$admp=mysql_real_escape_string($_SESSION['adsgem_rpw']);

if(file_exists("admins/$admu-data.pra")){
$rpC=explode("|-pr-|",file_get_contents("admins/$admu-data.pra"));
if($admp==md5($rpC[2])){
$main_adm=file_get_contents("admins/main-admin.pran");
if($admu==$main_adm){
$admin_id='pranto';
}
$adminlog=1;
}
}
else {
$adminlog=0;
}

if(mysql_num_rows($chsslog)>0){
$dumlog=mysql_fetch_array($chsslog);
if($dumlog["password"]==$chsspass){
$userlog=1;
if(preg_match('/block/',strtolower($dumlog["status"]))){



echo '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<title>DollarMob - Account Blocked!</title><link rel="stylesheet" type="text/css" href="/web/style.css" /></head><body><div class="foot" align="center"><a href="/"><img src="/web/logo.png" alt="logo" width="180" height="36"/></a></div>';echo '<div class="error">Your DollarMob account has blocked.</br> Reason: '.str_replace('blocked',null,$dumlog["status"]).'.</br> Please contact DollarMob Team for unblocking your account. Email: support@dollarmob.com <br/>Phone: (BD)-01832610786 (IN)+919818071048 <br/>Thank you for using our services.</div>';
include 'foot.php';
exit;
}
}
else {
$userlog=0;
}
}


?>
