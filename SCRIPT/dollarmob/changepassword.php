<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/

include 'db.php';
include 'functions.php';

headtag("$SiteName - Change Password");

if($userlog==1){
echo '<div class="title">Change password</div>';
 $uid=dump_udata("id");

 if(isset($_POST['newpwd1']) AND isset($_POST['newpwd2']) AND isset($_POST['captcha'])){

  $newpwd1=formpost("newpwd1");
  $newpwd2=formpost("newpwd2");  
  $captcha=formpost("captcha");

  $errors=array();

  if(strlen($newpwd1)<1){
     $errors[]='Password cannot be empty!';
  }
  
  
  if(strlen($newpwd2)<1){
     $errors[]='Verify Password cannot be empty!';
  }

  if($newpwd1!=$newpwd2){
     $errors[]='Passwords did not match!';
   }

  if($_SESSION['captcha']!=$captcha){
     $errors[]='Captcha code was wrong!';
   }

   if(empty($errors)){
      $newpwd=md5($newpwd1);
      $uppwd=mysql_query("UPDATE userdata SET password='$newpwd' WHERE id='$uid'");
      if($uppwd){
         echo '<div class="success">Password changed! <a href="/">Please login</a></div>';
       session_destroy();
       }
      else {
         echo 'unk';
       }
    }
    else {
      dump_error($errors);
    }
}
 
echo '<div class="form"><form method="post">New Password:<br/><input type="password" name="newpwd1"/><br/>Verify New Password:<br/><input type="password" name="newpwd2"/><br/>Captcha:<br/><img src="/im'.md5(microtime()).'.jpg"/><br/>Input the words showing in image.<br/><input type="text" name="captcha"/><br/><input type="submit" value="Change"/></form></div>';

echo '<div class="ad"><img src="/home.png"/> <a href="/">Home</a> | <a href="/myaccount">My Account</a></div>';

include 'foot.php';


}

else {

header('Location:/');
}
?>

