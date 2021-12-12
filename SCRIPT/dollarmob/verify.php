<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/
include 'db.php';
include 'functions.php';

headtag("Verify - $SiteName");
$id=formget("id");
$token=formget("token");

$vch=mysql_query("SELECT * FROM userdata WHERE id='$id'");

if(mysql_num_rows($vch)<1){

echo 'User not found!';
exit;
}

$gvch=mysql_fetch_array($vch);

if($gvch['status']=='ACTIVE'){

echo '<div class="error"><img src="/error.png"/> This account is already active!</div>';

}

else {

$doit=mysql_query("UPDATE userdata SET status='ACTIVE' WHERE id='$id'");

if($doit){
echo '<div class="success"><img src="/success.png"/> Account successfully verified! Please <a href="/">Login</a> to continue.</div>';
}
}

include 'foot.php';

?>

