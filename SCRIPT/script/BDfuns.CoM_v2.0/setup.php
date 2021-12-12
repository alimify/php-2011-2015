<?php error_reporting(0);
$per='7'; /*files per page*/
$fper='15';  /*folders per page*/

$searchf='<div class="search">Search Files:<form method="get" action="/search.php"><input type="text" name="search" class="input"/> <input type="submit" value="Search" class="button"/></form></div>';

$head='<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">

<meta http-equiv="Cache-Control" content="no-cache"/>

<link href="/style.css" rel="stylesheet" type="text/css" />
<title>'.$title.'</title>
<link rel="icon" href="/icon.png" />
<link rel="stylesheet" href="style.css" type="text/css"/></head>
<body>'.$searchf.'';

$contact='<div class="dl2"><a href="/contact.php"><b>Contact Us!</b></a></div>';
if(!$_GET) {$foot='<h2>Admin: </h2><div class="even"><a href="http://fb.com/shaon1993"><b>Shopnil</b></a></div><div class="dl2"><a href="'.$siteurl.'" class="dl2">'.$sitename.'</a></div></body></html>'; }
else { $foot='<div class="dl2"><a href="'.$siteurl.'" class="dl2">'.$sitename.'</a></div></body></html>';
} ?>
