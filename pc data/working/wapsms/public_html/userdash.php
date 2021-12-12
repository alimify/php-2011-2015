<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
print '<html><head><link rel="stylesheet" href="/m.css" type="text/css"/><title>Dashboard :: WapSmsBD.Com</title></head>';
echo '<body>';
print '<div class="logo" align="left"><div><a href="/"><font size="5" color="white">WapSmsBD.Com</font></a></div></div>';
print '<div class="h1">Dashboard</div>';
echo '<div class="box">';
if($mysql_status=='1'){print 'We Are Working here plz back after few moments';}
if($mysql_status=='2'){print 'Your account is inactive,you need to active your account.to active your account please login your email and check inbox,also spam folder.<br/>dont recieve mail? <a href="/resendmail"><b>Resend</b></a> ';}
if($mysql_status=='3'){print 'Your Account has been blocked';}
if(!$mysql_status){  header('Location:/user/login/');  }
echo '</div>';
print '<a href="/"><b>Home</b></a>';
include("foot.php"); 
echo '</body></html>';
?>