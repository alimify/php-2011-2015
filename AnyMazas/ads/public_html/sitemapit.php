<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
print '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';








$sql="SELECT * FROM extra WHERE type='1' ORDER BY timestamps DESC;";
  $sites=MySQL_Query($sql); 
while($site=MySQL_Fetch_Array($sites))
  {
$id=$site['id'];
$type=$site['type'];
$singer=urldecode($site['singer']);
$album=urldecode($site['album']);

$bntitle=urldecode($site['bntitle']);
$entitles=urldecode($site['entitle']);
$views=$site['views'];
$timestamps=$site['timestamps'];
 $timestamps=date('c', $timestamps);


///Replacing
$entitle=strtolower($entitles);
$entitle=str_replace("'", "_", $entitle);
$entitle=str_replace(" ", "_", $entitle);
$entitle=str_replace(".", "_", $entitle);
$entitle=str_replace("?", "_", $entitle);
$entitle=str_replace("-", "_", $entitle);
$entitle=str_replace('"', '_', $entitle);
$entitle=str_replace(",", "_", $entitle);

$singer=strtolower($singer);
$singer=str_replace("'", "_", $singer);
$singer=str_replace(" ", "_", $singer);
$singer=str_replace(".", "_", $singer);
$singer=str_replace("?", "_", $singer);
$singer=str_replace("-", "_", $singer);
$singer=str_replace('"', '_', $singer);
$singer=str_replace(",", "_", $singer);

if($type=='1'){

print '<url>
    <loc>http://wapsmsbd.com/lyricsr_'.$id.'_'.$entitle.'_'.$singer.'</loc> 
       </url>';

}elseif ($type=='2') {
	print '<a href="/bangla_joksr_'.$id.'_'.$entitle.'">[কৌতুক] <b>'.$bntitle.'</b></a>';
}elseif ($type=='3') {
	print '<a href="/bangla_golpo_'.$id.'_'.$entitle.'">[গল্প] <b>'.$bntitle.'</b></a>';
}elseif ($type=='4') {
	print '<a href="/bangla_kobita_'.$id.'_'.$entitle.'">[কবিতা] <b>'.$bntitle.'</b></a>';
}elseif ($type=='5') {
}

  $cou++;
}













print '</urlset>';
?>