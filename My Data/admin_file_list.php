<?php

///////// Admin File List By Jewel
//////// Powerd By AnyMaza.Com
include("mylogin.php");
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
print '<title>File Maneger :: Admin Panel </title>';
}
else
{
print '<title>'.transdir($dir_exp[count($dir_exp)-1]).' - File Maneger :: Admin Panel</title>';
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

include("admin_file_header.php");

////////////////////head area end/////////////////

if(!$dir)
{print '<h2><center>Downloads<br/></center></h2>';}
else
{
$dir_exp=explode('/',$dir);
print '<h2>'.transdir($dir_exp[count($dir_exp)-1]).'</h2>';
}

///// Create Folder
$fold.=$_GET['dir'];
$createdir=$_GET['createdir'];
$cnfolder=$_GET['cnfolder'];
if($createdir) { if(mkdir("./files/$fold/$createdir")) { echo 'Folder Created..!'; } }
if($cnfolder=='new') { echo '<form method="get" action="admin_file_list.php">Folder Name:<input type="hidden" name="sort" value="'.$sort.'"/><input type="hidden" name="p" value="'.$p.'"/><input type="hidden" name="dir" value="'.$dir.'"/><input type="text" name="createdir" value="New Folder"/><input type="submit" value="Submit"/></form>';  }
else { echo '<b><div class="even"><a href="admin_file_list.php?cnfolder=new&dir='.$dir.'&sort='.$sort.'&p='.$p.'">Create New Folder</a> | <a href="admin_file_albummp3.php?dir='.$dir.'">Upload Album</a> | <a href="admin_file_singlemp3.php?dir='.$dir.'">Upload Single</a></div></b>'; }



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



print '<center><a href="/admin_desc_edit.php?dir='.$dir.'">Description</a> | <a href="/admin_file_imageurl.php?dir='.$dir.'">Thumb</a></center>';
if($sort)
{print '<div class="dtype"><center>Sort by: <a href="http://AnyMaza.Com/admin_file_list.php?dir='.$dir.'&p=0&sort=0">A To Z</a>/New To Old</center></div>';}
else
{print '<div class="dtype"><center>Sort by: A To Z/<a href="http://AnyMaza.Com/admin_file_list.php?dir='.$dir.'&p=1&sort=1">New To Old</a></center></div>';}



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
echo "<div class=''>";

print '<div class="fl odd"><br/><a href="http://AnyMaza.Com/admin_file_list.php?dir='.$dirt.'&p=1&sort=1"><b>'.transdir($dir_exp[count($dir_exp)-1]).' ['.$ctot.']</b></a>      [ <a href="/admin_file_rename.php?dir=./files/'.$dir.'/&name='.transdir($dir_exp[count($dir_exp)-1]).'">R</a> ]';
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

if(r($glob_file[$i])=='avi') $dthumb= '<img src="http://mp3gator.net/ext/avi.gif" alt="" />';

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
$retitle =$name;
$title= str_replace ("(AnyMaza.Com)", "", $title);
$title= str_replace ("(KingBD.Net)", "", $title);
$title= str_replace ("(Mp3Gator.Net)", "", $title);
$title= str_replace ("_", " ", $title);
$retitle= str_replace ("&", "getfilesload", $retitle);




if(r($glob_file[$i])=='txt')
{print '<a href="txt.php?p='.$p.'&amp;file='.$glob_file[$i].'&amp;sort='.$sort.'">Read</a>';}
else
{print '<a href="http://AnyMaza.Com/view/'.$glob_file[$i].'.html"><b>'.$title.'</b></a><span><br/>['.$filesize.']</span><a href="/admin_file_rename.php?dir=./files/'.$dir.'/&name='.$retitle.'">R</a>';
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

//Pagination:
print'<div class="pgn"><center>';
if($countstr>1)
{print nav_page($countstr,$page,$dir,$p,$sort,'index');}
print'</center></div>';

if(!$dir)
{print '
<div class="path"><a href="admin_file_list.php?dir="><b>Root</b></a>';}
else
{print '<div class="path"><a href="admin_file_list.php?dir="><b>Root</b></a>';}
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
$g[$i]= ' » <a href="http://AnyMaza.Com/admin_file_list.php?dir='.join('/', $j).'&p='.$p.'&sort='.$sort.'"><b>'.transdir($u).'</b></a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

}


print '</div>';

include("admin_file_footer.php"); ?>