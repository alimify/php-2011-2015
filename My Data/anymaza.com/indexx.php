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
require 'config.php';
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
print '<title>AnyMaza.Com | Free Downloads</title>';
}
else
{
print '<title>'.transdir($dir_exp[count($dir_exp)-1]).' | AnyMaza.Com</title>';
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

</script>  <link rel="icon" href="favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="description" content="Free Downloads Latest Mp3 Songs,Latest Video Songs,Wallpaers,Themes,Games,Softwares,Videos,etc For Your Mobile"/>
<meta name="keywords" content="dj remix,mashup mix,mp3 song,bangla mp3,bollwyood mp3,remix album,symbian,software,apps,java,games,wallpaper,download,videos song">
<link href="css/pc_body.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_xlist.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_responsive.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_header.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_black.css">
<link rel="STYLESHEET" type="text/css" href="/css/styles.css">
<link rel="STYLESHEET" type="text/css" href="/css/pc_pagr.css"><style>
.path{ padding:2px; margin:5px 0; font-weight:bold; background:#d4eaf3;  }
.path a:hover{ color:green; }.catRowHome, .catRow { border-bottom:1px solid #ccc; 
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
}.update a{color:#33A1C9;} a:active{color:#008080;} .update a:hover{color:#FF0000;}</style></head>
<body><div>';




///////////// header

print'<div class="pc_content">
<div style="color: #505050;  background-color: #F8F8F8; padding: 5px 5px 5px; display: block;" align="left">
<table width="100%">
<tbody><tr><td width="70%">
<img src="http://AnyMaza.Com/pc_logo.png" alt="Mp3Gator Logo">

</td>

<td align="right" width="30%">
 <div align="right"><body onLoad="startclock()">

<form name="clock" onSubmit="0">
<input type="text" name="face" size="13"></form>
</div>

</td>
</tr></tbody></table></div></div>

                <!-- Logo End -->

               

			   <!-- Menu Start -->
			
<div>
<div class="pc_content" id="cssmenu">
<ul>
   <li class="active"><a href="/index.php"><span>Home</span></a></li>
 <li><a href="/more_update.php"><span>Updates</span></a></li><li><a href="http://kingbd.net"><span>Videos</span></a></li>
   <li class="has-sub"><a href="http://AnyMaza.Com/mp3songs/1/1/0.html"><span>Mp3 Songs</span></a>
      <ul>
         <li class="has-sub"><a href="http://AnyMaza.Com/Bangla%20Mp3%20Songs/1/1/0.html"><span>Bangla Mp3 Songs</span></a>
            <ul>
               <li><a href="http://AnyMaza.Com/Bangla%20Mp3%20Songs/Bangla%20Mp3%20Album/1/1/0.html"><span>Bangla Mp3 Album</span></a></li>
               <li><a href="http://AnyMaza.Com/Bangla%20Mp3%20Songs/Bangla%20Rap%20Songs/1/1/0.html"><span>Bangla Rap Mp3 Songs</span></a></li>
               <li><a href="http://AnyMaza.Com/Bangla%20Mp3%20Songs/Single%20Mp3%20Songs/1/1/0.html"><span>Bangla Single Song</span></a></li>
               
            </ul>
         </li>
        <li class="has-sub"><a href="http://AnyMaza.Com//Bollywood%20Mp3%20Songs/1/1/0.html"><span>Bollywood Mp3 Songs</span></a>
            <ul>
               <li><a href="http://AnyMaza.Com/Bollywood%20Mp3%20Songs/Bollywood%20New%20Mp3/1/1/0.html"><span>Bollywood New Mp3</span></a></li>
               <li><a href="http://AnyMaza.Com/Bollywood%20Mp3%20Songs/Single%20Mp3%20Songs/1/1/0.html"><span>Bollywood Single Mp3</span></a></li>
               
            </ul>
		</li>
		<li class="has-sub"><a href="#"><span>Kalkata Mp3 Songs</span></a>
            <ul>
               <li><a href="http://AnyMaza.Com"><span>Kalkata Movie Songs</span></a></li>
               <li class="last"><a href=""><span>Kalkata Single Song</span></a></li>
            </ul>
		</li>
		<li class="has-sub"><a href="http://AnyMaza.Com/English%20Mp3%20Songs/1/0/0.html"><span>English Mp3 Songs</span></a>
            <ul>
              <li> <a href="http://AnyMaza.Com/English%20Mp3%20Songs/English%20Mp3%20Album/1/1/0.html"><span>English Mp3 Album</span></a> </li>			  
              <li><a href="http://AnyMaza.Com/English%20Mp3%20Songs/Single%20Mp3%20Songs/1/1/0.html"><span>English Single Song</span></a></li>
            </ul>
		</li>
		<li><a href="http://AnyMaza.Com/Punjabi%20Mp3%20Songs/1/1/0.html"> <span>Punjabi Songs</span></a></li>
		
		<li><a href="http://AnyMaza.Com/Special%20Songs/1/1/0.html"> <span>Special Songs</span></a></li>
		
		<li><a href="http://AnyMaza.Com/Islamic%20Audio/1/1/0.html"> <span>Islamic Audio</span></a></li>
</ul>
</div></div> ';


print'<meta id="viewport" name="viewport" content="width=device-width"><div class="body_area">';

/////////// Advertisment & Slider
include("ads/pc_top_ads1.php");


////////////////////head area end/////////////////

/////////// Left Body
print'<div class="body_left">';

////// Folder Css
print'<div class="mainblok">';




if(!$dir)
{print '<div class="nfooter">Downloads</div>';}
else
{
$dir_exp=explode('/',$dir);
print '<div class="nfooter">'.transdir($dir_exp[count($dir_exp)-1]).'</div>';
}
/// Folder Thumbnail


if(file_exists('files/'.$dir.'/album.jpg'))
$folderdesc= '<img src="http://AnyMaza.Com/files/'.$dir.'/album.jpg" width="120" height="150" alt="'.transdir($dir_exp[count($dir_exp)-1]).'" title="'.transdir($dir_exp[count($dir_exp)-1]).' Album Art Downloads" />';
print '<center>'.$folderdesc.'</center>';

/////// Description
if(file_exists('files/'.$dir.'/file.txt'))
{
$sfile ='files/'.$dir.'/file.txt';
$description = implode('<br/>', file($sfile));
echo '<div style="text-color:white;"><center>'.$description.'</center></div>';

}

////////// Sorting
if($sort)
{print '<div class="dtype"><center>Sort by: <a href="http://AnyMaza.Com/'.$dir.'/1/0/0.html">A To Z</a>/New To Old</center></div>';}
else
{print '<div class="dtype"><center>Sort by: A To Z/<a href="http://AnyMaza.Com/'.$dir.'/1/1/0.html">New To Old</a></center></div>';}


include("ads/pc_sortby_ads.php");

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



/////////jewel///////////


///////////////jewel////////////////
{
$post_bg=($bg++%2== 0) ? "item2" : "item1";

/// Folder Thumbnail

$dfolderthumb= '<img src="http://AnyMaza.Com/art/default.png" alt="'.transdir($dir_exp[count($dir_exp)-1]).'" width="60" height="70" />';
if(file_exists('files/'.$dir.'/'.transdir($dir_exp[count($dir_exp)-1]).'/album.jpg'))
$folderthumb= '<img src="http://AnyMaza.Com/files/'.$dir.'/'.transdir($dir_exp[count($dir_exp)-1]).'/album.jpg" width="60" height="70" alt="'.transdir($dir_exp[count($dir_exp)-1]).'" title="'.transdir($dir_exp[count($dir_exp)-1]).' Album art" />';
else $folderthumb=$dfolderthumb;


print '<table width="100%"><tr class="catRow"><td width="10%">'.$folderthumb.'</td><td width="80%"><a href="http://AnyMaza.Com/'.$dirt.'/1/1/0.html">'.transdir($dir_exp[count($dir_exp)-1]).' ['.$ctot.']</a></td></tr></table>';
}
}
}

echo'<table width="100%">';


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
if($filesize>1048576)
$filesize=round($filesize/1048576, 2).' Mb';
elseif($filesize>1024)
$filesize=round($filesize/1024, 2).' Kb';
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
echo'<tr class="catRow"><td width="10%">';

///////////
if(r($glob_file[$i])=='mkv') $dthumb= '<img src="http://AnyMaza.Com/ext/mkv.gif" alt="" />';

if(r($glob_file[$i])=='swf') $dthumb= '<img src="http://AnyMaza.Com/ext/swf.gif" alt="" />';

if(r($glob_file[$i])=='mp3') $dthumb= '<img src="http://AnyMaza.Com/ext/mp3.gif" alt="" />';

if(r($glob_file[$i])=='avi') $dthumb= '<img src="http://AnyMaza.Com/ext/avi.gif" alt="" />';

if(r($glob_file[$i])=='jar') $dthumb= '<img src="http://AnyMaza.Com/ext/jar.gif" alt="" />';

if(r($glob_file[$i])=='3gp') $dthumb= '<img src="http://AnyMaza.Com/ext/3gp.gif" alt="" />';

if(r($glob_file[$i])=='mp4') $dthumb= '<img src="http://AnyMaza.Com/ext/mp4.gif" alt="" />';

if(r($glob_file[$i])=='zip') $dthumb= '<img src="http://anymaza.com/ext/zip.gif" alt="" />';

if(r($glob_file[$i])=='sis') $dthumb= '<img src="http://AnyMaza.Com/ext/sis.gif" alt="" />';

if(r($glob_file[$i])=='sisx') $dthumb= '<img src="http://AnyMaza.Com/ext/sisx.gif" alt="" />';

if(r($glob_file[$i])=='apk') $dthumb= '<img src="http://AnyMaza.Com/ext/apk.gif" alt="" />';

if(r($glob_file[$i])=='apt') $dthumb= '<img src="http://AnyMaza.Com/ext/apk.gif" alt="" />';

if(r($glob_file[$i])=='nth') $dthumb= '<img src="http://AnyMaza.Com/ext/nth.gif" alt="" />';

if(r($glob_file[$i])=='thm') $dthumb= '<img src="http://AnyMaza.Com/ext/thm.gif" alt="" />';

if(r($glob_file[$i])=='wav') $dthumb= '<img src="http://AnyMaza.Com/ext/wav.gif" alt="" />';

if(r($glob_file[$i])=='mid') $dthumb= '<img src="http://AnyMaza.Com/ext/mid.gif" alt="" />';

if(r($glob_file[$i])=='exe') $dthumb= '<img src="http://AnyMaza.Com/ext/exe.gif" alt="" />';

//Screenshot

if($p and file_exists('thumb/'.$basename.'.gif'))

$thumb= '<img src="http://AnyMaza.Com/thumb/'.$basename.'.gif" width="60" height="70" alt="Screen" />';

else $thumb=$dthumb;

if($p and file_exists('thumb/'.$basename.'.jpg'))

{print '<img src="http://AnyMaza.Com/pic.php?file=thumb/'.$basename.'.jpg" alt="Screen" />';}

if($p and file_exists('thumb/'.$basename.'.png'))

{print '<img src="http://AnyMaza.Com/pic.php?file=thumb/'.$basename.'.png" alt="Screen" />';}

if((r($glob_file[$i])=='jpeg' or r($glob_file[$i])=='gif' or r($glob_file[$i])=='jpg') and $p)

$thumb= '<img src="http://AnyMaza.Com/pic.php?file='.$glob_file[$i].'" alt="Screen" />';





print' '.$thumb.' ';
echo'</td><td width="90%">';
//print '<strong>'.$name.'</strong>';

if(file_exists('opis/'.$basename.'.txt'))
{$opis=htmlspecialchars(file_get_contents('opis/'.$basename.'.txt'));}

if($opis)
{print nl2br(htmlspecialchars($opis)).'';}
$opis = false;


$title =$name;

$title= str_replace ("(AnyMaza.Com)", "", $title);
$title= str_replace ("(KingBD.Net)", "", $title);
$title= str_replace ("(Mp3Gator.Net)", "", $title);
$title= str_replace ("_", " ", $title);

$glob_file[$i]= str_replace ("&", "getfilesload", $glob_file[$i]);


if(r($glob_file[$i])=='txt')
{print '<a href="txt.php?p='.$p.'&amp;file='.$glob_file[$i].'&amp;sort='.$sort.'">Read</a>';}
else
{print '<a href="http://AnyMaza.Com/view/'.$glob_file[$i].'.html">'.$title.'</a><span>['.$filesize.']</span>';
}




echo'</td></tr>';
}

