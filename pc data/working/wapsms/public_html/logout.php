<?php
$ree = setcookie("wapsmsbd_email", "", time()-3600);
$res = setcookie("wapsmsbd_password", "", time()-3600);
if($ree and $res){
header('Location:/');	
}else{echo 'Something erro,please try later.';}
?>

