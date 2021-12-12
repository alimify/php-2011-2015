<?php
$mt=microtime(1);
require 'config.php';
require 'func.php';
if($zip)
{include 'zip.php';}

//Сортировка и предпросмотр:
$p=intval($_GET['p']);
$sort=intval($_GET['sort']);
if($sort>1 OR $sort<0)
{$sort=0;}

$file=str_replace("\0", null, htmlspecialchars($_GET['file']));

if(!file_exists($file) OR !is_file($file) OR !in_array(r($file), explode(',',$allfile)) OR strstr($file,'..') OR strstr($file,'://'))
{$file = null;}


if(!$file)
{exit('<div class="red">File does not exist<br/></div>'.$foot);}


$dir = str_replace('load/', null, dirname($file));

$time = date('d F Y H:i A');

$dirkomm = str_replace('/', 'D', str_replace('.', 'T', $file));
if(!file_exists('komm/'.$dirkomm))
{
$fp = fopen('komm/'.$dirkomm,'w+');
fclose($fp);
}

$err = null;
$name=str_replace("\n",'<br />',htmlspecialchars($_POST['name']));
$name=str_replace('|',null,$name);
$name=substr($name,0,50);

if(!$name)
{$err = 'You did not enter his name<br />';}

$komm=str_replace("\n",'<br />',htmlspecialchars($_POST['komm']));
$komm=str_replace('|',null,$komm);
$komm=substr($komm,0,500);
if(!$komm)
{$err.='You have not written a comment<br />';}

if(strstr(file_get_contents('komm/'.$dirkomm),'</strong>&gt; <br />'.$komm))
{$err.='This comment is already<br />';}

if($err)
{print $top.'<div class="red">'.$err.'</div>'.$foot;}
else
{
$fp=fopen('komm/'.$dirkomm,'a+');
fputs($fp, '<strong>'.$name.' '.$time.'</strong><br />'.$komm."\n");
fclose($fp);
}

header('Location: comment.php?p='.$p.'&file='.$file.'&sort='.$sort,true,301);
?>