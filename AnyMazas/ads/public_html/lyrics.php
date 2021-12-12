<?php
function ngegrab($url){$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$header[] = "Accept-Language: en";
$header[] = "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; de; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3
";
$header[] = "Pragma: no-cache";
$header[] = "Cache-Control: no-cache";
$header[] = "Accept-Encoding: gzip,deflate";
$header[] = "Content-Encoding: gzip";
$header[] = "Content-Encoding: deflate";
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$load = curl_exec($ch);
curl_close($ch);
return $load;}
$id=intval($_GET['id']);

if($id){

$curl='http://get.downloader.pw/Json_file.php?id='.$id.'';
$grab=ngegrab($curl);
$json=json_decode($grab);
$lyrics=$json->lyrics;
$url=$json->fileinfo->nm;
$singer=$json->fileinfo->singer;

$basename=basename($url);
$basename = preg_replace("/\.[^.]+$/", "", $basename);
$basename= str_replace ("(AnyMaza.Com)", "", $basename);
$basename= str_replace ("_AnyMaza.Com", "", $basename);
$basename= str_replace ("_", " ", $basename);


$pagetitle=$basename;
$description=''.$pagetitle.' lyrics,'.$pagetitle.' song lyrics,'.$pagetitle.' by '.$singer.' lyrics,'.$singer.' song lyrics,'.$pagetitle.' by '.$singer.' song lyrics,'.$singer.' - '.$pagetitle.' Song Lyrics,'.$singer.' - '.$pagetitle.' Lyrics';
require 'config2.php';
print $top;
print '<title>Lyrics - '.$pagetitle.' - '.$singer.'</title><meta name="description" content="'.$description.'"/><meta name="keywords" content="'.$description.'">';
include 'css.php';
print '</head><body>';
include 'head.php';
print '<h1>'.$singer.' - '.$pagetitle.' Song Lyrics</h1>';
print '<div class="box">';
print '<h2>'.$pagetitle.' Song Lyrics,'.$pagetitle.' By '.$singer.' Song Lyrics</h2>';

print '<div class="smsbox">';
if($lyrics){

foreach ($lyrics as $lyric=>$lyricid) {

echo $lyrics[$lyric];
echo '<br/>';

}

}else{

	print 'sorry no lyrics records for this !';

}
print '</div>';

print '<div class="tags">Tags : <i>'.$pagetitle.' Lyrics,'.$pagetitle.' Song Lyrics,'.$pagetitle.' Music Lyrics,'.$singer.' Lyrics,'.$singer.' Song Lyrics,'.$singer.' Music Lyrics,'.$singer.' Lyrics Directory,'.$pagetitle.' By '.$singer.' Song Lyrics,'.$singer.' new song lyrics</i></div>';
print '</div>';
}else{
	
	print 'wrong selection !';

}
include 'foot.php';
print $foot;
?>