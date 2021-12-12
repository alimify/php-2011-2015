<?php
require 'config.php';
require 'func.php';
header('Content-type: text/vnd.sun.j2me.app-descriptor');
$time=time();
$file=htmlspecialchars($_GET['file']);
if(!$file or strstr($file, '..') or !file_exists($file) or substr($file,0,5)!=='load/')
{print 'Specified file does not exist<br/>';}
else
{
$filesize=filesize($file);
include $pclzip;
$open='META-INF/MANIFEST.MF';
$dir=dirname($file);
$arch=basename($file);

$zip=new PclZip($dir.'/'.$arch);
$content = $zip->extract(PCLZIP_OPT_BY_NAME,$open,PCLZIP_OPT_EXTRACT_AS_STRING);
$content = $content[0]['content'];


header('Content-Length: '.$filesize);
header('Last-Modified: '.gmdate('r',filectime($dir.'/'.$arch)).' GMT');
header('Connection: close');
header('Content-Disposition: attachment; filename="'.$arch.'.jad"');

print $content."\r\n".'MIDlet-Jar-Size: '.$filesize."\r\n".'MIDlet-Jar-URL: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.$file;
}
?>