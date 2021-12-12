<?php 
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#

require 'core.php'; 
require_once"pclzip.lib.php";
 
// Get it at www.phpconcept.net/pclzip.
 
if(!isset($_GET['file']) || !is_file($_GET['file']))exit('Feed me a nth file');

// Add more security checks like extension/filesize check.
 
$nth = new PclZip($_GET['file']);
 
// Create a new instance of Pclzip class.
 
$content = $nth->extract(PCLZIP_OPT_BY_NAME,'theme_descriptor.xml',PCLZIP_OPT_EXTRACT_AS_STRING);
 
// Extract theme_descriptor_xml file as string.
 
$xml = simplexml_load_string($content['0']['content']);
 
// Load the sting in a simple xml object.
 
$src = trim($xml->wallpaper['src']) or $src = trim($xml->wallpaper['main_display_graphics']);
 
// Get main theme background image's name.
 
$img = $nth->extract(PCLZIP_OPT_BY_NAME,$src,PCLZIP_OPT_EXTRACT_AS_STRING);

// Extract the main background image as string.
 
$img = $img['0']['content'];
// Obtain the string.

$img = imagecreatefromstring($img);
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