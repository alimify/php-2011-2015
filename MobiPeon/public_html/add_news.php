<?php
$page_title='Add News';
include 'db.php';
include 'config.php';
include 'func.php';
admin_check('1',$admin,$password);
print $top;
print '<div class="smslist"><h1 class="center">Add News</h1><div class="admin_content">';
$news_title=urlencode($_POST['news_title']);
$news_details=urldecode($_POST['news_details']);
$news_tags=urldecode($_POST['news_tags']);
$news_publish=intval($_POST['news_publish']);
if($_POST['news_submit']){
print add_news($news_title,$news_details,$news_tags,$news_publish);
}
print add_action_form('','post');
print add_input_form('News Title','news_title','');
print add_textarea_form('News Details','news_details','');
print add_textarea_form('News Tags','news_tags','');
print add_checkbox_form('Publish','news_publish','1');
print add_submit_form('news_submit','Add News');
print '</div></div>';
print $foot;
?>