<?php
#*******************   waprock.info  *************************        #
#*****************contact : free4download.in@gmail.com  ************#
$mt=microtime(1);

require 'config.php';
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

$dir=str_replace('_','/',$dir); 
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
{$title=''.str_replace('-',' ',transdir($dir_exp[count($dir_exp)-1])).' : '.$_SERVER['HTTP_HOST'].'';}

//HATS/////////////////////////////////////////////////////////

print $top;
print '<title>'.$title.'</title>';
print '<link rel="icon" href="icon.png" />
<meta name="description" content="download '.$title.' now"/>
<meta name="keyword" content="'.str_replace(' ',',',$title).','.$keyword.' "/> 

<meta name="google-site-verification" content="C4kgpEIgPVE6yLjoiIVFKzq-970a7XXRMajoc5A_rkU" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<link href="style.css" rel="stylesheet" type="text/css" />

</head>
<body><div class="title" style="font-family:Fontdiner Swanky;font-size:20px;"><div style="font-family: cursive;"><font color="orange">'.$_SERVER['HTTP_HOST'].'</font></div><div style="padding: 3px;"><font face="arial" size="2">Indian Coolest Site </font></div></div><br/><div class="menu" style="border-bottom:1px solid #BFBFBF;"><b><center><a href="http://goo.gl/gAkWd">BookMark Now <font color="red">'.$_SERVER['HTTP_HOST'].'</a></font></center></b></div>';

print '<div class="a">';

require 'ads/ad1.php';
print '<br/>';
require 'ads/ad2.php';
print '<br/>';
require 'Randomad.php';
print '<br/>';
require 'ads/ad3.php';
print '<br/>';
require 'ads/ad4.php';
echo '<br/><a href="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2Findianmobin%2F161944313913744&width=410&height=590&colorscheme=light&show_faces=true&border_color&stream=true&header=true">..:: <font color="green">Follow us on facebook</font> ::..</a>';
print '</div>';
//////////////////////////////
if(!$dir)

{require 'updatemobile.php';

print '<div class="dl2"><strong>Downloads menu</strong></div><table cellspacing="0"><tbody>';
print '<div class="even"><img src="ext/ucweb.jpg" width="16" height="19" alt=""/><a href="http://down3.ucweb.com/ucbrowser/en/?bid=354&pub=xuz@movieswap2&title=&url="><strong>UC web browser</strong></a></div>';}

else{
$dir_exp=explode('/',$dir);
print '<div class="dl2"><strong>'.transdir($dir_exp[count($dir_exp)-1]).'</strong></div>';
print '<table cellspacing="0"><tbody>';}


if($p and file_exists('load/'.$dir.'/des.txt'))
{$opis=print '<center>'; require('load/'.$dir.'/des.txt'); print '</center><hr/>';}
else $opis=print '';

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

$sdx= $i/2;
if (is_int($sdx)) {
$row= '<div class="odd">';
}
else {
$row= '<div class="even">';
}
//////////////////////////////////////////////////////////////////////////folder icon withdraw///////
if($p and file_exists('load'.$dirt.'/m.jpg'))

$ico= '<img src="load'.$dirt.'/m.jpg" width="16" height="19" alt="" />'; 

else $ico= '<img src="ext/folder.jpg" width="16" height="19" alt="" />';

if($p and file_exists('load/'.$dirt.'/m.jpg'))

$ico= '<img src="load/'.$dirt.'/m.jpg" width="16" height="19" alt="" />'; 

else $ico= '<img src="ext/folder.jpg" width="16" height="19" alt="" />';
///////////////////////////////////////////////////////////////////
if ($dirt[0] == '/') {

$dirt=str_replace('/','_',$dirt);
$tx=urlencode($dirt);
print $row.$ico.'<a href="w'.$tx.'.html"><strong>'.transdir($dir_exp[count($dir_exp)-1]).'</strong></a> ('.$tot.')</div>';}

else {

$dirt=str_replace('/','_',$dirt);  
$tx=urlencode($dirt);
print $row.$ico.'<a href="w_'.$tx.'.html"><strong>'.transdir($dir_exp[count($dir_exp)-1]).'</strong></a> ('.$tot.')</div>';}

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
$sdx= $i/2;
if (is_int($sdx)) {
$row= '<tr class="even"><td class="tblimg">';
}
else {
$row= '<tr class="odd"><td class="tblimg">';
}

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
if(r($glob_file[$i])==$ext) $dthumb= '<img class="tblimg img" src="ext/'.$ext.'.gif" alt="" />';


///////jpeg,jpg,gif,png,jar,thm,nth thumb maker///////////////////////////////////////////////////////////

