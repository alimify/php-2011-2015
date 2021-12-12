<?php
$ptk=$_GET['ptk'];
$order=$_GET['order'];
$channel=$_GET['channel'];
include 'css.php';
include'func.php';
$tt=ngegrab('https://www.googleapis.com/youtube/v3/channels?part=snippet&id='.$channel.'&key=AIzaSyBbrMBEshNcBQg9TtegHSE4Vifl8krYbqo');
$tson = json_decode($tt);
foreach($tson->items as $tdata){
$title = $tdata->snippet->title;
$title = ucwords($title);
}
include 'config.php';
print $head;
///Grabing Start
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?type=video&channelId='.$channel.'&order='.$order.'&part=id,snippet&key=AIzaSyBbrMBEshNcBQg9TtegHSE4Vifl8krYbqo&maxResults=10&pageToken='.$ptk.'');
$json = json_decode($grab);
$total = $json->pageInfo->totalResults;
print '<div class="foot"><b>'.$title.' ( '.$total.' )</b></div>';
include 'ads/top.php';
print '<center>Sort By<br/>';
if($order=='date'){print 'New To Old';}else{print '<a href="/channel/'.$channel.'/order/date">New To Old</a>';}print ' | ';
if($order=='rating'){echo 'Rating';}else{print '<a href="/channel/'.$channel.'/order/rating">Rating</a>';}print ' | ';
if($order=='title'){echo 'A to Z';}else{print '<a href="/channel/'.$channel.'/order/title">A to Z</a>';}print ' | ';
if($order=='viewCount'){echo 'Most View';}else{print '<a href="/channel/'.$channel.'/order/viewCount">Most View</a>';}
print '</center>';

foreach($json->items as $data){
$id = $data->id->videoId;
$name = $data->snippet->title;
$thumb = $data->snippet->thumbnails->default->url;
$cid = $data->snippet->channelId;
$channeltitle = $data->snippet->channelTitle;
$channeltitle = ucwords($channeltitle);
$time = $data->snippet->publishedAt;
$time = strtotime($time);
$time = date('l, F jS Y \a\t g:ia', $time);
print '<div class="file"><table><tr><td><span class="thumb"><img src="'.$thumb.'" alt="tmb"/></span></td><td><a href="/view/'.$id.'">'.$name.'</a><br/>Release : '.$time.'<br/>By : <a href="/channel/'.$cid.'/order/date">'.$channeltitle.'</a></tr></table></div>';
}

///Page Token
print '<div class="paging" align="center"><b>';
$next = $json->nextPageToken;
$prev = $json->prevPageToken;
if($prev){print '<a href="/channel/'.$channel.'/order/'.$order.'/page/'.$prev.'">Previous</a>';}else{echo Previous;}
if($next){print '| <a href="/channel/'.$channel.'/order/'.$order.'/page/'.$next.'">Next</a>';}else{echo Next;}
print '</b></div>';
include 'ads/bottom.php';
///Grabing End
print '<div class="rlfile">We do not host any files in our server. All files are hosted on youtube.com. If You have found a link to an illegal file please report to youtube.com. </div>';
print '<a href="/"><b>Home</b></a>';
print $foot;
?>