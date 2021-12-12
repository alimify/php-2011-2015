<?php
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#

$time=time();
require_once 'core.php';
$file=htmlspecialchars($_GET['file']);
list(, , $type,)=getimagesize($file);

if($type==1){$funci='imagecreatefromgif';} //$funco='imagegif';}
if($type==2){$funci='imagecreatefromjpeg';} //$funco='imagejpeg';}
if($type==3){$funci='imagecreatefrompng';} //$funco='imagepng';}
if($type)
{
$im1 = $funci($file);
$im2=imagecreatetruecolor($neww,$newh);
imagecopyresized($im2, $im1, 0,0,0,0,$neww,$newh, imagesx($im1), imagesy($im1));
$black = imagecolorallocate($im2, 255, 255, 255);
  $font = 'arial.ttf';
   imagettftext($im2, $font_size, 90, 98, 110, $black, $font, $WaterMarkText);
// Create an image from that string.
header('Content-type: image/gif'); 
// Send a header to the browser saying that the output is of image/jpeg type. 
imagejpeg($im2);
imagejpeg($im2,'./skrin/'.basename($_GET['file']).'.gif', 100); 
// Output the image to the browser. 
}
?>