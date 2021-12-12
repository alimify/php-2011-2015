<?php
error_reporting(0);
$per='7'; /*files per page*/
$fper='15';  /*folders per page*/

$searchf='<div class="search">Search Files:<form method="get" action="/search.php"><input type="text" name="search" class="input"/> <input type="submit" value="Search" class="button"/></form></div>';

$head='<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">

<meta http-equiv="Cache-Control" content="no-cache"/>

<link href="/style.css" rel="stylesheet" type="text/css" />
<title>'.$title.'</title>
<link rel="icon" href="/icon.png" />
<link rel="stylesheet" href="style.css" type="text/css"/></head>
<body>'.$searchf.'';

$contact='<div class="dl2"><a href="/contact.php"><b>Contact Us!</b></a></div>';

$sitename='bdfans.3owl.com'; //site name
$siteurl='http://bdfans.3owl.com/'; //site url
$counting='off'; //files counting , set ON to enable and set anything to disable
$licence='None';
//path of the script
$url='http://bdfans.3owl.com/'; //Don't forget add slash'/' at the end of url path.
//Th enew generated length and height of the images from nth,thm,jar,video
//FFMPEG enabling  before enable it make sure your host support ffmpeg.
$ffmpeg = 0; //  1 for enable and 0 for disable//
////////
$neww = 100;

$newh = 110;
// watermark in skrin images

$WaterMarkText='demo.indianmob.in'; //this text will b displayed in all saved screenshot from files.
$font_size = 14;     // watermark text size change it according to necessary

//seo main title//
$maintitle=':latest videos,games,themes,software,music for free mobile download';
// seo key word
$keyword='songs,no.1 wapsite,free4download download site,bollywood,punjabi,mp3 songs,latest release mp3,quoto,hosting,car insurance,tips,make money online';
//
$filestr = 7;    //The number of file on the page:

$dirstr = 15;  //The number of directory or folder on the page

//File types that you wana show in ur site,you can add more type below

$allfile = 'exe,mkv,thm,nth,mp3,amr,wav,mmf,mid,3gp,avi,mp4,sis,sisx,sys,jar,zip,rar,apk,swf,3GP,jpeg,gif,png,jpg';

// top menubar of web or pc version//
$menu='<table width="100%" border="0" style="margin-bottom: -10px;"><tr><td width="300px">
<img src="/img/logo.gif" border="0" style="margin-top:5px;" /></a></td><td width="200px"><a href="/indexw.php"><button type=submit style="width:100px;height:50px"><strong>Mobile Version</strong></button></a></td>
<td align="right"><div style="font-family: Trebuchet MS, sans-serif;font-size: 16px;" align="right"><center>
Boost Up Your Mobile With Millions of Games,Themes,Software,Video,Wallpaper,Pc software,Animation,Flash screensaver And Many More Under One Roof !!</center></div></td></tr></table></div><br/>

<div id="menus"><div id="mainmenu"><ul><li class="first"><a href="indexpc.php">Home</a></li><li><a href="http://indianmob.in/p_Music.html">Music</a></li><li><a href="http://indianmob.in/p_Video.html">Video</a></li><li><a href="http://indianmob.in/p_Theme.html">Themes</a></li><li><a href="http://indianmob.in/p_PC-zone.html">PC zone</a></li><li><a href="http://indianmob.in/p_Games.html">Games</a></li><li><a href="http://indianmob.in/p_Software.html">Softwares</a></li><li><a href="http://indianmob.in/p_Android.html">Android</a></li></ul></div></div>';



?>