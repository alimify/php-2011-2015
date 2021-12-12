<?php
$q = $_GET['q'];
$title = $q;
if(!$title){$title = 'Free Video Downloads';}
$q = urlencode($q);
$ptk = $_GET['ptk'];
include 'css.php';
include'm_func.php';
print $head;
include 'head_ads.php';
///Search Box
print '<form method="get"><input type="text" name="q"><input type="submit" name="submit" value="Search"></form>';
include 'ads.php';
print '<div class="download"><div class="ititle"><b>'.$title.'</b></div>';
///Grabing Start
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?part=id,snippet&key=AIzaSyBbrMBEshNcBQg9TtegHSE4Vifl8krYbqo&maxResults=10&pageToken='.$ptk.'&q='.$q.'');
$json = json_decode($grab);
if($q){$total = $json->pageInfo->totalResults;
print 'Total '.$total.' items found!';}
foreach($json->items as $data){
$id = $data->id->videoId;
$name = $data->snippet->title;
$thumb = $data->snippet->thumbnails->default->url;
print '<div class="dlnk"><div class="thumb"><img src="'.$thumb.'" alt="tmb"/></div><a href="getvideo.php?videoid='.$id.'&ptk='.$ptk.'&type=Download&q='.$q.'">'.$name.'</a></div>';
}
include 'ads2.php';
///Page Token
print '<div class="paging" align="center"><b>';
$next = $json->nextPageToken;
$prev = $json->prevPageToken;
if($prev){print '<a href="?ptk='.$prev.'&q='.$q.'">Previous</a>';}else{echo Previous;}
if($next){print '| <a href="?ptk='.$next.'&q='.$q.'">Next</a>';}else{echo Next;}
print '</b></div>';
///Grabing End
print '</div>';
include 'foot_ads.php';
print '<a href="/"><b>Home</b></a>';
print $foot;
?>