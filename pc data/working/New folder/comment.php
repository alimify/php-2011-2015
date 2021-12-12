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

print'<html><head><title>Comments-'.translit($file).'</title>';
print'<link rel="stylesheet" href="css/style.css" type="text/css" /></head>';

print'<div class="title"><center><b>Comments-'.translit($file).'</b></center></div>';
if(!$file)
{exit('<div class="info">File does not exist<br/></div>'.$foot);}

$dir = str_replace('files/', null, dirname($file));

$dirkomm=str_replace('/', 'D', str_replace('.', 'T', $file));
if(!file_exists('komm/'.$dirkomm))
{
$fp=fopen('komm/'.$dirkomm,'w+');
fclose($fp);
}
$page=intval($_GET['page']);

$filetext=file('komm/'.$dirkomm);
$count=count($filetext);

$start = $count-$page*$kommstr-1;
if($start<0)
{$start=$count-1;}

if($start<0)
{$start=0;}

$end=$start-$kommstr;
if($end<0)
{$end=0;}

for($i=$start; $i>=$end; $i--)
{print '<div class="nextp">'.$filetext[$i].'<br/></div>';}


nav_page($n,$page,'file.php?file='.$file.'&amp;str='.$str.'&amp;p='.$p.'&amp;sort='.$sort.'&amp;page=');
//Разбивка по страницам
if($end>0)
{print '<div class="info"><a href="komm.php?p='.$p.'&amp;file='.$file.'&amp;sort='.$sort.'&amp;page='.($page+1).'">Next</a><br /></div>';}
if($page>0)
{print '<div class="info"><a href="komm.php?p='.$p.'&amp;file='.$file.'&amp;sort='.$sort.'&amp;page='.($page-1).'">Back</a><br /></div>';}
print '<div class="item2" align="center">
<form action="addcomment.php?p=1&amp;file='.$file.'&amp;sort='.$sort.'" method="post">
<div>
Name:<br/>
<input type="text" name="name" maxlength="20" /><br />
Comments:<br/>
<input type="text" name="komm" maxlength="200" /><br />
<input type="submit" value="Add" />
</div>
</form>
</div>';

print '<div class="title"><a href="index.php">Home</a>';
//Возврат
if(($countj=count(explode('/',$dir)))>1)
{
$j=explode('/',$dir);
for($i=0; $i<=$countj; $i++)
{
$u=$j[count($j)-1];
if($u)
{
$g[$i]= ' &#187; <a href="indexx.php?dir='.join('/', $j).'&amp;p=1&amp;sort='.$sort.'">'.transdir($u).'</a>';
unset($j[count($j)-1]);
}
}
for($i=count($g)-1; $i>=0; $i--)
{print $g[$i];}

print '</div></body></html>';
}


?>