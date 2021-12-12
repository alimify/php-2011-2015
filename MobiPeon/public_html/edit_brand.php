<?php
$page_title='Edit Brand';
include 'db.php';
include 'config.php';
include 'func.php';
admin_check('1',$admin,$password);
$page_title='Edit Brand Name';
$id=$_GET['id'];
$bottom=intval($_POST['right']);

if(!$bottom && $_POST['right_submit']){$bottom=2;}

print $top;
print '<div class="smslist"><h1 class="center">Edit News</h1><div class="admin_content">';
print update_sql_row($id,'name','brand',urlencode($_POST['brand_name']));

print update_sql_row($id,'bottom','brand',$bottom);


print add_action_form('','post');
print add_input_form('Brand Name','brand_name',urldecode(read_sql_row($id,'name','brand')));
print add_submit_form('brand_submit','Edit Brand');


print add_action_form('','post');
print add_checkbox_form('Right','right','1');
print add_submit_form('right_submit','Yes');
print '</div></div>';
print $foot;
?>