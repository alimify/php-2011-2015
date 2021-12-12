<?php
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#
$mt=microtime(1);

require 'configpc.php';
require 'core.php';
require 'func.php';

if($zip)

{include('zip.php');}

function isSpider ( $userAgent ) {
    if ( stristr($userAgent, "Googlebot")    || /* Google */
         stristr($userAgent, "Slurp")    || /* Inktomi/Y! */
         stristr($userAgent, "MSNBOT")    || /* MSN */
         stristr($userAgent, "teoma")    || /* Teoma */
         stristr($userAgent, "ia_archiver")    || /* Alexa */
         stristr($userAgent, "Scooter")    || /* Altavista */
         stristr($userAgent, "Mercator")    || /* Altavista */
         stristr($userAgent, "FAST")    || /* AllTheWeb */
         stristr($userAgent, "MantraAgent")    || /* LookSmart */
         stristr($userAgent, "Lycos")    || /* Lycos */
         stristr($userAgent, "ZyBorg")    /* WISEnut */
    ) return TRUE;
    return FALSE;
}

if (isSpider(getenv("HTTP_USER_AGENT"))) {
    $useSessionID = FALSE;
    $logAccess = TRUE;
}

//Sorting and preview:
$p=intval($_GET['p']);

$sort=intval($_GET['sort']);

if($sort>1 OR $sort<0)

{$sort=1;}

$p=1;

$sort=1;

//Folder:

$dir=htmlspecialchars($_GET['dir']);

//$dir=str_replace('_','/',$dir); 
/////////////////////////////////////////////
while(substr($dir,0,1)=='/')

{$dir=substr($dir,1,strlen($dir));}
////////////////////////////////////////////////
if(strstr($dir,'..') OR !is_dir('load/'.$dir) OR strstr($dir,'://'))

{$dir=null;}
/////////////////////////////////////////
$opis = false;
$dir_exp=explode('/',$dir);
$glob_dir=glob('load/'.$dir.'/*',GLOB_ONLYDIR);
$dirt=str_replace('load/',null,$glob_dir[$i]);
///////////////////////////////////////////////////////////////
if(!$dir)
{$title=$_SERVER['HTTP_HOST'].$maintitle;}
else
{$title=''.str_replace('-',' ',transdir($dir_exp[count($dir_exp)-1])).' : -web '.$_SERVER['HTTP_HOST'].'';}

//HATS/////////////////////////////////////////////////////////

print $top;
print '<title>'.$title.'</title>';
print '<link rel="icon" href="/icon.png" />
<meta name="description" content="download '.$title.' now"/>
<meta name="keyword" content="'.str_replace(' ',',',$title).','.$keyword.' "/> 

<meta name="google-site-verification" content="C4kgpEIgPVE6yLjoiIVFKzq-970a7XXRMajoc5A_rkU" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<link href="/styles.css" rel="stylesheet" type="text/css"/>

<link rel="shortcut icon" href="icon.ico">
</head>';



//////////////////////////////
print '<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><center><div class="main">

<div style="text-align: left;margin-top:-20px;">
<br/>';

print $menu;
print '<br/><div class="devider"></div>';
print '<table width="100%" cellspacing="3"><tr>';
require 'updatepc.php';
echo '<div class="bhd">Site Navigation</div><div class="cbox" style="padding: 5px;">';
require 'navigation.php';
echo '</div><div class="blank">&nbsp;</div></td>';

echo '<td><div style="padding: 5px;">
<table width="100%" cellpadding="0" style="margin-top: -5px;" cellspacing="0"><tr>
<td width="350px">';

echo '<center>';

require 'ads/mrt.php';

echo '</center></td><td width="250px">';



require 'ads/mrt2.php';

echo '</center></td></tr></table></div><center>';require 'ads/headad.php';echo '<br/>';
//require 'banner.php';
echo '</center>';

if(!$dir)

{print '<div class="bhd"><center>Downloads menu</center></div>';}

else

{

$dir_exp=explode('/',$dir);

print '<div class="bhd"><center>'.transdir($dir_exp[count($dir_exp)-1]).'</center></div>';

}

print '<div class="cbox">';




if($p and file_exists('load/'.$dir.'/des.txt'))
{$opis=print '<center>'; require('load/'.$dir.'/des.txt');print '</center>';}
else $opis=print '';

print '<table class="cmain"><tr><td><div id="list_wrapper">';

//Subfolders

$glob_dir=glob('load/'.$dir.'/*',GLOB_ONLYDIR);

