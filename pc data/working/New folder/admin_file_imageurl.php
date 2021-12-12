<? include 'mylogin.php'; ?>

<?php
include 'admin_file_header.php';
print '<h2>Upload Folder Thumb</h2>';
$fldid =$_GET['folderid'];
$url = $_GET['url'];
$saved ="./file/";
$filename = ''.$fldid.'.jpg';
$sname = $saved.$filename;
if(copy($url,$sname)){ echo'Success<title>Success</title> <br/><a href="/admin_file_list.php?folderid='.$fldid.'">Back</a>';}
else
{
print ''.$sname.'<title>Upload Folder Thumb</title><form action="" method="get"><input type="text" name="url"><input type="hidden" name="folderid" value="'.$fldid.'"><br/><input type="submit" name="submit" value="Submit"/></form><br/><a href="/admin_file_list.php?folderid='.$fldid.'">Back</a>';}

include 'admin_file_footer.php';
?>