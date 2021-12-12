<?php
error_reporting(0);
include 'header.php';
include 'search_form.php';
include 'updates.php';
include 'top.php';
include 'load.php';
/* Delete Files */
$c_time = (3600);
$sec = "$c_time";
$folder = "data/";
del_old_files($folder,$sec);
function del_old_files($folder,$time)
{
foreach(glob($folder."*") as $rmdir)
foreach(glob($folder."/*") as $file)
{
if(is_dir($file))
del_old_files($file,$time);
else
if(filemtime($file)<time()-$time)
unlink($file);
@rmdir("$rmdir");
}
}
// end
include 'footer.php';?>