if($glob_dir){

$count=sizeof($glob_dir);

$countstr=ceil($count/$dirstr);

$page=intval($_GET['page']);

if($sort)

{usort($glob_dir, 'sortnew');}

if($page>$countstr or $page<=0) $page=1;
if($start>$count or $start<=0) $start = 0;
if($page) $start = ($page - 1) * $dirstr; else $start = 0;
$end = $start + $dirstr;

if($end>=$count)

{$end = $count;}

for($i=$start; $i<$end; $i++)

{

$dirt=str_replace('load/',null,$glob_dir[$i]);

$dir_exp=explode('/',$dirt);

$count=countf($dirt);

$tot=ceil($count);


//////////////////////////////////////////////////////////////////////////folder icon withdraw///////
if($p and file_exists('load'.$dirt.'/folder.jpg'))

$ico= '<img style="border:5px solid #fff;margin:5px 6px;" src="/load'.$dirt.'/folder.jpg" width="120" height="150" alt="" />'; 

else $ico= '<img style="border:5px solid #fff;margin:5px 6px;" src="/img/dir.png" width="120" height="150" alt="" />';

if($p and file_exists('load/'.$dirt.'/folder.jpg'))

$ico= '<img style="border:5px solid #fff;margin:5px 6px;" src="/load/'.$dirt.'/folder.jpg" width="120" height="150" alt="" />'; 

else $ico= '<img style="border:5px solid #fff;margin:5px 6px;" src="/extp/dir.gif" width="120" height="150" alt="" />';

///////////////////////////////////////////////////////////////////

print '<div class="multiple_columns"><div class="special">'.$ico.' <br/><strong><a href="/pc/'.$dirt.'.html">'.transdir($dir_exp[count($dir_exp)-1]).'</a><strong><br/><div class="wln" style="font-size: 12px;"><font color="#2E7908">('.$tot.')</div></div></div>';

}

}

$glob_file=glob("load/$dir/*.{{$allfile}}",GLOB_BRACE);

if($glob_file) //FILES

{

if($sort)

{usort($glob_file, 'sortnew');}

$count=sizeof($glob_file);

$countstr=ceil($count/$filestr);

$page=intval($_GET['page']);
if($page>$countstr or $page<=0) $page=1;
if($start>$count or $start<=0) $start = 0;
if($page) $start = ($page - 1) * $filestr; else $start = 0;
$end = $start + $filestr;

if($end>=$count)

{$end = $count;}

for($i=$start; $i<$end; $i++)

{


$name=translit($glob_file[$i]);

$filesize=filesize($glob_file[$i]);
if($filesize < 1024) $filesize = ''.$filesize.'b';
  		if($filesize < 1048576 and $filesize >= 1024) $filesize = ''.round($filesize/1024, 2).'Kb';
  		if($filesize > 1048576) $filesize = ''.round($filesize/1024/1024, 2).'Mb';



$name = $glob_file[$i];

//Lets Encode it 

$c=base64_encode($name);

$hit = @file_get_contents("d/$c.log");

if(empty($hit))
{
$hit = 0;} 
//////////////////////////////////////
$basename=basename($glob_file[$i]);

$file_extension=pathinfo(($glob_file[$i]), PATHINFO_EXTENSION);
$ext=$file_extension;
if(r($glob_file[$i])==$ext) $dthumb= '<img style="border:5px solid #fff;margin:5px 6px;" src="/ext/'.$ext.'.gif" width="120" height="150"alt="" />';


///////jpeg,jpg,gif,png,jar,thm,nth thumb maker///////////////////////////////////////////////////////////

if((r($glob_file[$i])=='jpeg' or r($glob_file[$i])=='gif'or r($glob_file[$i])=='jpg' or r($glob_file[$i])=='png') and $p)
$dthumb= '<img style="border:5px solid #fff;" src="/pic.php?file='.$glob_file[$i].'" width="120" height="150" alt="Screen" />';

if(r($glob_file[$i])=='thm') $dthumb= '<img style="border:5px solid #fff;" src="/thm.php?file='.$glob_file[$i].'" width="120" height="150" alt="" />';

if(r($glob_file[$i])=='nth')  $dthumb= '<img style="border:5px solid #fff;" src="/nth.php?file='.$glob_file[$i].'" width="120" height="150" alt="" />';

if(r($glob_file[$i])=='jar') $dthumb= '<img style="border:5px solid #fff;" src="/ic.php?file='.$glob_file[$i].'" width="120" height="150" alt="" />';

///////////////ffmpeg eneble video screen shot generator///////////////////////////////////////////
if ($ffmpeg=='1'){
if((r($glob_file[$i])=='3gp' or r($glob_file[$i])=='mp4' or r($glob_file[$i])=='avi') && extension_loaded('ffmpeg'))
$dthumb= '<img style="border:5px solid #fff;" src="/ffmpeg.php?file='.$glob_file[$i].'" width="120" height="150" alt="" /><br />';}



//Screenshot//////////////////////////////////////////////////////////////////////////////////////

if($p and file_exists('skrin/'.$basename.'.gif'))

$thumb= '<img style="border:5px solid #fff;" src="/skrin/'.$basename.'.gif" width="120" height="150" alt="Screen" />';

elseif($p and file_exists('skrin/'.$basename.'.jpg'))

{$thumb= '<img style="border:5px solid #fff;" src="/skrin/'.$basename.'.jpg" width="120" height="150" alt="Screen" />';}
else $thumb=$dthumb;
//////////////////////////files listing function/////////////////////////// 

print '<div class="multiple_columns"><div class="special">'.$thumb.'<br/><a href="/pcfile/'.$glob_file[$i].'.html"><strong>'.$basename.' </strong></a><br/><div class="wln" style="font-size: 12px;"><font color="#2E7908">('.$filesize.')</font><br/><font color="#aa0000">Downloaded '.$hit.'</font></div></div></div>';



}

}

