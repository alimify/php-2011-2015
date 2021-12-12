<?php
$mt=microtime(1);
require 'config.php';
require 'func.php';
if($zip)
{include('zip.php');}

//Sorting and preview:

$p=intval($_GET['p']);
$sort=intval($_GET['sort']);
if($sort>1 OR $sort<0)
{$sort=0;}

$file=str_replace("\0", null, htmlspecialchars($_GET['file']));

if(!file_exists($file) OR !is_file($file) OR !in_array(r($file), explode(',',$allfile)) OR strstr($file,'..') OR strstr($file,'://'))
{$file = null;}


//HATS
print $top;


if(!$file)
{exit('<div class="red">File does not exist<br/></div>'.$foot);}

$dir = str_replace('load/', null, dirname($file));

if(file_exists($file.'.doc'))
{
$ds=filesize($file.'.doc');
if($ds>1024)
{$ds=round($ds/1024,2).' kb';}
else
{$ds.=' byte';}
print '<div class="red"><a href="'.$file.'.doc">Download format .doc('.$ds.')</a><br/></div>';
}

$text=file($file);
$t=array();
$n=1;
$t[1]= null;
$count=count($text);
$page=intval($_GET['page']);
if($page < 1)
{$page=1;}

for($i=0; $i<$count; $i++)
{
$t[$n].=$text[$i];
if(strlen($t[$n])>=4000)
{
$n++;
$t[$n]='';
}
}

if(!trim($t[$n]))
{$n--;}
print '<div class="fot">'.nl2br(htmlspecialchars($t[$page])).'</div><div class="bor">';

if($n)
{print nav_pagetxt($n,$page-1,$file,$p,$sort,'txt');}

print 'Back:<br />';
//Возврат
if(($countj=count(explode('/',$dir)))>1)
{
$j=explode('/',$dir);
for($i=0; $i<=$countj; $i++)
{
$u=$j[count($j)-1];
if($u)
{
$g[$i]= '/<a href="index.php?dir='.join('/', $j).'&amp;p='.$p.'&amp;sort='.$sort.'">'.transdir($u).'</a>';
unset($j[count($j)-1]);
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

print '<br/>';
}


print '<a href="index.php?p='.$p.'&amp;sort='.$sort.'">Downloads</a><br/></div>'.$foot;
?>