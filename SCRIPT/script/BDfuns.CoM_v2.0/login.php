<?php session_start();
//include 'setup.php';
include 'core.php';
include 'admin_settings.php';
$apass=$_POST['apass'];
if(isset($apass)) { if($password==$apass) { session_register($apass); header("Location:apanel_index.php"); }
else { die(''.$head.'<b>Entered pass '.$apass.' is Incorrect</b>'.$foot.''); } }
else { echo $head; echo '<form method="post" action="login.php"><b>Enter Password:<input type="password" name="apass"/><input type="submit" value="Submit"/></b></form>'; echo $foot; }
?>
