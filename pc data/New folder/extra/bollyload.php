<?php
$file=$_GET['file'];
$file=str_replace('AnyMaza','VipKHAN',$file);
if($file){
$file=str_replace(' ','%20',$file);
$filelnk='http://downloads.vipkhan.com/files/'.$file.'';
$filename = basename($filelnk);
$filename=str_replace('%20',' ',$filename);
$filename=str_replace('VipKHAN','AnyMaza',$filename);
$saved ="./files/";
$data = 'files/'.$filename.'';
$sname = $saved.$filename;
if(file_exists($data)){
header('Location:'.$data.'');	
}elseif(copy($filelnk,$sname)){
	header('Location:'.$data.'');
	}else{echo invalid_error;}}else{ echo please_select_file;}
	?>