//Counts the number of Recent entries
$dirkomm=str_replace('/', 'D', str_replace('.', 'T', $glob_file[$i]));
if(!file_exists('komm/'.$dirkomm))
{$countkomm=0;}
else
{$countkomm=count(file('komm/'.$dirkomm));}

}
}
echo"</table>";

//Pagination:
print'<div class="pgn"><center>';
if($countstr>1)
{print nav_page($countstr,$page,$dir,$p,$sort,'index');}
print'</center></div>';
include("ads/pc_top_ads4.php");
if(!$dir)
{print '
<div class="path"><a href="http://AnyMaza.Com"><b>Home</b></a>';}
else
{print '<div class="path"><a href="http://AnyMaza.Com"><b>Home</b></a>';}
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
$g[$i]= ' » <a href="http://AnyMaza.Com/'.join('/', $j).'/'.$p.'/'.$sort.'/0.html"><b>'.transdir($u).'</b></a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

}


print '</div>';
print '</div>';

print '</div>';
//////// Left Body End
print '<div class="body_right">';


print '<div class="mainbox">
<div class="mainblok">
<div class="nfooter">Links</div>

<div class="xlist2"> <a href="/top10.php" title="Top Downloading Files Of  Mp3Gator"><div> Top Files</div></a></div>

<div class="xlist"><a href="http://kingbd.net" title="download latest HD Mp4 3gp Videos Bangla Hindi Kalkata English & Punjabi Videos"><div> Videos</div> </a></div>
</div>

