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
$allfile = 'mp3,apk';
if($myseo=='2'){$doseo='<meta name="robots" content="noindex,nofollow">';}else{$doseo='<meta name="description" content="'.$pagedescription.''.$tsort.''.$tpage.'" /><meta name="keywords" content="'.$pagekeywords.''.$tsort.''.$tpage.'" /><meta content="chrome=1" http-equiv="X-UA-Compatible" />
<meta name="revisit-after" content="1 days" />
<meta content="1,2,3,10,11,12,13,ATF" name="serps" />
<meta content="5" name="seoconsultantsdirectory" />
<meta content="Abdul Alim Jewel" name="author" />
<meta content="General" name="Rating" />
<meta content="never" name="Expires" />
<meta content="all" name="audience" />
<meta content="english" name="Language" />
<meta name="format-detection" content="telephone=no" />
<meta name="HandheldFriendly" content="true" />
<meta name="robots" content="index,follow" />
<meta name="distribution" content="global" />
<meta name="Identifier-URL" content="http://kingbd.net" />';}
///Header-Footer
if($adset=='1'){$adsconfig='';}
$head = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>'.$adsconfig.'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name=viewport content="width=device-width, initial-scale=1"><meta http-equiv="Cache-Control" content="max-age=0" /><title>'.$title.''.$tsort.''.$tpage.'</title>'.$doseo.'<style type="text/css">
/*<![CDATA[*/'.$css.'/*]]>*/
</style></head>
<body>
<div class="logo"><img src="http://kingbd.net/logo.png" alt="logo" />'.$topextra.'</div> ';
$foot = '<div class="ftrLink"><a href="/" class="siteLink">BilalBD.Com</a></div></body></html>';
?>