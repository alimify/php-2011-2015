<?php
$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
print $top;
print '<title>WapSmsBD.Com - Bangla SMS Portal</title><link rel="stylesheet" href="/m.css" type="text/css" /></head><body>';
include("head.php");
print '<div class="box"><div class="sms"><a href="/latestsms.php">Latest SMS</a></div><div class="sms"><a href="/topsms.php">Top SMS</a></div></div>';
if(!$dir)
{print '<div class="h1">Sms Categories</div>';}
else
{

}
echo'<div class="box">';

$fsql="SELECT * FROM folder where cfid='0' ORDER BY place DESC";
$flist=MySQL_Query($fsql);
while($fsite=MySQL_Fetch_Array($flist)){$sid = $fsite['id'];$fname = $fsite['name']; $adult = $fsite['adult'];if($adult=="1"){
print '<div class="fmenu">» <a href="/adult/'.$sid.'/'.$fname.'.html" title="'.$fname.'" />'.$fname.'</a></div>';} else{print '<div class="fmenu">» <a href="/'.$sid.'/'.$fname.'.html" title="'.$fname.'" />'.$fname.'</a></div>';}
 }
echo "</div>";
print '<div class="h1" align="center">WapSmsBD.Com - 2015</div>';
print $foot;
?>