<?php
include("mylogin.php"); ?>
<?php
include("admin_file_header.php");
$dir=$_GET['dir']; $name=$_GET['name'];
$kdir=$dir;
$name= str_replace ("getfilesload", "&", $name);
$kdir= str_replace ("./files/)", "", $kdir);
print '<title>Renamer</title><h2>Renamer</h2>';
$rename=$_POST['rename'];
$redir1=$_POST['redir'];
$refname=$_POST['refname'];
$redir = $dir.$refname;

if(isset($rename)) { if(rename($redir,"$dir/$rename")) { echo 'Item Renamed Success !'; print '<div class="path"><a href="admin_file_list.php?dir='.$kdir.'&p=1&sort=1">GO BACK</a></div>';} }
else { echo '<form method="POST" action="">Rename To: <input type="hidden" name="redir" value="'.$dir.'"/><input type="hidden" name="refname" value="'.$name.'"/><input type="text" name="rename"/><input type="submit" value="Submit"></form>';
print '<div class="path"><a href="admin_file_list.php?dir='.$kdir.'&p=1&sort=1">GO BACK</a></div>'; }
include("admin_file_footer.php");?>
