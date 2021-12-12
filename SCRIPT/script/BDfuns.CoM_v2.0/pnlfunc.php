<?php
error_reporting(0);
include 'apanel_antilogin.php';



if(!$_POST)
{
echo '<form method="post" action="pnlfunc.php?action=water2">';
echo '
Image Folder:<small>Ex:<b>files/Wallpaper/Car/</b></small><br />
<input type="text" name="imgfolder" value="files/" size="35" />
<br />
WaterMark Folder:<small>Ex:<b>files/Wallpaper/Car/</b></small><br />
<input type="text" name="imgfolder2" size="35" />
<br />
WaterMark Image(PNG):<small>Ex:<b>./watermark.png</b></small><br />
<input type="text" name="imgwater" value="./watermark.png" size="35" />
<br />
<input type="submit" value="Embed Watermark" />
</form>
<div class="main">
<center><small>Images folder, must end with slash.<br>Path to the watermark image (apply this image as waretmark)<br>Work With Only jpg Files</small></center></div>';
}
else
{


// Images folder, must end with slash.
$images_folder = $_POST['imgfolder'];

// Save watermarked images to this folder, must end with slash.
$destination_folder = $_POST['imgfolder2'];

// Path to the watermark image (apply this image as waretmark)
$watermark_path = $_POST['imgwater'];

// MOST LIKELY YOU WILL NOT NEED TO CHANGE CODE BELOW

// Load functions for image watermarking
include("./sysf/bdfuns.class.php");

// Watermark all the "jpg" files from images folder
// and save watermarked images into destination folder
foreach (glob($images_folder."*.jpg") as $filename) {

  // Image path
  $image_path = $filename;

  // Where to save watermarked image
  $imgdestpath = $destination_folder . basename($filename);

  // Watermark image
  $img = new Zubrag_watermark($image_path);
  $img->ApplyWatermark($watermark_path);
  $img->SaveAsFile($imgdestpath);
  $img->Free();
echo '<a href="'.$imgdestpath.'">'.$filename.'</a><br>';
}

echo '<a href="apanel_index.php">Admin Panel</a>';}
break;









?>