<?php
include 'admin_login.php';
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
$sort=intval($_GET['sort']);
if($sort>1 OR $sort<0)
{$sort=0;}

//Folder:
$zipyes =$_GET['zipyes'];
$fldname =$_GET['foldername'];
$fldid =$_GET['folderid'];
$fldurl = mysql_fetch_array(mysql_query("SELECT folderurl FROM folder WHERE folderid='".$fldid."'"));
$dir=htmlspecialchars($fldurl[0]);

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
print '<title>Content Manager</title>';
}
else
{
print '<title>'.transdir($dir_exp[count($dir_exp)-1]).' - Content Manager</title>';
}

$seotitle = transdir($dir_exp[count($dir_exp)-1]);
print '<link rel="icon" href="http://AnyMaza.Com/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="/css/style.css" type="text/css" /><link rel="stylesheet" href="/css/my.css" type="text/css" />
</head>
<body>';

include("header.php");

////////////////////head area end/////////////////

if(!$dir)
{print '<div class="title">Content Manager</div>';}
else
{
$dir_exp=explode('/',$dir);
print '<div class="title">'.transdir($dir_exp[count($dir_exp)-1]).'</div>';
}
///// Create Folder
$fold.=$dir;
$createdir=$_GET['createdir'];
$cnfolder=$_GET['cnfolder'];
if($createdir) { if(mkdir("./files/$fold/$createdir")) { echo 'Folder Created..!'; } }
if($cnfolder=='new') { echo '<form method="get" action="admin_file_list.php">Folder Name:<input type="hidden" name="sort" value="'.$sort.'"/><input type="hidden" name="p" value="'.$p.'"/><input type="hidden" name="folderid" value="'.$fldid.'"/><input type="text" name="createdir" value="New Folder"/><input type="submit" value="Submit"/></form>';  }
else { echo '<b><div class="even"><a href="admin_file_list.php?cnfolder=new&folderid='.$fldid.'&sort='.$sort.'&p='.$p.'">Create New Folder</a> | <a href="admin_file_albummp3.php?folderid='.$fldid.'">Upload Album</a> | <a href="admin_update.php">Post Update</a></div></b>'; }
/// Foldercreating
$mkdirs = "/file/data/64kbpsfile/" . $fldid . "/";
if (!file_exists($mkdirs)) {
    mkdir("file/data/64kbpsfile/" . $fldid);
}
$mkdirz = "/file/data/128kbpsfile/" . $fldid . "/";
if (!file_exists($mkdirz)) {
    mkdir("file/data/128kbpsfile/" . $fldid);
}
//// Folder Image
if(file_exists('files/'.$dir.'/album.jpg'))
$mfolderdesc= '<img src="http://AnyMaza.Com/files/'.$dir.'/album.jpg" width="80" height="100" alt="'.transdir($dir_exp[count($dir_exp)-1]).'" title="'.transdir($dir_exp[count($dir_exp)-1]).'  Album Art Downloads" /><br/><a href="http://AnyMaza.Com/files/'.$dir.'/album.jpg">Download Poster</a>';
print '<center>'.$mfolderdesc.'</center>';

////Enable Zip
$zipstatus = mysql_fetch_array(mysql_query("SELECT zip FROM folder WHERE folderid='".$fldid."'"));
if($zipyes=='1'){ 
$reds = mysql_query("UPDATE folder SET zip='1' WHERE folderid='".$fldid."'");
if($reds){ echo 'Zip Enable';}else{echo error;}  }
if($zipyes=='0'){ 
$reds = mysql_query("UPDATE folder SET zip='0' WHERE folderid='".$fldid."'");
if($reds){ echo 'Zip Disable';}else{echo error;}  }
if($zipstatus[0]=='1'){print '<a href="?zipyes=0&folderid='.$fldid.'">Disable Zip</a>';}else{print '<a href="?zipyes=1&folderid='.$fldid.'">Enable Zip</a>';}
//// Description
if(file_exists('files/'.$dir.'/file.txt'))
{
$sfile ='files/'.$dir.'/file.txt';
$description = implode('<br/>', file($sfile));
echo '<div style="text-color:white;"><center>'.$description.'</center></div>';

}
print '<center><a href="/admin_desc_edit.php?folderid='.$fldid.'">Description</a> | <a href="/admin_file_imageurl.php?folderid='.$fldid.'">Thumb</a> | <a href="/fthumb.php?id='.$fldid.'">fThumb</a></center>';
if($sort)
{print '<div class="tags"><center>Sort by: <a href="http://AnyMaza.Com/admin_file_list.php?folderid='.$fldid.'&sort=0&p=0">A To Z</a>/New To Old</center></div>';}
else
{print '<div class="tags"><center>Sort by: A To Z/<a href="http://AnyMaza.Com/admin_file_list.php?folderid='.$fldid.'&sort=1&p=0">New To Old</a></center></div>';}



