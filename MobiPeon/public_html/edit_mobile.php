<?php
$page_title='Edit Mobile';
include 'db.php';
include 'config.php';
include 'func.php';
admin_check('1',$admin,$password);
$mobile_id=intval($_GET['mobile_id']);
print $top;
print '<div class="smslist"><h1 class="center">Edit Mobile</h1><div class="admin_content">';
print update_sql_row($mobile_id,'brand_id','mobile',urlencode($_POST['brand_id']));
print update_sql_row($mobile_id,'name','mobile',urlencode($_POST['mobile_name']));
print update_sql_row($mobile_id,'price','mobile',urlencode($_POST['mobile_price']));
print update_sql_row($mobile_id,'camera','mobile',urlencode($_POST['mobile_camera']));
print update_sql_row($mobile_id,'internet','mobile',urlencode($_POST['mobile_internet']));
print update_sql_row($mobile_id,'radio','mobile',urlencode($_POST['mobile_radio']));
print update_sql_row($mobile_id,'audio_player','mobile',urlencode($_POST['mobile_audio_player']));
print update_sql_row($mobile_id,'video_player','mobile',urlencode($_POST['mobile_video_player']));
print update_sql_row($mobile_id,'release_date','mobile',urlencode($_POST['mobile_release_date']));
print update_sql_row($mobile_id,'memory','mobile',urlencode($_POST['mobile_memory']));
print update_sql_row($mobile_id,'memory_slot','mobile',urlencode($_POST['mobile_memory_slot']));
print update_sql_row($mobile_id,'bluetooth','mobile',urlencode($_POST['mobile_bluetooth']));
print update_sql_row($mobile_id,'usb','mobile',urlencode($_POST['mobile_usb']));
print update_sql_row($mobile_id,'infrared','mobile',urlencode($_POST['mobile_infrared']));
print update_sql_row($mobile_id,'weight','mobile',urlencode($_POST['mobile_weight']));
print update_sql_row($mobile_id,'status','mobile',urlencode($_POST['mobile_status']));
print update_sql_row($mobile_id,'display','mobile',urlencode($_POST['mobile_display']));
print update_sql_row($mobile_id,'talk_time','mobile',urlencode($_POST['mobile_talk_time']));
print update_sql_row($mobile_id,'stand_by','mobile',urlencode($_POST['mobile_stand_by']));
print update_sql_row($mobile_id,'browser','mobile',urlencode($_POST['mobile_browser']));
print update_sql_row($mobile_id,'java','mobile',urlencode($_POST['mobile_java']));
print update_sql_row($mobile_id,'other_feat','mobile',urlencode($_POST['mobile_other_feat']));
print update_sql_row($mobile_id,'publish','mobile',urlencode($_POST['mobile_publish']));
print update_sql_row(read_home_row($mobile_id,'1'),'tags','home_menu',urlencode($_POST['mobile_tags']));
print add_action_form('','post');
if(read_sql_row($mobile_id,'publish','mobile')=='1'){$pvalue=2;$psubmit=Unpublish;}else{$pvalue=1;$psubmit=Publish;}
print '<input type="hidden" name="mobile_publish" value="'.$pvalue.'">';
print add_submit_form('mobile_publish_submit',$psubmit);
print '<form action="imgup.php" method="post"><input type="hidden" name="id" value="'.$mobile_id.'">Art Url :<br/><input type="text" name="url" value=""><br/><input type="submit" name="arturl" value="submit"></form>';
print '<form action="imgup.php" method="post" enctype="multipart/form-data"><input type="hidden" name="id" value="'.$mobile_id.'">
    Select Art:<br/>
    <input type="file" name="art" id="art"><br/>
    <input type="submit" value="Upload" name="asubmit">
</form>';
print '<form action="imgup.php" method="post"><input type="hidden" name="id" value="'.$mobile_id.'">Thumb Url :<br/><input type="text" name="url" value=""><br/><input type="submit" name="thurl" value="submit"></form>';
print '<form action="imgup.php" method="post" enctype="multipart/form-data"><input type="hidden" name="id" value="'.$mobile_id.'">
    Select Thumbnail:<br/>
    <input type="file" name="thumb" id="thumb"><br/>
    <input type="submit" value="Upload" name="tsubmit">
