<?php
include 'func.php';
$frtype=intval($_GET['frtype']);
$pid=intval($_GET['pid']);
$sort=intval($_GET['sort']);
$page=intval($_GET['page']);
if(!$pid){$pid=0;}
$grab=ngegrab('http://get.downloader.pw/Json_List.php?pid='.$pid.'&page='.$page.'&sort='.$sort.'&gid=1');
$json = json_decode($grab);
$bson=$json;
$foldernumber=$json->foldercounts;
$filenumber=$json->filecounts;
$url=$json->pageInfo->folderurl;
$zip=$json->pageInfo->zip;
$descf=$json->description;
$t=$json->pageInfo->listype;
$t=intval($t);
$vfthumb=$json->pageInfo->videofolder;
$fart=$json->pageInfo->albumart;

$title=basename($url);
if(!$title){$title='Free Downloads';}
$title= str_replace ("_", " ", $title);

$uname= str_replace ("-", "_", $title);
$uname= str_replace (" ", "_", $uname);
$uname= str_replace (")", "_", $uname);
$uname= str_replace ("(", "_", $uname);
$uname= str_replace (",", "_", $uname);
$uname= str_replace (".", "_", $uname);
$uname= str_replace ("&", "_", $uname);
$uname= str_replace ("'", "_", $uname);
$uname= str_replace ("ft", "_", $uname);

if($t=='1'){$ptype=cv;}elseif($t=='2'){$ptype=ca;}elseif($t=='3'){$ptype=cr;}elseif($t=='4'){$ptype=cw;}else{$ptype=c;}

if($frtype!==$t){
header('location:/'.$ptype.'_'.$pid.'_'.$uname.'');
exit;
 }

///SEO
$name=$title;
if($sort){$tsort='-A to Z';}
$tbpage=$page+1;
if($page){$tpage='-'.$tbpage.'';}

if($t=='2'){$pagedescription=''.$name.',apk free download,android free download,'.$name.' apk download,'.$name.' android download';$pagekeywords=''.$name.',apk free download,android free download,'.$name.' apk download,'.$name.' android download,'.$name.' apk free download,'.$name.' android free download';}elseif($t=='3'){$pagedescription=''.$name.',free ringtone,ringtone download,'.$name.' ringtone download,download '.$name.' ringtone,play '.$name.' ringtone';$pagekeywords=''.$name.',free ringtone,ringtone download,'.$name.' ringtone download,download '.$name.' ringtone,play '.$name.' ringtone';}elseif($t=='4'){$pagedescription=''.$name.','.$name.' wallpaper,'.$name.' 1st look,'.$name.' poster,'.$name.' photo,'.$name.' picture,'.$name.' download';$pagekeywords=''.$name.','.$name.' wallpaper,'.$name.' 1st look,'.$name.' poster,'.$name.' photo,'.$name.' picture,'.$name.' download';}elseif(!$t){$pagedescription=''.$name.',320kbps,192kbps,128kbps,64kbps zip itunesrip '.$name.' free mp3 song download';
$pagekeywords=''.$name.',320kbps,192kbps,128kbps,64kbps,itunesrip,zip,'.$name.',mp3,download';}
///Function


include 'css.php';
include 'config.php';

///Ceil Count
if($foldernumber){$countstr=ceil($foldernumber/$folderlist);}
if($filenumber){$countstr=ceil($filenumber/$filelist);}


print $head;


if($vfthumb=='1'){print '<p class="showimage"><img class="absmiddle" src="http://get.downloader.pw/file/fthumb/'.$pid.'.jpg"/></p>';}elseif($fart=='1'){print '<p class="showimage"><img class="absmiddle" src="http://get.downloader.pw/pic.php?file=file/'.$pid.'.jpg"/><div class="posterlink"><a href="http://get.downloader.pw/file/'.$pid.'.jpg">Download This Poster</a></div></p>';}
print ads('ads/middle.txt');
if($sort=='1'){$sorting='<a href="/'.$ptype.'_'.$pid.'_'.$uname.'">New To Old</a> | <span>A to Z</span>';}else{$sorting='<span>New to Old</span> | <a href="/'.$ptype.'_'.$pid.'_'.$uname.'_s1">A to Z</a>';}
print '<div class="dtype">'.$sorting.'</div>';

////FolderList
if($t=='1'){}elseif($t=='2'){ $hinfo = "$title android free download $title apk free download"; }elseif($t=='3'){$hinfo = "$title ringtone free download,$title mp3 ringtone caller tune free download"; }elseif($t=='4'){ $hinfo = "$title wallpaper free download $title 1st look photo free download"; }else{$hinfo = "$title 320kbps,192kbps,128kbps,64kbps,zip $title mp3 songs free download"; }



if($t!=='1'){print '<h2>'.$hinfo.'</h2>';}

