<?php
$jump=intval($_GET['jump']);
$dir=htmlspecialchars($_GET['dir']);
$page=$jump-1;
if($dir and $page){
	header("Location:/list.php?dir=$dir&page=$page");	
}elseif($dir){
	header("Location:/list.php?dir=$dir");
}else{print 'maybe you make mistake ! try again.';}
?>