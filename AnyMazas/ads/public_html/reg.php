<?php
print 'currently signup close !';
exit;
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
print '<html><head><meta content="chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0; maximum-scale=1.0;"/><link rel="stylesheet" href="/m.css" type="text/css"/><title>Sign up at WapSmsBD.Com</title></head>';
echo '<body>';
print '<div class="logo" align="left"><div><a href="/"><font size="5" color="white">WapSmsBD.Com</font></a></div></div>';
print '<div class="h1">Sign Up</div>';
echo '<div class="box">';
if($mysql_status){
   header('Location:/user/data/');
   }else{if(isset($_POST['submit'])){
	$name=$_POST["name"];
   $email=$_POST["email"];
   $pass1=$_POST["pass1"];
   $pass2=$_POST["pass2"];
   $captcha=$_POST["captcha"];
   $terms=$_POST["terms"];
   //Codes
$errors=array();
unset($errors);
  //Empty
$name=HTMLSpecialChars($name);  
if(strlen($name)<1){
$errors[]='Name field left empty!';
}
if(strlen($email)<1){
$errors[]='Email field left empty!';
}
if(strlen($pass1)<1){
$errors[]='Password field left empty!';
}
if(strlen($pass2)<1){
$errors[]='Repeat Password field left empty!';
}
if(strlen($captcha)<1){
$errors[]='Captcha field left empty!';
}
///Invalid
if(!preg_match('/^([a-zA-Z0-9_.-]+)\@([a-zA-Z0-9_.-]+)\.([a-zA-Z0-9_.-]+)$/', $email)){
$errors[]='Email is not valid!';
}
if($pass1!=$pass2){
$errors[]='Passwords didn\'t match!';
} 

 if($_SESSION['captcha']!=$captcha){
$errors[]='Captcha code entered is wrong!';
   }
if($terms!=1){$errors[]='You must agree to our terms!';} 
$emfv = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM user WHERE email = '".$email."'"));  
if($emfv[0]>0){$errors[]='Email already registered with another account!';} 
if(empty($errors)){
  $password=md5($pass1);	
	$reg = mysql_query("INSERT INTO user SET name='".$name."', email='".$email."', pass='".$password."'");	
if($reg){
$userid = mysql_fetch_array(mysql_query("SELECT id FROM user WHERE email = '".$email."'"));  	
$token=md5(microtime());
$varrd = mysql_query("INSERT INTO verification SET userid='".$userid[0]."', token='".$token."'");	

///Emailing
$to      = $email;
$subject = 'Varification at WapSmsBD.Com';
$message = 'Dear '.$name.',
Welcome to WapSmsBD.Com!

Just one more step to complete your registration with WapSmsBD! Please click bellow link or alternatively copy and paste the url to your browser!

http://wapsmsbd.com/verify/'.$userid[0].'/'.$token.'


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
mail($to, $subject, $message, $headers);	
$expires = 1 * 1000 * 60 * 60 * 24;
	setcookie("wapsmsbd_email", $email, time()+$expires);
	setcookie("wapsmsbd_password", $password, time()+$expires);
header('Location:/user/data');	
	}else { echo 'Unknown Eror';}	
	
	
}else{
	print 'These error happend !<br/>'; 
	foreach($errors as $error){
echo '- '.$error.'<br/>';
}}




   } 
print '<form method="post">Name :<br/><input type="text" name="name"/><br/>Email :<br/><input type="text" name="email"/><br/>Password :<br/><input type="password" name="pass1"/><br/>Varified Password :<br/><input type="password" name="pass2"/><br/><img src="/im'.md5(rand(1,50000)).'.jpg" alt="Loading.."/><br/>Captcha :<input type="text" name="captcha"/>input captcha from image<br/><input type="checkbox" name="terms" value="1"/> agree <a href="/terms.php">terms</a> <br/><input type="submit" name="submit" value="Register"/></form>';
print 'Already have account ? <a href="/user/login">Login now !</a>';
}
echo '</div>';
 print '<a href="/"><b>Home</b></a>';
 include("foot.php"); 
echo '</body></html>';
 ?>