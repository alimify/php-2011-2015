<?php
include 'db.php';
include 'config.php';
include 'func.php';
$page_title='Login';
include 'head.php';
print '<div class="smslist"><h1 class="center">Sign In</h1><div class="admin_content">';

$u=htmlspecialchars($_POST['u']);
$me=htmlspecialchars($_POST['me']);
$submit=htmlspecialchars($_POST['submit']);

if($submit){
if($u && $me){

if($password!=$u){
$errors[]='incorrect something !';
}
if($admin!=$me){
$errors[]='incorrect something !';
}

}else{
	$errors[]='incorrect something !';
}

if(empty($errors)){  
$expires = 86400 * 45;
	$set_u=setcookie("u", $u, time()+$expires,'/');
	$set_me=setcookie("me", $me, time()+$expires,'/');
	if($set_u && $set_me){header('location:/');}
}else{print '<div class="notification">Something Incorrect !</div>';}

}

if(admin_check($type,$admin,$password)=='1'){
print '<div class="login_css"><b>Login Successfully</b><br/><a href="/"><b>Continue To Work</b></a></div>';	
}else{print add_action_form('','post');
print add_input_form('ME','me','');
print add_input_form('You','u','');
print add_submit_form('submit','Enter');}
print '</div></div>';


print '<footer class="footer"><ul class="col-full category-list" id="category">
<div class="clear"></div></ul><ul class="footer-links"> <li><a href="/">Home</a></li><li></li> <li><a href="/news_list.php">News</a></li><li><a href="/mobile_list.php">Mobile</a></li><li id="right"><a href="#top">Goto Top</a></li></ul> <div class="clear"></div> <div class="copyright">© 2010-2016 MostBD.Com</div></footer></body> </html>';
?>