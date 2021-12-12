<?php
#-----------------------------------------------------#
# ============ЗАГРУЗ-ЦЕНТР============= #
# 	 Автор : Sea #
# E-mail : x-sea-x@ya.ru #
# ICQ : 355152215 #
# Вы не имеете права распространять данный скрипт. #
# 		По всем вопросам пишите в ICQ. #
#-----------------------------------------------------#

// mod Gemorroj

require 'moduls/config.php';

header('Content-type: image/jpeg');
header('Cache-Control: public');
header('Pragma: cache');

$W = intval($_GET['W']);
$H = intval($_GET['H']);
$id = intval($_GET['id']);

$file_info = mysql_fetch_row(mysql_query('SELECT TRIM(`path`) FROM `files` WHERE `id` = '.$id.' LIMIT 1'));
$pic = urldecode(htmlspecialchars($file_info[0]));

if(substr($pic,0,1) != '.'){

$type = strtolower(pathinfo($pic, PATHINFO_EXTENSION));

if($type == 'gif'){$old = imageCreateFromGif($pic);}
elseif($type == 'jpg' || $type == 'jpeg' || $type == 'jpe'){$old = imageCreateFromJpeg($pic);}
elseif($type == 'png'){$old = imageCreateFromPNG($pic);}
else{
exit;
}

$wn = imageSX($old);
$hn = imageSY($old);
$prew = 1;
if(!$W and !$H){
$prew = 0;
$size = explode('*',$setup['prev_size']);
$W = round(intval($size[0])); // width of the image
$H = round(intval($size[1])); // hieght of the image
}


$sxy = round($wn/$hn,3);
if($sxy<1){
$W=intval($H*$sxy);
}
else{
$H=intval($W/$sxy);
}


$new = imageCreateTrueColor($W, $H);
imageCopyResampled($new, $old, 0, 0, 0, 0, $W, $H, $wn, $hn);

if($setup['marker'] && $prew){
// Background
$bg = imagecolorallocate($new, 255, 255, 255);
// color
$color = imagecolorallocate($new, 200, 200, 200);

imagestring($new, 2, ($W/2)-(strlen($setup['text_marker'])*3), 1, $setup['text_marker'], $color);
}

imageJpeg($new,'',100);

if($prew){
mysql_query('UPDATE `files` SET `loads`=`loads`+1, `timeload`='.$time.' WHERE `id`='.$id);
}
}
?>