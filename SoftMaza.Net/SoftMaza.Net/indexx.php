<?php

/*
* *
* Autoindex Script By alim http://facebook.com/alimify
* Release : 2014
* Modify by alim
* * *
*/


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
print '<title>SoftMaza.Net | Free Downloads</title>';
}
else
{
print '<title>'.transdir($dir_exp[count($dir_exp)-1]).' | SoftMaza.Net</title>';
}

print '<link rel="icon" href="http://mixbd.com/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="description" content="Free Download '.transdir($dir_exp[count($dir_exp)-1]).' Now"/>
<meta name="keywords" content="dj remix,mashup mix,mp3 song,bangla mp3,bollwyood mp3,remix album,symbian,software,apps,java,games,wallpaper,download,videos song">
<link rel="stylesheet" href="http://softmaza.net/css/style.css" type="text/css" />
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

if($sort)
{print '<div class="dtype"><center>Sort by: <a href="http://softmaza.net/'.$dir.'/1/0/0.html">A To Z</a>/New To Old</center></div>';}
else
{print '<div class="dtype"><center>Sort by: A To Z/<a href="http://softmaza.net/'.$dir.'/1/1/0.html">New To Old</a></center></div>';}

echo"<center>";
include("mainad.php");
echo"</center>";

if(file_exists('desc/'.transdir($dir_exp[count($dir_exp)-1]).'-desc.txt'))
{
$sfile ='desc/'.transdir($dir_exp[count($dir_exp)-1]).'-desc.txt';
$description = implode('<br/>', file($sfile));
echo '<div style="text-color:white;"><center>'.$description.'</center></div>';

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



/////////alim///////////


///////////////alim////////////////
{
$post_bg=($bg++%2== 0) ? "item2" : "item1";
echo "<div class='catList'>";

print '<div class="catRow"><a href="http://softmaza.net/'.$dirt.'/1/1/0.html">'.transdir($dir_exp[count($dir_exp)-1]).' ['.$ctot.']</a>';
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
echo'<tr class="fl odd"><td class="tblimg">';

///////////
if(r($glob_file[$i])=='mkv') $dthumb= '<img src="http://softmaza.net/ext/mkv.gif" alt="" />';

if(r($glob_file[$i])=='swf') $dthumb= '<img src="http://softmaza.net/ext/swf.gif" alt="" />';

if(r($glob_file[$i])=='mp3') $dthumb= '<img src="http://softmaza.net/ext/mp3.gif" alt="" />';

if(r($glob_file[$i])=='avi') $dthumb= '<img src="http://softmaza.net/ext/avi.gif" alt="" />';

if(r($glob_file[$i])=='jar') $dthumb= '<img src="http://softmaza.net/ext/jar.gif" alt="" />';

if(r($glob_file[$i])=='3gp') $dthumb= '<img src="http://softmaza.net/ext/3gp.gif" alt="" />';

if(r($glob_file[$i])=='mp4') $dthumb= '<img src="http://softmaza.net/ext/mp4.gif" alt="" />';

if(r($glob_file[$i])=='zip') $dthumb= '<img src="http://softmaza.net/ext/zip.gif" alt="" />';

if(r($glob_file[$i])=='sis') $dthumb= '<img src="http://softmaza.net/ext/sis.gif" alt="" />';

if(r($glob_file[$i])=='sisx') $dthumb= '<img src="http://softmaza.net/ext/sisx.gif" alt="" />';

if(r($glob_file[$i])=='apk') $dthumb= '<img src="http://softmaza.net/ext/apk.gif" alt="" />';

if(r($glob_file[$i])=='apt') $dthumb= '<img src="http://softmaza.net/ext/apk.gif" alt="" />';

if(r($glob_file[$i])=='nth') $dthumb= '<img src="http://softmaza.net/ext/nth.gif" alt="" />';

if(r($glob_file[$i])=='thm') $dthumb= '<img src="http://softmaza.net/ext/thm.gif" alt="" />';

if(r($glob_file[$i])=='wav') $dthumb= '<img src="http://softmaza.net/ext/wav.gif" alt="" />';

if(r($glob_file[$i])=='mid') $dthumb= '<img src="http://softmaza.net/ext/mid.gif" alt="" />';

if(r($glob_file[$i])=='exe') $dthumb= '<img src="http://softmaza.net/ext/exe.gif" alt="" />';

//Screenshot

if($p and file_exists('thumb/'.$basename.'.gif'))

$thumb= '<img src="http://softmaza.net/thumb/'.$basename.'.gif" width="60" height="70" alt="Screen" />';

else $thumb=$dthumb;

if($p and file_exists('thumb/'.$basename.'.jpg'))

{print '<img src="http://softmaza.net/pic.php?file=thumb/'.$basename.'.jpg" alt="Screen" />';}

if($p and file_exists('thumb/'.$basename.'.png'))

{print '<img src="http://softmaza.net/pic.php?file=thumb/'.$basename.'.png" alt="Screen" />';}

if((r($glob_file[$i])=='jpeg' or r($glob_file[$i])=='gif' or r($glob_file[$i])=='jpg') and $p)

$thumb= '<img src="http://softmaza.net/pic.php?file='.$glob_file[$i].'" alt="Screen" />';





print' '.$thumb.' ';
echo'</td><td>';
//print '<strong>'.$name.'</strong>';

if(file_exists('opis/'.$basename.'.txt'))
{$opis=htmlspecialchars(file_get_contents('opis/'.$basename.'.txt'));}

if($opis)
{print nl2br(htmlspecialchars($opis)).'';}
$opis = false;


$title =$name;

$title= str_replace ("-(SoftMaza.Net)", "", $title);

$title= str_replace ("SoftMaza.Net", "", $title);
$title= str_replace ("_", " ", $title);




if(r($glob_file[$i])=='txt')
{print '<a href="txt.php?p='.$p.'&amp;file='.$glob_file[$i].'&amp;sort='.$sort.'">Read</a>';}
else

$sc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mydnld WHERE nm = '".$glob_file[$i]."'"));
$nmbr = mysql_fetch_array(mysql_query("SELECT dload FROM mydnld WHERE nm='".$glob_file[$i]."'"));
if($sc[0]==0) { $cnt = 0; }else{ $cnt = $nmbr[0]; }

{print '<a class="fileName" href="http://softmaza.net/file.php?p='.$p.'&amp;sort='.$sort.'&amp;file='.$glob_file[$i].'">'.$title.'</a><span>['.$filesize.']</span><br/><span>'.$cnt.' Downloads</span>';
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
echo"<center>";
include("mainad.php");
echo"</center>";
//Pagination:
print'<div class="pgn"><center>';
if($countstr>1)
{print nav_page($countstr,$page,$dir,$p,$sort,'index');}
print'</center></div>';

if(!$dir)
{print '
<div class="path"><a href="http://softmaza.net/index.php"><b>Home</b></a>';}
else
{print '<div class="path"><a href="http://softmaza.net/index.php"><b>Home</b></a>';}
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
$g[$i]= ' » <a href="http://softmaza.net/'.join('/', $j).'/'.$p.'/'.$sort.'/0.html"><b>'.transdir($u).'</b></a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

}


print '</div>';

include("footer.php");


?>