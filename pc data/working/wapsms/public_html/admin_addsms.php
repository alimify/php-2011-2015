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
$sms= str_replace ("|", "dslash", $sms);
	$time = time();
$fp = fopen("sms/$sid.dat","a");
flock($fp,2);
fputs($fp,"$sms|$time|$sid|0|1\r\n");
flock($fp,3);
fclose($fp);
echo "Your Update Submitted :) <br/>";
$array = file('sms/'.$sid.'.dat');
$count = count($array);
$ts = $count-1;
	$res = mysql_query("INSERT INTO smsdata SET uid='1', cid='".$sid."', stime='".$time."', smsview='".$ts."'");
	print '<a href="/adminlist-j+z.php?cid='.$sid.'">Back</a><form action="" method="POST"><input type="text" name="sms" value=""><input type="hidden"name="sid" value="'.$sid.'"><input type="submit" name="submit"></form>';	} else {print '<form action="" method="POST"><input type="text" name="sms" value=""><input type="hidden" name="sid" value="'.$cid.'"><input type="submit" name="submit"></form>';	}
	echo $cid;
	?>