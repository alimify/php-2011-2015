<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/

include '../db.php';
include '../functions.php';

$uid=$_SESSION["uid"];
$sid=$_SESSION["sid"];
$aid=$_SESSION["aid"];
$ua=$_SESSION["ua"];
$ip=$_SESSION["ip"];
$ref=$_SESSION["ref"];
$rand=$_SESSION["hash"];
$hash=formget("s");

$errors=array();

if($hash!=$rand){
 $errors[]='a';
}
if($ip!=$_SERVER['REMOTE_ADDR']){
 $errors[]='a';
}
if($ua!=$_SERVER['HTTP_USER_AGENT']){
 $errors[]='a';
}

$date=date("d-m-Y");

$chIp=mysql_query("SELECT * FROM clicks WHERE ip='$ip' AND time='$date'");

if(mysql_num_rows($chIp)>0){
 $errors[]='a';
}

if($_COOKIE['agmc_check']=='done'){
 $errors[]='a';
}

if(empty($errors)){
 
 $Ads=mysql_fetch_array(mysql_query("SELECT * FROM advertises WHERE id='$aid'"));
 $acpc=$Ads["acpc"];
 $ucpc=$Ads["ucpc"];
 $adowner=$Ads["userid"];
 $adurl=$Ads["url"];
 $User=mysql_fetch_array(mysql_query("SELECT * FROM userdata WHERE id='$uid'"));
 $aUser=mysql_fetch_array(mysql_query("SELECT * FROM userdata WHERE id='$adowner'"));
 
 $userbal=$User["pubalance"];
 $auserbal=$aUser["adbalance"];

 $newU=($userbal+$ucpc);
 $newA=($auserbal-$acpc);

 $doIt1=mysql_query("UPDATE userdata SET pubalance='$newU' WHERE id='$uid'");
 $doIt2=mysql_query("UPDATE userdata SET adbalance='$newA' WHERE id='$adowner'");
 $doIt3=mysql_query("INSERT INTO clicks (ip,ua,host,userid,siteid,adid,time,adtype,status) VALUES ('$ip','$ua','$ref','$uid','$sid','$aid','$date','User Ads','VALID')");

 if($doIt1 AND $doIt2 AND $doIt3){
   setcookie('agmc_check','done',time()+3600*24);
   header('Location:'.$adurl.'');
 }
 }
 else {

   $doIt4=mysql_query("INSERT INTO clicks (ip,ua,host,userid,siteid,adid,time,adtype,status) VALUES ('$ip','$ua','$ref','$uid','$sid','$aid','$date','Mobplaza','INVALID')");
   if($doIt4){
     header('Location:http://videoking.in/promoapp/file/qbyynezbo/Videoking.apk');
  }
 }

?> 