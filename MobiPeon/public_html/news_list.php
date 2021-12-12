<?php
include 'db.php';
include 'config.php';
include 'func.php';
$admin_log=admin_check($type,$admin,$password);
$page=intval($_GET['page']);


$page_title='Mobile News Information,Mobile Review,Technology News,Latest Information , Mobile Update News';

if($admin_log=='1'){$edits='<div class="clink"><a href="/add_news.php">Add News</a> | <a href="/add_new_mobile.php">Add Mobile</a> | <a href="/add_mobile_brand.php">Add Brand</a></div>';}else{$asql=" and publish='1'";}


include 'head.php';



print '<div class="main_content clear">';

print $editss;

print '<h1>News</h1>';

$av=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM home_menu where type='2'$asql"));
if($av[0]){
$countstr=ceil($av[0]/$homelist);
$lmt=$page*$homelist;
$sql="SELECT * FROM home_menu where type='2'$asql ORDER BY timestamp DESC LIMIT ".$lmt.",$homelist;";
	$sites=MySQL_Query($sql);	
while($site=MySQL_Fetch_Array($sites))
	{
$id=$site['id'];
$type=$site['type'];
$timestamp=$site['timestamp'];
$mid=$site['mid'];


if(file_exists('extra/thumb/news_thumb_'.$mid.'.png')){$thumb='/extra/thumb/news_thumb_'.$mid.'.png';}else{$thumb='/extra/image/defaults.png';}
	print '<a href="/news_view-'.$mid.'-news-'.urlencode(read_sql_row($mid,'title','news')).'"><div class="post clear"><amp-img src="'.$thumb.'" alt="'.urldecode(read_sql_row($mid,'title','news')).'" width="150" height="120"></amp-img><div class="text">'.urldecode(read_sql_row($mid,'title','news')).'</div><div class="subtext">'.timecnv(read_sql_row($mid,'timestamp','news')).'</div></div></a>';
	
	$cou++;
}

}else{print $notification;}

print '<div class="paging">'.page($countstr,$page,'news',$brand_id,$brand_name).'</div>';

print '</div>';


include 'sidebar.php';
include 'foot.php';
?>