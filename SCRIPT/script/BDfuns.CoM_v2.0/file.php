<?php
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#
$mt=microtime(1);
require 'config.php';
require 'core.php';
require 'func.php';


//Sorting and preview:
$p=intval($_GET['p']);
$sort=intval($_GET['sort']);
if($sort>1 OR $sort<0)
{$sort=1;}
$p=1;
$sort=1;
///////////////////////////
$file=$_GET['file'];


$name = basename($file);
if($file)
{$dir=str_replace('load/','',dirname($file));}
$hit = @file_get_contents("d/$name.log");
if(empty($hit)){
$hit = 0;}



//HATS
print $top;
print '<title>'.str_replace('-',' ',$name).' |'.$_SERVER['HTTP_HOST'].' </title>
<link rel="icon"type="image/png" href="/icon.png" />
<meta name="description" content="download '.str_replace('-',' ',$name).' now"/>
<meta name="keyword" content="'.str_replace(' ','-',$name).',"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="google-site-verification" content="C4kgpEIgPVE6yLjoiIVFKzq-970a7XXRMajoc5A_rkU" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<meta http-equiv="Cache-Control" content="max-age=10"/>
<meta name="robots" content="index,follow"/>
<link href="/style.css" rel="stylesheet" type="text/css" />

</head>
<body><div class="title" style="font-family:Fontdiner Swanky;font-size:20px;"><div style="font-family: cursive;"><font color="orange">'.$_SERVER['HTTP_HOST'].'</font></div><div style="padding: 3px;"><font face="arial" size="2">Indian Coolest Site </font></div></div><br/><div class="menu" style="border-bottom:1px solid #BFBFBF;"><b><center><a href="http://goo.gl/gAkWd">BookMark Now <font color="red">'.$_SERVER['HTTP_HOST'].'</a></font></center></b></div>';
print '<div class="a">';

print '</div>';

if(!$file)
{exit('<div class="info">File does not exist<br/></div>'.$foot);}


$r = r($file);
print '<div class="dl2"><b>File: '.$name.'<b><br/></div><div class="dl"><div class="a">';
require 'Randomad.php';
print '<br/>';
require 'ads/ad1.php';

print '<br/>';
$filesize=filesize($file);
if($filesize < 1024) $filesize = ''.$filesize.'b';
  		if($filesize < 1048576 and $filesize >= 1024) $filesize = ''.round($filesize/1024, 2).'Kb';
  		if($filesize > 1048576) $filesize = ''.round($filesize/1024/1024, 2).'Mb';




$basename=basename($file);
if(file_exists('skrin/'.$basename.'.gif') and $p)

{print 'Screenshot: <br/><img src="/skrin/'.$basename.'.gif" width="90" height="110" alt="'.translit($file).'"/>';}
elseif(file_exists('skrin/'.$basename.'.jpg') and $p)

{print 'Screenshot: <br/><img src="/skrin/'.$basename.'.jpg" width="90" height="110" alt="'.translit($file).'"/>';}
else
{print 'Screenshot: <br/><img src="/extp/default.gif" alt=""/>';}




print '<br><font color="black"><strong><u>Size: </u></strong></font>'.$filesize.'<br/>';
$filectime=filemtime($file);
print '<font color="black"><strong><u>Uploaded: </u></strong></font> '.date('d/m/y',filemtime($file)).'<br/>';
print '<font color="black"><strong><u>Downloaded: </u></strong></font> '.$hit.' times<br/>';
print '<br/>';
$file_extension=pathinfo(($file), PATHINFO_EXTENSION);
$ext=$file_extension;
echo '<font color="black"><strong><u>File type: </u></strong></font> '.$ext.'<br/>';
if($ext=='jpg' or $ext=='gif' or $ext=='png' or $ext=='jpeg')
{
list($x,$y, $type,)=@getimagesize($file);
if($type==1){$type='gif';}
if($type==2){$type='jpg';}
if($type==3){$type='png';}
if($type==4){$type='jpeg';}
if($p)

print '<center>
Permission: '.$x.'x'.$y.'<br/>

&gt;<a href="/imgload.php?x=130&amp;y=130&amp;file='.$file.'">Download 130x130</a><br/>
&gt;<a href="/imgload.php?x=132&amp;y=176&amp;file='.$file.'">Download 132x176</a><br/>
&gt;<a href="/imgload.php?x=176&amp;y=220&amp;file='.$file.'">Download 176x220</a><br/>
&gt;<a href="/imgload.php?x=240&amp;y=320&amp;file='.$file.'">Download 240x320</a><br/>
&gt;<a href="/imgload.php?x=480&amp;y=640&amp;file='.$file.'">Download 480x640</a><br/>
Your Size<br/>
<form method="post" action="/imgload.php?file='.$file.'">
<div>
<input name="x" maxlength="3" size="3"/>x<input name="y" maxlength="3" size="3"/><br/>
<input name="pr" type="checkbox" value="1"/>Discard ratio<br/>
<input value="Submit" type="submit"/>
<br/>
</form></center>';
}


echo '<br/>';

echo '<br/>';

print '<font color="black"><b><u>Download Links : </u></b><strong><a href="/down.php?file='.$file.'"><font color="#aa0000">Download file</font></a><strong><br/>';require 'ads/ad3.php';echo '<br>';



echo '<br/>';

//Возврат



require 'ads/ad4.php';

print '</div></div>';
print '</div></div><div class="menu"><img src="/img/home.gif" width="26" height="14" alt=""/><a href="/indexw.php">Home</a>';
if(($countj=count(explode('/',$dir)))>0)
{
//print '&#187; ';
$j=explode('/',$dir);
for($i=0; $i<=$countj; $i++)
{
$u=@$j[count($j)-1];
if($u)
{
$g[$i]= '&#187; <a href="/wap/'.join('/', $j).'.html">'.transdir($u).'</a>';
unset($j[count($j)-1]);
}
}
for($i=count(@$g)-1; $i>=0; $i--)
print $g[$i];
}

print '</div>';
print '<div class="dl2">';require 'toplist.php';
print '</div><div class="dl2"><a href="/indexpc.php"><button type="button">pc version</button></a></div>';
print $foot;
?>