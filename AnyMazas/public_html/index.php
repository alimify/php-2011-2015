<?php
include 'func.php';

$title='AnyMaza.Com - The Space Of Free Download And Entertainment';
$pagedescription='Anymaza.com,free bollywood,tollywood,bangla,english mp3 and videos download,youtube video downloader';
$pagekeywords='anymaza,anymaza.com,bollywood,bangla,tollywood,english,hindi,mp3,music,songs,album,movie,mp4,3gp,anymaza,fusionbd,sumirbd,.mobi,.com';

include 'css.php';
include 'config.php';
$upcoming='<div><a href="http://anymaza.in/c_242_Latest_Bangla_Album"><font color="red">Bangla Eid Mp3 Album</font></a></div><div><a href="http://anymaza.in/c_1270_Badshah__2016__The_Don_Bengali_Movie_Mp3_Songs">Badshah ( 2016 ) Mp3 Songs</a></div><div><a href="http://anymaza.in/c_1129_Shikari___2016___Movie_Songs">Shikari ( 2016 ) Mp3 Songs</a></div><div><a href="http://anymaza.in/c_977_Dhaka_Attack___2016___Movie_Mp3_Songs">Dhaka Attack ( 2016 ) Mp3 Songs</a></div><div><a href="">A Flying Jatt (2016) MP3 Songs</a></div>';

print '<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml">
<head><title>'.$title.'</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">'.$seo.'<style type="text/css">/*<![CDATA[*/'.$css.'/*]]>*/</style></head><body><div class="logo"><a href="/"><img alt="AnyMaza.IN" src="http://get.downloader.pw/logo.png" /></a></div><div id="mainDiv">
	<div class="ad1 tCenter">Daily New<br/><a href="">Mp3 Songs</a> | <a href="">Ringtones</a></div><h1>::.. Coming Soon ..::</h1><div class="special">'.$upcoming.'</div><div class="search"><form method="get" action="http://google.com/m/search"><input type="text" name="q"><input type="hidden" name="as_sitesearch" value="anymaza.in"/><input type="submit" name="submit" value="Search"></form></div><div id="cateogry"><h1>.:: Special ::.</h1>';
print '<div class="fl even"><a class="fileName" href="http://anymaza.in/singer_arijit_singh_mp3_songs">Arijit Singh Mp3 Songs</a></div><div class="fl even"><a class="fileName" href="http://anymaza.in/c_243_Latest_English_Album">English Mp3 Songs</a></div><div class="fl even"><a class="fileName" href="http://anymaza.in/c_244_Latest_Bollywood_Songs">Hindi Mp3 Songs</a></div><div class="fl even"><a class="fileName" href="http://anymaza.in/c_242_Latest_Bangla_Album">Bangla Mp3 Songs</a></div><div class="fl even"><a class="fileName" href="http://anymaza.in/c_245_Latest_Kolkata_Movie_Song">Kalkata Mp3 Songs</a></div>';

print '<div class="updates"><h1>Latest Updates</h1>';

$xarray = file('http://get.downloader.pw/update.dat');
$countst = count($xarray);
$countstr=ceil($countst/30);
$j = ($countst-1)-($page*30);
$i = $j-30;
for(; $i<$j && $j>=0; $j--) {
$up = $j + 1;
$text = explode("|break|",$xarray[$j]);
{
$post_bg=($bg++%10== 5) ? "2" : "1";
echo '<div>'.$text[0].'</div>';

}}

print '<div><a href="">[More Updates...]</a></div><div class="ad1">Top 21 Downloads:<br/><a href="">Today</a> | <a href="">Week</a> | <a href="">Month</a> | <a href="">All Time</a></div>';
print '</div><h1>Select Categories</h1><div class="catList">';

print '<div class="catRow"><a href="http://down3.ucweb.com/ucbrowser/en/?bid=444&pub=jlg%40jewel&title=&url=&version=2">Uc Browser 12.2</a></div>
<div class="catRow"><a href="http://anymaza.in/c_225_Full_Mp3_Songs">Full Mp3 Songs</a></div>
<div class="catRow"><a href="http://anymaza.in/cr_166_Ringtones">Ringtones</a></div>
<div class="catRow"><a href="http://anymaza.in/cv_645_Bollywood_Movie_Videos">Bollywood Movie Videos</a></div>
<div class="catRow"><a href="http://anymaza.in/cv_712_English_Music_Videos">English Music Videos</a></div>
<div class="catRow"><a href="http://anymaza.in/cv_1219_Kalkata_Movie_Videos">Kalkata Movie Videos</a></div>
<div class="catRow"><a href="http://anymaza.in/cv_1255_Bangla_Movie_Videos">Bangla Movie Videos</a></div>
<div class="catRow"><a href="http://anymaza.in/cv_1265_Bangla_Music_Videos">Bangla Music Videos</a></div>
<div class="catRow"><a href="http://anymaza.in/ca_1233_Android_Zone">Android Zone</a></div>
<div class="catRow"><a href="http://anymaza.com/tube">Youtube Videos</a></div>';
print '</div>';


print '</div><div class="f1"><a href="/" class="siteLink">AnyMaza.Com</a></div></div></body></html>';
?>