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
connectdb();
if($zip)
{include('zip.php');}
$sort=intval(@$_GET['sort']);
if($sort>1 or $sort<0)
$sort=0;
$file=$_GET['file'];
$file= str_replace ("getfilesload", "&", $file);
$file=str_replace("\0", '', $file);
$fileg= $file;
$fileg= str_replace ("&", "getfilesload", $fileg);
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

print '<link rel="icon" href="/icon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta property="og:image" content="http://mp3gator.net/mobile_logo.jpg" />
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="description" content="'.translit($title).','.translit($title).' Download Now,'.translit($title).' Full Song,Free Download '.translit($title).' Now,'.transdir($u).' '.translit($title).','.translit($title).' single"/>
<meta name="keywords" content="'.translit($title).','.translit($title).' remix,'.translit($title).',dj remix,mashup mix,mp3 song,bangla mp3,bollwyood mp3,remix album,welcome tune,caller tune,music,mp3,download,videos song,'.translit($title).' free,'.translit($title).' single,single mp3,new,'.transdir($u).' '.translit($title).'">

<link rel="stylesheet" href="/css/style.css" type="text/css" />
</head>
<body>';

include("header.php");
////////////////////head area end/////////////////


echo '<h2>Free Download '.translit($title).'</h2>';


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

$filesize=filesize($file);

if($filesize>1048576)
$filesize=round($filesize/1048576, 2).' Mb';

elseif($filesize>1024)
$filesize=round($filesize/1024, 2).' Kb';

else
{$filesize.=' bytes';}

print '<b>File Size:</b> '.$filesize.'<br/>';
$basename=basename($file);


if($r == 'mp4' || $r == '3gp')
{
    require_once('getid3/getid3.php');
    
    $getID3 = new getID3;
    $ThisFileInfo = $getID3->analyze($file);

echo "<div class='item2'><b>&#9679; Resolution</b>: " . $ThisFileInfo['video']['resolution_x'] . "";

echo " x " . $ThisFileInfo['video']['resolution_y'] . "</div>";

}


if(file_exists('thumb/'.$basename.'.gif'))

print ' - <b>Screenshot</b>: <br/><img src="thumb/'.$basename.'.gif" alt="'.translit($file).' width="120" height="80" /><br/>';
if(file_exists('thumb/'.$basename.'.png'))

print ' - <b>Image</b>: <br/><img src="thumb/'.$basename.'.png" alt="'.translit($file).' width="100" height="120" /><br/>';
if(file_exists('thumb/'.$basename.'.jpg'))

print ' - <b>Image</b>: <br/><img src="thumb/'.$basename.'.jpg" alt="'.translit($file).' width="100" height="120" /><br/>';

$opis=@file_get_contents('opis/'.$basename.'.txt');


if($opis)

print ' - <b>Descriptions</b>: '.$opis.'<br/>';




if($r == 'testproject')
{
    require_once('getid3/getid3.php');
    
    $getID3 = new getID3;
    $ThisFileInfo = $getID3->analyze($file);
getid3_lib::CopyTagsToComments($ThisFileInfo); 
echo "<strong>Duration</strong>: " . $ThisFileInfo['playtime_string'] . "<br>";
echo $ThisFileInfo['audio']['bitrate']/1000;

}


///////////////////////////////// Powered By anymaza.com, Copyright By KingBD.Net, Script By Jewel email- jewelworld9@gmail.com//////////////////////////////////////
if($r == 'mp3')
{

include $mp3;
$id3 = new MP3_Id();
$result = $id3->read($file);
$result = $id3->study();
$bitrate = $id3->getTag('bitrate') OR $bitrate='(undefined)';
 
//print '<b>&#9679; Length:</b> '.$id3->getTag('length').' sec<br/>';
require_once('getid3/getid3.php');
    
    $getID3 = new getID3;
    $ThisFileInfo = $getID3->analyze($file);

$bit_rate = $ThisFileInfo['audio']['bitrate']/1000; 
$sample_rate = $ThisFileInfo['audio']['sample_rate'];



echo "<b> Duration: </b>" . $ThisFileInfo['playtime_string'] . " sec</br>";

echo"</div>";






}

$j=explode('/',$dir);

for($i=0; $i<=$countj; $i++)

{

$u=@$j[count($j)-1];

if($u)

{


$g[$i]= '<b>Category:</b> <a href="http://anymaza.com/'.join('/', $j).'/1/'.$sort.'/0.html"><b>'.transdir($u).'</b></a></br>';

unset($j[count($j)-1]);

}

}

for($i=count(@$g)-1; $i>=0; $i--)

print $g[$i];


if($r!='jpg' AND $r!='gif' AND $r!='png')
{print '<div class="dwnLink"><center><a href="/dlfile.php?file='.$fileg.'"><b>Download Now</b></a></center></div>';}

else

{

list($x,$y, $type,)=@getimagesize($file);

if ($type==1) {$type='gif';}

if ($type==2) {$type='jpeg';}

if ($type==3) {$type='png';}

if ($type==4) {$type='jpg';}


$j=explode('/',$dir);

///////////////////////////////// Powered By AnyMaza.Com , Copyright By KingBD.Net, Script By Jewel email- jewelworld9@gmail.com//////////////////////////////////////

print '<img style="text-align:center; border: 1px solid rgb(221, 221, 221); padding: 1px; margin: 1px;" width="80" height="100"; src="'.$file.'" alt="'.basename($file).' " width="120" height="150" /><br/>';
print 'Type: '.$type.'<br/>
Permission: '.$x.'x'.$y.'<br/>';

print'<div class="dwnLink"><center><a href="/dlfile.php?fileid='.$fileid.'"><b>Download the original file</b></a></center></div>/div>';



}


echo'<div class="fInfo"><center>';
echo'<br/><a href="http://facebook.com/sharer.php?u=http://anymaza.com/view/'.$file.'.html">Share This File on FB</a></center></center></div>';

//echo'<h2>File Upload/Download Info</h2>';


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
$previous = join('/', $j);

$g[$i]= ' » <a href="http://anymaza.com/'.$previous.'/1/1/0.html"><b>'.transdir($u).'</b></a>';

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
print '<a href="usersonline.php"></a>';
$foot
?>