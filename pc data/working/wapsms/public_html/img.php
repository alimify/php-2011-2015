<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/
session_start();
header('Content-type: image/jpeg');
$im = imagecreatefromjpeg('images.jpg');
$black = imagecolorallocate($im, 0, 0, 0);
$text=strtoupper("".chr(rand(97,122))."".chr(rand(97,122))."".chr(rand(97,122))."".chr(rand(97,122))."".chr(rand(97,122))."");
$_SESSION['captcha']=$text;
$font = 'actionj.ttf';
imagettftext($im, 22, 0, 20, 33, $black, $font, $text);
imagepng($im);
imagedestroy($im);
?>