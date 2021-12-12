<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';

//Freak
$sid=intval($_GET['sid']);



$sqlentitle=MySQL_Fetch_Array(MySQL_Query("SELECT entitle FROM extra where id='".$sid."'"));
$sqlbntitle=MySQL_Fetch_Array(MySQL_Query("SELECT bntitle FROM extra where id='".$sid."'"));
$sqlalbum=MySQL_Fetch_Array(MySQL_Query("SELECT album FROM extra where id='".$sid."'"));
$sqlsinger=MySQL_Fetch_Array(MySQL_Query("SELECT singer FROM extra where id='".$sid."'"));
$sqltags=MySQL_Fetch_Array(MySQL_Query("SELECT tags FROM extra where id='".$sid."'"));

$rowexist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM extra WHERE id = '".$sid."'"));









print '<html><head><meta content="chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0; maximum-scale=1.0;"/><link rel="stylesheet" href="/m.css" type="text/css"/><title>Kobita Editing :: WapSmsBD.Com</title></head>';
echo '<body>';
print '<div class="logo" align="left"><div><a href="/"><font size="5" color="white">WapSmsBD.Com</font></a></div></div>';
print '<div class="h1">Edit Kobita</div>';
echo '<div class="box">';
if($mysql_status=='2'){print 'Your account is inactive,you need to active your account.to active your account please login your email and check inbox,also spam folder.<br/>dont recieve mail? <a href="/resendmail"><b>Resend</b></a> ';}
if($mysql_status=='3'){print 'Your Account has been blocked';}
if(!$mysql_status){  header('Location:/user/login/');  }
if($mysql_status=='1'){


print '<center>';

if($rowexist[0]){
///Function Editing

if(isset($_POST['SubmitLyrics'])){
$lyrics=htmlspecialchars($_POST['lyrics']);
$d_open = fopen("extra/kobitaTxt/kid_$sid.txt","w+");
$lwrite=fwrite($d_open, $lyrics);
$lclose=fclose($d_open);
if($lwrite && $lclose){print '<font color="green">Kobita Edited Successfully !</font>';}

}elseif(isset($_POST['SubmitEntitle'])){
$entitle=urlencode(htmlspecialchars($_POST["entitle"]));

$upen = mysql_query("UPDATE extra SET entitle='".$entitle."' WHERE id='".$sid."'");
if($upen){print '<font color="green">Data Updated !</font>';}else{ print '<font color="red">Data not updated !</font>';}

}elseif(isset($_POST['SubmitBntitle'])){
$bntitle=urlencode(htmlspecialchars($_POST["bntitle"]));

$upbn = mysql_query("UPDATE extra SET bntitle='".$bntitle."' WHERE id='".$sid."'");
if($upbn){print '<font color="green">Data Updated !</font>';}else{ print '<font color="red">Data not updated !</font>';}

}elseif(isset($_POST['SubmitAlbum'])){
$album=urlencode(htmlspecialchars($_POST["album"]));

$upal = mysql_query("UPDATE extra SET album='".$album."' WHERE id='".$sid."'");
if($upal){print '<font color="green">Data Updated !</font>';}else{ print '<font color="red">Data not updated !</font>';}

}elseif(isset($_POST['SubmitSinger'])){
$singer=urlencode(htmlspecialchars($_POST["singer"]));
$upsi = mysql_query("UPDATE extra SET singer='".$singer."' WHERE id='".$sid."'");
if($upsi){print '<font color="green">Data Updated !</font>';}else{ print '<font color="red">Data not updated !</font>';}

}elseif(isset($_POST['SubmitTags'])){
$tags=urlencode(htmlspecialchars($_POST["tags"]));

$uptags = mysql_query("UPDATE extra SET tags='".$tags."' WHERE id='".$sid."'");
if($uptags){print '<font color="green">Data Updated !</font>';}else{ print '<font color="red">Data not updated !</font>';}
}



//--------------------------------------------///End




if($sid){

print '<form action="" method="post">Kobita Edit : <br/><input type="hidden" name="gid" value="'.$sid.'"><textarea name="lyrics" cols=40 rows=6>';

$dfile = file("extra/kobitaTxt/kid_$sid.txt");
/// Get Data
foreach($dfile as $getdata) {
echo urldecode($getdata);
}
print '</textarea><br/><input type="submit" name="SubmitLyrics" value="Edit"></form>';


print '<form action="" method="post"><input type="hidden" name="gid" value="'.$sid.'">English Title : <br/><input type="text" name="entitle" value="'.urldecode($sqlentitle[0]).'"><br/><input type="submit" name="SubmitEntitle" value="Edit"></form>';

print '<form action="" method="post"><input type="hidden" name="gid" value="'.$sid.'">Bangla Title : <br/><input type="text" name="bntitle" value="'.urldecode($sqlbntitle[0]).'"><br/><input type="submit" name="SubmitBntitle" value="Edit"></form>';

print '<form action="" method="post"><input type="hidden" name="gid" value="'.$sid.'">Name :<br/><input type="text" name="album" value="'.urldecode($sqlalbum[0]).'"><br/><input type="submit" name="SubmitAlbum" value="Edit"></form>';

print '<form action="" method="post"><input type="hidden" name="gid" value="'.$sid.'">Writter : <br/><input type="text" name="singer" value="'.urldecode($sqlsinger[0]).'"><br/><input type="submit" name="SubmitSinger" value="Edit"></form>';

print '<form action="" method="post"><input type="hidden" name="gid" value="'.$sid.'">Tags : <br/><textarea name="tags">'.urldecode($sqltags[0]).'</textarea><br/><input type="submit" name="SubmitTags" value="Edit"></form>';

}else{print '<font color="red">Something mistake !!</font>';}


}else{print 'sorry your selection not exist !';}
print '</center>';


}
echo '</div>';

print '<a href="/"><b>Home</b></a>';

include("foot.php"); 
echo '</body></html>';
?>