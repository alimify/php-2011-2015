<?php
include 'css.php';
print '<style>'.$css.'</style>';
$pin=intval($_POST['pin']);
$submit=htmlspecialchars($_POST['submit']);
$name='pin';
$adminpass='12356';
echo '<center>';

if($submit && $pin){
if($adminpass==$pin){
setcookie($name,$pin, time() + (86400 * 30), "/");
}else{print '<title>Incorrect Pin !</title><font color="red">Incorect pin !</font>';}}elseif($submit && !$pin){print '<title>Please enter Pin !</title><font color="red">please enter pin !</font>';}else{print '<title>Login Now !</title>';}

if($adminpass==$pin){print '<title>Successfully Logged</title><b><font color="green">Login successfully</font><br/><a href="'.$_SERVER[REQUEST_URI].'">Continue to Work</a></b>';}else{print '<form action="" method="post">Enter Pin :<br/><input type="text" name="pin"><br/><input type="submit" name="submit" value="submit"></form>';}
echo '<br/><a href="/">Home</a></center>';
?>