<?php
$mt=microtime(1);
require 'zz_func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$page=$_GET['page'];
$cid=$_GET['cid'];
$sorting=$_GET['sort'];
$page = preg_replace('#[^0-9]#i', '', $page);
$page = ereg_replace("[^0-9]", "", $page);
$cid = preg_replace('#[^0-9]#i', '', $cid);
$cid = ereg_replace("[^0-9]", "", $cid);
$sorting = preg_replace('#[^0-9]#i', '', $sorting);
$sorting = ereg_replace("[^0-9]", "", $sorting);
///Head-Data
$zipyes = mysql_fetch_array(mysql_query("SELECT zip FROM folder WHERE folderid='".$cid."'"));
$fldurl = mysql_fetch_array(mysql_query("SELECT folderurl FROM folder WHERE folderid='".$cid."'"));
$name=basename($fldurl[0]);
$dir=$fldurl[0];
while(substr($dir,0,1)=='/')
{$dir=substr($dir,1,strlen($dir));}
if(strstr($dir,'..') OR !is_dir('files/'.$dir) OR strstr($dir,'://'))
{$dir=null;}
if($sorting){$tsort='-A to Z';}
$tbpage=$page+1;
if($page){$tpage='-'.$tbpage.'';}
$title=$name;
if(!$title){
   header("Location:/");
    }
