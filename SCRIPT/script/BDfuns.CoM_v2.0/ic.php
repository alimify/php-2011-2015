<?php
#-----------------------------------------------------#
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#

include('vvv.php');
require 'core.php';
$file=htmlspecialchars($_GET['file']);

$zip = new PclZip($_GET['file']);
$q = 
array("logo.png","icon.png","ico.png","i.png","icono.png","Icon.png","Ico.png","I.png","Icono.png","ICON.png","ICO.png","I.png","ICONO.png","ICON.PNG","ICO.PNG","I.PNG","ICONO.PNG","icons/icon.png","icons/ico.png","icons/i.png","icons/icono.png","images/icon.png", "1.png","1.png","2.png");	
//$zip = new PclZip($_GET['file']);
	//$ar = $zip->extract(PCLZIP_OPT_BY_NAME,$q,PCLZIP_OPT_EXTRACT_IN_OUTPUT);
// Modified By Dipan08RocK

 	
$img = $zip->extract(PCLZIP_OPT_BY_NAME,$q,PCLZIP_OPT_EXTRACT_AS_STRING);

// Extract the main background image as string.
 
$img = $img['0']['content'];
// Obtain the string.

$img = imagecreatefromstring($img);
//Image resize
$h = imagesy($img);
$w = imagesx($img);

$new = imagecreatetruecolor($neww, $newh);
imagecopyresampled($new, $img, 0, 0, 0, 0, $neww, $newh, $w, $h);
$black = imagecolorallocate($new, 255, 255, 255);
  $font = 'arial.ttf';
   
   imagettftext($new, $font_size, 90, 98, 110, $black, $font, $WaterMarkText);
// Create an image from that string.
imagepng($new);
imagegif($new,'./skrin/'.basename($_GET['file']).'.gif', 100); 


?>