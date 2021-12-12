<?

require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$id=$_GET['id'];



$sqlentitle=MySQL_Fetch_Array(MySQL_Query("SELECT entitle FROM extra where id='".$id."'"));
$sqlbntitle=MySQL_Fetch_Array(MySQL_Query("SELECT bntitle FROM extra where id='".$id."'"));
$sqlalbum=MySQL_Fetch_Array(MySQL_Query("SELECT album FROM extra where id='".$id."'"));
$sqlsinger=MySQL_Fetch_Array(MySQL_Query("SELECT singer FROM extra where id='".$id."'"));
$sqltags=MySQL_Fetch_Array(MySQL_Query("SELECT tags FROM extra where id='".$id."'"));

$entitle=urldecode($sqlentitle[0]);
$bntitle=urldecode($sqlbntitle[0]);
$album=urldecode($sqlalbum[0]);
$singer=urldecode($sqlsinger[0]);
$tags=urldecode($sqltags[0]);


$description='Lyrics,Song Lyrics Of '.$entitle.',bengali '.$singer.' Song Lyrics,bangla '.$album.' Lyrics ';
$keywords='Lyrics,'.$entitle.','.$entitle.' lyrics,'.$entitle.' song lyrics,'.$entitle.' music lyrics,lyrics of '.$entitle.','.$singer.' song lyrics,'.$album.' song lyrics';
print $top;
print '<title>Lyrics - '.$entitle.' - '.$singer.'</title><meta name="description" content="'.$description.'"/><meta name="keywords" content="'.$keywords.'">';
include 'css.php';
print '</head><body>';
include 'head.php';
print '<h1>'.$singer.' - '.$entitle.' Song Lyrics</h1>';
print '<div class="box">';
if($mysql_id=='1'){print '<center><a href="/lyricsedit.php?sid='.$id.'"><b>Editing</b></a></center>';}

print '<h2>'.$entitle.' By '.$singer.' Song Music Lyrics,'.$album.',
'.$bntitle.' সং গানের কথা,লিরিক</h2>';
if($singer){$rsinger=' By '.$singer.'';}
print '<div class=""><a href="/"><b>Home</b></a> » <a href="/bangla_song_lyrics"><b>Lyrics</b></a> »  <a href=""><b>'.$entitle.''.$rsinger.' Song Lyrics</b></a></div>';


print '<div class="smsbox">';

if(file_exists('extra/art/media_art_'.$id.'.jpg')){
$img_file = 'extra/art/media_art_'.$id.'.jpg';
$imgData = base64_encode(file_get_contents('extra/art/media_art_'.$id.'.jpg'));
$src = 'data: '.mime_content_type($img_file).';base64,'.$imgData;
	print '<div class="lyricimg"><img src="'.$img_file.'" alt="'.$entitle.'"></div>';}

print '<div class="info">Song Name : <em>'.$entitle.'</em><br/>Singer : <em>'.$singer.'</em><br/>Album/Movie : <em>'.$album.'</em></div><br/><strong>'.$entitle.' Song Lyrics</strong><br/><div class="lyricstyle">';
$dfile = file("extra/lyricsTxt/lid_$id.txt");

foreach ($dfile as $num => $line) {
echo urldecode($line).'<br/>';

}

print '</div></div>';

print '<div class="tags">Tags : <strong>'.$tags.'</strong></div>';
print '</div>';

include 'foot.php';
print $foot;?>