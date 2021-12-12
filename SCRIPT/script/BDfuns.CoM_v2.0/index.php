<?php
require 'core.php';
if (stristr($_SERVER['HTTP_USER_AGENT'],'windows') || stristr($_SERVER['HTTP_USER_AGENT'],'linux') ||
 stristr($_SERVER['HTTP_USER_AGENT'],'macintosh') || stristr($_SERVER['HTTP_USER_AGENT'],'unix') ||
  stristr($_SERVER['HTTP_USER_AGENT'],'macos') || stristr($_SERVER['HTTP_USER_AGENT'],'bsd')){
header('Location: '.$url.'indexw.php');
}
else {
header('Location: '.$url.'indexw.php');
}
?>


