<?php
ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Etc/GMT-6');
$user_email=mysql_real_escape_string($_COOKIE['wapsmsbd_email']);
$user_pass=mysql_real_escape_string($_COOKIE['wapsmsbd_password']);
$user=mysql_query("SELECT * FROM user WHERE email='$user_email'");
function dump_error($erro){
echo '<div class="error">';
foreach($erro as $errr){
echo ''.$errr.'<br/>';
}
echo '</div>';
}
$Adminmail = 'admin@wapsmsbd.com';
if(mysql_num_rows($user)>0){
$dumlog=mysql_fetch_array($user);
$mysql_pass=$dumlog['pass'];
$mysql_st=$dumlog['status'];
if($mysql_pass==$user_pass and $mysql_st=='1'){
$mysql_status=1;
}else{$mysql_status = $mysql_st;}
$mysql_id=$dumlog['id'];
$mysql_name=$dumlog['name'];
$mysql_admin=$dumlog['admin'];
}
$top = '<?xml version="1.0" encoding="UTF-8" ?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head><meta name="google-site-verification" content="Ls0e5jl41RDZEGjc6N7soAaaNlTOSsYW357wfF6X9Xk" /><meta content="chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0; maximum-scale=1.0;"/>
<meta name="revisit-after" content="1 days"/>
<meta content="10" name="pagerank™" />
<meta content="1,2,3,10,11,12,13,ATF" name="serps"/>
<meta content="5" name="seoconsultantsdirectory"/>
<meta content="MD Zisan" name="author"/>
<meta content="General" name="Rating"/>
<meta content="never" name="Expires"/>
<meta content="all" name="audience"/>
<meta content="english" name="Language" />
<meta name="format-detection" content="telephone=no"/>
<meta name="HandheldFriendly" content="true"/>
<meta name="robots" content="index,follow"/><meta name="distribution" content="global"/><meta name="Identifier-URL" content="http://wapsmsbd.com"/><meta http-equiv="Cache-control" content="no-cache">';
?>