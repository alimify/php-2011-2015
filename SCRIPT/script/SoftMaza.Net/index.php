<?php


/*
* *
* Autoindex Script By alim http://facebook.com/alimify
* Release : 2014
* Modify by alim
* * *
*/


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
print '<title>SoftMaza.Net | Free Software,Games,Themes Downloads</title>';
}
else
{
print '<title>'.transdir($dir_exp[count($dir_exp)-1]).' | SoftMaza.Net</title>';
}

print '<link rel="icon" href="favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="description" content="Free Downloads Latest Mp3 Songs,Latest Video Songs,Wallpaers,Themes,Games,Softwares,Videos,etc For Your Mobile"/>
<meta name="keywords" content="dj remix,mashup mix,mp3 song,bangla mp3,bollwyood mp3,remix album,symbian,software,apps,java,games,wallpaper,download,videos song">

<link rel="stylesheet" href="http://softmaza.net/css/style.css" type="text/css" />
</head>
<body>';



print'<div class="logo"><img src="http://softmaza.net/logo.png" alt="SoftMaza.Net logo" title="SoftMaza.Net" />
</div><div class="mainDiv"><center><a href="http://facebook.com/kingbdpage"><img src="http://freeappsmaza.com/images/facebookpc.gif" alt="facebook like icon" title="FB" /></a><hr></hr>';
include("mainad.php");


print'</center></div>';



print'<h2>Latest Updates</h2>';


include("update.php");

print'<div class="nextp"><a href="more_update.php"><b>[More Updates...]</b></a></div>';
include("mainad.php");
////////////////////head area end/////////////////

if(!$dir)
{print '<h2>Downloads Category</h2>';}
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
echo'<div class="catList">';
$post_bg=($bg++%2== 0) ? "item2" : "item1";
echo "<div class='catRowHome'>";

print '<a href="http://softmaza.net'.$dirt.'/1/1/0.html" title="'.transdir($dir_exp[count($dir_exp)-1]).'" />'.transdir($dir_exp[count($dir_exp)-1]).'</a>';
echo'</div>';
echo'</div>';
}
}
}


/////////alim///////////

if(file_exists('files/'.$dir.'/alim.txt'))
{
$sfile ='files/'.$dir.'/alim.txt';
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

$title= ereg_replace ("WwW.MixBD.CoM", "MixBD.CoM", $title);

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

print'
<h2>Services</h2>

<div class="catList"><div class="catRowHome"><a href="top10.php" title="Top 10 Files" />Top 10 Files</a></div></div>
<div class="catList"><div class="catRowHome"><a href="" title="" />Contact Us</a></div></div>
<div class="catList"><div class="catRowHome"><a href="top10.php" title="Disclaimer" />Disclaimer</a></div>

</div>

<div class="f1"><center><b>Copyright &copy; SoftMaza.Net 2014</b></center></div>';


?>