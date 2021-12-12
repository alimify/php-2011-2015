<?php
$mt=microtime(1);
require 'func.php';

$page=intval($_GET['page']);
$dir=htmlspecialchars($_GET['dir']);
$name=basename($dir);

while(substr($dir,0,1)=='/')
{$dir=substr($dir,1,strlen($dir));}
if(strstr($dir,'..') OR !is_dir('files/'.$dir) OR strstr($dir,'://'))
{$dir=null;}


$title= str_replace ("_", " ", $name);

///Dial Func
include 'css.php';
include 'config.php';
print $head;
echo '<div id="cateogry">';
print '<h2>'.$title.'</h2>';

echo '<div class="catList">';
//FolderList
$glob_dir=glob('files/'.$dir.'/*',GLOB_ONLYDIR);
if($glob_dir)
{
$count=sizeof($glob_dir);
$countstr=ceil($count/$folderlist);
$start = $page * $folderlist;
if(!$sorting){usort($glob_dir, 'sortnew');}
if($start>=$count OR $start<0)
{$start=0;}
$end = $start + $folderlist;
if($end>=$count)
{$end = $count;}
for($i=$start; $i<$end; $i++)
{
$dirt=str_replace('files/',null,$glob_dir[$i]);
$dir_exp=explode('/',$dirt);

$mcount=countf($dirt);
$ctot=ceil($mcount);
{
$post_bg=($bg++%10== 5) ? "2" : "1";
$flname = basename($dirt);
$flname= str_replace ("_", " ", $flname);
$ltot=$ctot;
$ftrname=str_replace(' ','-',$flname);
print '<div class="catRow"><a href="/list.php?dir='.$dirt.'"><div>'.$flname.' ['.$ltot.']</div></a></div>';

}
}
}
echo '</div></div>';
////FileList
$glob_file=glob("files/$dir/*.{{mp4,3gp,mp3}}",GLOB_BRACE);
if($glob_file)
{
if(!$sorting){usort($glob_file, 'sortnew');}
$count=sizeof($glob_file);
$countstr=ceil($count/$filelist);
$start=$page*$filelist;
if($start>=$count OR $start<0)
{$start=0;}
$end=$start+$filelist;
if($end>=$count)
{$end=$count;}
for($i=$start; $i<$end; $i++)
{
//Get File Extension
$file_extension=pathinfo(($glob_file[$i]), PATHINFO_EXTENSION);
$ext=$file_extension;
$basename=basename($glob_file[$i]);
$basename= str_replace ("_", " ", $basename);

//Screenshot
if(r($glob_file[$i])==$ext){$dthumb= '/ext/'.$ext.'.gif';}
{
$post_bg=($bg++%5== 3) ? "2" : "1";
{$filesize = friendly_size(filesize($glob_file[$i]));
$md5s=md5(basename($glob_file[$i]));
if(file_exists('thumb/video/'.$md5s.'.jpg')){
$thumb='/thumb/video/'.$md5s.'.jpg';
}else{$thumb=$dthumb;
}

if(r($glob_file[$i])==mp3){$urlset='<div class="odd"><a class="fileName" href="/file.php?file='.$glob_file[$i].'"><b>'.$basename.'</b></a><br/><font color="black"><small>File Size: '.$filesize.'</small></font></div>';}elseif(r($glob_file[$i])=='mp4' or '3gp'){$urlset='<div class="odd"><table><tr><td width="10%"><div class="ln"><img src="'.$thumb.'" width="100px" height="50px" alt="Preview"/></div></td><td><a class="fileName" href="/file.php?file='.$glob_file[$i].'"><b>'.$basename.'</b></a><br/><font color="black"><small>File Size: '.$filesize.'</small></font></td></tr></table></div>';}
echo $urlset;
	}
}
}
}





//Pagination:
$getpnum='Page '.($page+1).' of '.$countstr.'';

if($countstr>1)
{echo '<div class="pgn">';print nav_page1($countstr,$dir,$page,'index');echo ''.$getpnum.'<form action="/jump.php" method="get">Jump to Page <input type="text" name="jump" size="4"><input type="hidden" name="dir" value="'.$dir.'"><input type="submit" name="submit" value="Go&raquo;"></form></div>';


}





///Return Level
if(!$dir)
{print '
<div class="path"><a href="/"><b>Home</b></a>';}
else
{print '<div class="path"><a href="/"><b>Home</b></a>';}
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
$g[$i]= ' » <a href="/list.php?dir='.join('/', $j).'"><b>'.transdir($u).'</b></a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

}
echo '</div>';
print $foot;
?>