<?php

/*
* *
* Autoindex Script By Jewel
* Release : 2014
* Modify by Jewel
* * *
*/



include('config.php');
include('func.php');
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
if($zip)
{include('zip.php');}
$sort=intval(@$_GET['sort']);
if($sort>1 or $sort<0)
$sort=0;
$fileid=$_GET['fileid'];
$fileg=MySQL_Fetch_Array(MySQL_Query("SELECT nm from mydnld where id='".$fileid."';"));
$file= $fileg[0];
$mfile= $fileg[0];
$file=str_replace("\0", '', $file);
if(!file_exists($file) or !is_file($file) or !in_array(r($file), explode(',',$allfile)) or strstr($file,'..') or strstr($file,'http://') or strstr($file,'ftp://'))
$file='';
if($file)
{$dir=str_replace('files/','',dirname($file));}


else
{
ob_start();
}

//HATS
print $top;
////////////////head area////////////////////
$r=r($file);

$title =$file;

$title= str_replace ("(AnyMaza.Com)", "", $title);

$title= str_replace ("(Mp3Gator.Net)", "", $title);
$title= str_replace ("_", " ", $title);

print '<title> '.translit($title).'</title>';

print '<meta name="google-site-verification" content="zBpEm83rk2AwctkKff2TYn3SYTZn4zHt5p2QlG7aZe8" /><meta content="chrome=1" http-equiv="X-UA-Compatible"/>
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
<meta name="robots" content="index,follow"/>
<meta name="distribution" content="global"/>
<meta name="Identifier-URL" content="http://www.anymaza.com"/>
<meta http-equiv="Cache-control" content="no-cache">
<link rel="shortcut icon" href="http://www.bollyclassic.com/uploads/favicon.ico"/>
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="description" content="'.translit($title).',free '.translit($title).' Download Now,'.translit($title).' Full Song,Free Download '.translit($title).' Now,'.transdir($u).' '.translit($title).','.translit($title).'"/>
<meta name="keywords" content="'.translit($title).','.translit($title).' remix,'.translit($title).',dj remix,mashup mix,mp3 song,bangla mp3,bollwyood mp3,remix album,welcome tune,caller tune,music,mp3,download,videos song,'.translit($title).' free,'.translit($title).' single,single mp3,new,'.transdir($u).' '.translit($title).'">
</head>
<body>';

include("header.php");
////////////////////head area end/////////////////


echo '<div class="title">Free Download '.translit($title).'</div>';


if(!$dir)

