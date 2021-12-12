<?php
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#

$mt=microtime(1);
require 'configpc.php';
require 'core.php';
require 'func.php';
if($zip)
{include 'zip.php';}

//Sorting and preview:
$p=intval($_GET['p']);
$sort=intval($_GET['sort']);
if($sort>1 OR $sort<0)
{$sort=1;}
$p=1;
$sort=1;

$file=$_GET['file'];

$name = basename($file);
if($file)
{$dir=str_replace('load/','',dirname($file));}
$hit = @file_get_contents("d/$name.log");
if(empty($hit)){
$hit = 0;} 
//HATS
print $top;
print '<title>'.str_replace('-',' ',$name).' | web '.$_SERVER['HTTP_HOST'].'</title>
<meta name="description" content="download '.str_replace('-',' ',$name).' now"/>
<meta name="keyword" content="'.str_replace(',','-',$name).'"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="google-site-verification" content="C4kgpEIgPVE6yLjoiIVFKzq-970a7XXRMajoc5A_rkU" />
<meta name="robots" content="index,follow"/>
<meta http-equiv="Cache-Control" content="must-revalidate"/>
<meta http-equiv="Cache-Control" content="no-cache"/> 
<link href="/styles.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="/icon.png"/>
</head>';
print '<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><center><div class="main">
<div style="text-align: left;margin-top:-20px;">
<br/>';
print $menu;
print '<br/><div class="devider"></div><center>';
require 'ads/downheader.php';
print '</center><table width="100%" cellspacing="7"><tr><td width="540">';                    
if(!$file)
{exit('<div class="hd">File does not exist</div>'.$foot);}


$r = r($file);
print '</div><div class="hd"><center><strong>File : '.$name.'</strong></center></div><div class="cbox">';
echo '<div class="lnwt" style="text-align:center;"><div style="padding:5px;"><center><b>';

$filesize=filesize($file);
if($filesize < 1024) $filesize = ''.$filesize.'b';
  		if($filesize < 1048576 and $filesize >= 1024) $filesize = ''.round($filesize/1024, 2).'Kb';
  		if($filesize > 1048576) $filesize = ''.round($filesize/1024/1024, 2).'Mb';
print 'Size:<font color="#069BE5"> '.$filesize.'</font>';

$filectime=filemtime($file);
print 'Uploaded:<font color="#069BE5"> '.date('d/m/y H:i',filemtime($file)).'</font>';
print '</b></center></div></div>';

$basename=basename($file);
if(file_exists('skrin/'.$basename.'.gif') and $p)
{print '<center><img class="rboxfl" style="padding:5px;" width="185" height="220" src="/skrin/'.$basename.'.gif" width="100" height="130" alt="'.translit($file).'"/><br/></center>';}
else
{print '<center><img class="rboxfl" style="padding:5px;" width="185" height="220" src="/extp/defaultbig.gif" alt=""/>,br/></center>';}

$file_extension=pathinfo(($file), PATHINFO_EXTENSION);
$ext=$file_extension;
echo '<center><font color="black"><strong><u>File type: </u></strong></font><font color="#069BE5"> '.$ext.'</font></center><br/>';
echo '<center><font color="black"><strong><u>Downloaded: </u></strong></font><font color="#069BE5"> '.$hit.' times</font></center><br/>';
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
&gt;<a href="/'.$file.'">Download the original file</a><br/>
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
</form></center><br/>';
}





print '<center><a href="http://cluster.adultadworld.com/redir/default.aspx?s=27510&c=2409"><img src="/img/download.gif"></a></center><br/>';
print '<center><a href="/down.php?file='.$file.'"><img src="/img/download.gif"></a></center><br/>';



echo '<hr><div class="lnwt" style="text-align:center;"><div style="padding:5px;"><center><b>';
print '<input value="http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.$file.'"/><br/>';


// Rating


echo '</b></center></div></div>';
////////////////////////



//print 'Back :<a href="indexpc.php?p='.$p.'&amp;sort='.$sort.'">Home</a>';
print '</div></td>';
print '';
//require 'rtad.php';                    
echo '<td style="width: 370px;"><div class="bhd">Our Sponsors</div>
<div class="cbox" style="color:silver;font-size:16px;"><center>';
require 'ads/downup1.php';
echo '</div><br><div class="hd">Our Sponsors</div>
<div class="cbox" style="color:silver;font-size:16px;"><center>';
require 'ads/downup2.php';
echo'</center></div></td></tr></table>';

echo '<div class="footer"><div class="defln">
Copyright &copy; '.$_SERVER['HTTP_HOST'].' 2011-12. All Rights Reserved.
<span style="float: left;">
Developed by :  <a href="http://indianmob.in" target="_blank"><span class="red">Indianmob.in</span></a>
</span><br/>
</div><div class="defln">
<span style="float: left;">
Powered by: <a href="'.$_SERVER['HTTP_HOST'].'" target="_blank"><span class="red">'.$_SERVER['HTTP_HOST'].'</span></a>
</span>
<a href="/disclaimer.php"><span class="red">Disclaimer</span></a> | <a href="/contactus.php"><span class="red">Contact Us</span></a> |';
require 'toplist.php';

print $foot;
?>