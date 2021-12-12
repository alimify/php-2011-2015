<?php
// increase script timeout value
ini_set("max_execution_time", 300);
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$id = $_GET['id'];
$type = $_GET['type'];
$reload = $_GET['re'];
$id = preg_replace('#[^0-9]#i', '', $id);
$id = ereg_replace("[^0-9]", "", $id);
$type = preg_replace('#[^0-9]#i', '', $type);
$type = ereg_replace("[^0-9]", "", $type);
$zipyes = mysql_fetch_array(mysql_query("SELECT zip FROM folder WHERE folderid='".$id."'"));
if(!$zipyes[0] == '1'){
header('Location:/');	
exit;	
}
$fldurl = mysql_fetch_array(mysql_query("SELECT folderurl FROM folder WHERE folderid='".$id."'"));
$dir=htmlspecialchars($fldurl[0]);
$name = basename($dir);
if(!$fldurl[0]){echo 'not found!';
exit;
}
if($type == '320'){ $filedir = 'files/'.$dir.'/'; $types = Original; }
if($type == '128'){ $filedir = 'file/data/128kbpsfile/'.$id.'/'; $types = 128; }
if($type == '64'){ $filedir = 'file/data/64kbpsfile/'.$id.'/'; $types = 64; }
$savefile = '123zip/zip/'.$types.'KBPS - '.$name.'(AnyMaza.Com).zip';
if($reload == 'ok'){
	if($filedir and $savefile){
$zip = new ZipArchive();
if ($zip->open("$savefile", ZIPARCHIVE::CREATE) !== TRUE) {
die ("Sorry ! you cant access");
}
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("$filedir"));
foreach ($iterator as $key=>$value) {
$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
}
$zipson = $zip->close();
if($zipson){
	echo reloaded_success;
}}else{echo erro;}
}else{
if(file_exists($savefile)){
header('Location:'.$savefile.'');	
}else{
if($filedir and $savefile){
$zip = new ZipArchive();
if ($zip->open("$savefile", ZIPARCHIVE::CREATE) !== TRUE) {
die ("Sorry ! you cant access");
}
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("$filedir"));
foreach ($iterator as $key=>$value) {
$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
}
$zipson = $zip->close();
if($zipson){
	header('Location:'.$savefile.'');
}}else{echo erro;}}}
?>