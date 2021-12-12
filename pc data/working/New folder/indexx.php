<?php

$mt=microtime(1);
require 'config.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
if($zip)
{include('zip.php');}

//Sorting and preview:

$p=intval($_GET['p']);
//Folder:
if (isset($_GET['folderid'])) {
    $fldid = preg_replace('#[^0-9]#i', '', $_GET['folderid']);
    $fldid = ereg_replace("[^0-9]", "", $_GET['folderid']);
} else {
    $fldid = 1;
}
$zipyes = mysql_fetch_array(mysql_query("SELECT zip FROM folder WHERE folderid='".$fldid."'"));
$fldurl = mysql_fetch_array(mysql_query("SELECT folderurl FROM folder WHERE folderid='".$fldid."'"));
$dir=htmlspecialchars($fldurl[0]);

while(substr($dir,0,1)=='/')
{$dir=substr($dir,1,strlen($dir));}

if(strstr($dir,'..') OR !is_dir('files/'.$dir) OR strstr($dir,'://'))
{$dir=null;}

$opis = false;

//HATS
print $top;
include("ads/ads_config.php");
$dir_exp=explode('/',$dir);
////////////////head area////////////////////

if(!$dir)
{
print '<title>AnyMaza.Com | Free Downloads</title>';
}
else
{
print '<title>'.transdir($dir_exp[count($dir_exp)-1]).' :: AnyMaza.Com</title>';
}

/// For SEO

$seotitle = transdir($dir_exp[count($dir_exp)-1]);
$spilttext = $seotitle;
$spilttext = explode(" ", $spilttext);
print "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57983417-2', 'auto');
  ga('send', 'pageview');

</script>";
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
<meta name="distribution" content="global"/><meta name="keywords" content="anymaza,anymaza.com,'.$seotitle.','.$spilttext[0].','.$spilttext[1].','.$spilttext[2].','.$spilttext[3].','.$spilttext[4].','.$spilttext[5].'"/>
<meta name="Identifier-URL" content="http://www.anymaza.com"/><meta http-equiv="Cache-control" content="no-cache"><link rel="shortcut icon" href="http://www.bollyclassic.com/uploads/favicon.ico"/><link rel="stylesheet" href="/css/style.css" type="text/css" />
</head>
<body>';

include("header.php");
////////////////////head area end/////////////////
include("ads/body_config.php");

include("ads/mobfox.php");
if(!$dir)
{print '<div class="title">Downloads</div>';}
else
{
$dir_exp=explode('/',$dir);
print '<div class="title">'.transdir($dir_exp[count($dir_exp)-1]).'</div>';
}
include("ads/adplay.php");
//// Folder Image
if(file_exists('file/'.$fldid.'.jpg'))
$mfolderdesc= '<img src="http://AnyMaza.Com/pic.php?file=file/'.$fldid.'.jpg" width="100" height="130" alt="'.transdir($dir_exp[count($dir_exp)-1]).'" title="'.transdir($dir_exp[count($dir_exp)-1]).'  Album Art Downloads" /><br/><a href="http://AnyMaza.Com/file/'.$fldid.'.jpg">Download Poster</a>';
print '<center>'.$mfolderdesc.'</center>';



//// Description
if(file_exists('file/'.$fldid.'.txt'))
{
$sfile ='file/'.$fldid.'.txt';
$description = implode('<br/>', file($sfile));
echo '<div style="text-color:white;"><center>'.$description.'</center></div>';

}

/// Sorting
if($sort)
{print '<div class="tags"><center>Sort by: A to Z / <a href="http://AnyMaza.Com/srt/'.$fldid.'/'.$seotitle.'/1.html">New To Old</a></center></div>';}
else
{print '<div class="tags"><center>Sort by: New To Old / <a href="http://AnyMaza.Com/srt/'.$fldid.'/'.$seotitle.'/0.html">A to Z</a></center></div>';}

echo"<center>";
include("ads/buzzcity.php");
echo"</center>";
///Zip Link
if($zipyes[0] == '1'){ print '<center><a href="/zipper.php?id='.$fldid.'"><b>Download Zipped Full Album</b></a></center>'; }
//// Latest Song Update
$getflist= ''.$fldid.'.dat';
if(file_exists('file/'.$getflist.'')){ include 'flist.php'; }

