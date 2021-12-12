<?
///Filelist
$filelist=8;
///Folderlist
$folderlist=20;
$adstop='ads/top.txt';
$adsmiddle='ads/middle.txt';
$adsbottom='ads/bottom.txt';

if($t!=='1'){$seo ='<meta name="description" content="'.$pagedescription.''.$tsort.''.$tpage.'" /><meta name="keywords" content="'.$pagekeywords.''.$tsort.''.$tpage.'" /><meta content="chrome=1" http-equiv="X-UA-Compatible" /><meta name="revisit-after" content="1 days" /><meta content="1,2,3,10,11,12,13,ATF" name="serps" /><meta content="5" name="seoconsultantsdirectory" /><meta content="Abdul Alim Jewel" name="author" /><meta content="General" name="Rating" /><meta content="never" name="Expires" /><meta content="all" name="audience" /><meta content="english" name="Language" /><meta name="format-detection" content="telephone=no" /><meta name="HandheldFriendly" content="true" /><meta name="robots" content="index,follow" /><meta name="distribution" content="global" /><meta name="Identifier-URL" content="http://anymaza.in" />';}

$head='<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml"><head><title>'.$title.''.$tsort.''.$tpage.'</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">'.$seo.'<style type="text/css">/*<![CDATA[*/'.$css.'/*]]>*/</style></head><body><div class="logo"><a href="/"><img alt="AnyMaza.IN" src="http://get.downloader.pw/logo.png" /></a></div><div id="mainDiv"><div class="ad1 tCenter">'.ads($adstop).'</div><div class="search"><form method="get" action="http://google.com/m/search"><input type="text" name="q"><input type="hidden" name="as_sitesearch" value="anymaza.in"/><input type="submit" name="submit" value="Search"></form></div><div id="cateogry"><h1>'.$title.'</h1>'.descf($descf).'';

$foot='</div><div class="ad1 tCenter">'.ads($adsbottom).'</div><div class="path"><a href="/">Home</a> '.pathback($bson).'</div><div class="f1"><a href="/" class="siteLink">AnyMaza.Com</a></div></div><div style="display:none;"><script type="text/javascript" src="http://widget.supercounters.com/online_t.js"></script><script type="text/javascript">sc_online_t(1226148,"","teal");</script></div></body></html>';


$mltags='<div class="tags"><i>Tags : '.$title.','.$title.' Mp3 songs download,'.$title.' zip full album download,'.$title.' 320kbps,128kbps,192kbps,64kbps,itunesrip mp3 song download '.$title.' free download,'.$title.' download zip,'.$title.' single track download,free '.$title.' full album zip download,'.$title.' free download</i></div>';

$altags='<div class="tags"><i>Tags : '.$title.','.$title.' apk download,'.$title.' apk free download,android '.$title.' exclusive hot apk download '.$title.' free download,'.$title.' android content free download,'.$title.' free apk download,free '.$title.' full version,'.$title.' free download,latest '.$title.' top rated android apk free download,android latest new top rated apps download as free.</i></div>';

$rltags='<div class=""><i>Tags : '.$title.','.$title.' download,'.$title.' free ringtone download,'.$title.' ringtone download,'.$title.' welcome tune download,'.$title.' caller tune download,'.$title.' new mobile ringtone,'.$title.' free ringtone download,latest '.$title.' new free mobile high low medium quality ringtone download</i></div>';

?>