<?php
include 'func.php';
$pid=intval($_GET['cid']);

if($pid){
$grab=ngegrab('http://get.downloader.pw/Json_List.php?pid='.$pid.'&page='.$page.'&sort='.$sort.'&gid=1');
$json=json_decode($grab);
$url=$json->pageInfo->folderurl;

$t=$json->pageInfo->listype;
$t=intval($t);
if($t=='1'){$ptype=cv;}elseif($t=='2'){$ptype=ca;}elseif($t=='3'){$ptype=cr;}elseif($t=='4'){$ptype=cw;}else{$ptype=c;}

$title=basename($url);
if(!$title){$title='Free Downloads';}
$title= str_replace ("_", " ", $title);

$uname= str_replace ("-", "_", $title);
$uname= str_replace (" ", "_", $uname);
$uname= str_replace (")", "_", $uname);
$uname= str_replace ("(", "_", $uname);
$uname= str_replace (",", "_", $uname);
$uname= str_replace (".", "_", $uname);
$uname= str_replace ("&", "_", $uname);
$uname= str_replace ("'", "_", $uname);
$uname= str_replace ("ft", "_", $uname);
header('location:/'.$ptype.'_'.$pid.'_'.$uname.'');
exit;
}

?>