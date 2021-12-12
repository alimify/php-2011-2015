<?php
include 'func.php';
$filetype=htmlspecialchars($_GET['filetype']);

$id=intval($_GET['id']);
if($id){
////Function	
$curl='http://get.downloader.pw/Json_file.php?id='.$id.'';
$grab=ngegrab($curl);
$json=json_decode($grab);
$bson=$json;
$url=$json->fileinfo->nm;
if(!$url){header('location:/');}
$t=$json->catinfo->listype;
$singer=$json->fileinfo->singer;
$catid=$json->fileinfo->catid;
$size=$json->fileinfo->size;
$disable=$json->fileinfo->disable;
$size64=$json->fileinfo->size64;
$size128=$json->fileinfo->size128;
$duration=$json->duration;
$screen=$json->screensize;
$lyrics=$json->lyrics;
$albums=$json->albums;
$msize=friendly_size($size);
$format=r($url);
$basename=basename($url);

if($format!==$filetype){$ename= str_replace ("_AnyMaza.Com", "", $basename);
$ename= str_replace ("_", " ", $ename);
$ename= str_replace ("-", " ", $ename);
$ename= str_replace ("(AnyMaza.Com)", "", $ename);
$ename= str_replace ("AnyMaza.Com", "", $ename);


$ename= str_replace ("-", "_", $ename);
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
$esinger= str_replace ("ft", "_", $esinger);header('location:/'.$format.'load_'.$ename.'_'.$esinger.'_'.$id.'');}

$basename = preg_replace("/\.[^.]+$/", "", $basename);
$basename= str_replace ("(AnyMaza.Com)", "", $basename);
$basename= str_replace ("_AnyMaza.Com", "", $basename);
$basename= str_replace ("_", " ", $basename);

$eartist= str_replace (" And ", ",", $singer);
$eartist= str_replace (" & ", ",", $eartist);
$eartist= str_replace ("& ", ",", $eartist);
$eartist= str_replace (" &", ",", $eartist);
$eartist= str_replace ("amp; ", "", $eartist);
$eartist= str_replace ("amp;", "", $eartist);
$eartist= str_replace (" ft ", ",", $eartist);
$eartist= str_replace (" Ft ", ",", $eartist);
$eartist= str_replace (" and ", ",", $eartist);
$eartist= str_replace (" feat ", ",", $eartist);
$eartist= str_replace (" feat. ", ",", $eartist);
$eartist= str_replace (" Feat. ", ",", $eartist);
$eartist= str_replace (" Feat ", ",", $eartist);
$eartist= str_replace (", ", ",", $eartist);
$eartist= str_replace (" ,", ",", $eartist);
$eartist= str_replace ("&", ",", $eartist);
$arraylist = explode(",", $eartist);

$artistib = $arraylist;
if($artistib[0]){$artisti[0]=' By '.$artistib[0].'';}
if($artistib[1]){$artisti[1]=' '.$artistib[1].'';
$artistis=' and '.$artisti[1].'';
}


$title=''.$basename.''.$artisti[0].''.$artisti[1].' '.$format.' Download';

if($singer){$artist=' By '.$singer.' ';}
if($format=='mp3'){$pagedescription=''.$basename.' '.$artist.' free full mp3 song download '.$albums.' 320kbps 192kbps 128KBPS 64KBPS zip';
$pagekeywords=''.$basename.','.$basename.' download,'.$basename.' mp3,'.$basename.' mp3 download,'.$basename.''.$artisti[0].','.$basename.''.$artisti[0].' mp3,'.$basename.''.$artisti[0].' download,'.$basename.''.$artisti[0].' mp3 download,'.$basename.''.$artisti[0].''.$artistis[1].' mp3,'.$albums.','.$artistib[0].' mp3,'.$artistib[0].' mp3 download,320kbps,128KBPS,64KBPS,zip,free,mp3,songs,download';}elseif($ext=='format'){$pagedescription=''.$basename.' free download for android mobile';$pagekeywords=''.$basename.','.$basename.' apk download,'.$basename.' free download';}


include 'css.php';
include 'config.php';

print $head;
echo '<div class="downloadpage">';
$bname=basename(dirname($url));
$bname= str_replace ("_", " ", $bname);
$ename= str_replace ("-", "_", $bname);
$ename= str_replace (" ", "_", $ename);
$ename= str_replace (")", "_", $ename);
$ename= str_replace ("(", "_", $ename);
$ename= str_replace (",", "_", $ename);
$ename= str_replace (".", "_", $ename);
$ename= str_replace ("&", "_", $ename);
$ename= str_replace ("'", "_", $ename);
$ename= str_replace ("ft", "_", $ename);
if($t=='1'){$ptype=cv;}elseif($t=='2'){$ptype=ca;}elseif($t=='3'){$ptype=cr;}elseif($t=='4'){$ptype=cw;}else{$ptype=c;}
if($format=='mp3'){print '<h2>'.$basename.''.$artist.' free mp3 song download '.$albums.' 320kbps,192kbps,128kbps,64kbps itunesrip Mp3 Songs</h2>';}

print '<div class="catback">Category : <a href="/'.$ptype.'_'.$catid.'_'.$ename.'">'.$bname.'</a></div>';
if($disable=='1'){print '<br/><b><font color="green">This Item Is Coming Soon !<br/>Please Wait...</font></b>';}else{
if($format=='mp3'){
#foreach ($arraylist as $keyid => $tagid ) {
#$linkartist= str_replace (" ", "_", $arraylist[$keyid]);
#$linkartist=strtolower($linkartist);	
# $linksing='<a href="/singer_'.$linkartist.'_mp3_songs">'.$arraylist[$keyid].'</a>,';
#}

print '<b>Duration : </b>'.$duration.' sec';
print ads($adsmiddle);
if($lyrics){
$lname= str_replace ("-", "_", $basename);
$lname= str_replace (" ", "_", $lname);
$lname= str_replace (")", "_", $lname);
$lname= str_replace ("(", "_", $lname);
$lname= str_replace (",", "_", $lname);
$lname= str_replace (".", "_", $lname);
$lname= str_replace ("&", "_", $lname);
$lname= str_replace ("'", "_", $lname);
$lname= str_replace ("ft", "_", $lname);
$lsinger= str_replace ("-", "_", $singer);
$lsinger= str_replace (" ", "_", $lsinger);
$lsinger= str_replace (")", "_", $lsinger);
$lsinger= str_replace ("(", "_", $lsinger);
$lsinger= str_replace (",", "_", $lsinger);
$lsinger= str_replace (".", "_", $lsinger);
$lsinger= str_replace ("&", "_", $lsinger);
$lsinger= str_replace ("'", "_", $lsinger);
$lsinger= str_replace ("ft", "_", $lsinger);
	print '<br/>Read : <a href="http://wapsmsbd.com/lyrics_'.$lname.'_'.$lsinger.'_'.$id.'"><b>Lyrics Of This Song</b></a>';}
echo '<div class="downloader">';
if($size && !$size64 && !$size128){print 'Filesize : '.friendly_size($size).'';}else{print 'Select Format & Download';}
if($size64){print '<br/><a href="http://get.downloader.pw/downloader/id/'.$id.'/type/64">64KBPS</a> - '.friendly_size($size64).'';}
if($size128){print '<br/><a href="http://get.downloader.pw/downloader/id/'.$id.'/type/128">128KBPS</a> - '.friendly_size($size128).'';}
if($size && $size64 && $size128){print '<br/><a href="http://get.downloader.pw/downloader/id/'.$id.'/type/1">320 KBPS</a> - '.friendly_size($size).'';}elseif($size && $size64){print '<br/><a href="http://get.downloader.pw/downloader/id/'.$id.'/type/1">128KBPS</a> - '.friendly_size($size).'';}elseif($size && !$size64 && !$size128){print '<br/><a href="http://get.downloader.pw/downloader/id/'.$id.'/type/1">Download Now</a>';}
echo '</div>';

if($singer){print 'Singer<br/>';foreach ($arraylist as $keyid => $tagid ) {
$linkartist= str_replace (" ", "_", $arraylist[$keyid]);
$linkartist=strtolower($linkartist);	
 echo '<a href="/singer_'.$linkartist.'_mp3_songs">'.$arraylist[$keyid].'</a><br/>';
}}
}elseif($format=='mp4' or $format=='3gp'){

	print '<center><img src="http://get.downloader.pw/icon.php?id='.$id.'"/>'.ads($adsmiddle).'<b>&#9679; Duration: </b>'.$duration.' sec</br><strong>&#9679; Resolution:</strong> '.$screen.'<br/>File Size : '.$msize.'<br/><a href="http://get.downloader.pw/downloader/id/'.$id.'/type/1"><b>Download Now !</b></a></center>';

}
}
echo '</div>';
if($lyrics){$lyricyes='Lyrics';}
if($format=='mp3'){
echo '<div class="tags">Tags : <i>'.$basename.','.$basename.''.$artist.' mp3,'.$albums.' mp3 songs download</i>,'.$basename.' mp3 download,'.$basename.''.$singer.' mp3 free full song download now faster,'.$basename.' song download,'.$basename.' free download,'.$basename.' download now,'.$albums.' free song,'.$basename.' '.$lyricyes.',free '.$basename.' mp3 download,'.$basename.' mp3 free full song download now,'.$basename.''.$artist.' free itunes rip,webrip,cdrip,hq,lq,high quality,low quality,medium quality,320kbps,192kbps,128kbps,64kbps,all quality,song download,'.$lbum.' all songs download,'.$lbum.' full album download,'.$lbum.' album all songs download,'.$rtist.' all songs download,'.$rtist.' mp3 download,welcome tune code</div>';}


print $foot;
}else{print 'input error !';}


?>