<?php
/*
* *
* Updates Script By alim http://facebook.com/alimify
* Release : 2013
* Modify by alim
* * *
*/
require ('update_config.php');
$adminpass = $set[2];
$amount = $set[4];
if (isset($_GET['nom'])){
$nom = $_GET['nom'];
} else {
$nom = '';
}
if (isset($_GET['pass'])){
$pass = $_GET['pass'];
} else {
$pass = '';
}
if ($pass != $adminpass){
die('Khusus admin');
}
else {
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
 &#171; <a href="update_add.php/?pass='.$pass.'">Back</a><br/>
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
echo '<form action="'.$_SERVER['PHP_SELF'].'?a=kirim&amp;pass='.$pass.'" method="post">
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
?>