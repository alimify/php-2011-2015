<?php
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$cid= $_GET['cid'];
$smsid= $_GET['smsid'];
$page= $_GET['page'];
$page = preg_replace('#[^0-9]#i', '', $page);
$page = ereg_replace("[^0-9]", "", $page);
$cid = preg_replace('#[^0-9]#i', '', $cid);
$cid = ereg_replace("[^0-9]", "", $cid);
$smsid = preg_replace('#[^0-9]#i', '', $smsid);
$smsid = ereg_replace("[^0-9]", "", $smsid);
 $sc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE id = '".$smsid."'"));     
	if($sc[0]==0){} {$nmbr = mysql_fetch_array(mysql_query("SELECT slike FROM smsdata WHERE id='".$smsid."'"));
      $finl = $nmbr[0]+1;
	$res = mysql_query("UPDATE smsdata SET slike='".$finl."' WHERE id='".$smsid."'");}
$name = mysql_fetch_array(mysql_query("SELECT name FROM folder WHERE id='".$cid."'"));
$name[0] = str_replace(' ','-',$name[0]);	
	$file="http://wapsmsbd.com/bangla-sms/$name[0]-$cid.$page";
	header("Location:$file");
	?>