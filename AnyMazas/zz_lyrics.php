<?php
include 'func.php';
$id=intval($_GET['id']);

if($id){

$curl='http://get.downloader.pw/Json_file.php?id='.$id.'';
$grab=ngegrab($curl);
$json=json_decode($grab);
$lyrics=$json->lyrics;

if($lyrics){

foreach ($lyrics as $lyric=>$lyricid) {

echo $lyrics[$lyric];
echo '<br/>';

}

}else{

	print 'sorry no lyrics records for this !';

}

}else{
	
	print 'wrong selection !';

}

?>