if($zip=='1'){print '<div class="trzip"><a href="http://get.downloader.pw/zipper.php?id='.$pid.'">Download Zipped Full Album</a><br><div class="tryes">Track List & Download Link</div></div>';}

foreach($json->folder as $data){
$id = $data->folderid;
$type = $data->listype;
$url = $data->folderurl;
$name = basename($url);
$name= str_replace ("_", " ", $name);


$ename= str_replace ("-", "_", $name);
$ename= str_replace (" ", "_", $ename);
$ename= str_replace (")", "_", $ename);
$ename= str_replace ("(", "_", $ename);
$ename= str_replace (",", "_", $ename);
$ename= str_replace (".", "_", $ename);
$ename= str_replace ("&", "_", $ename);
$ename= str_replace ("'", "_", $ename);
$ename= str_replace ("ft", "_", $ename);


if($id && $name && $url){if($type=='1'){print '<div class="catRow"><a href="/cv_'.$id.'_'.$ename.'">'.$name.'</a></div>';}elseif($type=='2'){print '<div class="catRow"><a href="/ca_'.$id.'_'.$ename.'">'.$name.'</a></div>';}elseif($type=='3'){print '<div class="catRow"><a href="/cr_'.$id.'_'.$ename.'">'.$name.'</a></div>';}elseif($type=='4'){print '<div class="catRow"><a href="/cw_'.$id.'_'.$ename.'">'.$name.'</a></div>';}else{print '<div class="catRow"><a href="/c_'.$id.'_'.$ename.'">'.$name.'</a></div>';}}
}


foreach($json->file as $filelist){
$id = $filelist->id;
$url = $filelist->nm;
$singer = $filelist->singer;
$hits = $filelist->dload;
$size = $filelist->size;
$size64 = $filelist->size64;
$size128 = $filelist->size128;
if($size64){$size=$size64;}elseif($size128){$size=$size128;}else{$size=$size;}
$size=friendly_size($size);

$mimetype=r($url);
$name = basename($url);
$name= str_replace ("_AnyMaza.Com", "", $name);
$name= str_replace ("_", " ", $name);
$name= str_replace ("-", " ", $name);
$name= str_replace ("(AnyMaza.Com)", "", $name);
$name= str_replace ("AnyMaza.Com", "", $name);


$ename= str_replace ("-", "_", $name);
$ename= str_replace (" ", "_", $ename);
$ename= str_replace (")", "_", $ename);
$ename= str_replace ("(", "_", $ename);
$ename= str_replace (",", "_", $ename);
$ename= str_replace (".", "_", $ename);
$ename= str_replace ("&", "_", $ename);
$ename= str_replace ("'", "_", $ename);
$ename= str_replace ("ft", "_", $ename);

$esinger= str_replace ("-", "_", $singer);
$esinger= str_replace (" ", "_", $esinger);
$esinger= str_replace (")", "_", $esinger);
$esinger= str_replace ("(", "_", $esinger);
$esinger= str_replace (",", "_", $esinger);
$esinger= str_replace (".", "_", $esinger);
$esinger= str_replace ("&", "_", $esinger);
$esinger= str_replace ("'", "_", $esinger);
$esinger= str_replace ("ft", "_", $esinger);
if($singer){$singer='<br/><span class="ar">'.$singer.'</span>';}
if($id && $url && $name){print '<div class="fl even"><a class="fileName" href="/'.$mimetype.'load_'.$ename.'_'.$esinger.'_'.$id.'"><div>'.$name.''.$singer.'<br/><span>'.$size.'</span> | <span>'.$hitss.'</span></div></a></div>';}
}

///Paging & Jump Box
if($countstr>1){
$ftype=$ptype;
print '<div class="pgn">';
$getpnum='<div>Page ('.($page+1).'/'.$countstr.')</div>';
if($countstr>1 and !$sort)
{print nav_page($countstr,$ftype,$pid,$uname,$page,'index'); print $getpnum; echo '<form action="/jump.php" method="get">Jump to Page<input type="text" name="jump" size="4"><input type="hidden" name="jid" value="'.$pid.'"><input type="submit" name="submit" value="Jump"></form>';}
if($countstr>1 and $sort=='1')
{print nav_srtpage($countstr,$ftype,$pid,$uname,$page,'index'); print $getpnum; echo '<form action="/jump.php" method="get">Jump to Page<input type="text" name="jump" size="4"><input type="hidden" name="sort" value="1"><input type="hidden" name="jid" value="'.$pid.'"><input type="submit" name="submit" value="Jump"></form>';}
print '</div>';}
////Function
if($t=='1'){print $vltags;}elseif($t=='2'){print $altags;}elseif($t=='3'){print $rltags;}elseif($t=='4'){print $wltags;}else{print $mltags;}
print $foot;
?>