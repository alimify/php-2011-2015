<?php
$type=$_GET['type'];
$id=$_GET['id'];
$name=$_GET['name'];
$page=$_GET['page'];
include 'head.php';
if(!$name){$name = Bollywood_Movie_Videos;}
$name=str_replace('_',' ',$name);	
print '<title>'.$name.'</title></head>
<body><div class="head">AnyMaza.Com</div>';
include 'ads.php';
print '<div class="download">';

if(!$page){
$sv = ''.$type.'/'.$id.'/'.$name.'.html';}else{$sv = ''.$type.'/'.$id.'/page/'.page.'/'.$name.'.html';}

$link='http://new.lubju.com/'.$sv;
$ch = curl_init();
$url=$link;
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER,'http://www.google.com');
@curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
$store = curl_exec ($ch);
curl_close($ch);

preg_match_all('|<a href="http://downloads.vipkhan.com/files/(.*?)">Download</a>|is',$store,$dlink);
$downlnk = ''.$dlink[1][0].'';
$dxt=pathinfo(($downlnk), PATHINFO_EXTENSION);
if($dxt){$ext = '.'.$dxt.'';}
print '<div class="ftitle">'.$name.''.$ext.'</div>';
preg_match_all('|<div class="file(.*?)</div>|is',$store,$outs);
foreach($outs[0] as $out){
$out=str_replace('http://downloads.vipkhan.com/prev.php','/extra/bollyprev.php',$out);	
$out=str_replace('http://new.lubju.com/','/extra/bolly/',$out);	
$out=str_replace('_odd','',$out);
echo $out;
}

if($downlnk){
preg_match_all('|<div class="link">Size: <span>(.*?)</span></div>|is',$store,$dfsize);
$size = ''.$dfsize[1][0].'';	
$downlnk=str_replace('VipKHAN','AnyMaza',$downlnk);	
	
	print '<img src="http://anymaza.com/extra/bollyprev.php?id='.$id.'" alt="'.$name.'"/><br/>
	<a href="http://anymaza.com/extra/bollyload.php?file='.$downlnk.'">Download Now ('.$size.')</a>
	';

}

///paging
preg_match_all('|<div class="pageNav">(.*?)</div>|is',$store,$pagei);
$paging = ''.$pagei[1][0].'';
$paging=str_replace('http://new.lubju.com/','/extra/bolly/',$paging);
echo $paging;
if($outs[o] or $downlnk or $paging){}else{print '<div class="file"><a href="http://anymaza.com/extra/bolly/download/13797/3gp.html">Bollywood 3gp Videos</a></div><div class="file"><a href="http://anymaza.com/extra/bolly/download/13889/Mp4.html">Bollywood Mp4 Video</a></div><div class="file"><a href="http://anymaza.com/extra/bolly/download/30808/Mp4_HR.html">Bollywood HQ Mp4 Video</a></div><div class="file"><a href="http://anymaza.com/extra/hdb/home/7/Bollywood__Videos_Full_HD.html">Bollywood Full HD Videos</a></div><div class="file"><a href="http://anymaza.com/extra/hdb/home/5/Bollywood_Videos_HD.html">Bollywood HD Videos</a></div>';}


echo '</div>';
include 'ads2.php';
print '<div class="path"><a href="http://anymaza.com"><b>Home</b></a> | <a href="http://anymaza.com/extra/bolly.php"><b>Bollywood Movie Videos</b></a></div>';
include 'foot.php';
?>