if((r($glob_file[$i])=='jpeg' or r($glob_file[$i])=='gif'or r($glob_file[$i])=='jpg' or r($glob_file[$i])=='png') and $p)
$dthumb= '<img src="pic.php?file='.$glob_file[$i].'" width="60" height="70" alt="Screen" /><br/>';

if(r($glob_file[$i])=='thm') $dthumb= '<img class="tblimg img" src="thm.php?file='.$glob_file[$i].'" width="60" height="70" alt="" />';

if(r($glob_file[$i])=='nth')  $dthumb= '<img class="tblimg img" src="nth.php?file='.$glob_file[$i].'" width="60" height="70" alt="" />';

if(r($glob_file[$i])=='jar') $dthumb= '<img class="tblimg img" src="ic.php?file='.$glob_file[$i].'" width="60" height="70" alt="" />';

///////////////ffmpeg eneble video screen shot generator///////////////////////////////////////////
if ($ffmpeg=='1'){
if((r($glob_file[$i])=='3gp' or r($glob_file[$i])=='mp4' or r($glob_file[$i])=='avi') && extension_loaded('ffmpeg'))
$dthumb= '<img src="ffmpeg.php?file='.$glob_file[$i].'" width="60" height="70" alt="" /><br />';}



//Screenshot//////////////////////////////////////////////////////////////////////////////////////

if($p and file_exists('skrin/'.$basename.'.gif'))

$thumb= '<img class="tblimg img" src="skrin/'.$basename.'.gif" width="60" height="70" alt="Screen" />';

elseif($p and file_exists('skrin/'.$basename.'.jpg'))

{$thumb= '<img class="tblimg img" src="skrin/'.$basename.'.jpg" width="60" height="70" alt="Screen" />';}
else $thumb=$dthumb;
//////////////////////////files listing function/////////////////////////// 

$fff= $glob_file[$i];

if ($fff[0] == '/') {

$fff=str_replace('/','_',$fff);  
$fx=urlencode($fff);
print $row.''.$thumb.'</td><td class="left"><a class="fileName" href="file'.$fx.'.html">'.str_replace('-',' ',$basename).' </a><br/>('.$filesize.')<br/>hits:&nbsp;'.$hit.'</td></tr>';

}

else {

$fff=str_replace('/','_',$fff);  
$fx=urlencode($fff);
print $row.''.$thumb.'</td><td class="left"><a class="fileName" href="file_'.$fx.'.html">'.$basename.' </a><br/>('.$filesize.')<br/>hits:&nbsp;'.$hit.'</td></tr>';

}

}

}

print '</tbody></table>';

//Pagination:///////////////////////////////////////////////////

if($countstr>1)

{echo '<div class="nav">page ('.$page.'/'.$countstr.')<br/>pages: ';
$dirx = str_replace('/','_',$dir);
$prev= $page - 1;
$next= $page + 1;
$nxtgap=$countstr - $next; if ($nxtgap>1) $pgnxtgap='<span class="navcurrent">..</span>'; 
$pregap=$prev - 1; if ($pregap>1) $pgpregap='<span class="navcurrent">..</span>'; 
$current='<span class="navcurrent">'.$page.'</span>';
if ($prev>0) $pgprev='<a class="page" href="wx_'.$dirx.'_'.$prev.'.html">'.$prev.'</a>';
if ($next<$countstr) $pgnext='<a class="page" href="wx_'.$dirx.'_'.$next.'.html">'.$next.'</a>';
if($page>2) $first='<a class="page" href="wx_'.$dirx.'_1.html">1</a>';
if($page<$countstr) $pglast='<a class="page" href="wx_'.$dirx.'_'.$countstr.'.html">'.$countstr.'</a>';
if ($countstr>1) echo $first.$pgpregap.$pgprev.$current.$pgnext.$pgnxtgap.$pglast;


echo '<br/><form action="indexw.php" method="get">Go to page:
<input type="hidden" name="dir" value="'.$dir.'">
<input type="text" name="page" size="3" value="'.$page.'">';

echo '<input type="submit" value="GO">
<br/></div>';
}

//Return to level up:////////////////////////////////////////

$dir_exp=explode('/',$dir);

if($dir)

{print '<br/><a href="indexw.php">Home</a>';}

if(($countj=count(explode('/',$dir)))>1)

{

$j=explode('/',$dir);

for($i=0; $i<=$countj; $i++)

{

$u=$j[count($j)-2];

if($u)

{

unset($j[count($j)-1]);

$g[$i]= '&#187; <a href="w_'.join('_', $j).'.html">'.transdir($u).'</a>';

}

}

for($i=count($g)-1; $i>=0; $i--)

{print $g[$i];}

print '<br/>';

}

//service menu
if(!$dir)
{require 'services.php';}

print '<div class="dl2">';require 'toplist.php';

print '</div><div class="dl2"><a href="indexpc.php"><button type="button">pc version</button></a></div>';

print $foot;

?>