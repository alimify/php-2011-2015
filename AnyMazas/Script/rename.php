<?php
$title='Rename Data';

include 'css.php';
include 'config.php';
print $head;

print '<h2>'.$title.'</h2>';

print '<div class="">';


$file=htmlspecialchars($_GET['file']);
$type=intval($_GET['type']);

if($type=='2'){$filex=$file;}elseif($type=='1'){$filex='files/'.$file.'';}
if (!file_exists($filex)){print 'not exist !';}else{

$submit=htmlspecialchars($_GET['submit']);
$name=htmlspecialchars($_GET['name']);
$name= str_replace (" ", "_", $name);
$success='<br/><font color="red">'.basename($file).'</font> to <font color="green">'.$name.'</font>';
$success= str_replace ("_", " ", $success);

if($type=='1' && $submit=='submit'){
$dir=dirname($file);
$rename='files/'.$file.'';
$filename='files/'.$dir.'/'.$name.'';
rename($rename,$filename);
print 'Rename Folder Successfully ! '.$success.'';
}elseif($type=='2' && $submit=='submit'){
	$dir=dirname($file);
$filename=''.$dir.'/'.$name.'';
rename($file,$filename);
print 'Rename File Successfully !'.$success.'';
}else{
if($type=='1'){print 'Enter FOlder Name <br/> Example : Bangla Songs';}elseif($type=='2'){print 'Enter File Name<br/> Example : bangla song.mp3';}


print '<form action="" method="get"><input type="text" name="name"><input type="hidden" name="file" value="'.$file.'"><input type="hidden" name="type" value="'.$type.'"><input type="submit" name="submit" value="submit"></form>';	
}



if($type=='2'){$files=str_replace('files/','',dirname($file));}elseif($type=='1'){$files=dirname($file);}

print '<div class="path"><a href="/panel.php">Root</a> | <a href="/panel.php?dir='.$files.'">Back</a></div>';

}
print '</div>';
print $foot;
?>