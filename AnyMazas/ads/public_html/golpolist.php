<?

require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$page=$_GET['page'];
print $top;
print '<title>Bangla Golpo - Bengali Golpo - Valobashar Golpo - Premer Golpo - Koster Golpo - Dukkher Golpo</title><meta name="description" content="'.$description.'"/><meta name="keywords" content="'.$description.'">';
include 'css.php';
print '</head><body>';
include 'head.php';
print '<h1>বাংলা গল্প</h1>';
print '<div class="box">';
if($mysql_id=='1'){print '<center><a href="/golpoadd.php"><b>Add New Golpo</b></a></center>';}

print '<h2>bangla,bengali,funny golpo,mojar hashir koster,romantic,jiboner golpo,latest koutuk,adult golpo,new,latest,collection,directory,
ভালবাসার গল্প,জিবনের গল্প,প্রেমের গল্প,ভ্রমন কাহিনি,কস্টের গল্প,রোমান্টিক গল্প,হাশির গল্প</h2>';



$av=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM extra WHERE type='3'"));


if($av[0]){
$countstr=ceil($av[0]/$filelist);
$lmt=$page*$filelist;


$sql="SELECT * FROM extra where type='3' ORDER BY timestamps DESC LIMIT ".$lmt.",$filelist;";

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


echo '<div class="smsbox"><a href="/bangla_golpo_'.$id.'_'.$entitle.'"><b>'.$bntitle.'</b></a><br/><span class="time">'.getDateTime($timestamps).'</span>';


if($mysql_id=='1'){
if(!file_exists('extra/golpoTxt/gid_'.$id.'.txt')){print '<br/><span style="float:left"><font color="red">No golpo Added Yet</font></span>';}
print '<span style="float:right"><a href="/golpoedit.php?sid='.$id.'">Editing</a></span>';}

print '</div>';

	$cou++;
}

}

print '<div class="paging">';

print page($countstr,$page,'index');

print '</div>';
print '<div class="tags">Tags : <i>bangla,bengali golpo,adult ,funny golpo,boltu golpo,teacher student golpo,special golpo,filmy golpo,job golpo,interview golpo,golpo collection,
valobashar,premer,koster,hashir,romantic,jibon kahini,jiboner golpo,jibon poribortoner golpo,vromon kahini,golpo,ভালবাসার গল্প,জিবনের গল্প,প্রেমের গল্প,ভ্রমন কাহিনি,কস্টের গল্প,রোমান্টিক গল্প,হাশির গল্প</i></div>';
print '</div>';

include 'foot.php';
print $foot;?>