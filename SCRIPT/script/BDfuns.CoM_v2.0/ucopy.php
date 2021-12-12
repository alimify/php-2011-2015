<?php

error_reporting(0);
      include 'apanel_antilogin.php';
//Easy URL Uploader by ChaulWap.Tk
define('_ALLOWINCLUDE',0);

$defaultDest = $_POST['dpath'] ;
$URLDest = '';
$sizelimit = 0;
//////////////////////////////////////////////
//Do Not Change Below Here////////////////////
//////////////////////////////////////////////
if (function_exists('curl_init'))
{
   $snatch_system = 'curl';
}
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="./style.css">
<title>URL Upload by BDfuns.CoM</title>
</head>
<body>
<div class='dl2'><b>BDfuns.CoM URL uploader</b></div>
<div id="main">
<?php
if(isset($_POST['submit'])){
$file = $_POST['dpath'] ;   }

$submit = $_POST['submit'];
if ($submit)
{


   if (!$defaultDest)
   {
      $defaultDest = 'snatched';
   }

   if (!file_exists($defaultDest))
   {
      mkdir($defaultDest);
   }

   $sizelimit = $sizelimit * 1024;

   $file = $_POST['file'];

   $uploadfile = explode('/', $file);
   $filename = array_pop($uploadfile);

   $newfilename = $_POST['new'];

   if (!$newfilename)
   {
      $newfilename = $filename;
   }

   if (!isset($file))
   {
      echo '<p><strong>Please enter a URL to retrieve file from!</strong></p>';
      $error = true;
   }

   if (!isset($newfilename))
   {
      echo '<p><strong>Please enter a new file name!</strong></p>';
      $error = true;
   }

   if ($error == false)
   {
      $dest = $defaultDest;
      $ds = array($dest, '/', $newfilename);
      $ds = implode('', $ds);
      $newname_count = 0;
      if (file_exists($ds))
      {
         echo '<p><strong>File already exists!</strong></p>';
         $newname_count++;
         $newfile = array($newname_count, $newfilename);
         $newfile = implode('-', $newfile);
         $newfile_ds = array($dest, '/', $newfile);
         $newfile_ds = implode('', $newfile_ds);
         while($renamed == false)
         {
            if (file_exists($newfile_ds))
            {
               $newname_count++;
               $newfile = array($newname_count, $newfilename);
               $newfile = implode('~', $newfile);
               $newfile_ds = array($dest, '/', $newfile);
               $newfile_ds = implode('', $newfile_ds);
            }
            else
            {
               $renamed = true;
            }
         }
         $newfilename = $newfile;
         $ds = $newfile_ds;
         echo '<p>New file name is <strong>'.$newfile.'</strong>.</p>';
      }
      echo '<p><strong>Copying...</strong></p>';
      if ($snatch_system == 'curl')
      {
         $ch = curl_init($file);
         $fp = fopen($ds, 'w');
         curl_setopt($ch, CURLOPT_FILE, $fp);
         curl_setopt($ch, CURLOPT_HEADER, 0);
         curl_exec($ch);
         $curl_info =  curl_getinfo($ch);
         curl_close($ch);
         fclose($fp);
      }
      else
      {
         if (!copy($file, $ds))
         {
            echo '<p>Was unable to copy <a href="'.$file.'">'.$file.'</a><br />See if your path and destination are correct.</p>';
            $copy_fail = true;
         }
      }

      if ($copy_fail == false)
      {
         if ($sizelimit > 0 && filesize($ds) > $sizelimit)
         {
            echo '<p><strong>File is too large.</strong>';
            unlink($ds);
         }
         else
         {
            echo '<p><strong>Copy successful!</strong></p>';
            echo '<p><a href="'.$URLDest.'/'.$defaultDest.'/'.$newfilename.'">Click Here To Download Your File.....</a></p>';
            if ($snatch_system == 'curl')
            {
               $size_dl = round($curl_info['size_download']/1024, 2);
               $speed_dl = round($curl_info['speed_download']/1024, 2);
               echo '<p>Downloaded '.$size_dl.'KB in '.$curl_info['total_time'].' seconds.<br />With an average download speed of '.$speed_dl.'KB/s.';
            }
         }
      }
   }
}


$self = $_SERVER['PHP_SELF'];
echo '<form method="POST" action="'.$self.'">';
echo '<p><b>Path To Save </b><small>(eg: ./files/Music/ )</small></p>';
echo '<input size="50" type="text" class="input" name="dpath" value="'.$defaultDest.'" /><br />';

echo '<p><b>File URL : </b></p>';
echo '<input type="text" class="input" name="file" id="file" size="45" value="">';
echo '<p>Example: http://BDfuns.com/script.zip</p>';
echo '<br /><p><label for="new"><b>New file name (Optional)</b></label></p>';
//echo '<p><b>New File Name : </b></p>';
echo '<input type="text" class="input" name="new" id="new" size="45" value="">';
echo '<p>Example: BDfuns.zip</p>';
echo '<p><input name="submit" type="submit" id="submit" value="Upload" accesskey="s"></p>';
echo '</fieldset></form>';
echo '<p><b>Admin :<a href="http://fb.com/shaon1993"> Shopnil Shaon</a></b></p>';
?>

</div>
</body>
</html>