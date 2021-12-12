<?php
$h1 ='<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head>';
$file = preg_replace('|<!DOCTYPE html>(.*?)<head>|is',''.$h1.'',$file);
$file = preg_replace('|<meta name="alexaVerifyID(.*?)>|is','',$file);
$file = preg_replace('|<div class="logo">(.*?)</div>|is','<div class="logo"><a href="/"><img alt="'.$site.'" src="/images/logo.png" /></a></div>'.$ads.'',$file);
$file=str_replace('SKYiTech.com','BDBOYS.Net',$file);
$file=str_replace('m.SumirBD.mobi',''.$site.'',$file);
$file=str_replace('(sumirbd.mobi)','('.$site.')',$file);
$file=str_replace('/siteuploads/thumb','http://m.sumirbd.mobi/siteuploads/thumb',$file);
$file=str_replace('/files/search','/mobile/files/search',$file);
$file=str_replace('/latest_updates','/mobile/latest_updates',$file);
$file=str_replace('/top','/mobile/top',$file);
$file=str_replace('/categorylist','/mobile/categorylist',$file);
$file=str_replace('/fileList','/mobile/fileList',$file);
$file=str_replace('/fileDownload','/mobile/fileDownload',$file);
$file = preg_replace('|<form(.*?)</form>|is','',$file);
$file = preg_replace('|<div class="tCenter">(.*?)</div>|is',''.$ads2.'',$file);
$file = preg_replace('|<div class="ftrLink">(.*?)</html>|is','',$file);?>