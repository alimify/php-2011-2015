<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/

$dbcon=mysql_connect('localhost','dollarmo_p','.gpajt');
$dbselect=mysql_select_db('dollarmo_p',$dbcon);

if(!$dbcon OR !$dbselect){
 echo 'Database connection failed!';
exit;
}

?>
