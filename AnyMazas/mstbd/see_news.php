<?php
include 'db.php';
include 'config.php';
include 'func.php';
$news_id=intval($_GET['news_id']);
$news_title=read_sql_row($news_id,'title','news');
$news_details=read_sql_row($news_id,'news_details','news');
$admin_l=admin_check($type,$admin,$password);
include 'head.php';
if($admin_l=='1'){$edit_news='<div class="center"><a href="/edit_news.php?id='.$news_id.'"><b>Edit News</b></a></div>';}
print '<div class="smslist"><h1 class="center">'.urldecode($news_title).'</h1><div class="main_content">'.$edit_news.'';
if(file_exists('extra/art/news_art_'.$news_id.'.jpg')){$thumb='/extra/art/news_art_'.$news_id.'.jpg';
print '<img src="'.$thumb.'" alt="'.urldecode($news_title).'"/>';}
print urldecode($news_details);
print '</div></div>';
include 'foot.php';
?>