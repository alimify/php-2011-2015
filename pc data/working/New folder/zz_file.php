<?php
require 'zz_func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$id=$_GET['id'];
$id = preg_replace('#[^0-9]#i', '', $id);
$id = ereg_replace("[^0-9]", "", $id);
$fileg=MySQL_Fetch_Array(MySQL_Query("SELECT nm from mydnld where id='".$id."';"));
$file= $fileg[0];
if(!file_exists($file) or !is_file($file)){ $notice='File Not Found ! or Maybe Delated !'; echo $notice;}else{
///File Extension
$file_extension=pathinfo(($file), PATHINFO_EXTENSION);
$ext=$file_extension;
if($ext=='mp3'){
	
require_once('getid3/getid3.php');
$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($file);
getid3_lib::CopyTagsToComments($ThisFileInfo); 
$rtist = @$ThisFileInfo['comments_html']['artist'][0];  
$lbum = @$ThisFileInfo['comments_html']['album'][0];
$playtime = @$ThisFileInfo['playtime_string'];
$rtist= str_replace ("[ AnyMaza.Com ]", "", $rtist);
$lbum= str_replace ("[ AnyMaza.Com ]", "", $lbum);
if($rtist){$artist= ' By '.$rtist.' ';}
$album= ' '.$lbum.' ';
}
if($ext=='mp4' or $ext=='3gp'){
	require_once('getid3/getid3.php');
    $getID3 = new getID3;
    $ThisFileInfo = $getID3->analyze($file);
	$high=$ThisFileInfo['video']['resolution_x'];
	$width=$ThisFileInfo['video']['resolution_y'];
}
$basename=basename($file);
$msi=$basename;
$basename = preg_replace("/\.[^.]+$/", "", $basename);
$basename= str_replace ("(AnyMaza.Com)", "", $basename);
$title=''.$basename.''.$artist.' '.$ext.' Free Download';
if($ext=='mp3'){$pagedescription=''.$basename.' '.$artist.' free mp3 song download'.$album.' 320kbps,192kbps,128kbps,64kbps itunesrip '.$basename.' '.$artist.'';
$pagekeywords='320kbps,192kbps,128kbps,64kbps,itunesrip,'.$basename.','.$seokey[0].','.$seokey[1].','.$seokey[3].','.$rtist.','.$lbum.',mp3,download';}elseif($ext=='apk'){$pagedescription=''.$basename.' free download for android mobile';$pagekeywords=''.$basename.','.$basename.' apk download,'.$basename.' free download';}
///Dial Func
include 'zz_css.php';
include 'zz_config.php';
print $head;
print '<h1>'.$title.'</h1>';
$filesize = friendly_size(filesize($file));
$bdir=str_replace('files/','',dirname($file));
$talname=basename($bdir);
$talbum=str_replace(' ','-',basename($bdir));
$albumid=MySQL_Fetch_Array(MySQL_Query("SELECT folderid from folder where folderurl='".$bdir."';"));
if($ext=='mp3'){
if(file_exists('lyrics/'.$id.'.txt')){$lyrics='<br/>Read : <a href="/lyrics/'.$id.'/'.$basename.''.$artist.'-lyrics"><b>Lyrics of this song</b></a>';}
print '<h2>'.$basename.''.$artist.' free mp3 song download'.$album.' 320kbps,192kbps,128kbps,64kbps itunesrip Mp3 Songs</h2><center><strong>Category : <a href="/album'.$albumid[0].'-'.$talbum.'">'.$talname.'</a><br/>Duration :</strong> '.$playtime.'<br/>Singer : '.$rtist.''.$lyrics.'<br/>Select Format & Download<br/><div class="dbtn"><a rel="nofollow" href="/dlfile.php?fileid='.$id.'">Original Mp3('.$filesize.')</a></div>';	
	if(file_exists('file/data/128kbpsfile/'.$albumid[0].'/'.$msi.''))
{
$mfilesize = friendly_size(filesize('file/data/128kbpsfile/'.$albumid[0].'/'.$msi.''));
print '<div class="dbtn"><a rel="nofollow" href="/file/data/128kbpsfile/'.$albumid[0].'/'.$msi.'">128KBPS MP3 ( '.$mfilesize.' )</a></div>';
}
if(file_exists('file/data/64kbpsfile/'.$albumid[0].'/'.$msi.''))
{
$lfilesize = friendly_size(filesize('file/data/64kbpsfile/'.$albumid[0].'/'.$msi.''));
print '<div class="dbtn"><a rel="nofollow" href="/file/data/64kbpsfile/'.$albumid[0].'/'.$msi.'">64KBPS MP3 ( '.$lfilesize.' )</a></div>';
}
	echo '</center>';}else{
		echo '<center>';
		print '<strong>Category : <a href="/album'.$albumid[0].'-'.$talbum.'">'.$talname.'</a></strong>';	
if($ext=='3gp' or $ext=='mp4'){ echo '<br/><strong>● Resolution:</strong> '.$high.'x'.$width.''; }

print '<br/>File Size : '.$filesize.'<br/><a rel="nofollow" href="/dlfile.php?fileid='.$id.'"><strong>Download Now</strong></a>';		
	if($ext=='apk'){print '<h2>'.$basename.' apk free download,'.$basename.' android software,games,live 3d wallpaper,free launcher</h2>';}
	echo '</center>';	
	}
	
}
///Return Level
print '<div class="path"><strong>» <a href="/">Home</a>';
$backdir=str_replace('files/','',$file);
if($backdir)
{print '';}
if(($countj=count(explode('/',$backdir)))>1)
{
$j=explode('/',$backdir);
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