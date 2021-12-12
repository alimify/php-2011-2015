<?php
$title='Upload Data';

include 'css.php';
include 'config.php';
print $head;

print '<h2>'.$title.'</h2>';
print '<div class="">';
$type=intval($_GET['type']);
$dir=htmlspecialchars($_GET['dir']);
$url=filter_var($_GET['url'], FILTER_VALIDATE_URL);
$dir=htmlspecialchars($_GET['dir']);
$name=htmlspecialchars($_GET['name']);
$submit=htmlspecialchars($_GET['submit']);
$filex='files/'.$dir.'';
$names= str_replace (" ", "_", $name);

if(!file_exists($filex)){print 'folder not exist !';}else{
if(!$type=='1'){
print '<a href="/upload.php?dir='.$dir.'&type=1">Other Upload</a>';
	$filexs='files/'.$dir.'/'.$names.'';
	if($url && $name && $submit){if(copy($url,$filexs)){echo '<br/><font color="green">File Uploaded !</font>';}}elseif($name && !$url && $submit){print '<br/>please enter url !';}elseif($url && !$name && $submit){print '<br/>please enter name !';}elseif(!$name && !$url && $submit){print '<br/>please enter url & name';}
}else{
	$filexs='files/'.$dir.'/'.$names.'';
print '<a href="/upload.php?dir='.$dir.'">Mp3 Upload</a>';
	if($url && $name && $submit){if(copy($url,$filexs)){echo '<br/><font color="green">File Uploaded !</font>';}}elseif($name && !$url && $submit){print '<br/>please enter url !';}elseif($url && !$name && $submit){print '<br/>please enter name !';}elseif(!$name && !$url && $submit){print '<br/>please enter url & name';}

}
print '<form action="" method="get"><input type="hidden" name="dir" value="'.$dir.'">Url : <br/><input type="text" name="url" value=""><br/> Filename : <br/><input type="text" name="name" value="">';
if(!$type=='1'){
$year=date("Y");
print '<br/>Singer : <br/><input type="text" name="singer" value="[BilalBd.Com]"><br/>Album : <br/><input type="text" name="album" value="[BilalBd.Com]"><br/>Year : <br/><input type="text" name="year" value="'.$year.'[BilalBd.Com]">';}else{print '<input type="hidden" name="type" value="1">';}
	
	
	print '<br/><input type="submit" name="submit" value="submit"></form>';
}
print '</div>';

print '<div class="path"><a href="/panel.php">Root</a> | <a href="/panel.php?dir='.$dir.'">Back</a></div>';

print $foot;
?>