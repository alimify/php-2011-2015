<?php
$ree = setcookie("u", "", time()-3600);
$res = setcookie("me", "", time()-3600);
if($ree and $res){
header('Location:/');	
}else{echo 'Something erro,please try later.';}
?>