</div>
';

//// Advertisment
include("ads/pc_right_ads1.php");
include("ads/pc_right_ads2.php");
include("ads/pc_right_ads3.php");

print '<div class="mainbox">
<div class="mainblok">
<div class="nfooter">Links</div><div class="xlist2"> <a href="/declaimer.php" title="Terms & Desclaimer Of Using  Mp3Gator"><div> Terms/Desclaimer</div></a></div><div class="xlist"><a href="/contact" title="Contact With Mp3Gator Admin"><div> Contact Admin</div> </a></div></div></div>';


print '</div></div><div class="nfooter" align="center"><center>Copyright By AnyMaza.Com</center></div>';

}

/*
* *
* Autoindex Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/

////////////////// *******************************************************************************************************/////////////////////

//// Mobile Site Start

else {
$mt=microtime(1);
require 'config.php';
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
print '<title>AnyMaza.Com | Free Downloads</title>';
}
else
{
print '<title>'.transdir($dir_exp[count($dir_exp)-1]).' | AnyMaza.Com</title>';
}

print '<link rel="icon" href="http://AnyMaza.Com/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="description" content="'.transdir($dir_exp[count($dir_exp)-1]).',Free Download '.transdir($dir_exp[count($dir_exp)-1]).' Now,Exclusive Latest '.transdir($dir_exp[count($dir_exp)-1]).' Download,'.transdir($dir_exp[count($dir_exp)-1]).' Songspk Djmaza Wapking Waptrick Free "/>
<meta name="keywords"'.transdir($dir_exp[count($dir_exp)-1]).' content="'.transdir($dir_exp[count($dir_exp)-1]).',dj remix,mashup mix,mp3 song,bangla mp3,bollwyood mp3,remix album,symbian,software,apps,java,games,wallpaper,download,videos song">
<link rel="stylesheet" href="http://AnyMaza.Com/css/style.css" type="text/css" />
</head>
<body>';

