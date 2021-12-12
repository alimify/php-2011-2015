<?php include 'apanel_antilogin.php';

include 'setup.php';

include 'core.php';
@set_time_limit(0);

echo $head;
$dir=$_POST['dir'];

if($dir) {
if ( $dh = opendir ( $dir ))
{
while (($file = readdir($dh))!==false ) {
$sname=$dir.'/'.$file;
$mp3_filename = str_replace('.mp3','',$file);
$mp3_songname =$mp3_filename;
$mp3_comment ="Downloaded From $sitename";
$mp3_artist ="$sitename";
$mp3_album ="$sitename";
$mp3_year ="";
$mp3_genre = "$sitename";
$album_img="./albumart.jpg";


$mp3_tagformat = 'UTF-8';
require_once('./sysf/getid3/getid3.php');
$mp3_handler = new getID3;
$mp3_handler->setOption(array('encoding'=>$mp3_tagformat));
require_once('./sysf/getid3/write.php');
$mp3_writter = new getid3_writetags;
$mp3_writter->filename       = $sname;
$mp3_writter->tagformats     = array('id3v1', 'id3v2.3');
$mp3_writter->overwrite_tags = true;
$mp3_writter->tag_encoding   = $mp3_tagformat;
$mp3_writter->remove_other_tags = true;
$mp3_data['title'][]   = $mp3_songname;
$mp3_data['artist'][]  = $mp3_artist;
$mp3_data['album'][]   = $mp3_album;
$mp3_data['year'][]    = $mp3_year;
$mp3_data['genre'][]   = $mp3_genre;
$mp3_data['comment'][] = $mp3_comment;


$mp3_data['attached_picture'][0]['data'] = @file_get_contents($album_img);
$mp3_data['attached_picture'][0]['picturetypeid'] = "image/png";
$mp3_data['attached_picture'][0]['description'] = "album.png";
$mp3_data['attached_picture'][0]['mime'] = "image/png";
$mp3_writter->tag_data = $mp3_data;
$mp3_writter->WriteTags();
if($mp3_data) { echo 'Changed..!'; }
unset($mp3_data);
}
} }
else { echo '<form method="POST" action="tags.php">Dirname To Change Tags:<input type="text" value="./load/Dir Name Here" name="dir"/><input type="submit" value="Change Tags!!"/></form>';
}
echo $foot;
?>
