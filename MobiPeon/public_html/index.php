<?php
include 'db.php';
include 'config.php';
include 'func.php';
$admin_log=admin_check($type,$admin,$password);
$page=intval($_GET['page']);
$page_title='Mobile News,Information,Price,Technology News,Latest Update Information News Tips Tricks Mobile Review';



include 'head.php';


print '<div class="main_content clear">';


if($admin_log=='1'){$edits='<div class="clink"><a href="/add_news.php">Add News</a> | <a href="/add_new_mobile.php">Add Mobile</a> | <a href="/add_mobile_brand.php">Add Brand</a></div>';}else{$asql=" where publish='1'";}
print $edits;



print '<h1>News Feed</h1>';
$av=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM home_menu$asql"));
if($av[0]){
$countstr=ceil($av[0]/$homelist);
$lmt=$page*$homelist;
$sql="SELECT * FROM home_menu$asql ORDER BY timestamp DESC LIMIT ".$lmt.",$homelist;";
	$sites=MySQL_Query($sql);	
while($site=MySQL_Fetch_Array($sites))
	{
$id=$site['id'];
$type=$site['type'];
$timestamp=$site['timestamp'];
$mid=$site['mid'];


if($type=='1'){
if(file_exists('extra/thumb/mobile_thumb_'.$mid.'.png')){$thumb='/extra/thumb/mobile_thumb_'.$mid.'.png';}else{$thumb='/extra/image/defaults.png';}
}elseif ($type=='2') {
if(file_exists('extra/thumb/news_thumb_'.$mid.'.png')){$thumb='/extra/thumb/news_thumb_'.$mid.'.png';}else{$thumb='/extra/image/defaults.png';}
}

if($type=='1'){print '<a href="/mobile_view-'.$mid.'-mobile-'.urlencode(read_sql_row($mid,'name','mobile')).'"><div class="home clear"><amp-img src="'.$thumb.'" alt="'.urldecode(read_sql_row($mid,'name','mobile')).'" width="150" height="120"></amp-img><div class="text">'.urldecode(read_sql_row($mid,'name','mobile')).'</div><div class="subtext">Category : Mobile<br/>'.timecnv(read_sql_row($mid,'timestamp','mobile')).'</div></div></a>';}elseif($type=='2'){

	print '<a href="/news_view-'.$mid.'-news-'.urlencode(read_sql_row($mid,'title','news')).'"><div class="home clear"><amp-img src="'.$thumb.'" alt="'.urldecode(read_sql_row($mid,'title','news')).'" width="150" height="120"></amp-img><div class="text">'.urldecode(read_sql_row($mid,'title','news')).'</div><div class="subtext">Category : News<br/>'.timecnv(read_sql_row($mid,'timestamp','news')).'</div></div></a>';
}

	$cou++;
}

}else{print $notification;}

print '<div class="paging">'.page($countstr,$page,'home',$brand_id,$brand_name).'</div>';
print '</div>';


include 'sidebar.php';
include 'foot.php';
?>