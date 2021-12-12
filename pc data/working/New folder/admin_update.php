<?php include('mylogin.php'); ?>

<?php
/*
* *
* Updates Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/

$amount = '10';
if (isset($_GET['nom'])){
$nom = $_GET['nom'];
} else {
$nom = '';
}

{
 $head = '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
 <html>
 <head>
 <title>Add Update</title>
 <meta http-equiv="Pragma" content="no-cache"/>
 <link rel="stylesheet" type="text/css" href="style.css"/>
 </head>
 <body>
 <div class="title">Update Post</div>';
 $foot = '<div class="navigation">
 &#171; <a href="admin_file_list.php">Back</a><br/>
 </div>
 <div class="footer">&#169; '.$set[1].'</div>
 </body>
 </html>';
echo $head;
$a = $_GET['a'];
switch($a){
case "kirim":
echo '<div class="pesan">';
$nick = $_POST['nick'];
$alamat = $_POST['alamat'];
$judul = $_POST['judul'];
$spasi = $_POST['spasi'];
if (($nick == '')){
echo "Semua kolom harus di isi !! <br/>";
}
else if (preg_match("/http(s)?:\/\//i", $alamat)){
echo 'URL site gak boleh pake http://';
}
else if (preg_match("/:\/\//i", $alamat)){
echo 'Oh no!! URL without http://';
} else {
$fp = fopen("update.dat","a");
flock($fp,2);
fputs($fp,"$nick|http://$alamat|$judul|$spasi\r\n");
flock($fp,3);
fclose($fp);
echo "Your Update Submitted :) <br/>";
}
echo '</div>';
break;
case "list":
echo '<div class="pesan">';
$array = file('update.dat');
$count = count($array);
$list  = $amount; //list per page
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
echo "nick : ".$text[0]."<br/>
Alamat : ".$text[1]."<br/>
Julukan : ".$text[2]."<br/>";
 echo '<a href="update_del.php?a=hapus_teman&amp;nom='.$up.'&amp;pass='.$pass.'">Hapus</a><br/>';
}
echo "<center>";
if ($page > 1){
echo "<b>[<a href=\"./teman.php?a=list&amp;pass=".$pass."&amp;page=".($page-1)."\">&lt;&lt;</a>]</b> ";
} else {
echo "<b>[&lt;&lt;]</b> ";
}
$all = ceil($count/$list);
if ($all >= 5){
$tmp = 5;
} else {
$tmp = $all;
}
for ($i=1;$i<=$tmp;$i++) {
    if ($page==$i) {
        echo '['.$i.'] ';
    } else {
        echo '<a href="'.$_SERVER['PHP_SELF'].'?a=list&amp;pass='.$pass.'&amp;page='.$i.'">'.$i.'</a> ';
    }
}
//Next page
if ($page < $all){
echo " <b>[<a href=\"./teman.php?a=list&amp;pass=".$pass."&amp;page=".($page+1)."\">&gt;&gt;</a>]</b>";
}
else {
echo ' <b>[&gt;&gt;]</b>';
}
echo "<br/>";
if ($count != 0){
echo "[$page/$all/$count]<br/>";
}
echo '</center>
 &raquo; <a href="'.$_SERVER['PHP_SELF'].'?pass='.$pass.'">Tambah teman</a><br/>';
echo '</div>';
break;
default:
echo '<div class="pesan">';
echo '<form action="'.$_SERVER['PHP_SELF'].'?a=kirim" method="post">
* HTML Update Box<br/>
<TEXTAREA NAME="nick" COLS=40 ROWS=6></TEXTAREA><br/>
';
echo'

';
echo'<input type="submit" value="Submit"><br/>
</form>';
echo '</div>';
break;
}
echo $foot;
//Penutup
}
print '<textarea><b>Songs : <font color="green"></font><br/><a href="">320KBPS - 128KBPS - 64KBPS</a></b></textarea>';
///myplugin start
$amount = '10';
$zona = '0';
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
{
$post_bg=($bg++%2== 0) ? "up" : "up";
echo '<div class="fl odd">'.$text[0].'[<a href="/admin_update_rename.php?nom='.$up.'&a=update"> R </a>] [<a href="/admin_update_dlt.php?nom='.$up.'&a=update"> D </a>]</div>';}}

//// paging
$all = ceil($count/$list);
echo '<div class="pgn" align="center">';if ($page > 1){ echo '
<div>Page '.$page.' of '.$all.'</div><a href="/admin_update.php?folderid='.$fldid.'&sort=0&page='.($page-1).'&p=0">Prev</a>';} else { echo '<div>Page '.$page.' of '.$all.'</div>';}
$all = ceil($count/$list);
if ($all >= 5){
$tmp = 5;
} else {
$tmp = $all;
}
for ($i=1;$i<=$tmp;$i++) {
if ($page==$i) {

}else {
echo '<a href="/admin_update.php?folderid='.$fldid.'&sort=0&page='.$i.'&p=0">'.$i.'</a> ';
}
}if ($page < $all){
echo '<a href="/admin_update.php?folderid='.$fldid.'&sort=0&page='.($page+1).'&p=0">Prev</a>';
} echo '</div>';
?>