</form>';
print add_action_form('','post');
print add_input_form('Mobile Name','mobile_name',urldecode(read_sql_row($mobile_id,'name','mobile')));
print add_submit_form('mobile_name_submit','Edit Mobile Name');
print add_action_form('','post');
print add_input_form('Mobile Price','mobile_price',urldecode(read_sql_row($mobile_id,'price','mobile')));
print add_submit_form('mobile_price_submit','Edit Mobile Price');
print add_action_form('','post');
print add_input_form('Mobile Camera','mobile_camera',urldecode(read_sql_row($mobile_id,'camera','mobile')));
print add_submit_form('mobile_camera_submit','Edit Mobile Camera');
print add_action_form('','post');
print add_input_form('Mobile Internet','mobile_internet',urldecode(read_sql_row($mobile_id,'internet','mobile')));
print add_submit_form('mobile_internet_submit','Edit Mobile Internet');
print add_action_form('','post');
print add_input_form('Mobile Radio','mobile_radio',urldecode(read_sql_row($mobile_id,'radio','mobile')));
print add_submit_form('mobile_radio_submit','Edit Mobile Radio');
print add_action_form('','post');
print add_input_form('Mobile Audio Player','mobile_audio_player',urldecode(read_sql_row($mobile_id,'audio_player','mobile')));
print add_submit_form('mobile_audio_player_submit','Edit Audio Player');
print add_action_form('','post');
print add_input_form('Mobile Video Player','mobile_video_player',urldecode(read_sql_row($mobile_id,'video_player','mobile')));
print add_submit_form('mobile_video_player_submit','Edit Mobile Video Player');
print add_action_form('','post');
print add_input_form('Mobile Release Date','mobile_release_date',urldecode(read_sql_row($mobile_id,'release_date','mobile')));
print add_submit_form('mobile_release_date_submit','Edit Release Date');
print add_action_form('','post');
print add_input_form('Mobile Memory','mobile_memory',urldecode(read_sql_row($mobile_id,'memory','mobile')));
print add_submit_form('mobile_memory_submit','Edit Mobile Memory');
print add_action_form('','post');
print add_input_form('Mobile Memory Slot','mobile_memory_slot',urldecode(read_sql_row($mobile_id,'memory_slot','mobile')));
print add_submit_form('mobile_memory_slot_submit','Edit Mobile Memory Slot');
print add_action_form('','post');
print add_input_form('Mobile Bluetooth','mobile_bluetooth',urldecode(read_sql_row($mobile_id,'bluetooth','mobile')));
print add_submit_form('mobile_bluetooth_submit','Edit Mobile Bluetooth');
print add_action_form('','post');
print add_input_form('Mobile USB','mobile_usb',urldecode(read_sql_row($mobile_id,'usb','mobile')));
print add_submit_form('mobile_usb_submit','Edit Mobile USB');
print add_action_form('','post');
print add_input_form('Mobile Infrared','mobile_infrared',urldecode(read_sql_row($mobile_id,'infrared','mobile')));
print add_submit_form('mobile_name_submit','Edit Mobile Name');
print add_action_form('','post');
print add_input_form('Mobile Weight','mobile_weight',urldecode(read_sql_row($mobile_id,'weight','mobile')));
print add_submit_form('mobile_weight_submit','Edit Mobile Weight');
print add_action_form('','post');
print add_input_form('Mobile Status','mobile_status',urldecode(read_sql_row($mobile_id,'status','mobile')));
print add_submit_form('mobile_status_submit','Edit Mobile Status');
print add_action_form('','post');
print add_input_form('Mobile Display','mobile_display',urldecode(read_sql_row($mobile_id,'display','mobile')));
print add_submit_form('mobile_display_submit','Edit Mobile Display');
print add_action_form('','post');
print add_input_form('Mobile Talk Time','mobile_talk_time',urldecode(read_sql_row($mobile_id,'talk_time','mobile')));
print add_submit_form('mobile_talk_time_submit','Edit Mobile Talk Time');
print add_action_form('','post');
print add_input_form('Mobile Stand By','mobile_stand_by',urldecode(read_sql_row($mobile_id,'stand_by','mobile')));
print add_submit_form('mobile_stand_by_submit','Edit Mobile Stand By');
print add_action_form('','post');
print add_input_form('Mobile Browser','mobile_browser',urldecode(read_sql_row($mobile_id,'browser','mobile')));
print add_submit_form('mobile_browser_submit','Edit Mobile Browser');
print add_action_form('','post');
print add_input_form('Mobile Java','mobile_java',urldecode(read_sql_row($mobile_id,'java','mobile')));
print add_submit_form('mobile_java_submit','Edit Mobile Java');
print add_action_form('','post');
print add_input_form('Mobile Other Feat','mobile_other_feat',urldecode(read_sql_row($mobile_id,'other_feat','mobile')));
print add_submit_form('mobile_other_feat_submit','Edit Mobile Other Feat');
print add_action_form('','post');
print add_textarea_form('Mobile Tags','mobile_tags',urldecode(read_sql_row(read_home_row($mobile_id,'1'),'tags','home_menu')));
print add_submit_form('mobile_tags_submit','Edit Mobile Tags');
print '</div></div>';
print $foot;
?>