include("header.php");

////////////////////head area end/////////////////

if(!$dir)
{print '<h2><center>Downloads<br/></center></h2>';}
else
{
$dir_exp=explode('/',$dir);
print '<h2>'.transdir($dir_exp[count($dir_exp)-1]).'</h2>';
}

//// Folder Image
if(file_exists('files/'.$dir.'/album.jpg'))
$mfolderdesc= '<img src="http://AnyMaza.Com/files/'.$dir.'/album.jpg" width="80" height="100" alt="'.transdir($dir_exp[count($dir_exp)-1]).'" title="'.transdir($dir_exp[count($dir_exp)-1]).'  Album Art Downloads" />';
print '<center>'.$mfolderdesc.'</center>';


//// Description
if(file_exists('files/'.$dir.'/file.txt'))
{
$sfile ='files/'.$dir.'/file.txt';
$description = implode('<br/>', file($sfile));
echo '<div style="text-color:white;"><center>'.$description.'</center></div>';

}



echo"<center>";
include("ads/mobile_ads1.php");
echo"</center>";
if($sort)
{print '<div class="dtype"><center>Sort by: <a href="http://AnyMaza.Com/'.$dir.'/1/0/0.html">A To Z</a>/New To Old</center></div>';}
else
{print '<div class="dtype"><center>Sort by: A To Z/<a href="http://AnyMaza.Com/'.$dir.'/1/1/0.html">New To Old</a></center></div>';}



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



