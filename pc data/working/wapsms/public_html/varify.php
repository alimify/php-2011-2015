<?php 
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$id = $_GET['id'];
$token = $_GET['token'];
if(!$id and !$token){
	header('Location:/');
}else{
print '<html><head><link rel="stylesheet" href="/m.css" type="text/css"/><title>Varification at WapSmsBD.Com</title></head>';
echo '<body>';
print '<div class="logo" align="left"><div><a href="/"><font size="5" color="white">WapSmsBD.Com</font></a></div></div>';
print '<div class="h1">Varification</div>';
echo '<div class="box">';
$utk = mysql_fetch_array(mysql_query("SELECT token FROM verification WHERE userid = '".$id."'"));
$status = mysql_fetch_array(mysql_query("SELECT status FROM user WHERE id = '".$id."'"));
if($status[0]==1){print 'Your Account Already Active !';}else{
if($token==$utk[0])	{
$res = mysql_query("UPDATE user SET status='1' WHERE id='".$id."'");	
if($res){print 'Your Account Successfully Activate ! <a href="/"><b>Continue</b></a>';}else{print 'Sorry your account not activate,maybe have some problem';}	
}else{ print 'there was an error !';}
	
}
echo '</div>';
   include("foot.php"); 
echo '</body></html>';}

?>