print '</ul></div></td></tr></table><br/><br/>';

//Pagination:

if($countstr>1)

{echo '<center><form action="/indexpc.php" method="get">Go to page:
<input type="hidden" name="dir" value="'.$dir.'">
<input type="text" name="page" size="3" value="'.$page.'">';

echo '&nbsp;<input type="submit" value="GO">
</center><br/><br/>';
echo '<div class="hd">page ('.$page.'/'.$countstr.')&nbsp;pages:&nbsp;';
//$dirx = str_replace('/','_',$dir);
$prev= $page - 1;
$next= $page + 1;
$nxtgap=$countstr - $next; if ($nxtgap>1) $pgnxtgap='..&nbsp;'; 
$pregap=$prev - 1; if ($pregap>1) $pgpregap='..&nbsp;'; 
$current=''.$page.'&nbsp;';
if ($prev>0) $pgprev='<a href="/pcx/'.$dir.'-'.$prev.'.html">'.$prev.'</a>&nbsp;';
if ($next<$countstr) $pgnext='<a href="/pcx/'.$dir.'-'.$next.'.html">'.$next.'</a>&nbsp;';
if($page>2) $first='<a href="/pcx/'.$dir.'-1.html">1</a>&nbsp;';
if($page<$countstr) $pglast='<a href="/pcx/'.$dir.'-'.$countstr.'.html">'.$countstr.'</a>&nbsp;';
if ($countstr>1) echo $first.$pgpregap.$pgprev.$current.$pgnext.$pgnxtgap.$pglast;


echo '<br/>';
}

//Return to level up:
print '</div><div class="nav">';
$dir_exp=explode('/',$dir);

if($dir)

{print '<span class="on">Back</span> : <a class="on" href="/indexpc.php"><span class="">Home</span></a>';}

if(($countj=count(explode('/',$dir)))>1)

{

$j=explode('/',$dir);

for($i=0; $i<=$countj; $i++)

{

$u=$j[count($j)-2];

if($u)

{

unset($j[count($j)-1]);

$g[$i]= '<a class="on" href="/pc/'.join('/', $j).'.html"><span class="">'.transdir($u).'</span></a>';

}

}

for($i=count($g)-1; $i>=0; $i--)

{print $g[$i];}



print '';

}



print '</div><center>';

require 'ads/footad.php';

print '</center>';

print '</td></tr></table><div class="devider"></div>';

//require 'rss.php';

print '<div class="footer"><div class="defln">

Copyright &copy; '.$_SERVER['HTTP_HOST'].' 2011-12. All Rights Reserved.

<span style="float: left;">

Developed by :  <a href="http://indianmob.in" target="_blank"><span class="red">IndianMob.In</span></a>

</span><br/>

</div><div class="defln">

<span style="float: left;">

Powered by: <a href="'.$_SERVER['HTTP_HOST'].'" target="_blank"><span class="red">'.$_SERVER['HTTP_HOST'].'</span></a>

</span>

<a href="/disclaimer.php"><span class="red">Disclaimer</span></span></a> | <a href="/contactus.php"><span class="red">Contact Us</a><br/>';                    

 require 'online.php'; echo '<br/>';require 'toplist.php'; 

print $foot;





?>