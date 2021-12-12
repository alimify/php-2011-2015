<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$smsid= $_GET['smsid'];
$cid= $_GET['cid'];
$page= $_GET['page'];
$name = mysql_fetch_array(mysql_query("SELECT name FROM folder WHERE id='".$cid."'"));
$sms = mysql_fetch_array(mysql_query("SELECT smsview FROM smsdata WHERE id='".$smsid."'"));
$smstext=htmlspecialchars_decode($sms[0]);			
$smsview = nl2br($smstext);
$stime = mysql_fetch_array(mysql_query("SELECT stime FROM smsdata WHERE id='".$smsid."'"));
$url = mysql_fetch_array(mysql_query("SELECT url FROM folder WHERE id='".$cid."'"));
print '<html><head><link rel="stylesheet" href="/m.css" type="text/css" /><title>'.$name[0].' - Copy & Share</title></head><body>';
include("head.php");
///Time Function
$gtime = date("20y-m-d H:i:s", $stime[0]);
$timeAgoObject = new convertToAgo;
$ts = $gtime;
$convertedTime = ($timeAgoObject -> convert_datetime($ts));
$when = ($timeAgoObject -> makeAgo($convertedTime));

print '<div class="h1">'.$name[0].'</div>';
echo '<div class="box">';
echo '<div class="smsbox" align="center">';
print ''.$when.'<div class="sms">'.$smsview.'</div><div class="textarea"><textarea>'.$smsview.'</textarea></div>';
print 'Share By : Sms | Fb | twit | gplus';
echo '</div>';
echo '</div>';
///Return Function
$dir=htmlspecialchars($url[0]);
{

print '<div class="path"><left>
<a href="/"><b>Home</b></a>';

if(($countj=count(explode('/',$dir)))>1)
{
$j=explode('/',$dir);

for($i=0; $i<=$countj; $i++)

{

$u=@$j[count($j)-1];

if($u)

{

$previous=MySQL_Fetch_Array(MySQL_Query("SELECT id from folder where url='".join('/', $j)."';"));
$g[$i]= ' » <a href="/'.$previous[0].'/'.transdir($u).'/'.$page.'.html"><b>'.transdir($u).'</b></a>';

unset($j[count($j)-1]);

}

}

for($i=count(@$g)-1; $i>=0; $i--)

print $g[$i];
}


}
include("foot.php");
print '</body></html>';
?>