///// Latest Song Update
$getflist= ''.$fldid.'.dat';
if(file_exists('file/'.$getflist.'')){ include 'admin_flist.php'; }

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
$folderavaile = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM folder WHERE folderurl = '".$dirt."'"));

 if($folderavaile[0]==0)
         {

      $res = mysql_query("INSERT INTO folder SET folderurl='".$dirt."'");

         }
echo "<div class='catList'>";
$folderid = mysql_fetch_array(mysql_query("SELECT folderid FROM folder WHERE folderurl='".$dirt."'"));
if(file_exists('file/'.$folderid[0].'.dat')){ $barray = file('file/'.$folderid[0].'.dat');
$mcount = count($barray); } else { $mcount = $ctot;}
print '<div class="fl odd"><br/><b><a href="http://AnyMaza.Com/admin_file_list.php?folderid='.$folderid[0].'&sort=0&p=0&page=0">'.transdir($dir_exp[count($dir_exp)-1]).' ['.$mcount.']</a></b>[ <a href="/admin_file_rename.php?folderid='.$folderid[0].'">R</a> ]';
echo'</div></div>';
}
}
}

echo'<table cellspacing="0">';


$glob_file=glob("files/$dir/*.{{apk,mp3,mp4,3gp,zip,png}}",GLOB_BRACE);
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



{
$post_bg=($bg++%2== 0) ? "item2" : "item1";
$title =$name;
$title= str_replace ("(AnyMaza.Com)", "", $title);
$title= str_replace ("_", " ", $title);
$title= str_replace ("&", "And", $title);
///file sql
$filesc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mydnld WHERE nm = '".$glob_file[$i]."'"));

 if($filesc[0]==0)
         {

      $fileres = mysql_query("INSERT INTO mydnld SET nm='".$glob_file[$i]."', dload='1', lastdload='".time()."'");

         }
$fileid=MySQL_Fetch_Array(MySQL_Query("SELECT id from mydnld where nm='".$glob_file[$i]."';"));		
$hits=MySQL_Fetch_Array(MySQL_Query("SELECT dload from mydnld where nm='".$glob_file[$i]."';"));	
{print '<div class="fl odd"><a href="http://anymaza.com/'.$glob_file[$i].'"><b>'.$title.'</b>('.$hits[0].')</a><br/><font color="black"><small>File Size : '.$filesize.'</small></font><a href="/admin_file_rename.php?fileid='.$fileid[0].'">R</a> [<a href="/admin_lyricsadd.php?fileid='.$fileid[0].'">L</a>] [<a href="/admin_dltfile.php?id='.$fileid[0].'&cid='.$fldid.'">D</a>]</div>';
}

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
{echo '<div class="pgn"><center>';print nav_page($countstr,$page,$dir,$fldid,$fldname,'index');}
echo'</center></div>';
if(!$dir)
{print '
<div class="path"><a href="http://AnyMaza.Com/admin_file_list.php"><b>Root</b></a>';}
else
{print '<div class="path"><a href="http://AnyMaza.Com/admin_file_list.php"><b>Root</b></a>';}
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
$g[$i]= ' » <a href="http://AnyMaza.Com/admin_file_list.php?folderid='.$pageback[0].'&sort=0&p=0"><b>'.transdir($u).'</b></a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

}
print '</div>';
include("admin_file_footer.php");
?>