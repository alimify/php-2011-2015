<?php
include 'admin.php';
if($adminpass!==$userpass){include 'login.php';}else{
$mt=microtime(1);
require 'func.php';
$name=htmlspecialchars($_GET['name']);
$url=$_GET['url'];
$name= str_replace (" ", "_", $name);
$name= str_replace ("&", "n", $name);
$name= str_replace ("(", "_", $name);
$name= str_replace (")", "_", $name);
$name= str_replace ("amp;", "_", $name);
$submit=htmlspecialchars($_GET['submit']);
$clear=intval($_GET['clear']);

$title='Video Watermark';
include 'css.php';
include 'config.php';
print $head;
print '<h2>'.$title.'</h2>';
print '<div class="">';
$filex='files/'.$dir.'';

if($submit){
if (!filter_var($url, FILTER_VALIDATE_URL) === false && $name) {
 $cdir='wm/tmp/'.$name.'';
 if(copy($url,$cdir)){print '<br/>file uploaded !';}
}else{print '<br/>something you may mistake,please check !';}}

print '<form action="/" method="get">Url : <br/><input type="text" name="url"><br/>Name :<br/><input type="text" name="name"><br/><input type="submit" name="submit" value="submit"></form>';


////Video List
$glob_file=glob("wm/tmp/*.{{mp4,3gp}}",GLOB_BRACE);
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

$basename=basename($glob_file[$i]);
$basename= str_replace ("_", " ", $basename);


{
$post_bg=($bg++%5== 3) ? "2" : "1";
{$filesize = friendly_size(filesize($glob_file[$i]));
$basenames = preg_replace("/\.[^.]+$/", "", $basename);
$basenames= str_replace (" ", "_", $basenames);

////Converter Function

	if(file_exists('wm/tmp2/'.$basenames.'.3gp')){$low='[ <a href="/wm/tmp2/'.$basenames.'.3gp">d3GP</a> ]';}else{$low='[ <a href="/wm.php?file='.$glob_file[$i].'&frmt=1">c3GP</a> ]';}
	if(file_exists('wm/tmp2/'.$basenames.'.mp4')){$mid='[ <a href="/wm/tmp2/'.$basenames.'.mp4">dMP4</a> ]';}else{$mid='[ <a href="/wm.php?file='.$glob_file[$i].'&frmt=2">cMP4</a> ]';}
	if(file_exists('wm/tmp2/'.$basenames.'hr.mp4')){$hq='[ <a href="/wm/tmp2/'.$basenames.'hr.mp4">dHQ</a> ]';}else{$hq='[ <a href="/wm.php?file='.$glob_file[$i].'&frmt=3">cHQ</a> ]';}
	
if(file_exists('wm/tmp2/'.$basenames.'hd.mp4')){$hd='[ <a href="/wm/tmp2/'.$basenames.'hd.mp4">dHD</a> ]';}else{$hd='[ <a href="/wm.php?file='.$glob_file[$i].'&frmt=4">cHD</a> ]';}
//////Ended


print '<div class="odd"><a class="fileName" href="'.$glob_file[$i].'"><b>'.$basename.'</b></a> '.$low.' '.$mid.' '.$hq.' '.$hd.'<br/><font color="black"><small>File Size: '.$filesize.'</small></font></div>';
	}
}
}
}













echo '<div style="display:none;">'.deleteOldFiles('wm/tmp2').deleteOldFiles('wm/tmp').'</div>';





print '</div>';


print $foot;}

?>