/////////jewel///////////


///////////////jewel////////////////
{
$post_bg=($bg++%2== 0) ? "item2" : "item1";
echo "<div class='catList'>";

print '<div class="catRow"><a href="http://AnyMaza.Com/'.$dirt.'/1/1/0.html">'.transdir($dir_exp[count($dir_exp)-1]).' ['.$ctot.']</a>';
echo'</div></div>';
}
}
}

echo'<table cellspacing="0">';


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
if($filesize>1048576)
$filesize=round($filesize/1048576, 2).' Mb';
elseif($filesize>1024)
$filesize=round($filesize/1024, 2).' Kb';
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
echo'<div class="fl odd">';

///////////
if(r($glob_file[$i])=='mkv') $dthumb= '<img src="http://AnyMaza.Com/ext/mkv.gif" alt="" />';

if(r($glob_file[$i])=='swf') $dthumb= '<img src="http://AnyMaza.Com/ext/swf.gif" alt="" />';

if(r($glob_file[$i])=='mp3') $dthumb= ' ';

if(r($glob_file[$i])=='avi') $dthumb= '<img src="http://AnyMaza.Com/ext/avi.gif" alt="" />';

if(r($glob_file[$i])=='jar') $dthumb= '<img src="http://AnyMaza.Com/ext/jar.gif" alt="" />';

if(r($glob_file[$i])=='3gp') $dthumb= '<img src="http://AnyMaza.Com/ext/3gp.gif" alt="" />';

if(r($glob_file[$i])=='mp4') $dthumb= '<img src="http://AnyMaza.Com/ext/mp4.gif" alt="" />';

if(r($glob_file[$i])=='zip') $dthumb= '<img src="http://AnyMaza.Com/ext/zip.gif" alt="" />';

if(r($glob_file[$i])=='sis') $dthumb= '<img src="http://AnyMaza.Com/ext/sis.gif" alt="" />';

if(r($glob_file[$i])=='sisx') $dthumb= '<img src="http://AnyMaza.Com/ext/sisx.gif" alt="" />';

