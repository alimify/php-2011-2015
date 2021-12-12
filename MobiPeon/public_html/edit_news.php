<?php
$page_title='Edit News';
include 'db.php';
include 'config.php';
include 'func.php';
admin_check('1',$admin,$password);
$news_id=$_GET['id'];
print $top;
print '<div class="smslist"><h1 class="center">Edit News</h1><div class="admin_content">';
print update_sql_row($news_id,'title','news',urlencode($_POST['news_title']));
print update_sql_row($news_id,'news_details','news',urlencode($_POST['news_details']));
print update_sql_row($news_id,'publish','news',intval($_POST['edit_news_publish']));
print update_sql_row(read_home_row($news_id,'2'),'tags','home_menu',urlencode($_POST['news_tags']));
print add_action_form('','post');
if(read_sql_row($news_id,'publish','news')=='1'){$pvalue=2;$psubmit=Unpublish;}else{$pvalue=1;$psubmit=Publish;}
print '<input type="hidden" name="edit_news_publish" value="'.$pvalue.'">';
print add_submit_form('news_publish_submit',$psubmit);
print '<form action="imupload.php" method="post"><input type="hidden" name="id" value="'.$news_id.'">Art Url :<br/><input type="text" name="url" value=""><br/><input type="submit" name="arturl" value="submit"></form>';
print '<form action="imupload.php" method="post" enctype="multipart/form-data"><input type="hidden" name="id" value="'.$news_id.'">
    Select Art:<br/>
    <input type="file" name="art" id="art"><br/>
    <input type="submit" value="Upload" name="asubmit">
</form>';
print '<form action="imupload.php" method="post"><input type="hidden" name="id" value="'.$news_id.'">Thumb Url :<br/><input type="text" name="url" value=""><br/><input type="submit" name="thurl" value="submit"></form>';
print '<form action="imupload.php" method="post" enctype="multipart/form-data"><input type="hidden" name="id" value="'.$news_id.'">
    Select Thumbnail:<br/>
    <input type="file" name="thumb" id="thumb"><br/>
    <input type="submit" value="Upload" name="tsubmit">
</form>';
print add_action_form('','post');
print add_input_form('News Title','news_title',urldecode(read_sql_row($news_id,'title','news')));
print add_submit_form('news_title_submit','Edit News Title');
print add_action_form('','post');
print add_textarea_form('News Details','news_details',urldecode(read_sql_row($news_id,'news_details','news')));
print add_submit_form('news_details_submit','Edit News Details');
print add_action_form('','post');
print add_textarea_form('News Tags','news_tags',urldecode(read_sql_row(read_home_row($news_id,'2'),'tags','home_menu')));
print add_submit_form('news_tags_submit','Edit News Tags');
print '</div></div>';
print $foot;
?>