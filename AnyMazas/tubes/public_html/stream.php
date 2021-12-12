<?php
$getim=$_GET['img'];
$imagetobewatermark = 'https://i.ytimg.com/vi/'.$getim.'';
$watermarktext = "ANYMAZA.COM";
$image_p = imagecreatetruecolor(320, 180);
$image = imagecreatefromjpeg($imagetobewatermark);
list($width, $height) = getimagesize($imagetobewatermark);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, 320, 180, $width, $height);
$font = "font.ttf";
$font_size = 7;

$white = imagecolorallocate($image_p, 255, 255, 255);
imagettftext($image_p, $font_size, 0, 245, 175, $white, $font, $watermarktext);

header("Content-Type: image/png");
imagepng($image_p, null, 0);
imagedestroy($image);
imagedestroy($image_p);

?>