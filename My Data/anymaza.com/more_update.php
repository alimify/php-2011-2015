<?php
/*
* *
* Updates Script By Jewel
* Release : 2014
* Modify by Jewel
* * *
*/
require ('update_config.php');
@include "update_fnc.php";
$adminpass = $set[2];
$amount = $set[4];
$zona = $set[3];
if (isset($_GET['pass'])){
$pass = $_GET['pass'];
} else {
$pass = '';
}
echo '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
<title>Latest Updates | AnyMaza.Com</title>
<meta http-equiv="Pragma" content="no-cache"/>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>';
 include("header.php");
echo'<h2><b>Latest Updates</b></h2>';

//Akhir shout
$a = $_GET['a'];
switch($a){
case "login":
echo '<div class="Link">
<center>';
$m = $_GET['m'];
switch($m){
case "panel":
$auth = $_POST['auth'];
if (empty($auth)){
echo '.<br/>
&raquo; <a href="./"></a><br/>';
}
else if ($auth !== $adminpass){
echo 'Wrong Password !! <br/>
&raquo; <a href="./?a=login">Try again</a><br/>';
} else {
echo 'Login success !! <br/>
&raquo; <a href="./?pass='.$adminpass.'">Enter Cpanel</a><br/>';
}
break;
default:
echo '<form action="./?a=login&amp;m=panel" method="post">
Admin Password :<br/>
<input type="password" name="auth" value=""><br/>
<input type="submit" value="Login">
<br/></form>';
break;
}
echo '</center>
';
break;
//Edit data
case "edit":
echo '<div class="Link">';
if ($pass !== $adminpass){
echo 'Khusus admin';
} else {
$file = 'update_config.php';
$e = $_GET['e'];
switch($e){
case "simpan":
$buka = fopen($file, 'w');
$konten='<?
$set[1]='.'"'."$_REQUEST[satu]".'";
$set[2]='.'"'."$_REQUEST[dua]".'";
$set[3]='.'"'."$_REQUEST[tiga]".'";
$set[4]='.'"'."$_REQUEST[empat]".'";
$set[5]='.'"'."$_REQUEST[lima]".'";
$set[6]='.'"'."$_REQUEST[enam]".'";
?>';
fwrite($buka, $konten);
fclose($buka);
echo 'Data gb telah di edit !!.<br/>
Jangan lupa dgn data yg baru.<br/>
&raquo; <a href="./?pass='.$set[2].'">Kembali</a><br/>';
break;
default:
echo '<form action="./?a=edit&amp;e=simpan&amp;pass='.$pass.'" method="post">
Nama site :<br/>
<input type="text" name="satu" size="12" value="'.$set[1].'"><br/>
Password :<br/>
<input type="text" name="dua" size="12" value="'.$set[2].'"><br/>
Zona waktu :<br/>
<input type="text" name="tiga" size="12" value="'.$set[3].'"><br/>
Pesan tiap page :<br/>
<input type="text" name="empat" size="12" value="'.$set[4].'"><br/>
Title guestbook :<br/>
<input type="text" name="lima" size="12" value="'.$set[5].'"><br/>
Kata pembuka :<br/>
<input type="text" name="enam" size="12" value="'.$set[6].'"><br/>
<input type="submit" value="Edit"><br/>
</form>';
break;
} }
echo '';
break;
//Page utama
default:

$array = file('update.dat');
$count = count($array);
$list  = $amount;
if (empty($_GET['page'])) {
$page = 1;
} else {
$page = (int) $_GET['page'];
}

$j = ($count-1)-(($page-1)*$list);
$i = $j-$list;
for(; $i<$j && $j>=0; $j--) {
$up = $j + 1;
$text = explode("|",$array[$j]);

// Mulai data waktu
$wap = mktime(0, 0, 0, $text[6], $text[5], $text[7]);
$sekarang = mktime(0, 0, 0, date("m", time() + ($zona * 6)), date("j", time() + ($zona * 6)), date("y", time() + ($zona * 6)));
if ($wap == $sekarang){
$el = "($text[3])";
}
else if ($wap == ($sekarang - (24*60*60))){
$el = "($text[3])";
}
else if ($wap == ($sekarang - (48*60*60))){
$el = "($text[3])";
}
else {
$el = "($text[5].$text[6].$text[7] | $text[3])";
}
{
$post_bg=($bg++%2== 0) ? "" : "";

if (($text[10] == "pm") && ($pass !== $adminpass)){
echo "Pm Admin";
} else {
echo ''.$text[0].'<br/>';

if($text[2] != '') { echo '';
}
if ($text[1] != '') { echo'';
}
echo'</div>';
}
//Mulai data reply
if ($pass == $adminpass) {
//echo '&nbsp; &nbsp;<a href="http://AnyMaza.Com/update_del.php?a=hapus_teman&amp;nom='.$up.'&amp;pass='.$pass.'">Delete</a> | | <a href="http://AnyMaza.Com/update_edit.php?b=gb&amp;nom='.$up.'&amp;pass='.$pass.'">Edit</a><br/>';
}

}
}
echo '<div class="shadow">
<center>';
if ($page > 1){
if ($pass == $adminpass){
echo "<b>[<a href=\"./more_update.php?pass=".$pass."&amp;page=".($page-1)."\">&lt;&lt;</a>]</b> ";
} else {
echo "<b>[<a href=\"./more_update.php?page=".($page-1)."\">&lt;&lt;</a>]</b> ";
}
} else {
}
$all = ceil($count/$list);
if ($all >= 5){
$tmp = 5;
} else {
$tmp = $all;
}
for ($i=1;$i<=$tmp;$i++) {
if ($page==$i) {

} else {
if ($pass == $adminpass){
echo '<a href="'.$_SERVER['PHP_SELF'].'?pass='.$pass.'&amp;page='.$i.'">'.$i.'</a> ';
} else {
echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> ';
}
}
}
//Next page
if ($page < $all){
if ($pass == $adminpass){
echo " <b>[<a href=\"./more_update_.php?pass=".$pass."&amp;page=".($page +1)."\">&gt;&gt;</a>]</b>";
} else {
echo " <b>[<a href=\"./more_update.php?page=".($page +1)."\">&gt;&gt;</a>]</b>";
}
}
else {
}
echo "<br/>";
if ($count != 0){
//echo "[$page/$all/$count]<br/>";
}
if ($all > 1){
if ($pass == $adminpass){
echo '<form action="./?pass='.$pass.'" method="get">';
} else {
echo '<form action="./" method="get">';
}
?>
<input size="2" name="page" value="<?php echo $page; ?>" style="-wap-input-format:'*N'" />
<?
if ($pass == $adminpass){
echo '<input type="hidden" name="pass" value="'.$pass.'" />';
}
?>
<input type="submit" value="Jump!!" /></form>
<?
}
echo "</center></div>";
echo '';
if ($pass == $adminpass) {
//echo '&raquo; <a href="http://AnyMaza.Com/teman.php?pass='.$pass.'">Post New Updates</a><br/>';
//echo '&raquo; <a href="teman.php?a=list&amp;pass='.$pass.'">List Admin pm</a><br/>';
//echo '&raquo; <a href="./?a=edit&amp;pass='.$pass.'">Edit data</a><br/>';
//echo '&raquo; <a href="del.php?a=hapus_allgb&amp;pass='.$pass.'">Delete All Post</a><br/>';
//echo '&raquo; <a href="del.php?a=hapus_allshout&amp;pass='.$pass.'">Delete All Shout</a><br/>';
//echo '&raquo; <a href="del.php?a=hapus_allteman&amp;pass='.$pass.'">Delete all Admin pm</a><br/>';
//echo '&raquo; <a href="./">Log Out</a><br/>';
} else {
}
echo '';
break;
//Penutup
}
echo'<div class="path"><center><a href="index.php">Home</a></center></div>';
include"footer.php";

?>
