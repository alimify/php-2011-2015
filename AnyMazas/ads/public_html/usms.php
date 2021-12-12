<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$cid= $_GET['cid'];
print '<html><head><link rel="stylesheet" href="/m.css" type="text/css"/><title>Post New Sms :: WapSmsBD.Com</title></head>';
echo '<body>';
print '<div class="logo" align="left"><div><a href="/"><font size="5" color="white">WapSmsBD.Com</font></a></div></div>';
print '<div class="h1">Dashboard</div>';
echo '<div class="box">';
if($mysql_status=='2'){print 'Your account is inactive,you need to active your account.to active your account please login your email and check inbox,also spam folder.<br/>dont recieve mail? <a href="/resendmail"><b>Resend</b></a> ';}
if($mysql_status=='3'){print 'Your Account has been blocked';}
if(!$mysql_status){  header('Location:/user/login/');  }
if($mysql_status=='1'){
	if(isset($_POST['submit'])){
	$sid=$_POST["sid"];
	$sms=$_POST["sms"];
	$sms=HTMLSpecialChars($sms);
	$sid=HTMLSpecialChars($sid);
if(strlen($sms)<1){
$errors[]='Sms field left empty!';
}elseif(strlen($sms)<10){
$errors[]='Minimum 10 words !';
}
$smsview[0]= str_replace ("</", "< / ", $smsview[0]);
$sms= str_replace ("|", "dslash", $sms);
$sms= str_replace ("
", "mydjslash", $sms);
	$time = time();
if($errors){
	foreach($errors as $error){
echo ''.$error.'<br/>';
}
}else {
$fp = fopen("sms/$sid.dat","a");
flock($fp,2);
fputs($fp,"$sms|$time|$sid|0|1\r\n");
flock($fp,3);
fclose($fp);
$array = file('sms/'.$sid.'.dat');
$count = count($array);
$ts = $count-1;
$res = mysql_query("INSERT INTO smsdata SET uid='".$mysql_id."', cid='".$sid."', stime='".$time."', smsview='".$ts."'");
	if($res){       
	echo "Your Sms Submitted :) <br/>";
	$sc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE uid = '".$mysql_id."'"));     
	$finl = $sc[0];
	$smsnom = mysql_query("UPDATE user SET sms='".$finl."' WHERE id='".$mysql_id."'");
}}
print '<center><form action="" method="POST"><textarea name="sms"></textarea><input type="hidden"name="sid" value="'.$sid.'"><br/><input type="submit" value="Submit" name="submit"></form></center>';
}else { if($cid and !$sid){print '<center><form action="" method="POST"><textarea name="sms"></textarea><input type="hidden" name="sid" value="'.$cid.'"><br/><input type="submit" value="Submit" name="submit"></form></center>'; } 	}
	
	
	
}
echo '</div>';
if(!$sid){ $fldnm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM folder where id='".$cid."'")); $fldnm2=str_replace(' ','-',$fldnm[0]); print '<a href="/"><b>Home</b></a> » <a href="/bangla-sms/'.$fldnm2.'-'.$cid.'"><b>'.$fldnm[0].'</b></a>';}else{ $fldnm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM folder where id='".$sid."'")); $fldnm2=str_replace(' ','-',$fldnm[0]); print '<a href="/"><b>Home</b></a> » <a href="/bangla-sms/'.$fldnm2.'-'.$sid.'"><b>'.$fldnm[0].'</b></a>';}
include("foot.php"); 
echo '</body></html>';
?>