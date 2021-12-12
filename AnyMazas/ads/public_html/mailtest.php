<?
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';


$sql="SELECT * FROM extra ORDER BY timestamps DESC LIMIT 0,10;";

  $sites=MySQL_Query($sql); 
while($site=MySQL_Fetch_Array($sites))
  {
$id=$site['id'];
$type=$site['type'];
$singer=urldecode($site['singer']);
$album=urldecode($site['album']);

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

$singer=strtolower($singer);
$singer=str_replace("'", "_", $singer);
$singer=str_replace(" ", "_", $singer);
$singer=str_replace(".", "_", $singer);
$singer=str_replace("?", "_", $singer);
$singer=str_replace("-", "_", $singer);
$singer=str_replace('"', '_', $singer);
$singer=str_replace(",", "_", $singer);


if($type=='1'){
print '<a href="/lyricsr_'.$id.'_'.$entitle.'_'.$singer.'"><b>'.$bntitle.' - গানের কথা</b></a>';

}elseif ($type=='2') {
	print '<a href="/bangla_joksr_'.$id.'_'.$entitle.'"><b>'.$bntitle.'</b></a>';
}elseif ($type=='3') {
	print '<a href="/bangla_golpo_'.$id.'_'.$entitle.'"><b>'.$bntitle.'</b></a>';
}elseif ($type=='4') {
	print '<a href="/bangla_kobita_'.$id.'_'.$entitle.'"><b>'.$bntitle.'</b></a>';
}elseif ($type=='5') {
}


print '</div>';

  $cou++;
}
?>