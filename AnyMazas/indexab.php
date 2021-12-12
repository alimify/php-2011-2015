<?php
print 'We Are Working !';
exit;
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$title='AnyMaza.Com - The Space Of Free Download And Entertainment';
$pagedescription='Anymaza.com,free bollywood,tollywood,bangla,english mp3 and videos download,youtube video downloader';
$pagekeywords='anymaza,anymaza.com,bollywood,bangla,tollywood,english,hindi,mp3,music,songs,album,movie,mp4,3gp,anymaza,fusionbd,sumirbd,.mobi,.com';
$topextra='<div class="dj c1" align="center"><strong><a href="http://m.facebook.com/anymazapage">Like Us On Facebook</a></strong></div>';
include 'zz_css.php';
include 'zz_config.php';
print $head;
print '<div class="src src1 c1"><small>File Search</small><form action="http://google.com/m/search"><input type="text" name="q" size="15" maxlength="2048" value="" /><input type="hidden" name="as_sitesearch" value="AnyMaza.com" /><input type="submit" value="Search" /></form></div>';
if($adset=='1'){include 'ads/top.php';}
if($topfile=='on'){
print '<div class="foot">Top Files</div>';	
$tsfile ='topfile.txt';
$topfiles = implode('<br/>', file($tsfile));
echo $topfiles;
}
///Random File
if($random=='on'){
print '<div class="foot">Featured Files</div><div class="rlfile"><a href="http://anymaza.com/file3402-Firey-Aay-Tahsin-Porshi-mp3">Firey Aay ( Musafir ) By Tahsin,Porshi.mp3</a></div>';
$scount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM mydnld where frmt='mp3'"));
$pgsd=Ceil($scount[0]/4);
$psds=$pgsd-1;
$pgs=rand(1,$psds);
$lmt=$pgs*4;
	$sql="SELECT * FROM mydnld where frmt='mp3' ORDER BY id DESC LIMIT ".$lmt.", 4;";
	$sites=MySQL_Query($sql);
	while($site=MySQL_Fetch_Array($sites))
	{
$file = $site['nm'];
$rlname=basename($file);
$rlname = preg_replace("/\.[^.]+$/", "", $rlname);
$rlname= str_replace ("(AnyMaza.Com)", "", $rlname);
$rfile=$site['id'];
require_once('getid3/getid3.php');
$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($file);
getid3_lib::CopyTagsToComments($ThisFileInfo); 
$rltist = @$ThisFileInfo['comments_html']['artist'][0];
$rltist= str_replace ("[ AnyMaza.Com ]", "", $rltist);
if($rltist){$lartist= ' By '.$rltist.'';}
$rlname1= str_replace (" ", "-", $rlname);
$rltist1= str_replace (" ", "-", $rltist);
$rltist1= str_replace (",", "-", $rltist1);
print '<div class="rlfile"><a href="/file'.$rfile.'-'.$rlname1.'-'.$rltist1.'-mp3">'.$rlname.''.$lartist.'.mp3</a></div>';
	}
}
///End Random File
print '<div class="foot">..:: Latest Updates ::..</div><div class="rlfile"><a href="http://down3.ucweb.com/ucbrowser/en/?bid=444&pub=jlg%40jewel&title=&url=&version=2">Uc Browser 11.5.apk</a></div>';
include 'update.php';
print '<div id="cateogry">
<h1>Select Categories</h1>';
$sfile ='index.txt';
$index = implode('<br/>', file($sfile));
echo $index;
echo '</div>';
if($adset=='1'){include 'ads/bottom.php';}
print $foot;
?>