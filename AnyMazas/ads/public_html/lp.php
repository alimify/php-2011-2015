<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
print '<html><head><link rel="stylesheet" href="/m.css" type="text/css"/><title>Reset Password :: WapSmsBD.Com</title></head>';
echo '<body>';
print '<div class="logo" align="left"><div><a href="/"><font size="5" color="white">WapSmsBD.Com</font></a></div></div>';
print '<div class="h1">Reset Password</div>';
echo '<div class="box">';
$submit_email=$_POST['submit_email'];
if($submit_email){
$eexist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM user WHERE email = '$submit_email'"));
if($eexist[0]>0){
$id=MySQL_Fetch_Array(MySQL_Query("SELECT id FROM user where email='$submit_email'"));
$token=md5(microtime());
$upre = mysql_query("UPDATE verification SET token='$token' WHERE userid='$id[0]'");	
print $upre;
if($upre){
///Emailing
$to      = $submit_email;
$newpassword=rand(100000,999999);
$subject = 'New Password - WapSmsBD.Com';
$message = 'Dear '.$name.',
Welcome Back to WapSmsBD.Com!
Activation Link - <a href="http://wapsmsbd.com/activation/password/'.$id.'/'.$newpassword.'/'.$token.'">http://wapsmsbd.com/activation/password/'.$id.'/'.$newpassword.'/'.$token.'</a>

Your New Password - '.$newpassword.'

Support:
'.$Adminmail.'

Thanks,
WapSmsBD Team,
WapSmsBD.Com';
 $headers .= "Reply-To: WapSmsBD <admin@wapsmsbd.com>\r\n";
  $headers .= "Return-Path: WapSmsBD <admin@wapsmsbd.com>\r\n";
  $headers .= "From: WapSmsBD <admin@wapsmsbd.com>\r\n"; 
 $headers .= "Organization: WapSmsBD.Com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
  $headers .= "X-Priority: 3\r\n";
  $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
$sendmail = mail($to, $subject, $message, $headers);	
	
	
if($sendmail){
	
	print '<font color="red">New password send to your email,please check and active it!</font>';
	
}else { print '<font color="red">Sorry there was somthing wrong ! Try Again</font>'; }}else{print 'something error happend !</font>';}


}else{print '<font color="red">Sorry no user found with this email.Try again with correct email !</font><br/><form action="" method="post">Email : <br/><input type="text" name="submit_email"><br/><input type="submit" name="submit" value="SUBMIT"></form>';}
}else{print '<form action="" method="post">Email : <br/><input type="text" name="submit_email"><br/><input type="submit" name="submit" value="SUBMIT"></form>';}	
echo '</div>';
 print '<a href="/"><b>Home</b></a>';
 include("foot.php"); 
echo '</body></html>';	
?>