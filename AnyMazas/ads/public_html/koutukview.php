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

print $top;
print '<title>Bangla Jokes - '.$entitle.' - Bengali Jokes</title><meta name="description" content="'.$description.'"/><meta name="keywords" content="'.$description.'">';
include 'css.php';
print '</head><body>';
include 'head.php';
print '<h1>'.$bntitle.'</h1>';
print '<div class="box">';
if($mysql_id=='1'){print '<center><a href="/koutukedit.php?sid='.$id.'"><b>Editing</b></a></center>';}

print '<h2>'.$entitle.' bangla bengali jokes '.$album.',
'.$bntitle.' বাংলা কৌতুক</h2>'; 

print '<div class=""><a href="/"><b>Home</b></a> » <a href="/bangla_jokes"><b>Bangla Jokes</b></a> »  <a href=""><b>'.$entitle.'</b></a></div>';


print '<div class="smsbox">';

print '<div class="info">নাম : <em>'.$bntitle.'</em><br/>ক্যাটেগরি : <em>'.$album.'</em></div><br/><strong>'.$entitle.' Bangla Jokes</strong><br/>';
$dfile = file("extra/JokesTxt/jid_$id.txt");

foreach ($dfile as $num => $line) {
echo urldecode($line).'<br/>';

}

print '</div>';

print '<div class="tags">Tags : <strong>'.$tags.'</strong></div>';
print '</div>';

include 'foot.php';
print $foot;?>