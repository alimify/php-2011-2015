<?php
include 'db.php';
include 'config.php';
include 'func.php';
$mobile_id=intval($_GET['mobile_id']);
$mobile_name=read_sql_row($mobile_id,'name','mobile');
$brand_id=read_sql_row($mobile_id,'brand_id','mobile');
$brand_name=read_sql_row($brand_id,'name','brand');
$mobile_price=read_sql_row($mobile_id,'price','mobile');
$mobile_camera=read_sql_row($mobile_id,'camera','mobile');
$mobile_internet=read_sql_row($mobile_id,'internet','mobile');
$mobile_radio=read_sql_row($mobile_id,'radio','mobile');
$mobile_audio_player=read_sql_row($mobile_id,'audio_player','mobile');
$mobile_video_player=read_sql_row($mobile_id,'video_player','mobile');
$mobile_release_date=read_sql_row($mobile_id,'release_date','mobile');
$mobile_memory=read_sql_row($mobile_id,'memory','mobile');
$mobile_memory_slot=read_sql_row($mobile_id,'memory_slot','mobile');
$mobile_bluetooth=read_sql_row($mobile_id,'bluetooth','mobile');
$mobile_usb=read_sql_row($mobile_id,'usb','mobile');
$mobile_infrared=read_sql_row($mobile_id,'infrared','mobile');
$mobile_weight=read_sql_row($mobile_id,'weight','mobile');
$mobile_status=read_sql_row($mobile_id,'status','mobile');
$mobile_display=read_sql_row($mobile_id,'display','mobile');
$mobile_talk_time=read_sql_row($mobile_id,'talk_time','mobile');
$mobile_stand_by=read_sql_row($mobile_id,'stand_by','mobile');
$mobile_browser=read_sql_row($mobile_id,'browser','mobile');
$mobile_java=read_sql_row($mobile_id,'java','mobile');
$mobile_other_feat=read_sql_row($mobile_id,'other_feat','mobile');
$mobile_timestamp=read_sql_row($mobile_id,'timestamp','mobile');
$admin_l=admin_check($type,$admin,$password);

$page_title= urldecode(read_sql_row($brand_id,'name','brand')).' - '.urldecode($mobile_name).' Configuration And Review';


if($admin_l=='1'){$edit_mobile='<div class="center"><a href="/edit_mobile.php?mobile_id='.$mobile_id.'"><b>Edit Mobile</b></a></div>';}



include 'head.php';


print '<div class="main_content clear">';

if($mobile_name){print '<h1>'.urldecode($mobile_name).' Configuration And Review'.$edit_mobile.'</h1>';}



print '<a href="/more_brand">All Brand</a> | <a href="/mobile">All Mobile</a>';
if(!$mobile_name){print $notification;}
if(file_exists('extra/art/mobile_art_'.$mobile_id.'.jpg')){$thumb='/extra/art/mobile_art_'.$mobile_id.'.jpg';
print '<div class="mimg"><amp-img src="'.$thumb.'" height="400" width="250"></amp-img>
    </div>';
}


print '<div class="mobile_data">';
if($mobile_price){print '<div><span class="dataj"><span class="dataj1">Price </span><p class="dataj2">'.urldecode($mobile_price).'</p></span></div>';}

if($brand_name && $brand_id){print '<div><span class="dataj"><span class="dataj1">Brand </span><p class="dataj2"><a href="/mobile/brand/'.urlencode($brand_name).'/'.$brand_id.'">'.$brand_name.'</a></p></span></div>';}

if($mobile_camera){print '<div><span class="dataj"><span class="dataj1">Camera</span><p class="dataj2">'.urldecode($mobile_camera).'</p></span></div>';}

if($mobile_internet){print '<div><span class="dataj"><span class="dataj1">Internet</span><p class="dataj2">'.urldecode($mobile_internet).'</p></span></div>';}

if($mobile_radio){print '<div><span class="dataj"><span class="dataj1">Radio</span><p class="dataj2">'.urldecode($mobile_radio).'</p></span></div>';}

if($mobile_audio_player){print '<div><span class="dataj"><span class="dataj1">Audio Player</span><p class="dataj2">'.urldecode($mobile_audio_player).'</p></span></div>';}

if($mobile_video_player){print '<div><span class="dataj"><span class="dataj1">Video Player</span><p class="dataj2">'.urldecode($mobile_video_player).'</p></span></div>';}

if($mobile_release_date){print '<div><span class="dataj"><span class="dataj1">First Arrival</span><p class="dataj2">'.urldecode($mobile_release_date).'</p></span></div>';}

if($mobile_memory){print '<div><span class="dataj"><span class="dataj1">Memory</span><p class="dataj2">'.urldecode($mobile_memory).'</p></span></div>';}

if($mobile_memory_slot){print '<div><span class="dataj"><span class="dataj1">Memory Slot</span><p class="dataj2">'.urldecode($mobile_memory_slot).'</p></span></div>';}

if($mobile_bluetooth){print '<div><span class="dataj"><span class="dataj1">Bluetooth</span><p class="dataj2">'.urldecode($mobile_bluetooth).'</p></span></div>';}

if($mobile_usb){print '<div><span class="dataj"><span class="dataj1">USB</span><p class="dataj2">'.urldecode($mobile_usb).'</p></span></div>';}

if($mobile_infrared){print '<div><span class="dataj"><span class="dataj1">Infrared</span><p class="dataj2">'.urldecode($mobile_infrared).'</p></span></div>';}

if($mobile_weight){print '<div><span class="dataj"><span class="dataj1">Weight</span><p class="dataj2">'.urldecode($mobile_weight).'</p></span></div>';}

if($mobile_status){print '<div><span class="dataj"><span class="dataj1">Status</span><p class="dataj2">'.urldecode($mobile_status).'</p></span></div>';}

if($mobile_display){print '<div><span class="dataj"><span class="dataj1">Display</span><p class="dataj2">'.urldecode($mobile_display).'</p></span></div>';}

if($mobile_talk_time){print '<div><span class="dataj"><span class="dataj1">Talk Time</span><p class="dataj2">'.urldecode($mobile_talk_time).'</p></span></div>';}

if($mobile_stand_by){print '<div><span class="dataj"><span class="dataj1">Stand By</span><p class="dataj2">'.urldecode($mobile_stand_by).'</p></span></div>';}

if($mobile_browser){print '<div><span class="dataj"><span class="dataj1">Browser</span><p class="dataj2">'.urldecode($mobile_browser).'</p></span></div>';}

if($mobile_java){print '<div><span class="dataj"><span class="dataj1">Java</span><p class="dataj2">'.urldecode($mobile_java).'</p></span></div>';}

if($mobile_other_feat){print '<div><span class="dataj"><span class="dataj1">Other Features</span><p class="dataj2">'.urldecode($mobile_other_feat).'</p></span></div>';}


print '</div></div>';



include 'sidebar.php';
include 'foot.php';
?>