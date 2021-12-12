<?php
include 'func.php';
$singer=htmlspecialchars($_GET['singer']);
$singers=urlencode($singer);
$singers= str_replace (" ", "_", $singers);
$singer= str_replace ("_", " ", $singer);
$singer=ucwords($singer);
$page=intval($_GET['page']);
$title=''.$singer.' All Mp3 Songs';
$pagedescription=''.$singer.' all album mp3 songs free download,'.$singer.' latest updated new and old songs collection';
$pagekeywords=''.$singer.','.$singer.' mp3,'.$singer.' mp3 songs,'.$singer.' album,'.$singer.' new songs,'.$singer.' old songs,'.$singer.' mp3 download,'.$singer.' free songs,'.$singer.' download,'.$singer.' all mp3 songs,'.$singer.' all mp3 songs download,'.$singer.' new mp3 songs download';

$curl='http://get.downloader.pw/Json_Singer.php?singer='.$singers.'&filelist=8&page='.$page.'';


$grab=file_get_contents($curl);
$json=json_decode($grab);
$count =$json->count;
$countstr=ceil($count/8);
include 'css.php';
include 'config.php';

print $head;

foreach($json->singerdata as $filelist){
$id = $filelist->id;
$url = $filelist->nm;
$eesinger = $filelist->singer;
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

$esinger= str_replace ("-", "_", $eesinger);
$esinger= str_replace (" ", "_", $esinger);
$esinger= str_replace (")", "_", $esinger);
$esinger= str_replace ("(", "_", $esinger);
$esinger= str_replace (",", "_", $esinger);
$esinger= str_replace (".", "_", $esinger);
$esinger= str_replace ("&", "_", $esinger);
$esinger= str_replace ("'", "_", $esinger);
$esinger= str_replace ("ft", "_", $esinger);
if($eesinger){$eesinger='<br/><span class="ar">'.$eesinger.'</span>';}
if($id && $url && $name){print '<div class="fl even"><a class="fileName" href="/'.$mimetype.'load_'.$ename.'_'.$esinger.'_'.$id.'"><div>'.$name.''.$eesinger.'<br/><span>'.$size.'</span> | <span>'.$hitss.'</span></div></a></div>';}
}

echo '<div class="pgn">';
print nav_sngr($countstr,$singers,$page);
$pages=$page+1;
echo 'Page ('.$pages.'/'.$countstr.')</div>';

print '<div class="tags"><i>Tags : '.$singer.' mp3 songs download,Singer '.$singer.' All Mp3 Songs Collection is here latest old new unreleased all high quality low quality medium quality all songs download free '.$singer.' mp3 songs downoad itunesrip new songs '.$singer.' mp3 songs,download your favourite singer '.$singer.' mp3 songs free</i></div>';
print $foot;
?>