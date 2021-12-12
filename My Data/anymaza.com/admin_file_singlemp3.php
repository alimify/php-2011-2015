<? include("mylogin.php"); ?><?
/*
* *
* Autoindex Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/

 include_once('admin_file_header.php');?><h2><b>Single Mp3 Uploader</b></h2><div class='UPdate'><?php

function friendly_size($size,$round=2){
$sizes=array(' Byts',' Kb',' Mb',' Gb',' Tb');
$total=count($sizes)-1;
for($i=0;$size>1024 && $i<$total;$i++){
$size/=1024;
}
return round($size,$round).$sizes[$i];
}

$tdir = $_GET['dir'];
$default_filename_prefix = "(AnyMaza.Com).mp3";
$default_songname_prefix = "(AnyMaza.Com).mp3";
$default_comment = "Exclusive Released By AnyMaza.Com";
$default_artist = "[AnyMaza.Com]";
$default_album = "Exclusive Single Songs[AnyMaza.Com]";
$default_year = date("2014");
$default_genre = "AnyMaza.Com";

if(isset($_POST['submit'])){
$dir.=$_POST['dir'];
$mp3_filepath = $_POST['mp3_filepath'];
$mp3_filename = $_POST['mp3_filename'];
$mp3_songname = $_POST['mp3_songname'];
$mp3_comment = $_POST['mp3_comment'];
$mp3_artist = $_POST['mp3_artist'];
$mp3_album = $_POST['mp3_album'];
$mp3_year = $_POST['mp3_year'];
$mp3_genre = $_POST['mp3_genre'];
if(filter_var($mp3_filepath,FILTER_VALIDATE_URL)){
if($mp3_filename!=""){
$mp3_filename = str_replace(DIRECTORY_SEPARATOR,"-X-",$mp3_filename);

if(strtolower(end(explode(".",basename($mp3_filepath))))!="mp3"){
exit("<br />URL must have a .mp3 exntension !");
}

if(strtolower(end(explode(".",basename($mp3_filename))))!="mp3"){
exit("<br />Filename must have a .mp3 exntension !");
}

$saved ="./files/$dir/";
$sname = $saved.$mp3_filename;
if(copy($mp3_filepath,$sname)){
$size = friendly_size(filesize($sname));
echo"<br />Copied <a href='$mp3_filepath'>$mp3_filepath<a> to <a href='$sname'>".basename($sname)."</a> ( $size )";

$mp3_tagformat = 'UTF-8';

require_once('getid3/getid3.php');
$mp3_handler = new getID3;
$mp3_handler->setOption(array('encoding'=>$mp3_tagformat));
require_once('getid3/write.php');


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
/*
* *
* Autoindex Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/
// Now set up the tags for the picture and the caption
if (empty($picture)) {
$picture = 'art/albumart.jpg';
$picturecaption = 'No picture available';
}

// Get the filename and path
$albumcover = $picture;

// Open the picture file and read set up the ID3 structures
if ($fd = @fopen($albumcover, 'rb')) {
$APICdata = fread($fd, filesize($albumcover));
fclose ($fd);
list($APIC_width, $APIC_height, $APIC_imageTypeID) = GetImageSize($albumcover);
$mp3_data['attached_picture'][0]['data']            = $APICdata;
$mp3_data['attached_picture'][0]['picturetypeid']   = 0x03;                 // 'Cover (front)'
$mp3_data['attached_picture'][0]['description']     = $picturecaption;
$mp3_data['attached_picture'][0]['mime']            = 'image/jpeg';
}
else {
echo "Cannot open $albumcover <br />";
}


$mp3_writter->tag_data = $mp3_data;

if($mp3_writter->WriteTags()) {
echo"<br /><title>Tags were successfully written</title>Tags were successfully written.";
}
else{
echo"<br /><title>Failed to write tags!</title>Failed to write tags!<br>".implode("<br /><br />",$mp3_writter->errors);
}
}
else{echo"<br /><title>Unable to copy file</title>Unable to copy file.";}
}
else{echo"<br /><title>Empty filename</title>Empty filename.";}
}
else{echo"<br /><title>Invalid FilePath</title>Invalid FilePath.";}
}
else{
print '<form method="post" action="" enctype="multipart/form-data">&raquo; Mp3 url
<br /><input size="25" type="text" class="input" name="mp3_filepath" value="" />
<br />&raquo; Filename
<br /><input size="25" type="text" class="input" name="mp3_filename" value="'.$default_filename_prefix.'" />
<br />&raquo; Song name / title
<br /><input size="25" type="text" class="input" name="mp3_songname" value="'.$default_songname_prefix.'" /><title>Single Mp3 Uploader</title><input size="25" type="hidden" class="input" name="mp3_comment" value="'.$default_comment.'" /><br />&raquo; Artist <br/><input size="25" type="text" class="input" name="mp3_artist" value="'.$default_artist.'" /><br />&raquo; Album Name : <br/><input size="25" type="text" class="input" name="mp3_album" value="'.$default_album.'" /><input size="25" type="hidden" class="input" name="mp3_year" value="'.$default_year.'" /><input size="25" type="hidden" class="input" name="dir" value="'.$tdir.'" /><input size="25" type="hidden" class="input" name="mp3_genre" value="'.$default_genre.'" /><input size="25" type="hidden" class="input" name="mp3_image"  accept="image/jpeg, image/gif, image/png" />
<br /><input type="submit" name="submit" value="Edit Tags" />
</form>';
}

include 'admin_file_footer.php';

/*
* *
* Autoindex Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/

?>
