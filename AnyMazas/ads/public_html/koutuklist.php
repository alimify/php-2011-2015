<?

require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$page=$_GET['page'];
print $top;
print '<title>Bangla Jokes - Bengali Jokes - বাংলা কৌতুক</title><meta name="description" content="'.$description.'"/><meta name="keywords" content="'.$description.'">';
include 'css.php';
print '</head><body>';
include 'head.php';
print '<h1>বাংলা কৌতুক</h1>';
print '<div class="box">';
if($mysql_id=='1'){print '<center><a href="/koutukadd.php"><b>Add New Jokes</b></a></center>';}

print '<h2>bangla,bengali,funny jokes,koutuk,mojar hashir koutuk,latest koutuk,adult jokes,new,latest,collection,directory,
বাংলা,ধম পাটা হাসির কৌতুক জোকেস,বাংলা মজার নতুন হাসির কৌতুক সংগ্রহ</h2>';



$av=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM extra WHERE type='1'"));


if($av[0]){
$countstr=ceil($av[0]/$filelist);
$lmt=$page*$filelist;


$sql="SELECT * FROM extra where type='2' ORDER BY timestamps DESC LIMIT ".$lmt.",$filelist;";

	$sites=MySQL_Query($sql);	
while($site=MySQL_Fetch_Array($sites))
	{
$id=$site['id'];
$bntitle=urldecode($site['bntitle']);
$entitle=urldecode($site['entitle']);
$views=$site['views'];
$timestamps=$site['timestamps'];



///Replacing
$entitle=strtolower($entitle);
$entitle=str_replace("'", "_", $entitle);
$entitle=str_replace(" ", "_", $entitle);
$entitle=str_replace(".", "_", $entitle);
$entitle=str_replace("?", "_", $entitle);
$entitle=str_replace("-", "_", $entitle);
$entitle=str_replace('"', '_', $entitle);
$entitle=str_replace(",", "_", $entitle);


echo '<div class="smsbox"><a href="/bangla_joksr_'.$id.'_'.$entitle.'"><b>'.$bntitle.'</b></a><br/><span class="time">'.getDateTime($timestamps).'</span>';


if($mysql_id=='1'){
if(!file_exists('extra/JokesTxt/jid_'.$id.'.txt')){print '<br/><span style="float:left"><font color="red">No Jokes Added Yet</font></span>';}
print '<span style="float:right"><a href="/koutukedit.php?sid='.$id.'">Editing</a></span>';}

print '</div>';

	$cou++;
}

}

print '<div class="paging">';

print page($countstr,$page,'index');

print '</div>';
print '<div class="tags">Tags : <i>bangla,bengali jokes,adult jokes,funny jokes,boltu jokes,teacher student jokes,special jokes,filmy jokes,job jokes,interview jokes,jokes collection,
বন্ধু কৌতুক,ইন্টারভিউ কৌতুক,মালিক ও কর্মচারী,ডাক্তার ও রোগী,স্বামী-স্ত্রী কৌতুক,প্রেমিক-প্রেমিকা কৌতুক,ক্লাস-রুম কৌতুক,বাবা-ছেলে কৌতুক,শিক্ষক-ছাত্র কৌতুক,পাঁচমিশালী কৌতুক,আইন আদালত,ক্রেতা-বিক্রেতা কৌতুক,খেলাধূলা কৌতুক,১৮+ কৌতুক,পাগল ও ডাক্তার,ছেলে ও মা কৌতুক</i></div>';
print '</div>';

include 'foot.php';
print $foot;?>