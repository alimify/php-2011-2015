<?

require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$page=$_GET['page'];
print $top;
print '<title>Bangla Kobita - Bengali Kobita - Valobashar Kobita - Premer Kobita - Koster Kobita - Dukkher Kobita</title><meta name="description" content="'.$description.'"/><meta name="keywords" content="'.$description.'">';
include 'css.php';
print '</head><body>';
include 'head.php';
print '<h1>বাংলা কবিতা</h1>';
print '<div class="box">';
if($mysql_id=='1'){print '<center><a href="/kobitadd.php"><b>Add New Golpo</b></a></center>';}

print '<h2>Bangla bengali kobita,valobashar kobita,premer kobita,koster kobita,valobashar ukti,bengla love kobita,
ভালোবাসার কবিতা,প্রেমের কবিতা,কস্টের কবিতা,জিবনের কবিতা,নতুন প্রেমের কবিতা, ভালবাসার ছন্দ</h2>';



$av=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM extra WHERE type='3'"));


if($av[0]){
$countstr=ceil($av[0]/$filelist);
$lmt=$page*$filelist;


$sql="SELECT * FROM extra where type='4' ORDER BY timestamps DESC LIMIT ".$lmt.",$filelist;";

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


echo '<div class="smsbox"><a href="/bangla_kobita_'.$id.'_'.$entitle.'"><b>'.$bntitle.'</b></a><br/><span class="time">'.getDateTime($timestamps).'</span>';


if($mysql_id=='1'){
if(!file_exists('extra/kobitaTxt/kid_'.$id.'.txt')){print '<br/><span style="float:left"><font color="red">No Kobita Added Yet</font></span>';}
print '<span style="float:right"><a href="/kobitaedit.php?sid='.$id.'">Editing</a></span>';}

print '</div>';

	$cou++;
}

}

print '<div class="paging">';

print page($countstr,$page,'index');

print '</div>';
print '<div class="tags">Tags : <i>bangla,bengali golpo,adult ,funny kobita,boltu kobita,teacher student kobita,special kobita,filmy kobita,job kobita,interview kobita,kobita collection,
valobashar,premer,koster,hashir,romantic,jibon kahini,jiboner kobita,jibon poribortoner kobita,vromon kahini,kobita,ভালবাসার কবিতা, ছন্দ,প্রেমের কবিতা, কষ্টের কবিতা</i></div>';
print '</div>';

include 'foot.php';
print $foot;?>