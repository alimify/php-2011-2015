<?php
$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
print $top;
print '<meta name="description" content="বাংলা sms,bangla sms,বাংলা এস এম এস,bangla love sms,bangla sad sms,bangla koster sms,shuvo sokal sms,শুভ সকাল এস এম এস,www.bangla sms.com,bangla good night sms"/>
<meta name="keywords" content="বাংলা,bangla,bengali,bd,new,sad,love,romantic,shuvo,sokal,ratri,koster,eid,valobashar,শুভ,সকাল,good,night,morning,sms,এস এম এস"/>';
include 'css.php';
print '<title>WapSmsBD.Com - Bangla SMS Portal</title></head><body>';
include("head.php");
print '<div class="box"><div class="utem"><a href="/latestsms.php">Latest SMS</a></div><div class="utem"><a href="/topsms.php">Top SMS</a></div><div class="utem"><a href="/topuser.php">Top USER</a></div></div>';
if(!$dir)
{print '<div class="h1">Sms Categories</div>';}
else
{

}
echo'<div class="box">';

$fsql="SELECT * FROM folder where cfid='0' ORDER BY place DESC";
$flist=MySQL_Query($fsql);
while($fsite=MySQL_Fetch_Array($flist)){$sid = $fsite['id']; if($sid=="66"){$smstcount1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE cid = '67' or cid = '68' or cid = '69' or cid = '70' or cid = '71' or cid = '72' or cid = '73' or cid = '74' or cid = '75' or cid = '76' or cid = '77' or cid = '78' or cid = '79' or cid = '80' or cid = '81' or cid = '82' or cid = '83'"));	
$smstcount = $smstcount1[0];} else{$smstcount2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE cid = '".$sid."'")); $smstcount = $smstcount2[0];} $fname = $fsite['name'];
$fnames = str_replace(' ','-',$fname);
$adult = $fsite['adult'];if($adult=="1"){
print '<div class="utem">» <a href="/adult/'.$sid.'/'.$fname.'.html" title="'.$fname.' Bangla Sms" />'.$fname.'</a> ('.$smstcount.')</div>';} else{print '<div class="utem">» <a href="/bangla-sms/'.$fnames.'-'.$sid.'" title="'.$fname.' Bangla Sms" />'.$fname.'</a> ('.$smstcount.')</div>';}
 }
echo "</div>";
include("foot.php");
print $foot;
?>