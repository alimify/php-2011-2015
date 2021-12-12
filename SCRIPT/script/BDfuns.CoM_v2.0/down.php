<?php
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#

$mt=microtime(1);
require 'config.php';
require 'core.php';
require 'func.php';

$file=$_GET['file'];
$name = basename($file);
//@$cf = base64_encode($file);

$ck = @file_get_contents("d/$name.log");
if(!empty($ck)){
if(!preg_match("/[0-9]/i",$ck)) exit("Wrong path");
   }
   if(empty($ck)) $ck = 0;

if($fp=@fopen("d/$name.log","w+")){
@fputs($fp,$ck+1);
@fclose($fp);
} 
Header("Location: $file");
?>