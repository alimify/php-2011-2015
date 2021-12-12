<?php
$page_title='Add Mobile Brand';
include 'db.php';
include 'config.php';
include 'func.php';
admin_check('1',$admin,$password);
print $top;
$add_new_mobile='<center><a href="/add_new_mobile.php"><b>Add New Mobile</b></a></center>';
print '<div class="smslist"><h1 class="center">Add Mobile Brand</h1><div class="admin_content">'.$add_new_mobile.'';
$brand_name=urlencode($_POST['brand_name']);
if(htmlspecialchars($_POST['brand_submit'])){
print add_brand_name($brand_name,$brand_new_mobile_count,$brand_total_mobile);}
print add_action_form('','post');
print add_input_form('Brand Name','brand_name','');
print add_submit_form('brand_submit','Add New Brand');
print '<br/>Select Name to Edit :<br/>';
$sql="SELECT * FROM brand;";
$sites=MySQL_Query($sql);
while($site=MySQL_Fetch_Array($sites))
	{
		$id = $site['id'];
		$brand=urldecode($site['name']);
  print '<div><a href="/edit_brand.php?id='.$id.'">'.$brand.'</a></div><br/>';
}
print '</div></div>';
print $foot;
?>