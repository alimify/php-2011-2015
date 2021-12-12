<?php

$title='Delete Data';

include 'css.php';
include 'config.php';
print $head;

print '<h2>'.$title.'</h2>';

print '<div class="">';

$type=intval($_GET['type']);
$confirm=intval($_GET['confirm']);
$file=htmlspecialchars($_GET['file']);

if($type=='2'){$filex=$file;}elseif($type=='1'){$filex='files/'.$file.'';}
if (!file_exists($filex)){print 'not exist !';}else{

if($type=='1' && $confirm=='1'){
	$data='files/'.$file.'';
rmdir($data);
	print 'folder deleted successfully !';
}
elseif($type=='2' && $confirm=='1'){
	$data=$filex;
unlink($data);
print 'file deleted successfully !';
}else{
$dltnm= str_replace ("_", " ", basename($file));
print '<b>Do You Want Delete ?</b> <br/><font color="red">'.$dltnm.'</font><br/>';print '<a href="?confirm=1&type='.$type.'&file='.$file.'">Confirm</a>';}



if($type=='2'){$files=str_replace('files/','',dirname($file));}elseif($type=='1'){$files=dirname($file);}

print '<div class="path"><a href="/panel.php">Root</a> | <a href="/panel.php?dir='.$files.'">Back</a></div>';
}
print '</div>';
print $foot;
?>