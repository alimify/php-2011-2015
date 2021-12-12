<?php
$ptk=$_GET['ptk'];
$order=$_GET['order'];
$q=$_GET['q'];
if(!$q){$q=anymaza;}
if($q=='anymaza'){$title='free videos download';}else{$title=$q;}
$q=urlencode($q);
if($q=='anymaza'){$qw='';}else{$qw=$q;}
if(!$order){$order='date';}
include 'css.php';
include'func.php';
$title = ucwords($title);
include 'config.php';
print $head;
///Grabing Start
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?type=video&q='.$qw.'&order='.$order.'&part=id,snippet&key=AIzaSyBbrMBEshNcBQg9TtegHSE4Vifl8krYbqo&maxResults=10&pageToken='.$ptk.'');
$json = json_decode($grab);
$total = $json->pageInfo->totalResults;
print '<div class="foot"><b>'.$title.' ( '.$total.' )</b></div>';
include 'ads/top.php';
///Search Box
print '<form method="get" action="/search.php"><input type="text" name="q"><br/><input type="submit" name="submit" value="Search"></form>';

print '<center>Sort By<br/>';
if($order=='date'){print 'New To Old';}else{print '<a href="/index/'.$q.'/order/date">New To Old</a>';}print ' | ';
if($order=='rating'){echo 'Rating';}else{print '<a href="/index/'.$q.'/order/rating">Rating</a>';}print ' | ';
if($order=='title'){echo 'A to Z';}else{print '<a href="/index/'.$q.'/order/title">A to Z</a>';}print ' | ';
if($order=='viewCount'){echo 'Most View';}else{print '<a href="/index/'.$q.'/order/viewCount">Most View</a>';}
print '</center>';

foreach($json->items as $data){
$id = $data->id->videoId;
$name = $data->snippet->title;
$thumb = $data->snippet->thumbnails->default->url;
$cid = $data->snippet->channelId;
$time = $data->snippet->publishedAt;
$time = strtotime($time);
$time = date('l, F jS Y \a\t g:ia', $time);
$channeltitle = $data->snippet->channelTitle;
$channeltitle = ucwords($channeltitle);
print '<div class="file"><table><tr><td><span class="thumb"><img src="'.$thumb.'" alt="tmb"/></span></td><td><a href="/view/'.$id.'">'.$name.'</a><br/>Release : '.$time.'<br/>By : <a href="/channel/'.$cid.'/order/date">'.$channeltitle.'</a></tr></table></div>';
}

///Page Token
print '<div class="paging" align="center"><b>';
$next = $json->nextPageToken;
$prev = $json->prevPageToken;
if($prev){print '<a href="/index/'.$q.'/order/'.$order.'/page/'.$prev.'">Previous</a>';}else{echo Previous;}
if($next){print '| <a href="/index/'.$q.'/order/'.$order.'/page/'.$next.'">Next</a>';}else{echo Next;}
print '</b></div>';
include 'ads/bottom.php';
///Grabing End
print '<form method="get" action="getvideo.php">Enter Youtube Video ID or URL<br/><input type="text" name="videoid"><br/><input type="submit" name="submit" value="Get Video"></form>';

print '<div class="rlfile">We do not host any files in our server. All files are hosted on youtube.com. If You have found a link to an illegal file please report to youtube.com. </div>';
print '<a href="/"><b>Home</b></a>';
print $foot;
?>