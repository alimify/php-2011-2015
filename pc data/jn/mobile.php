<?php
/* Script by Raziul and BDBOYS.NET Team */
include 'config.php';
$s=$_GET['show'];
$link='http://m.sumirbd.mobi/'.$s;
$file = file_get_contents(''.$link.'');
include 'function.php';
echo $file;
include 'footer.php';?>