//Subfolders
$glob_dir=glob('files/'.$dir.'/*',GLOB_ONLYDIR);
if($glob_dir)
{
$count=sizeof($glob_dir);
$countstr=ceil($count/$dirstr);
$page=intval($_GET['page']);
usort($glob_dir, 'sortnew');
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
$folderid = mysql_fetch_array(mysql_query("SELECT folderid FROM folder WHERE folderurl='".$dirt."'"));
if(file_exists('file/'.$folderid[0].'.dat')){ $barray = file('file/'.$folderid[0].'.dat');
$mcount = count($barray); } else { $mcount = $ctot;}
print '<div class="folder"><a href="http://AnyMaza.Com/'.$folderid[0].'/'.transdir($dir_exp[count($dir_exp)-1]).'.html">'.transdir($dir_exp[count($dir_exp)-1]).' ['.$mcount.']</a>';
echo'</div></div>';
}
}
}

//// FileList


$glob_file=glob("files/$dir/*.{{$allfile}}",GLOB_BRACE);
if($glob_file) //FILES
{

usort($glob_file, 'sortnew');
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
///file sql
$fileid=MySQL_Fetch_Array(MySQL_Query("SELECT id from mydnld where nm='".$glob_file[$i]."';"));
//Get File Extension
$file_extension=pathinfo(($glob_file[$i]), PATHINFO_EXTENSION);
$ext=$file_extension;
if(($ext)==mp3)
{
require_once('getid3/getid3.php');
$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($glob_file[$i]);
getid3_lib::CopyTagsToComments($ThisFileInfo); 
$artist = @$ThisFileInfo['comments_html']['artist'][0];  
$album = @$ThisFileInfo['comments_html']['album'][0];
$artist= str_replace ("[ AnyMaza.Com ]", "", $artist);
$artist= str_replace ("[AnyMaza.Com]", "", $artist);
$reartist= 'Singer : '.$artist.'';
$album= str_replace ("[ AnyMaza.Com ]", "", $album);
}
//Screenshot
if(r($glob_file[$i])==$ext) $dthumb= '/ext/'.$ext.'.gif';
if($p and file_exists('/thumb/'.$fileid[0].'.gif'))
$thumb= 'http://AnyMaza.Com/thumb/'.$fileid[0].'.gif';
else $thumb=$dthumb;
$title =$name;
$title= str_replace ("(AnyMaza.Com)", "", $title);
$title= str_replace ("_", " ", $title);
$title= str_replace ("&", "And", $title);
///URL SETUP
if(r($glob_file[$i])=='mp3') $urlset= '<div class="file"><a href="/view/'.$fileid[0].'/'.$title.' By '.$artist.'.html">'.$title.'<br/><font color="black"><small>'.$reartist.'</small></font></a></div>';
else $urlset='<a href="/view/'.$fileid[0].'/'.$title.'.html"><div class="file"><table><tr class="fl odd"><td width="16%"><img src="'.$thumb.'"  width="70px" height="50px" alt="'.$title.' thumb" /></td><td><b>'.$title.'</b><br/><font color="black"><small>File Size: '.$filesize.'</small></font></td></tr></table></div></a>';
echo $urlset;
}

//Counts the number of Recent entries
$dirkomm=str_replace('/', 'D', str_replace('.', 'T', $glob_file[$i]));
if(!file_exists('komm/'.$dirkomm))
{$countkomm=0;}
else
{$countkomm=count(file('komm/'.$dirkomm));}

}
}

echo"<center>";
include("ads/adiquity.php");
echo"</center>";
//Pagination:
if($countstr>1)
{echo '<div class="pgn"><center>';print nav_page($countstr,$page,$dir,$fldid,$seotitle,'index');}
echo'</center></div>';
include("ads/buzzcity.php");
print '<div class="tags" align="center"><b>Tags : </b> free download '.$seotitle.','.$seotitle.' full album,'.$seotitle.' zip album,'.$seotitle.' 64kbps 128kbps 320kbps 192kbps zip download,'.$seotitle.' songs,'.$seotitle.' mp3,'.$seotitle.' mp3 songs,'.$seotitle.' music download</div>';
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
$pageback=MySQL_Fetch_Array(MySQL_Query("SELECT folderid from folder where folderurl='".join('/', $j)."';"));
$g[$i]= ' » <a href="http://AnyMaza.Com/'.$pageback[0].'/'.transdir($u).'.html"><b>'.transdir($u).'</b></a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

}


print '</div>';

include("footer.php");


?>