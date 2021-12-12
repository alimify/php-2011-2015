<?php

/*
* *
* Autoindex Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/
if (stristr($_SERVER['HTTP_USER_AGENT'],'windows') || stristr($_SERVER['HTTP_USER_AGENT'],'linux') ||
 stristr($_SERVER['HTTP_USER_AGENT'],'macintosh') || stristr($_SERVER['HTTP_USER_AGENT'],'unix') ||
  stristr($_SERVER['HTTP_USER_AGENT'],'macos') || stristr($_SERVER['HTTP_USER_AGENT'],'bsd'))

//// PC Site Start

{


$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
connectdb();
if($zip)
{include('zip.php');}

//Sorting and preview:

$p=intval($_GET['p']);
$sort=intval($_GET['sort']);
if($sort>1 OR $sort<0)
{$sort=0;}

//Folder:
$dir=htmlspecialchars($_GET['dir']);

while(substr($dir,0,1)=='/')
{$dir=substr($dir,1,strlen($dir));}

if(strstr($dir,'..') OR !is_dir('files/'.$dir) OR strstr($dir,'://'))
{$dir=null;}

$opis = false;

//HATS
print $top;
$dir_exp=explode('/',$dir);
////////////////head area////////////////////

if(!$dir)
{
print '<title>AnyMaza.Com | Latest Music Download</title><meta name="og:title" content="AnyMaza.Com | Latest Music Download">';
}
else
{
print '<title>'.transdir($dir_exp[count($dir_exp)-1]).' | AnyMaza.Com</title><meta name="og:title" content="AnyMaza.Com | Latest Music Download">';
}

print ' <script language="JavaScript">
<!-- Hide from old browsers


var timerID = null;
var timerRunning = false;
var id,pause=0,position=0;

function stopclock (){
        if(timerRunning)
                clearTimeout(timerID);
        timerRunning = false;
}

function showtime () {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds()
        var timeValue = "" + ((hours >12) ? hours -12 :hours)
        timeValue += ((minutes < 10) ? ":0" : ":") + minutes
        timeValue += ((seconds < 10) ? ":0" : ":") + seconds
        timeValue += (hours >= 12) ? " P.M." : " A.M."
        document.clock.face.value = timeValue;
        timerID = setTimeout("showtime()",1000);
        timerRunning = true;
}
function startclock () {
        stopclock();
        showtime();
}
// --End Hiding Here -->

</script>   <link rel="icon" href="favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="description" content="Free Bangla Mp3 Songs,Hindi Mp3 Songs,Bollywood Mp3 Songs,Kalkata Mp3 Songs,English Mp3 Songs,Punjabin Mp3 Songs Download"/>
<meta name="keywords" content="dj remix,mashup mix,mp3 song,bangla mp3,bollwyood mp3,remix album,single mp3,full mp3,new mp3,welcome tune,super new mp3,mp3,bangla,hindi,english,kalkata,punjabi,mp3 song">
<link href="css/pc_body.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_xlist.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_responsive.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_header.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_black.css">
<link rel="STYLESHEET" type="text/css" href="/css/styles.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_pagr.css"></head>
<body><div>';

print'<div class="pc_content">
<div style="color: #505050;  background-color: #F8F8F8; padding: 5px 5px 5px; display: block;" align="left">
<table width="100%">
<tbody><tr><td width="70%">
<img src="http://AnyMaza.Com/pc_logo.png" alt="Mp3Gator Logo">

</td>

<td align="right" width="30%">

<body onLoad="startclock()">

<form name="clock" onSubmit="0">
<input type="text" name="face" size="13"></form>

</td>
</tr></tbody></table></div></div>

                <!-- Logo End -->

               

			   <!-- Menu Start -->
			
<div>
<div class="pc_content" id="cssmenu">
<ul>
   <li class="active"><a href="/index.php"><span>Home</span></a></li>
 <li><a href="/more_update.php"><span>Updates</span></a></li><li><a href="http://anymaza.com"><span>Videos</span></a></li>
   <li class="has-sub"><a href="http://mp3gator.net/mp3songs/1/1/0.html"><span>Mp3 Songs</span></a>
      <ul>
         <li class="has-sub"><a href="http://mp3gator.net//Bangla%20Mp3%20Songs/1/1/0.html"><span>Bangla Mp3 Songs</span></a>
            <ul>
               <li><a href="http://mp3gator.net/Bangla%20Mp3%20Songs/Bangla%20Mp3%20Album/1/1/0.html"><span>Bangla Mp3 Album</span></a></li>
               <li><a href="http://mp3gator.net/Bangla%20Mp3%20Songs/Bangla%20Rap%20Songs/1/1/0.html"><span>Bangla Rap Mp3 Songs</span></a></li>
               <li><a href="http://mp3gator.net/Bangla%20Mp3%20Songs/Single%20Mp3%20Songs/1/1/0.html"><span>Bangla Single Song</span></a></li>
               
            </ul>
         </li>
        <li class="has-sub"><a href="http://mp3gator.net//Bollywood%20Mp3%20Songs/1/1/0.html"><span>Bollywood Mp3 Songs</span></a>
            <ul>
               <li><a href="http://mp3gator.net/Bollywood%20Mp3%20Songs/Bollywood%20New%20Mp3/1/1/0.html"><span>Bollywood New Mp3</span></a></li>
               <li><a href="http://mp3gator.net/Bollywood%20Mp3%20Songs/Single%20Mp3%20Songs/1/1/0.html"><span>Bollywood Single Mp3</span></a></li>
               
            </ul>
		</li>
		<li class="has-sub"><a href="#"><span>Kalkata Mp3 Songs</span></a>
            <ul>
               <li><a href="http://"><span>Kalkata Movie Songs</span></a></li>
               <li class="last"><a href=""><span>Kalkata Single Song</span></a></li>
            </ul>
		</li>
		<li class="has-sub"><a href="http://mp3gator.net/English%20Mp3%20Songs/1/0/0.html"><span>English Mp3 Songs</span></a>
            <ul>
              <li> <a href="http://mp3gator.net/English%20Mp3%20Songs/English%20Mp3%20Album/1/1/0.html"><span>English Mp3 Album</span></a> </li>			  
              <li><a href="http://mp3gator.net/English%20Mp3%20Songs/Single%20Mp3%20Songs/1/1/0.html"><span>English Single Song</span></a></li>
            </ul>
		</li>
		<li><a href="http://mp3gator.net//Punjabi%20Mp3%20Songs/1/1/0.html"> <span>Punjabi Songs</span></a></li>
		
		<li><a href="http://mp3gator.net//Special%20Songs/1/1/0.html"> <span>Special Songs</span></a></li>
		
		<li><a href="http://mp3gator.net//Islamic%20Audio/1/1/0.html"> <span>Islamic Audio</span></a></li>
</ul>
</div></div>  ';


print'<meta id="viewport" name="viewport" content="width=device-width"><div class="body_area">';




/////////// Advertisment & Slider
include("ads/pc_top_ads1.php");
include("pc_slider.php");
include("ads/pc_top_ads2.php");






/////////// Left Body
print'<div class="body_left">';

////// Latest Update Start
print'<style>.catRowHome, .catRow { border-bottom:1px solid #ccc; 
background:#FDFDFD; 
background: -moz-linear-gradient(top, #FDFDFD 0%, #EEEEEE 100%); 
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FDFDFD), color-stop(100%,#EEEEEE)); 
background: -webkit-linear-gradient(top, #FDFDFD 0%, #EEEEEE 100%); 
font-weight:bold;
}
.catRow:hover,
.catRowHome:hover { 
background:#EDEDED; 
background: -moz-linear-gradient(top, #d4eaf3 0%, #d4eaf3 100%); 
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d4eaf3), color-stop(100%,#d4eaf3)); 
background: -webkit-linear-gradient(top, #d4eaf3 0%, #d4eaf3 100%); 
}

.catRow a { display:block; padding:6px; }
.catRowHome a { display:block; background:url(../images/arrow.png) no-repeat left center; padding:6px; padding-left:12px;}
.catRow img { border-radius:10px; }
.catRow a div span,
.catRowHome  a div span,{ font-size:x-small; color:#5a5; font-weight:normal; }.update div { 
background:#FDFDFD;
background: -moz-linear-gradient(top, #FDFDFD 0%, #EEEEEE 100%); 
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FDFDFD), color-stop(100%,#EEEEEE)); 
background: -webkit-linear-gradient(top, #FDFDFD 0%, #EEEEEE 100%); 
border-bottom:1px solid #ccc; padding:8px; 
}.update a{color:#33A1C9;} a:active{color:#008080;} .update a:hover{color:#FF0000;}</style><div class="mainbox"><div class="mainblok"><div class="nfooter">Latest Updates</div><div class="updates">';
include("update.php");
print'</div><div class="nextp" align="right"><a href="more_update.php"><b>[More Updates...]</b></a></div></div></div>';

////////////////////head area end/////////////////

include("ads/pc_top_ads3.php");

if(!$dir)
{print '<div class="mainblok"><div class="nfooter">Downloads Category</div>';}
else
{

}


//Subfolders
$glob_dir=glob('files/'.$dir.'/*',GLOB_ONLYDIR);
if($glob_dir)
{
$count=sizeof($glob_dir);
$countstr=ceil($count/$dirstr);
$page=intval($_GET['page']);
if($sort)
{usort($glob_dir, 'sortnew');}
$start = $page * $dirstr;
if($start>=$count OR $start<0)
{$start=0;}
$end = $start + $dirstr;
if($end>=$count)
{$end = $count;}
for($i=$start; $i<$end; $i++)
{
$dirt=str_replace('files/',null,$glob_dir[$i]);
$dir_exp=explode('/',$dirt);
$count=countf($dirt);
$ctot=ceil($count);

{
echo'<div class="">';
$post_bg=($bg++%2== 0) ? "item2" : "item1";
echo "<div class='catRow'>";

print '<a href="http://AnyMaza.Com'.$dirt.'/1/1/0.html" title="'.transdir($dir_exp[count($dir_exp)-1]).'" /><div>'.transdir($dir_exp[count($dir_exp)-1]).'</div></a>';
echo'</div>';
echo'</div>';
}
}
}


/////////jewel///////////

if(file_exists('files/'.$dir.'/jewel.txt'))
{
$sfile ='files/'.$dir.'/jewel.txt';
$description = implode('<br/>', file($sfile));
echo '<div style="text-color:white; background-color:yellow"><center>'.$description.'</center></div>';

}


$glob_file=glob("files/$dir/*.{{$allfile}}",GLOB_BRACE);
if($glob_file) //FILES
{
if($sort)
{usort($glob_file, 'sortnew');}
$count=sizeof($glob_file);
$countstr=ceil($count/$filestr);
$page=intval($_GET['page']);
$start = $page * $filestr;
if($start>=$count OR $start<0)
{$start=0;}
$end = $start + $filestr;
if($end>=$count)
{$end = $count;}
for($i=$start; $i<$end; $i++)
{
$name=translit($glob_file[$i]);
$filesize=filesize($glob_file[$i]);
if($filesize>1024)
$filesize=round($filesize/1048576, 2).' MB';
else
{$filesize.=' bytes';}
if(r($glob_file[$i])=='txt')
{
$text=file($glob_file[$i]);
$name=$text[0];
$opis=$text[1].$text[2].$text[3].$text[4];
}

$basename=basename($glob_file[$i]);



//Screenshot
{
$post_bg=($bg++%2== 0) ? "item2" : "item1";
echo "<div class='$post_bg'><table><tr><td>";

if($p and file_exists('skrin/'.$basename.'.gif'))
{print '<img src="pic.php?file=skrin/'.$basename.'.gif" alt="Screen" /><br />';}

elseif(r($glob_file[$i])=='mp3')
{print '<img src="pic.php?file=images/mp3.gif" alt="Screen" /><br />';}

elseif($p and file_exists('skrin/'.$basename.'.jpg'))
{print '<img src="pic.php?file=skrin/'.$basename.'.jpg" alt="Screen" /><br />';}
elseif($p and file_exists('skrin/'.$basename.'.png'))
{print '<img src="pic.php?file=skrin/'.$basename.'.png" alt="Screen" /><br />';}

if((r($glob_file[$i])=='jpg' or r($glob_file[$i])=='gif' or r($glob_file[$i])=='png') and $p)
{print '<img src="pic.php?file='.$glob_file[$i].'" alt="Screen" /><br />';}

echo"</td><td></td>";
echo'<td>';
//print '<strong>'.$name.'</strong><br />';

if(file_exists('opis/'.$basename.'.txt'))
{$opis=htmlspecialchars(file_get_contents('opis/'.$basename.'.txt'));}

if($opis)
{print nl2br(htmlspecialchars($opis)).'<br />';}
$opis = false;


$title =$name;

$title= ereg_replace ("Mp3Gator.Net", "Mp3Gator.Net", $title);

$title= ereg_replace ("_", " ", $title);


if(r($glob_file[$i])=='jar')
{

}
elseif(r($glob_file[$i])=='txt')
{print '<a href="txt.php?p='.$p.'&amp;file='.$glob_file[$i].'&amp;sort='.$sort.'">Read</a><br />';}
else
{print '<a href="file.php?p='.$p.'&amp;file='.$glob_file[$i].'&amp;sort='.$sort.'">'.$title.'</a><br/>[Size: '.$filesize.'] <br/> Downloads:<font color="red">'.$cnt.'</font>    ';}
echo'</td></tr></tbody></table></div>';
}
//Counts the number of Recent entries
$dirkomm=str_replace('/', 'D', str_replace('.', 'T', $glob_file[$i]));
if(!file_exists('komm/'.$dirkomm))
{$countkomm=0;}
else
{$countkomm=count(file('komm/'.$dirkomm));}

}
}

//Pagination:

if($countstr>1)
{print nav_page($countstr,$page,$dir,$p,$sort,'index');}


//Return to level up:
$dir_exp=explode('/',$dir);
if($dir)
{print '';}
if(($countj=count(explode('/',$dir)))>1)
{
$j=explode('/',$dir);
for($i=0; $i<=$countj; $i++)
{
$u=$j[count($j)-2];
if($u)
{
unset($j[count($j)-1]);
$g[$i]= ' | <a href="index.php?dir='.join('/', $j).'&amp;p='.$p.'&amp;sort='.$sort.'"><b>'.transdir($u).'</b></a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

print '</center></div>';
}
print '</div>';

include("ads/pc_top_ads4.php");

print '</div>';

/*
* *
* Autoindex Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/

print '<div class="body_right">';

print '<div class="mainbox">
<div class="mainblok">
<div class="nfooter">Links</div>
<div class="xlist"><a href="http://anymaza.com" title="download latest HD Mp4 3gp Videos Bangla Hindi Kalkata English & Punjabi Videos"><div> Videos</div> </a></div>
</div>

</div>
';

//// Advertisment
include("ads/pc_right_ads1.php");
include("ads/pc_right_ads2.php");
include("ads/pc_right_ads3.php");

print '<div class="mainbox">
<div class="mainblok">
<div class="nfooter">Links</div>

<div class="xlist2"> <a href="declaimer.php" title="Terms & Desclaimer Of Using  AnyMaza.Com"><div> Terms/Desclaimer</div></a></div>

<div class="xlist"><a href="contact" title="Contact With AnyMaza.Com Admin"><div> Contact Admin</div> </a></div>
</div>

</div>
';


print '</div>';

print '</div>';

print '<div align="center" class="nfooter"><center>Copyright By AnyMaza.Com</center></div></div></body>';

}


//// Mobile Site

else
{

$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
connectdb();
if($zip)
{include('zip.php');}

//Sorting and preview:

$p=intval($_GET['p']);
$sort=intval($_GET['sort']);
if($sort>1 OR $sort<0)
{$sort=0;}

//Folder:
$dir=htmlspecialchars($_GET['dir']);

while(substr($dir,0,1)=='/')
{$dir=substr($dir,1,strlen($dir));}

if(strstr($dir,'..') OR !is_dir('files/'.$dir) OR strstr($dir,'://'))
{$dir=null;}

$opis = false;

//HATS
print $top;
$dir_exp=explode('/',$dir);
////////////////head area////////////////////

if(!$dir)
{
print '<title>AnyMaza.Com | Latest Music Download</title><meta name="og:title" content="AnyMaza.Com | Latest Music Download">';
}
else
{
print '<title>'.transdir($dir_exp[count($dir_exp)-1]).' | AnyMaza.Com</title>';
}

print '<link rel="icon" href="favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="description" content="english mp3,bangla mp3,bollywood mp3,kalkata mp3,punjabi mp3,Free Downloads Latest Mp3 Songs,bangla mp3,latest album,eid album,bollywood latest,"/>
<meta name="keywords" content="english mp3,bangla mp3,remix,mashup,latest songs,music mashup,eid album.welcome tune,download free,songs">

<link rel="stylesheet" href="http://AnyMaza.Com/css/style.css" type="text/css" />
</head>
<body>';



print'<div class="logo"><img src="http://AnyMaza.Com/mobile_logo.png" alt="AnyMaza.Com logo" title="AnyMaza.Com" />
</div><div class="tCenter">
<br/><a href="http://kingbd.net">Exclusive Downloads</a></div>';

print'<h2><center>Daily New Added<br/><a href="http://AnyMaza.Com/Bangla%20Mp3%20Songs/1/1/0.html">Bangla Songs</a> | <a href="http://AnyMaza.Com/Bollywood%20Mp3%20Songs/1/1/0.html">Hindi Songs</a></h2>';
include("ads/mobile_ads.php");
print'<div class="updates"><h2>Latest Updates</h2></div>';


include("update.php");

print'<div class="nextp"><a href="more_update.php"><b>[More Updates...]</b></a></div>';
include("ads/mobile_ads1.php");
////////////////////head area end/////////////////

if(!$dir)
{print '<h2>Downloads Category</h2>';}
else
{

}

include("ads/mobile_ads2.php");
//Subfolders
$glob_dir=glob('files/'.$dir.'/*',GLOB_ONLYDIR);
if($glob_dir)
{
$count=sizeof($glob_dir);
$countstr=ceil($count/$dirstr);
$page=intval($_GET['page']);
if($sort)
{usort($glob_dir, 'sortnew');}
$start = $page * $dirstr;
if($start>=$count OR $start<0)
{$start=0;}
$end = $start + $dirstr;
if($end>=$count)
{$end = $count;}
for($i=$start; $i<$end; $i++)
{
$dirt=str_replace('files/',null,$glob_dir[$i]);
$dir_exp=explode('/',$dirt);
$count=countf($dirt);
$ctot=ceil($count);

{
echo'<div class="catList">';
$post_bg=($bg++%2== 0) ? "item2" : "item1";
echo "<div class='catRowHome'>";

print '<a href="http://AnyMaza.Com'.$dirt.'/1/1/0.html" title="'.transdir($dir_exp[count($dir_exp)-1]).'" />'.transdir($dir_exp[count($dir_exp)-1]).'</a>';
echo'</div>';
echo'</div>';
}
}
}


/////////jewel///////////

if(file_exists('files/'.$dir.'/jewel.txt'))
{
$sfile ='files/'.$dir.'/jewel.txt';
$description = implode('<br/>', file($sfile));
echo '<div style="text-color:white; background-color:yellow"><center>'.$description.'</center></div>';

}


$glob_file=glob("files/$dir/*.{{$allfile}}",GLOB_BRACE);
if($glob_file) //FILES
{
if($sort)
{usort($glob_file, 'sortnew');}
$count=sizeof($glob_file);
$countstr=ceil($count/$filestr);
$page=intval($_GET['page']);
$start = $page * $filestr;
if($start>=$count OR $start<0)
{$start=0;}
$end = $start + $filestr;
if($end>=$count)
{$end = $count;}
for($i=$start; $i<$end; $i++)
{
$name=translit($glob_file[$i]);
$filesize=filesize($glob_file[$i]);
if($filesize>1024)
$filesize=round($filesize/1048576, 2).' MB';
else
{$filesize.=' bytes';}
if(r($glob_file[$i])=='txt')
{
$text=file($glob_file[$i]);
$name=$text[0];
$opis=$text[1].$text[2].$text[3].$text[4];
}

$basename=basename($glob_file[$i]);



//Screenshot
{
$post_bg=($bg++%2== 0) ? "item2" : "item1";
echo "<div class='$post_bg'><table><tr><td>";

if($p and file_exists('skrin/'.$basename.'.gif'))
{print '<img src="pic.php?file=skrin/'.$basename.'.gif" alt="Screen" /><br />';}

elseif(r($glob_file[$i])=='mp3')
{print '<img src="pic.php?file=images/mp3.gif" alt="Screen" /><br />';}

elseif($p and file_exists('skrin/'.$basename.'.jpg'))
{print '<img src="pic.php?file=skrin/'.$basename.'.jpg" alt="Screen" /><br />';}
elseif($p and file_exists('skrin/'.$basename.'.png'))
{print '<img src="pic.php?file=skrin/'.$basename.'.png" alt="Screen" /><br />';}

if((r($glob_file[$i])=='jpg' or r($glob_file[$i])=='gif' or r($glob_file[$i])=='png') and $p)
{print '<img src="pic.php?file='.$glob_file[$i].'" alt="Screen" /><br />';}

echo"</td><td></td>";
echo'<td>';
//print '<strong>'.$name.'</strong><br />';

if(file_exists('opis/'.$basename.'.txt'))
{$opis=htmlspecialchars(file_get_contents('opis/'.$basename.'.txt'));}

if($opis)
{print nl2br(htmlspecialchars($opis)).'<br />';}
$opis = false;


$title =$name;

$title= ereg_replace ("Mp3Gator.Net", "Mp3Gator.Net", $title);

$title= ereg_replace ("_", " ", $title);


if(r($glob_file[$i])=='jar')
{

}
elseif(r($glob_file[$i])=='txt')
{print '<a href="txt.php?p='.$p.'&amp;file='.$glob_file[$i].'&amp;sort='.$sort.'">Read</a><br />';}
else


$sc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mydnld WHERE nm = '".$glob_file[$i]."'"));
$nmbr = mysql_fetch_array(mysql_query("SELECT dload FROM mydnld WHERE nm='".$glob_file[$i]."'"));
if($sc[0]==0) { $cnt = 0; }else{ $cnt = $nmbr[0]; }

{print '<a href="file.php?p='.$p.'&amp;file='.$glob_file[$i].'&amp;sort='.$sort.'">'.$title.'</a><br/>[Size: '.$filesize.'] <br/> Downloads:<font color="red">'.$cnt.'</font>    ';}
echo'</td></tr></tbody></table></div>';
}
//Counts the number of Recent entries
$dirkomm=str_replace('/', 'D', str_replace('.', 'T', $glob_file[$i]));
if(!file_exists('komm/'.$dirkomm))
{$countkomm=0;}
else
{$countkomm=count(file('komm/'.$dirkomm));}

}
}

//Pagination:

if($countstr>1)
{print nav_page($countstr,$page,$dir,$p,$sort,'index');}


//Return to level up:
$dir_exp=explode('/',$dir);
if($dir)
{print '';}
if(($countj=count(explode('/',$dir)))>1)
{
$j=explode('/',$dir);
for($i=0; $i<=$countj; $i++)
{
$u=$j[count($j)-2];
if($u)
{
unset($j[count($j)-1]);
$g[$i]= ' | <a href="index.php?dir='.join('/', $j).'&amp;p='.$p.'&amp;sort='.$sort.'"><b>'.transdir($u).'</b></a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

print '</center></div>';
}


print '</div>';
include("ads/mobile_ads3.php");
print'
<h2><div align="left">Services</div></h2>
<div class="catList"><div class="catRowHome"><a href="contact" title="" />Contact Us</a></div></div>
<div class="catList"><div class="catRowHome"><a href="http://AnyMaza.Com/declaimer.php" title="Disclaimer" />Disclaimer</a></div>

</div>

<div class="f1"><center><b>Copyright &copy; AnyMaza.Com 2014</b></center></div>';

}
/*
* *
* Autoindex Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/
print '<a href="usersonline.php"></a>';
?>




