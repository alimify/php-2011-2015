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
 $fileid = preg_replace('#[^0-9]#i', '', $_GET['fileid']);
 $fileid = ereg_replace("[^0-9]", "", $_GET['fileid']);
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
$playtime = @$ThisFileInfo['playtime_string'];
$rtist= str_replace ("[ AnyMaza.Com ]", "", $rtist);
$lbum= str_replace ("[ AnyMaza.Com ]", "", $lbum);
$artist= ' By '.$rtist.' ';
$album= ' '.$lbum.' ';
}

//HATS
print $top;
//Get File Extension
$file_extension=pathinfo(($file), PATHINFO_EXTENSION);
$ext=$file_extension;
//Filename Without Extansion
$title=basename($file);
$title = preg_replace("/\.[^.]+$/", "", $title);
$title= str_replace ("(AnyMaza.Com)", "", $title);
$title= str_replace ("&", "And", $title);
if($r == 'mp3'){print '<title>'.$title.''.$artist.'full mp3 song Download - AnyMaza.Com</title>';
$keywords= ''.$title.','.$title.''.$artist.','.$title.' mp3,'.$title.' free download,'.$title.' mp3 free download,'.$title.''.$artist.' free download,'.$title.''.$artist.' mp3 free download,'.$title.''.$artist.' mp3,'.$title.' mp3 song,'.$title.' mp3 download,'.$title.''.$album.','.$title.''.$album.' mp3 free download,'.$album.' mp3,'.$rtist.' mp3,'.$rtist.' album,'.$album.''.$artist.','.$album.''.$artist.' mp3 download,'.$title.' full mp3,'.$album.' full album,'.$title.' lyrics';
$descriptions=''.$title.','.$title.''.$artist.','.$title.' mp3 64kbps 128kbps 320kbps 160kbps 192kbps,'.$title.' free download,'.$title.' mp3 free download,'.$title.''.$artist.' free download,'.$title.''.$artist.' mp3 free download,'.$title.''.$artist.' mp3,'.$title.' mp3 song,'.$title.' mp3 download,'.$title.''.$album.','.$title.''.$album.' mp3 free download,'.$album.' mp3,'.$artist.' mp3,'.$artist.' album,'.$album.''.$artist.','.$album.''.$artist.' mp3 download,'.$title.' full mp3,'.$album.' full album,'.$title.' lyrics';}
else{print'<title>'.$title.' '.$ext.' Download - AnyMaza.Com</title>';$keywords=''.$title.','.$title.' '.$ext.','.$title.' free download,'.$title.' video song'.$title.' software,mp4,3gp,apk,hd,hr,full hd,download,';$descriptions=''.$title.' '.$ext.' free download,'.$title.' download,'.$title.' video song,'.$title.' hd video song download,'.$title.' download free,'.$title.' movie song,'.$title.'download for your mobile,'.$title.' pc content,'.$title.' mobile content';}
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
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="description" content="'.$descriptions.'"/>
<meta name="keywords" content="'.$keywords.'">
<style>body {border-width: 1px; border-color: black; border-bottom-style: solid; padding-top: 3px; padding-bottom: 3px; padding-left: 2px; padding-right: 0px; margin-left: 1px; margin-right: 1px; border-left-style: solid; border-right-style: solid; }.pgn{padding:2px}.pgn a{background-color: #f5f5f5; width: 50%; margin: 10px; border: 1px solid #ccc; padding: 10px;}.pgn a:hover,.newpgn span{background:#ddd;border-color:#ddd}.pgn div{padding-top:5px}.button3 { background-color: #f5f5f5; width: 50%; margin: 10px; border: 1px solid #ccc; padding: 10px;} .button3:hover { -moz-box-shadow: 0 0 5px rgba(0,0,0,0.5); -webkit-box-shadow: 0 0 5px rgba(0,0,0,0.5); box-shadow: red(0,0,0,0.5); }h1{background-color:black;color:white;font-size:15px;text-align:center;}body{max-width:550px;margin:0 auto;background:#e5e5e5}a{color:teal}.a a:link,.a a:visited{color:#ffffff;text-decoration:none}a:link{text-decoration:none}a:link,a:active,a:visited{color:teal;text-decoration:none}a:hover,a:focus{color:teal}a:focus,a:hover{text-decoration:none}a:focus,a:hover{color:teal}hr{border-bottom:1px solid #cacaca;border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-left-style:none;border-left-width:0px}a{text-decoration:none}a:active{color:#622222}a:focus,a:hover{color:maroon;text-transform:uppercase;font-weight:bolder;font-size:18px}.logo {background-color:black;text-align:center;font-size:20px;font-weight:bold;color:white;}</style>
</head>
<body>';

print '<div class="logo">AnyMaza.Com</div>';
////////////////////head area end/////////////////
echo '<h1>'.$title.''.$artist.' '.$ext.'</h1>';
if(!$dir)
{print 'Directory Of File Not Found ! Please Back To <a href="/"><b>Home</b></a>';}
if(!$file)
{print 'File not found<br />! Please Back To <a href="/"><b>Home</b></a>';}
else
{
print '<div class="fInfo"><center>';
$basename=basename($file);
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

echo "<b> Duration: </b>".$playtime." sec</br> Singer : ".$rtist."";

echo"</div>";
}
///Filesize
$filesize = friendly_size(filesize($file));
if($r == 'mp3'){ echo '<center>';
///Filelink
print '<div align="center">Select Format & Downlod : <br/><div class="button3"><a class="dowbutzip" rel="nofollow" href="/dlfile.php?fileid='.$fileid.'"><div class="downbutzipb"><div class="downsecond">Original MP3 ( '.$filesize.' )</div></div></a></div>';
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
else { print '<div align="center">File Size : '.$filesize.'<br/><a href="/dlfile.php?fileid='.$fileid.'"><b>Download Now</b></a></div>';}

$opis=@file_get_contents('opis/'.$fileid.'.txt');
if($opis)
print ' - <b>Descriptions</b>: '.$opis.'<br/>';

echo'<div class="fInfo"><center>';
echo'<br/><a href="http://facebook.com/sharer.php?u=http://anymaza.com/view/'.$fileid.'/'.translit($title).'.html">Share This File on FB</a></center></center></div>';

//echo'<h2>File Upload/Download Info</h2>';

print '<div class="tags" align="center"><b>Tags : </b>'.$descriptions.' '.$title.' itunerip,'.$title.' itunes download,'.$title.' 128kbps,'.$title.'64kbps,'.$title.' 320kbps'.$title.' 160kbps,'.$title.' 192kbps,'.$title.' mp4 hd hr full hd software '.$title.' games,'.$title.' apk android</div>';
$filectime=filectime($file);



{

print '<left><div class="pgn">
<a href="/"><b>Home</b></a></div>';

if(($countj=count(explode('/',$dir)))>1)
{
$j=explode('/',$dir);

for($i=0; $i<=$countj; $i++)

{

$u=@$j[count($j)-1];

if($u)

{

$previous=MySQL_Fetch_Array(MySQL_Query("SELECT folderid from folder where folderurl='".join('/', $j)."';"));
$g[$i]= '<a href="http://anymaza.com/'.$previous[0].'/'.transdir($u).'.html"><div class="button3"><b>'.transdir($u).'</b></div></a>';

unset($j[count($j)-1]);

}

}

for($i=count(@$g)-1; $i>=0; $i--)

print $g[$i];
}


}

}

echo "</left>";
print '<div class="logo" align="center"><b>Copyright &copy; AnyMaza.Com 2014</b></div></body></html>';
?>