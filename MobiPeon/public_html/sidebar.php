<?php
print '<div class="sfloat"></div>';
print '<div class="sidebar clear"><h1>Popular of the week</h1>';


$sql="SELECT * FROM home_menu ORDER BY timestamp DESC LIMIT 0,10;";
	$sites=MySQL_Query($sql);	
while($site=MySQL_Fetch_Array($sites))
	{
$id=$site['id'];
$type=$site['type'];
$timestamp=$site['timestamp'];
$mid=$site['mid'];


if($type=='1'){
if(file_exists('extra/thumb/mobile_thumb_'.$mid.'.png')){$thumb='/extra/thumb/mobile_thumb_'.$mid.'.png';}else{$thumb='/extra/image/defaults.png';}
}elseif ($type=='2') {
if(file_exists('extra/thumb/news_thumb_'.$mid.'.png')){$thumb='/extra/thumb/news_thumb_'.$mid.'.png';}else{$thumb='/extra/image/defaults.png';}
}

if($type=='1'){print '<div class="clear"><a href="/mobile_view-'.$mid.'-mobile-'.urlencode(read_sql_row($mid,'name','mobile')).'"><span class="sdimg"><amp-img src="'.$thumb.'" alt="'.urldecode(read_sql_row($mid,'name','mobile')).'" width="80" height="50"></amp-img></span><span class="sdtext">'.urldecode(read_sql_row($mid,'name','mobile')).'</span></a></div>';}elseif($type=='2'){

	print '<div class="clear"><a href="/news_view-'.$mid.'-news-'.urlencode(read_sql_row($mid,'title','news')).'"><span class="sdimg"><amp-img src="'.$thumb.'" alt="'.urldecode(read_sql_row($mid,'title','news')).'" width="80" height="50"></amp-img></span><span class="sdtext">'.urldecode(read_sql_row($mid,'title','news')).'</span></a></div>';
}

	$cou++;
}
print '</div>';

?>