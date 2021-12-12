<?php

include("conf.php");

////////////////////////////////////////////////
function connect($dbhost,$dbname,$dbuser,$dbpass)
{
    $conn=@mysql_connect($dbhost,$dbuser,$dbpass);
    if(!$conn)return false;
    $db=@mysql_select_db($dbname);
    if(!$db)return false;
    return true;
}

////////
$neww = 100;

$newh = 110;
// watermark in skrin images
$WaterMarkText='AnyMaza.Com'; //this text will b displayed in all saved screenshot from files.
$font_size = 14;     // watermark text size change it according to necessary
?>