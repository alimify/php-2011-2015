<? include("mylogin.php"); ?><?php
/////// Mp3 Tag Setting
////// Script By jewel
///// Powerd By Mp3Gator.Net
///// Release : 2014
include 'admin_file_header.php';

print '<h2> Tag Setting </h2>';

$fldid = $_GET['folderid'];

/////// Setup Function

$s_artist = file("set/s_artist.txt");
$s_album = file("set/s_album.txt");
$s_year = file("set/s_year.txt");
$s_image = file("set/s_image.txt");


/// Album Setup
foreach($s_artist as $set_artist) {
$gartist = $set_artist;
}

//// Album Setup
foreach($s_album as $set_album) {
$galbum = $set_album;
}


//// Year Setup
foreach($s_year as $set_year) {
$gyear = $set_year;
}
//// Image Setup
foreach($s_image as $set_image) {
$gimage = $set_image;
}


////////// Start My Program


if($_POST['Submit']){
$fldid = $_POST['folderid'];

///Album Writing
$al_open = fopen("set/s_album.txt","w+");
$al_text = $_POST['album'];
fwrite($al_open, $al_text);
fclose($al_open);

///Artist Writing
$ar_open = fopen("set/s_artist.txt","w+");
$ar_text = $_POST['artist'];
fwrite($ar_open, $ar_text);
fclose($ar_open);


///Image Writing
$im_open = fopen("set/s_image.txt","w+");
$im_text = $_POST['image'];
fwrite($im_open, $im_text);
fclose($im_open);
/*
* *
* Autoindex Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/
///Year Writing
$yr_open = fopen("set/s_year.txt","w+");
$yr_text = $_POST['year'];
fwrite($yr_open, $yr_text);
fclose($yr_open);





print '<title>Succesfully Changed</title><font color="green">Succesfully Changed</font><br/> Album : '.$galbum.' <br/> Artist : '.$gartist.'<br/> Year : '.$gyear.'<br/> Image : '.$gimage.'';

}else{
print '<title>Tag Setting</title><form action="" method="post"><br/><b>Album </b><br/><input type="text" name="album" value="'.$galbum.'"/><br/><b>Artist </b><br/><input type="text" name="artist" value="'.$gartist.'"/><br/><b><input type="hidden" name="image" value="'.$gimage.'"/><b>Year </b><br/><input type="text" name="year" value="'.$gyear.'"/><br/><input type="hidden" name="folderid" value="'.$fldid.'"/><input type="submit" name="Submit" value="submit"/></form>';

}
print '<br/><a href="admin_file_albummp3.php?folderid='.$fldid.'">Back</a>';

include 'admin_file_footer.php';
?>