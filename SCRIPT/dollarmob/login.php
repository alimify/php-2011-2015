<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/
include 'db.php';
include 'functions.php';

headtag("$SiteName - Login");

if($userlog==1){
header('Location:/user/dashboard');
}
else {
  if(isset($_POST['user_email']) AND isset($_POST['user_pwd'])){
     
     $user_email=formpost("user_email");
     $user_pwd=formpost("user_pwd");
     $user_password=md5($user_pwd);


     $errors=array();


     $login_check=mysql_query("SELECT * FROM userdata WHERE email='$user_email'");
     
     if(mysql_num_rows($login_check)<1){
        $errors[]='No such user with this email!';
     }
 
     if(mysql_num_rows($login_check)>0){
        $login_check2=mysql_fetch_array($login_check);
        
        if($login_check2['password']!=$user_password){
           $errors[]='Password entered was wrong!';
        }
      }

     if(strlen($user_email)<1){
       $errors[]='Please enter your email!';
      }

     if(strlen($user_pwd)<1){
       $errors[]='Please enter your password!';
     }



     if(empty($errors)){
       $_SESSION['adsgem_email']=$user_email;
       $_SESSION['adsgem_password']=$user_password;
       header('Location:/user/dashboard');
     }

     else {
          echo '<div class="title"><img src="/error.png"/> <font color="red">Login Error:</font></div>';
          echo '<div class="error">';
          foreach($errors as $error){
          echo ''.$error.'<br/>';
          }
          echo '</div>';
     }
   }
   echo '<div class="title">Log in</div>';
   echo '<div class="form"><form method="post"><label for="user_email">Email:</label><br/><input type="text" name="user_email"/><br/><label for="user_password">Password:</label><br/><input type="password" name="user_pwd"/><br/><div id="forgot"><img src="http://dollarmob.com/forgot.png" alt="?"/> <a href="/user/forgot">Forgot Password?</a></div><input type="submit" value="Log in"/></form></div>';

}

echo '<div class="ad"><img src="/home.png"/> <a href="/">Home</a> &#171; Log in</div>';
include 'foot.php';
?>