{print '

download your Req. file!';}



echo "";

if(!$file)

{print 'File not found<br />';}

else

{

$r=r($file);

$title =$file;

$title= str_replace ("(AnyMaza.Com)", "", $title);

$title= str_replace ("(Mp3Gator.Ne)t", "", $title);
$title= str_replace ("_", " ", $title);



print '<div class="fInfo"><center>';
$basename=basename($file);
///////////////////////////////// Powered By anymaza.com, Copyright By KingBD.Net, Script By Jewel email- jewelworld9@gmail.com//////////////////////////////////////
$j=explode('/',$dir);

for($i=0; $i<=$countj; $i++)

{

$u=@$j[count($j)-1];

if($u)

{

$categoryfile=MySQL_Fetch_Array(MySQL_Query("SELECT folderid from folder where folderurl='".join('/', $j)."';"));
$g[$i]= '<b>Category:</b> <a href="http://anymaza.com/'.$categoryfile[0].'/'.transdir($u).'.html"><b>'.transdir($u).'</b></a></br>';

unset($j[count($j)-1]);

}

}

for($i=count(@$g)-1; $i>=0; $i--)

print $g[$i];

//ScreenShot Image
if(file_exists('thumb/'.$fileid.'.gif'))
print '<img src="thumb/'.$fileid.'.gif" alt="'.translit($file).' width="120" height="80" /><br/>';
if(file_exists('thumb/'.$fileid.'.png'))
print '<img src="thumb/'.$fileid.'.png" alt="'.translit($file).' width="100" height="120" /><br/>';
if(file_exists('thumb/'.$fileid.'.jpg'))
print '<img src="thumb/'.$fileid.'.jpg" alt="'.translit($file).' width="100" height="120" /><br/>';
///Video Descriptions
if($r == 'mp4' || $r == '3gp')
{
    require_once('getid3/getid3.php');
    
    $getID3 = new getID3;
    $ThisFileInfo = $getID3->analyze($file);

echo "<div class='item2'><b>&#9679; Resolution</b>: " . $ThisFileInfo['video']['resolution_x'] . "";

echo " x " . $ThisFileInfo['video']['resolution_y'] . "</div>";

}
/// Audio Descriptions
if($r == 'mp3')
{
require_once('getid3/getid3.php');
$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($file);
getid3_lib::CopyTagsToComments($ThisFileInfo); 
$artist = @$ThisFileInfo['comments_html']['artist'][0];  
$artist= str_replace ("[ AnyMaza.Com ]", "", $artist);
$artist= str_replace ("[AnyMaza.Com]", "", $artist);
$album = @$ThisFileInfo['comments_html']['album'][0];
$playtime = @$ThisFileInfo['playtime_string'];
$artist= str_replace ("[ AnyMaza.Com ]", "", $artist);
$album= str_replace ("[ AnyMaza.Com ]", "", $album);


echo"</div>";
}
///Filesize
$filesize = friendly_size(filesize($file));
if($r == 'mp3'){ echo '<center>';
///Filelink
print '<div align="center">Select Format & Downlod : <br/><div class="button3"><a class="dowbutzip" rel="nofollow" href="/'.$file.'"><div class="downbutzipb"><div class="downsecond">Original MP3 ( '.$filesize.' )</div></div></a></div>';
$msi = basename($mfile);
$msd = dirname($mfile);
$msd= str_replace ("files/", "", $msd);
$categoryfileid=MySQL_Fetch_Array(MySQL_Query("SELECT folderid from folder where folderurl='".$msd."';"));
if(file_exists('file/data/128kbpsfile/'.$categoryfileid[0].'/'.$msi.''))
{
$mfilesize = friendly_size(filesize('file/data/128kbpsfile/'.$categoryfileid[0].'/'.$msi.''));
print '<div class="button3"><a class="dowbutzip" rel="nofollow" href="/file/data/128kbpsfile/'.$categoryfileid[0].'/'.$msi.'"><div class="downbutzipb"><div class="downsecond">128KBPS MP3 ( '.$mfilesize.' )</div></div></a></div>';
}
if(file_exists('file/data/64kbpsfile/'.$categoryfileid[0].'/'.$msi.''))
{
$lfilesize = friendly_size(filesize('file/data/64kbpsfile/'.$categoryfileid[0].'/'.$msi.''));
print '<div class="button3"><a class="dowbutzip" rel="nofollow" href="/file/data/64kbpsfile/'.$categoryfileid[0].'/'.$msi.'"><div class="downbutzipb"><div class="downsecond">64KBPS MP3 ( '.$lfilesize.' )</div></div></a></div>';
}
echo '</center>';
}
else { print '<div align="center">File Size : '.$filesize.'<br/><a href="/'.$file.'"><b>Download Now</b></a></div>';}

$opis=@file_get_contents('opis/'.$fileid.'.txt');
if($opis)
print ' - <b>Descriptions</b>: '.$opis.'<br/>';

echo'<div class="fInfo"><center>';
echo'<br/><a href="http://facebook.com/sharer.php?u=http://anymaza.com/view/'.$fileid.'/'.translit($title).'.html">Share This File on FB</a></center></center></div>';

//echo'<h2>File Upload/Download Info</h2>';

print '<div class="tags" align="center"><b>Tags : </b>free download '.translit($title).','.translit($title).' ('.$album.' )  '.$artist.', mp3songs download,'.translit($title).' mp3,'.translit($title).' mp3 songs,latest '.translit($title).' mp3 songs </div>';
$filectime=filectime($file);



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

$previous=MySQL_Fetch_Array(MySQL_Query("SELECT folderid from folder where folderurl='".join('/', $j)."';"));
$g[$i]= ' » <a href="http://anymaza.com/'.$previous[0].'/'.transdir($u).'.html"><b>'.transdir($u).'</b></a>';

unset($j[count($j)-1]);

}

}

for($i=count(@$g)-1; $i>=0; $i--)

print $g[$i];
}


}

}

echo "</left></div>";
include("footer.php");
$foot
?>