if(r($glob_file[$i])=='apk') $dthumb= '<img src="http://AnyMaza.Com/ext/apk.gif" alt="" />';

if(r($glob_file[$i])=='apt') $dthumb= '<img src="http://AnyMaza.Com/ext/apk.gif" alt="" />';

if(r($glob_file[$i])=='nth') $dthumb= '<img src="http://AnyMaza.Com/ext/nth.gif" alt="" />';

if(r($glob_file[$i])=='thm') $dthumb= '<img src="http://AnyMaza.Com/ext/thm.gif" alt="" />';

if(r($glob_file[$i])=='wav') $dthumb= '<img src="http://AnyMaza.Com/ext/wav.gif" alt="" />';

if(r($glob_file[$i])=='mid') $dthumb= '<img src="http://AnyMaza.Com/ext/mid.gif" alt="" />';

if(r($glob_file[$i])=='exe') $dthumb= '<img src="http://AnyMaza.Com/ext/exe.gif" alt="" />';

//Screenshot

if($p and file_exists('thumb/'.$basename.'.gif'))

$thumb= '<img src="http://AnyMaza.Com/thumb/'.$basename.'.gif" width="60" height="70" alt="Screen" />';

else $thumb=$dthumb;

if($p and file_exists('thumb/'.$basename.'.jpg'))

{print '<img src="http://AnyMaza.Com/pic.php?file=thumb/'.$basename.'.jpg" alt="Screen" />';}

if($p and file_exists('thumb/'.$basename.'.png'))

{print '<img src="http://AnyMaza.Com/pic.php?file=thumb/'.$basename.'.png" alt="Screen" />';}

if((r($glob_file[$i])=='jpeg' or r($glob_file[$i])=='gif' or r($glob_file[$i])=='jpg') and $p)

$thumb= '<img src="http://AnyMaza.Com/pic.php?file='.$glob_file[$i].'" alt="Screen" />';





print' '.$thumb.' ';
//print '<strong>'.$name.'</strong>';

if(file_exists('opis/'.$basename.'.txt'))
{$opis=htmlspecialchars(file_get_contents('opis/'.$basename.'.txt'));}

if($opis)
{print nl2br(htmlspecialchars($opis)).'';}
$opis = false;


$title =$name;

$title= str_replace ("(AnyMaza.Com)", "", $title);

$title= str_replace ("(KingBD.Net)", "", $title);
$title= str_replace ("(Mp3Gator.Net)", "", $title);
$title= str_replace ("_", " ", $title);
$glob_file[$i]= str_replace ("&", "getfilesload", $glob_file[$i]);



if(r($glob_file[$i])=='txt')
{print '<a href="txt.php?p='.$p.'&amp;file='.$glob_file[$i].'&amp;sort='.$sort.'">Read</a>';}
else
{print '<a href="http://AnyMaza.Com/view/'.$glob_file[$i].'.html"><b>'.$title.'</b></a><span><br/>['.$filesize.']</span>';
}




echo'</div>';
}

//Counts the number of Recent entries
$dirkomm=str_replace('/', 'D', str_replace('.', 'T', $glob_file[$i]));
if(!file_exists('komm/'.$dirkomm))
{$countkomm=0;}
else
{$countkomm=count(file('komm/'.$dirkomm));}

}
}
echo"</table>";
echo"<center>";
include("ads/mobile_ads2.php");
echo"</center>";
//Pagination:
print'<div class="pgn"><center>';
if($countstr>1)
{print nav_page($countstr,$page,$dir,$p,$sort,'index');}
print'</center></div>';

if(!$dir)
{print '
<div class="path"><a href="http://AnyMaza.Com"><b>Home</b></a>';}
else
{print '<div class="path"><a href="http://AnyMaza.Com"><b>Home</b></a>';}
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
$g[$i]= ' » <a href="http://AnyMaza.Com/'.join('/', $j).'/'.$p.'/'.$sort.'/0.html"><b>'.transdir($u).'</b></a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

}


print '</div>';

include("footer.php");


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