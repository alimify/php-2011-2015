<?php
include('config.php');
include('func.php');
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$id = $_GET['fileid'];
$id = preg_replace('#[^0-9]#i', '', $id);
$id = ereg_replace("[^0-9]", "", $id);
$name = $_GET['filename'];
$fileg=MySQL_Fetch_Array(MySQL_Query("SELECT nm from mydnld where id='".$id."';"));
$file= $fileg[0];
//Loop
$r=r($file);
//Geting Mp3 Description
if($r == 'mp3')
{
require_once('getid3/getid3.php');
$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($file);
getid3_lib::CopyTagsToComments($ThisFileInfo); 
$rtist = @$ThisFileInfo['comments_html']['artist'][0];  
$lbum = @$ThisFileInfo['comments_html']['album'][0];
$artist= str_replace ("[ AnyMaza.Com ]", "", $rtist);
$album= str_replace ("[ AnyMaza.Com ]", "", $lbum);
}
$fsname = basename($file);
$fsname= str_replace ("(AnyMaza.Com)", "", $fsname);
print '<?xml version="1.0" encoding="UTF-8" ?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head><title>'.$name.'</title><meta name="google-site-verification" content="zBpEm83rk2AwctkKff2TYn3SYTZn4zHt5p2QlG7aZe8" /><meta content="chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0; maximum-scale=1.0;"/>
<meta name="revisit-after" content="1 days"/>
<meta content="10" name="pagerank™" />
<meta content="1,2,3,10,11,12,13,ATF" name="serps"/>
<meta content="5" name="seoconsultantsdirectory"/>
<meta content="Abdul Alim Jewel" name="author"/>
<meta content="General" name="Rating"/>
<meta content="never" name="Expires"/>
<meta content="all" name="audience"/>
<meta content="english" name="Language" />
<meta name="format-detection" content="telephone=no"/>
<meta name="HandheldFriendly" content="true"/>
<meta name="robots" content="index,follow"/><meta name="distribution" content="global"/><meta name="Identifier-URL" content="http://www.anymaza.com"/><meta http-equiv="Cache-control" content="no-cache"><link rel="shortcut icon" href="http://www.bollyclassic.com/uploads/favicon.ico"/>
<link rel="stylesheet" href="/css/style.css" type="text/css" /><meta name="description" content="'.$name.',free '.$name.'"/><meta name="keywords" content="'.$name.',free '.$name.'"/></head><body>';
include 'header.php';
print '<div class="title">'.$fsname.' ('.$album.') By '.$artist.' Song Lyrics</div>';
//// Lyrics
if(file_exists('lyrics/'.$id.'.txt'))
{
$sfile ='lyrics/'.$id.'.txt';
$description = implode('<br/>', file($sfile));
$unames=str_replace(' lyrics','',$name);
echo '<b>Songname : '.$fsname.'</b><br/>Singer :'.$artist.'<br/>Album : '.$album.'<br/><div class="file"><a href="/view/'.$id.'/'.$unames.'.html">Download '.$unames.' Mp3 Song</a></div><div align="center">'.$description.'</div>';

}else{print 'Sorry Lyrics Added For This Song';}
include 'footer.php';
echo '</body></html>';
?>