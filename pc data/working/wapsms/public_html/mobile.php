<?php
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$url = "http://kingbd.net";
$site = "KINGBD.NET";
$copy = 4;
$sid = 72;
$uid = 1;
$s=$_GET['show'];
$link='http://bdsms24.com'.$s;
$file = file_get_contents(''.$link.'');
$file=str_replace('BDBOYS.NET','AnyMaza.Com',$file);
$file=str_replace('forum','/forum',$file);
$file=str_replace('<a href="','<a href="http://wapsmsbd.com/mobile.php?show=',$file);
echo $file;

if($copy=='1'){
$ch = curl_init();
$url=$link;
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER,'http://www.google.com');
@curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
$store = curl_exec ($ch);
curl_close($ch);
preg_match_all('|<p class="sms">(.*?)</p>|is',$store,$outs);
foreach($outs[0] as $out){
///Start Copy Function
$out=str_replace('<p class="sms">','',$out);
$out=str_replace('</p>','',$out);
$out=str_replace('|','dslash',$out);
$out=str_replace('
','myspaceslash',$out);
$out=str_replace('<br/>','myspaceslash',$out);
$out=str_replace('<br>','myspaceslash',$out);
$fp = fopen("sms/$sid.dat","a");
$time=time();
flock($fp,2);
fputs($fp,"$out|$time|$sid|0|$uid\r\n");
flock($fp,3);
fclose($fp);
$array = file('sms/'.$sid.'.dat');
$count = count($array);
$ts = $count-1;
$res = mysql_query("INSERT INTO smsdata SET uid='".$uid."', cid='".$sid."', stime='".$time."', smsview='".$ts."'");
	if($res){       
	echo "Copy Done";
	$sc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE uid = '".$uid."'"));     
	$finl = $sc[0];
	$smsnom = mysql_query("UPDATE user SET sms='".$finl."' WHERE id='".$uid."'");
}else{ echo erro_not_copy; }
///End Copy Function
}
}else { echo copy_off;}
?>