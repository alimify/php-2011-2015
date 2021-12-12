<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
print '<html><head><meta content="chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0; maximum-scale=1.0;"/><link rel="stylesheet" href="/m.css" type="text/css"/><title>Login at WapSmsBD.Com</title></head>';
echo '<body>';
print '<div class="logo" align="left"><div><a href="/"><font size="5" color="white">WapSmsBD.Com</font></a></div></div>';
print '<div class="h1">Login</div>';
echo '<div class="box">';
if($mysql_status==1){header('Location:/user/data/');}
if($mysql_status==2){ print 'you recently registerd,but not active yet ! we request you to active your account by login into email which you provide and click the link of mail<br/>Dont get the mail ?<a href="/resendmail"><b>Resend</b></a><br/>'; }
if($mysql_status==3){print 'Sorry your account has been blocked<br/>';}
if(!$mysql_status){
if(isset($_POST['submit'])){
$email = $_POST['email'];
$pass = $_POST['password'];
$password=md5($pass);	
 //Codes
$errors=array();
unset($errors);
  //Empty
if(strlen($email)<1){
$errors[]='Please enter email!';
}
if(strlen($pass)<1){
$errors[]='Please enter password!';
}
$utk = mysql_fetch_array(mysql_query("SELECT pass FROM user WHERE email = '".$email."'"));
if(strlen($email)>1){  
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
if(!$utk[0]){ $errors[]='Email doesn\'t exist!'; }}else{ $errors[]='Email format incorrect!';}

   }
   
   if(strlen($pass)>1){  
	if($utk[0]){  
if($password!=$utk[0]){
$errors[]='incorrect passwords!';
}
} 
}

	foreach($errors as $error){
echo '<font color="">'.$error.'</font><br/>';
}

if(empty($errors)){  
$expires = 86400 * 45;
	setcookie("wapsmsbd_email", $email, time()+$expires,'/');
	setcookie("wapsmsbd_password", $password, time()+$expires,'/');
header('Location:/user/data/');
} 	

} 

print '<form method="post">Email :<br/><input type="text" name="email"/><br/>Password :<br/><input type="password" name="password"/><br/><input type="submit" name="submit" value="Login"/></form>';	
}
if(!$mysql_status){print 'Not have account ? <a href="/signup">Register now</a>';}
echo '</div>';
 print '<a href="/"><b>Home</b></a>';
 include("foot.php"); 
echo '</body></html>';
?>