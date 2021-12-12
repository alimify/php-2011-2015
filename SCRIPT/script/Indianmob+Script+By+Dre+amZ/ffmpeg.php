<?php
#-----------------------------------------------------#
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#

require_once 'core.php';
$file=htmlspecialchars($_GET['file']);


$W = intval($_GET['file']);
$H = intval($_GET['file']);

if(substr($file,0,1) != '.'){

$mov = new ffmpeg_movie($file, false);
$wn = $mov->GetFrameWidth();
$hn = $mov->GetFrameHeight();

$frame = $mov->getFrame(3);

$gd = $frame->toGDImage();

if(!$W and !$H)
{

$W = $neww; // width of the image
$H = $newh; // height image
}
$new = imageCreateTrueColor($W, $H);
imageCopyResized($new, $gd, 0, 0, 0, 0, $neww, $newh, $wn, $hn);
$black = imagecolorallocate($new, 255, 255, 255);
  $font = 'arial.ttf';
   imagettftext($new, $font_size, 90, 98, 110, $black, $font, $WaterMarkText);
imageGif($new);
imageGif ($new, './skrin/'.basename($_GET['file']).'.gif', 100);
}
?>