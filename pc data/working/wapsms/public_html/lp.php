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
if($gmail){
$email = $user_email;
$name = $mysql_name;
$id = $mysql_id;
$token=md5(microtime());
$upre = mysql_query("UPDATE verification SET token='".$token."' WHERE userid='".$id."'");	

if($upre){
///Emailing
$to      = $email;
$subject = 'Varification at WapSmsBD.Com';
$message = 'Dear '.$name.',
Welcome to WapSmsBD.Com!

Just one more step to complete your registration with WapSmsBD! Please click bellow link or alternatively copy and paste the url to your browser!

http://wapsmsbd.com/verify/'.$id.'/'.$token.'


Once you completed the registration procedure you can enjoy full service!


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
	
	print 'Email resend successfully,please check your email ! or you can <a href="/resendmail/">Resend Mail</a>';
	
}else { print 'Sorry there was somthing wrong ! problem to send mail.you can <a href="/resendmail/">Resend Mail</a> '; }}else{ print 'Sorry there was somthing wrong ! problem to send mail.you can <a href="/resendmail/">Resend Mail</a>';}
}	
echo '</div>';
 print '<a href="/"><b>Home</b></a>';
 include("foot.php"); 
echo '</body></html>';	
?>