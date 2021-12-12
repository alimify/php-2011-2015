<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$uid=$_GET['uid'];
$unm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM user where id='".$uid."'")); 
$status=MySQL_Fetch_Array(MySQL_Query("SELECT status FROM user where id='".$uid."'")); 
if($status[0]=='2'){$pstat=Inactive;}elseif($status[0]=='1'){$pstat=Active;}
print '<title>'.$unm[0].'</title>'.$unm[0].' is '.$pstat.' user !';
?>