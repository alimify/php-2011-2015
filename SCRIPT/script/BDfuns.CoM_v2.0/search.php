<?php

require 'config.php';

require 'core.php';

require 'func.php';

$basename=basename($glob_file[$i]);
$glob_file=glob("load/$dir/*.{{$allfile}}",GLOB_BRACE);

include('setup.php');
echo $head;
$search=htmlspecialchars($_GET['search']);
if(empty($search)){
echo ''.$foot.''; exit;}
function fullpath($dir){
$itemst=glob(''.$dir.'/*');
for ($i=0;$i<count($itemst); $i++)
{if(is_dir($itemst[$i])){
$more=glob(''.$itemst[$i].'/*');
$itemst = array_merge($itemst, $more);
}
}
return $itemst;
}
$fullpath=fullpath('load/');
$afullpath=array();
foreach($fullpath as $item){
$editing=stripos($item,$search);
if($editing!==false)
{

$afullpath[]=$item;

}
}
$page=strip_tags($_GET['page']);
if(empty($page)){$page=1;}
$item=($per*$page)-$per;
$count=count($afullpath)-1;
$yo=ceil($count/$per);
$end=$item+$per;
echo '<h2>Search Results - "'.$search.'"</h2>';
for($i=$item;$i<$end;$i++)
{ $aname=explode("/",$afullpath[$i]);
$aname=str_replace('_',' ',$aname);

if(is_file($afullpath[$i])) {
echo '<div class="even"><table cellspacing="0"><tr><td class="tblimg"><img class="tblimg img" src="./ext/'.substr($aname[count($aname)-1],-3).'.png"  width="60" height="70" alt="Screen" /></td><td class="left"><a class="fileName" <b><a href="file.php?file='.$afullpath[$i].'">'.$aname[count($aname)-1].'</a><br/>['.round(filesize($afullpath[$i])/1024).' Kb]</b></td></tr><table></div>'; }
if(is_dir($afullpath[$i])) { $afullpath[$i]=str_replace('load/','',$afullpath[$i]);
echo '<div class="odd"><a href="index.php?folder='.$afullpath[$i].'"><div><img src="./ext/arrow.gif"/> '.$aname[count($aname)-1].'</div></a></div>'; }
}

$prevpage=$page-1;
$nextpage=$page+1;
if($yo >= $page){$next='<a href="search.php?search='.$search.'&page='.$nextpage.'">Next ></a>';} else{$next="Next >";}
if($page > 1){$prev='<a href="search.php?search='.$search.'&page='.$prevpage.'">< Prev</a>';} else{$prev="< Prev";}
if($yo >= $page) { echo '<div class="dl2" align="left">Page ('.$page.'/'.$yo.')<br/>';
echo '<a href="search.php?search='.$search.'&page=1"><< First</a> | '.$prev.' | '.$next.' | <a href="search.php?search='.$search.'&page='.$yo.'">Last >></a><form method="get" action="search.php">Go to Page: <input type="hidden" name="search" value="'.$search.'"/><input type="text" name="page" value="'.$page.'" size="3"/><input type="submit" value="Go &#187;"/></form></div>'; }
echo $foot;

//////////////////////////////////////

$basename=basename($glob_file[$i]);



$file_extension=pathinfo(($glob_file[$i]), PATHINFO_EXTENSION);

$ext=$file_extension;

if(r($glob_file[$i])==$ext) $dthumb= '<img class="tblimg img" src="/ext/'.$ext.'.gif" alt="" />';





///////jpeg,jpg,gif,png,jar,thm,nth thumb maker///////////////////////////////////////////////////////////



if((r($glob_file[$i])=='jpeg' or r($glob_file[$i])=='gif'or r($glob_file[$i])=='jpg' or r($glob_file[$i])=='png') and $p)

$dthumb= '<img src="/pic.php?file='.$glob_file[$i].'" width="60" height="70" alt="Screen" /><br/>';



if(r($glob_file[$i])=='thm') $dthumb= '<img class="tblimg img" src="/thm.php?file='.$glob_file[$i].'" width="60" height="70" alt="" />';



if(r($glob_file[$i])=='nth')  $dthumb= '<img class="tblimg img" src="/nth.php?file='.$glob_file[$i].'" width="60" height="70" alt="" />';



if(r($glob_file[$i])=='jar') $dthumb= '<img class="tblimg img" src="/ic.php?file='.$glob_file[$i].'" width="60" height="70" alt="" />';



///////////////ffmpeg eneble video screen shot generator///////////////////////////////////////////

if ($ffmpeg=='1'){

if((r($glob_file[$i])=='3gp' or r($glob_file[$i])=='mp4' or r($glob_file[$i])=='avi') && extension_loaded('ffmpeg'))

$dthumb= '<img src="/ffmpeg.php?file='.$glob_file[$i].'" width="60" height="70" alt="" /><br />';}







//Screenshot//////////////////////////////////////////////////////////////////////////////////////



if($p and file_exists('skrin/'.$basename.'.gif'))



$thumb= '<img class="tblimg img" src="/skrin/'.$basename.'.gif" width="60" height="70" alt="Screen" />';



elseif($p and file_exists('skrin/'.$basename.'.jpg'))



{$thumb= '<img class="tblimg img" src="/skrin/'.$basename.'.jpg" width="60" height="70" alt="Screen" />';}

else $thumb=$dthumb;
?>
