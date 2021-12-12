<?

require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$page=$_GET['page'];
print $top;
print '<title>Bangla Song Lyrics - বাংলা গানের কথা - বাংলা সং লিরিক্স</title><meta name="description" content="'.$description.'"/><meta name="keywords" content="'.$description.'">';
include 'css.php';
print '</head><body>';
include 'head.php';
print '<h1>বাংলা গানের কথা</h1>';
print '<div class="box">';
if($mysql_id=='1'){print '<center><a href="/lyricsadd.php"><b>Add New Lyrics</b></a></center>';}

print '<h2>bangla,bengali,song,music,mp3,lyrics,new,latest,collection,directory,
বাংলা,গানের,কথা,সং,লিরিক্</h2>';



$av=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM extra WHERE type='1'"));


if($av[0]){
$countstr=ceil($av[0]/$filelist);
$lmt=$page*$filelist;


$sql="SELECT * FROM extra where type='1' ORDER BY timestamps DESC LIMIT ".$lmt.",$filelist;";

	$sites=MySQL_Query($sql);	
while($site=MySQL_Fetch_Array($sites))
	{
$id=$site['id'];
$bntitle=urldecode($site['bntitle']);
$entitle=urldecode($site['entitle']);
$singer=urldecode($site['singer']);
$album=urldecode($site['album']);
$views=$site['views'];
$timestamps=$site['timestamps'];

$bntitle=$entitle;
$views=$singer;
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

if(file_exists('extra/thumb/media_thumb_'.$id.'.png')){$thumb='/extra/thumb/media_thumb_'.$id.'.png';}else{$thumb='/extra/image/defaults.png';}


echo '<div class="smsbox"><span class="img"><img src="'.$thumb.'" alt="lyrics"></span><span class="post"><a href="/lyricsr_'.$id.'_'.$entitle.'_'.$singer.'"><b>'.$bntitle.' ('.$album.') Song Lyrics</b></a><br/><span class="sngr">'.$views.'</span><br/><span class="time">'.getDateTime($timestamps).'</span></span>';


if($mysql_id=='1'){
if(!file_exists('extra/lyricsTxt/lid_'.$id.'.txt')){print '<br/><br/><span style="float:left"><font color="red">No Lyrics Added Yet</font></span>';}
print '<span style="float:right"><a href="/lyricsedit.php?sid='.$id.'">Editing</a></span>';}

print '</div>';

	$cou++;
}

}

print '<div class="paging">';

print page($countstr,$page,'index');

print '</div>';
print '<div class="tags">Tags : <i>lyrics,bangla lyrics,bangla song lyrics,bangla music lyrics,bengali song lyrics,bengali music lyrics,bengali music lyrics directory,bangla music lyrics directory,new song lyrics,bangla,bengali,song,music,lyrics collection,bangla ganer kotha,bengali ganer kotha,বাংলা গানের কথা,বাংলা গানের লিরিক্স,বাংলা সং লিরিক্স</i></div>';
print '</div>';

include 'foot.php';
print $foot;?>