$pagedescription='320kbps,192kbps,128kbps,64kbps itunesrip '.$name.' free mp3 song download';
$pagekeywords='320kbps,192kbps,128kbps,64kbps,itunesrip,'.$name.','.$seokey[0].','.$seokey[1].','.$seokey[3].','.$seokey[4].',mp3,download';
///Dial Func
include 'zz_css.php';
include 'zz_config.php';
print $head;
print '<h1>'.$title.'</h1>';
if($adset=='1'){include 'ads/top.php';}
$title1= str_replace (" ", "-", $title);
//// Folder Image
if(file_exists('file/'.$cid.'.jpg'))
$mfolderdesc= '<img src="http://AnyMaza.Com/pic.php?file=file/'.$cid.'.jpg" width="100" height="130" alt="'.$title.'" title="'.$title.'  Album Art Downloads" /><br/><a href="http://AnyMaza.Com/file/'.$cid.'.jpg">Download Poster</a>';
print '<center>'.$mfolderdesc.'</center>';
//// Description
if(file_exists('file/'.$cid.'.txt'))
{
$sfile ='file/'.$cid.'.txt';
$description = implode('<br/>', file($sfile));
echo '<div style="text-color:white;"><center>'.$description.'</center></div>';

}
echo '<div class="sorting">';if(!$sorting){print 'New to Old | <a href="/album'.$cid.'-'.$title1.'-s1">A to Z</a>';}else{print '<a href="/album'.$cid.'-'.$title1.'">New to Old</a> | A to Z';}echo '</div>';
print '<h2>'.$title.' 320kbps,192kbps,128kbps,64kbps,zip '.$title.' mp3 songs free download</h2>';
///Zip Link
if($zipyes[0] == '1'){ print '<center><a href="/zipper.php?id='.$cid.'"><b>Download Zipped Full Album</b></a><br/>Traclist & Download Link</center>'; }
if($adset=='1'){include 'ads/adiquity.php';}
//// Latest Song Update
$getflist= ''.$cid.'.dat';
if(file_exists('file/'.$getflist.'')){ 
$xarray = file('file/'.$getflist.'');
$countst = count($xarray);
$countstr=ceil($countst/$folderlist);
$j = ($countst-1)-($page*$folderlist);
$i = $j-$folderlist;
for(; $i<$j && $j>=0; $j--) {
$up = $j + 1;
$text = explode("|",$xarray[$j]);
{
$post_bg=($bg++%10== 5) ? "2" : "1";
echo '<div class="folder"><a href="'.$text[1].'">'.$text[0].'</a></div>';
if($post_bg=='2' and $adset=='1'){include 'ads/ads-filelist.php';}
}}
 }
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
/////MyCount
$folderid = mysql_fetch_array(mysql_query("SELECT folderid FROM folder WHERE folderurl='".$dirt."'"));
$bcount=countf('Full Mp3 Songs/Bangla A to Z Songs');
$btot=ceil($bcount);
$hcount=countf('Full Mp3 Songs/Hindi A to Z Songs');
$htot=ceil($hcount);
$kcount=countf('Full Mp3 Songs/Kalkata A to Z Songs');
$ktot=ceil($kcount);
$ecount=countf('Full Mp3 Songs/English A to Z Songs');
$etot=ceil($ecount);
$mcount=countf($dirt);
$mtot=ceil($mcount);
if($folderid[0]=='242'){$ctot=$btot;}elseif($folderid[0]=='244'){$ctot=$htot;}elseif($folderid[0]=='243'){$ctot=$etot;}elseif($folderid[0]=='245'){$ctot=$ktot;}else{$ctot=$mtot;}
{
$post_bg=($bg++%10== 5) ? "2" : "1";
$flname = basename($dirt);
$ltot=$ctot*3;
$ftrname=str_replace(' ','-',$flname);
print '<div class="folder"><a href="http://AnyMaza.Com/album'.$folderid[0].'-'.$ftrname.'">'.$flname.' ['.$ltot.']</a></div>';
if($post_bg=='2' and $adset=='1'){include 'ads/ads-filelist.php';}
}
}
}
////FileList
$glob_file=glob("files/$dir/*.{{$allfile}}",GLOB_BRACE);
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
$basename = preg_replace("/\.[^.]+$/", "", $basename);
$basename= str_replace ("(AnyMaza.Com)", "", $basename);
$basename1=$basename;
$basename1= str_replace (" ", "-", $basename1);
if(r($glob_file[$i])=='mp3'){
require_once('getid3/getid3.php');
$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($glob_file[$i]);
getid3_lib::CopyTagsToComments($ThisFileInfo); 
$artist = @$ThisFileInfo['comments_html']['artist'][0];  
$album = @$ThisFileInfo['comments_html']['album'][0];
$artist= str_replace ("[ AnyMaza.Com ]", "", $artist);
$artist= str_replace ("[AnyMaza.Com]", "", $artist);
$album= str_replace ("[ AnyMaza.Com ]", "", $album);
$rtist= str_replace (" ", "-", $artist);
$martist='Singer : '.$artist.'';
}
//Screenshot
if(r($glob_file[$i])==$ext) $dthumb= '/ext/'.$ext.'.gif';
if($p and file_exists('/thumb/'.$fileid[0].'.gif'))
$thumb= 'http://AnyMaza.Com/thumb/'.$fileid[0].'.gif';
else $thumb=$dthumb;
///file sql
$fileid=MySQL_Fetch_Array(MySQL_Query("SELECT id from mydnld where nm='".$glob_file[$i]."';"));
{
$post_bg=($bg++%5== 3) ? "2" : "1";
{$filesize = friendly_size(filesize($glob_file[$i]));
	if(r($glob_file[$i])=='mp3') $urlset= '<div class="file"><a href="/file'.$fileid[0].'-'.$basename1.'-'.$rtist.'-'.$ext.'">'.$basename.'.'.$ext.'<br/><font color="black">'.$martist.'</font></a></div>';
else $urlset='<a href="/file'.$fileid[0].'-'.$basename1.'-'.$ext.'"><div class="file"><table><tr class="fl odd"><td width="16%"><img src="'.$thumb.'"  width="70px" height="50px" alt="'.$basename.' thumb" /></td><td><b>'.$basename.'.'.$ext.'</b><br/><font color="black"><small>File Size: '.$filesize.'</small></font></td></tr></table></div></a>';
echo $urlset;
if($post_bg=='2' and $adset=='1'){include 'ads/ads-filelist.php';}
	}
}
}
}
//Pagination:
$getpnum='Page '.($page+1).' of '.$countstr.'';
if($countstr>1 and !$sorting)
{echo '<div class="pnum">'.$getpnum.'<div class="pgn">';print nav_page1($countstr,$cid,$title1,$page,'index');echo '</div><form action="/jump.php" method="get">Jump to Page<input type="text" name="jump" size="4"><input type="hidden" name="jid" value="'.$cid.'"><input type="submit" name="submit" value="Jump"></form></div>';}
if($countstr>1 and $sorting)
{echo '<div class="pnum">'.$getpnum.'<div class="pgn">';print nav_page2($countstr,$cid,$title1,$page,$sorting,'index');echo '</div><form action="/jump.php" method="get">Jump to Page<input type="text" name="jump" size="4"><input type="hidden" name="sort" value="1"><input type="hidden" name="jid" value="'.$cid.'"><input type="submit" name="submit" value="Jump"></form></div>';}
if($adset=='1'){include 'ads/bottom.php';
include 'ads/buzzcity.php';}
///Return Level
print '<div class="path"><strong>» <a href="/">Home</a>';
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
$backnames= str_replace (" ", "-", transdir($u));
$g[$i]= ' » <a href="http://AnyMaza.Com/album'.$pageback[0].'-'.$backnames.'">'.transdir($u).'</a>';
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

}
echo '</strong></div>';
print $foot;
?>