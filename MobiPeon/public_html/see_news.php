<?php
include 'db.php';
include 'config.php';
include 'func.php';
$news_id=intval($_GET['news_id']);
$news_title=read_sql_row($news_id,'title','news');
$page_title=urldecode($news_title);

$sidebar=3;

include 'head.php';
print '<div class="main_content clear">';
print '<h1>'.urldecode($news_title).'</h1>';


if(!$page_title){print $notification;}


if(file_exists('extra/art/news_art_'.$news_id.'.jpg')){$thumb='/extra/art/news_art_'.$news_id.'.jpg';
print '<div class="simg"><amp-img src="'.$thumb.'" height="300" width="500"></amp-img>
    </div>';}



print '<div class="newstxt">'.newsfilter($news_id).'</div>';
print '</div>';
include 'sidebar.php';
include 'foot.php';
?>