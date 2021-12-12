<?php
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$cid= $_GET['cid'];
$smsid= $_GET['smsid'];
$page= $_GET['page'];
 $sc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE id = '".$smsid."'"));     
	if($sc[0]==0){} {$nmbr = mysql_fetch_array(mysql_query("SELECT slike FROM smsdata WHERE id='".$smsid."'"));
      $finl = $nmbr[0]+1;
	$res = mysql_query("UPDATE smsdata SET slike='".$finl."' WHERE id='".$smsid."'");}
$name = mysql_fetch_array(mysql_query("SELECT name FROM folder WHERE id='".$cid."'"));
	$file="http://wapsmsbd.com/$cid/$name[0]/$page.html";
	header("Location:$file");
	?>