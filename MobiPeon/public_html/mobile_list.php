<?php
include 'db.php';
include 'config.php';
include 'func.php';
$admin_log=admin_check($type,$admin,$password);
$page=intval($_GET['page']);
$brand_id=intval($_GET['brand_id']);

$admin_l=1;
if($admin_log!==$admin_l && !$brand_id){$bsql=" where publish='1'";}elseif($admin_log!==$admin_l && $brand_id){$bsql=" where publish='1' and brand_id='".$brand_id."'";}elseif($admin_log==$admin_l && !$brand_id){$bsql="";}elseif($admin_log==$admin_l && $brand_id){$bsql=" where brand_id='".$brand_id."'";}


if($brand_id){
$page_title=urldecode(read_sql_row($brand_id,'name','brand')).' Brand All Mobiles';
$name=urldecode(read_sql_row($brand_id,'name','brand'));
$brand_name=$name;
}else{
	$page_title = 'New Latest Mobile';
	$name=Mobile;
}
if($admin_log=='1'){$edits='<div class="clink"><a href="/add_news.php">Add News</a> | <a href="/add_new_mobile.php">Add Mobile</a> | <a href="/add_mobile_brand.php">Add Brand</a></div>';}
	

	
include 'head.php';
print '<div class="main_content clear">';

print $editss;

print '<h1>'.$name.'</h1>';

if($brand_id){print '<a href="/more_brand">All Brand</a> | <a href="/mobile">All Mobile</a><br/>';}else{print '<a href="/more_brand">All Brand</a><br/>';}

$av=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mobile$bsql"));
if($av[0]){
$countstr=ceil($av[0]/$homelist);
$lmt=$page*$homelist;
$sql="SELECT * FROM mobile$bsql ORDER BY timestamp DESC LIMIT ".$lmt.",$homelist;";
	$sites=MySQL_Query($sql);	
while($site=MySQL_Fetch_Array($sites))
	{
$id=$site['id'];
$timestamp=$site['timestamp'];
if(file_exists('extra/thumb/mobile_thumb_'.$id.'.png')){$thumb='/extra/thumb/mobile_thumb_'.$id.'.png';}else{$thumb='/extra/image/defaults.png';}
print '<a href="/mobile_view-'.$id.'-mobile-'.urlencode(read_sql_row($id,'name','mobile')).'"><div class="mobile clear"><amp-img src="'.$thumb.'" alt="'.urldecode(read_sql_row($id,'name','mobile')).'" width="150" height="120"></amp-img><div class="mh"><br/></div><div class="text">'.urldecode(read_sql_row($id,'name','mobile')).'</div><div class="subtext">Brand : '.urldecode(read_sql_row(read_sql_row($id,'brand_id','mobile'),'name','brand').'<br/> '.timecnv(read_sql_row($id,'timestamp','mobile'))).'</div></div></a>';

	$cou++;
}

}else{print $notification;}

print '<div class="paging clear">'.page($countstr,$page,'home',$brand_id,$brand_name).'</div>';
print '</div>';

include 'sidebar.php';
include 'foot.php';
?>