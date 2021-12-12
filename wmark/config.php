<?php
///Ads Status
$adset=1;
//Random File
$random=on;
//Top File
$topfile=on;
///Listing
$filelist=10;
$folderlist=20;
//Filelist
$allfile = 'mp4,3gp,mp3,apk,jar,jpg,jpeg,png,amr,jad,zip';
if($myseo=='2'){$doseo='<meta name="robots" content="noindex,nofollow">';}else{$doseo='';}
///Header-Footer
if($adset=='1'){$adsconfig='';}
$head = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>'.$adsconfig.'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name=viewport content="width=device-width, initial-scale=1"><meta http-equiv="Cache-Control" content="max-age=0" /><title>'.$title.''.$tsort.''.$tpage.'</title>'.$doseo.'<style type="text/css">
/*<![CDATA[*/'.$css.'/*]]>*/
</style></head>
<body>
<div class="logo"><img src="/logo.png" alt="logo" />'.$topextra.'</div> ';
if($adminpass==$userpass){$logout='<a href="/logout.php">Logout</a>';}
$foot = ''.$logout.'<div class="ftrLink"><a href="/" class="siteLink">'.$sitename.'</a></div></body></html>';
?>