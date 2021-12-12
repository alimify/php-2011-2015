<?php
// Get new dimensions
$RESuploadFolderPath = '';
extract($_REQUEST);
if($f){
$new_width = ($w ? $w : 50);
$new_height = ($h ? $h : 60);
$quality = ($q ? $q : 110);
$filename = $RESuploadFolderPath.$f;

// get original file's height & width
list($width, $height) = getimagesize($filename);
$filetype = pathinfo($filename);
$fileNameOnly = $filetype['filename'];
switch($filetype['extension'])
{
case 'jpg':
$source = imagecreatefromjpeg($filename);
break;
case 'gif';
$source = imagecreatefromgif($filename);
break;
case 'png':
$source = imagecreatefrompng($filename);
break;
}

// Resample new image
$image_p = imagecreatetruecolor($new_width, $new_height);
imagecopyresampled($image_p, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// Content type
// if($_SERVER['HTTP_HOST']!=base64_decode('d3d3Lm1vYm1vYm1vYi50c3Q='))	if($_SERVER['HTTP_HOST']!=base64_decode('dGVzdC53YXB5dWcuY29t'))	exit;
header('Content-type: image/jpeg');
header("Content-Disposition: attachment; filename=\"".$fileNameOnly."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename));
imagejpeg($image_p, null ,$quality);

//readfile("$filename");
}
?>
