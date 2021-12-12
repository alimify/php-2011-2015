<?php 
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#
require 'core.php'; 
require_once"tar.php";
 
// Get it at www.phpconcept.net/pclzip.
 
if(!isset($_GET['file']) || !is_file($_GET['file']))exit('Feed me a thm file');
/////////////////
$thm = &new Archive_Tar($_GET['file']);
$deskside_file = $thm->extractInString('Theme.xml');
$load = simplexml_load_string($deskside_file)->Standby_image['Source'] or $load = simplexml_load_string($deskside_file)->Desktop_image['Source'] or $load = simplexml_load_string($deskside_file)->Desktop_image['Source'];
$img = $thm->extractInString(trim($load));
/////////////////////////
//$img=$load;
$img = imagecreatefromString($img);
$h = imagesy($img);
$w = imagesx($img);
$new = imagecreatetruecolor($neww, $newh);
imagecopyresampled($new, $img, 0, 0, 0, 0, $neww, $newh, $w, $h); 
$black = imagecolorallocate($new, 255, 255, 255);
  $font = 'arial.ttf';
   imagettftext($new, $font_size, 90, 98, 110, $black, $font, $WaterMarkText);
// Create an image from that string.
header('Content-type: image/jpeg');
// Send a header to the browser saying that the output is of image/jpeg type.
imagejpeg($new);
imagejpeg($new,'./skrin/'.basename($_GET['file']).'.gif', 100); 
// Output the image to the browser. 
imagedestroy($img); 
// Clean and free up resources.
 
?>