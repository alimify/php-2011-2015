<?php
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$sort=$_GET['sort'];
$jump=$_GET['jump']-1;
$cid=$_GET['jid'];
$sort = preg_replace('#[^0-9]#i', '', $sort);
$sort = ereg_replace("[^0-9]", "", $sort);
$cid = preg_replace('#[^0-9]#i', '', $cid);
$cid = ereg_replace("[^0-9]", "", $cid);
$jump = preg_replace('#[^0-9]#i', '', $jump);
$jump = ereg_replace("[^0-9]", "", $jump);
$fldurl = mysql_fetch_array(mysql_query("SELECT folderurl FROM folder WHERE folderid='".$cid."'"));
$name=basename($fldurl[0]);
$name=str_replace(' ','-',$name);
if($sort){
	header("Location:/album$cid-$name-p$jump-s1");	
}else{
	header("Location:/album$cid-$name-p$jump");
}
?>