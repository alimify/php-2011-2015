<?php 
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$cid= $_GET['cid'];
if(isset($_POST['submit'])){
	$sid=$_POST["sid"];
	$sms=$_POST["sms"];
	$sms=HTMLSpecialChars($sms);
	$sid=HTMLSpecialChars($sid);
	$availe=mysql_fetch_array(mysql_query("SELECT * FROM smsdata WHERE smsview='".$sms."'"));
	if($availe){ echo "sms already added";}else{
		print '<a href="/adminlist_j+z.php?cid=".$sid."">Back</a>';
		$res = mysql_query("INSERT INTO smsdata SET uid='1', cid='".$sid."', stime='".time()."', smsview='".$sms."'");}
	print '<form action="" method="POST"><input type="text" name="sms" value=""><input type="hidden"name="sid" value="'.$sid.'"><input type="submit" name="submit"></form>';	} else {print '<form action="" method="POST"><input type="text" name="sms" value=""><input type="hidden" name="sid" value="'.$cid.'"><input type="submit" name="submit"></form>';	}
	echo $cid;
	?>