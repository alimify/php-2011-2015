<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$smsid= $_GET['smsid'];
$cid= $_GET['cid'];
$page= $_GET['page'];
$page = preg_replace('#[^0-9]#i', '', $page);
$page = ereg_replace("[^0-9]", "", $page);
$cid = preg_replace('#[^0-9]#i', '', $cid);
$cid = ereg_replace("[^0-9]", "", $cid);
$smsid = preg_replace('#[^0-9]#i', '', $smsid);
$smsid = ereg_replace("[^0-9]", "", $smsid);
$refhost = $_SERVER['REQUEST_URI'];
$file_extension=pathinfo(($refhost), PATHINFO_EXTENSION);
if($file_extension=='html'){$ext='-'.$file_extension.'';}
$name = mysql_fetch_array(mysql_query("SELECT name FROM folder WHERE id='".$cid."'"));
$sms = mysql_fetch_array(mysql_query("SELECT smsview FROM smsdata WHERE id='".$smsid."'"));
$uid = mysql_fetch_array(mysql_query("SELECT uid FROM smsdata WHERE id='".$smsid."'"));
$unm = mysql_fetch_array(mysql_query("SELECT name FROM user WHERE id='".$uid[0]."'"));
$smv = $sms[0];
$file = file('sms/'.$cid.'.dat');
$smsview = explode("|", $file[$smv]);
$smsview[0]= str_replace ("mydjslash", "
", $smsview[0]);
$stime = mysql_fetch_array(mysql_query("SELECT stime FROM smsdata WHERE id='".$smsid."'"));
$url = mysql_fetch_array(mysql_query("SELECT url FROM folder WHERE id='".$cid."'"));
$iparr = split ("\ ", $smsview[0]);
print $top;
print '<title>Bangla '.$name[0].' ['.$smsid.'] - Copy & Share'.$ext.'</title>';
include 'css.php';
print '</head><body>';
include("head.php");
///Time Function
$gtime = date("20y-m-d H:i:s", $stime[0]);
$timeAgoObject = new convertToAgo;
$ts = $gtime;
$convertedTime = ($timeAgoObject -> convert_datetime($ts));
$when = ($timeAgoObject -> makeAgo($convertedTime));
$smstrs = $smsview[0];
print '<div class="h1">'.$name[0].'</div>';
$smsview[0]= str_replace ("dslash", "|", $smsview[0]);
$namesa= str_replace (" ", "-", $name[0]);
echo '<div class="box">';
echo '<div class="smsbox" align="center">';
print ''.$when.'<div class="sms">'.$smsview[0].'</div><div class="user">Posted By <a href="/profile/'.$uid[0].'"><b>'.$unm[0].'</b></a> In <a href="/bangla-sms/'.$namesa.'-'.$cid.'">'.$name[0].'</a></div><div class="textarea"><textarea onclick="this.focus();this.select()">'.$smsview[0].'</textarea></div>';
print 'Share By : <a href="sms:?body='.$smstrs.'"> Sms </a>| <a href="http://www.facebook.com/sharer.php?u=http://wapsmsbd.com/bangla-sms/'.$namesa.'-'.$cid.'.'.$smsid.'-'.$page.'"> FB </a> | <a href="whatsapp://send?text='.$smstrs.'"> WhatsApp </a> | gplus';
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
$frnm=str_replace(' ','-',transdir($u));
$g[$i]= ' » <a href="/bangla-sms/'.$frnm.'-'.$previous[0].'.'.$page.'"><b>'.transdir($u).'</b></a>';

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