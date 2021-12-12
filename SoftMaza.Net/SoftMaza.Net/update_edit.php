<?php
/*
* *
* Updates Script By alim http://facebook.com/alimify
* Release : 2013

* * *
*/
require ('update_config.php');
$adminpass = $set[2];
$b = $_GET['b'];
if (isset($_GET['nom'])) { $nom = $_GET['nom']; } else { $nom = ''; }
if (isset($_GET['pass'])) { $pass = $_GET['pass']; } else { $pass = ''; }
if ($pass != $adminpass) { die('Uppzz khusus admin.'); }
else {
if ($b == "gb"){
$fl = "update.dat";
}
if ($b == "shout"){
$fl = "shout.dat";
}
 $line = $nom;
 $file = file($fl);
 $count = count($file);
 for($i=0;$i<$count;$i++)
 {
 if($i==$line-1) { list($nick, $mail, $site, $jam, $mess, $tgl_site, $bln_site, $thn_site, $ua, $ip, $pilih, $via, $answ) = explode('|', $file[$i]); }
 }
 
 $nick = trim($nick);
 $mail = trim($mail);
 $site = trim($site);
 $jam = trim($jam);
 $mess = trim($mess);
$tgl_site = trim($tgl_site);
$bln_site = trim($bln_site);
$thn_site = trim($thn_site);
$ua = trim($ua);
$ip = trim($ip);
$pilih = trim($pilih);
$via = trim($via);
 $answ = trim($answ);
 $head = '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
 <html>
 <head>
 <title>Edit Update</title>
 <meta http-equiv="Pragma" content="no-cache"/>
 <link rel="stylesheet" type="text/css" href="style.css"/>
 </head>
 <body>
 <div class="title">Admin Area</div>';
 $foot = '<div class="navigation">
 &#171; <a href="http://anymaza.com">Home</a><br/>
 </div>
 <div class="footer">&#169; '.$set[1].'</div>
 </body>
 </html>';
 echo $head;
$a = $_GET['a'];
switch($a){
case "kirim":
 echo '<div class="body">';
$new_nick = $_POST['new_nick'];
$new_mail = $_POST['new_mail'];
$new_site = $_POST['new_site'];
$new_date = $_POST['new_date'];
$new_mess = $_POST['new_mess'];
$new_tgl = $_POST['new_tgl'];
$new_bln = $_POST['new_bln'];
$new_thn = $_POST['new_thn'];
$new_ua = $_POST['new_ua'];
$new_ip = $_POST['new_ip'];
$new_pilih = $_POST['new_pilih'];
$new_via = $_POST['new_via'];
$new_answ = $_POST['new_answ'];
if ($b == "gb"){
$fl = "update.dat";
}
if ($b == "shout"){
$fl = "shout.dat";
}
$line = $nom;
$rep = "$new_nick|$new_mail|$new_site|$new_date|$new_mess|$new_tgl|$new_bln|$new_thn|$new_ua|$new_ip|$new_pilih|$new_via|$new_answ";
$file = file($fl);
$count = count($file);
$fp = fopen($fl,"w");
for($i=0;$i<$count;$i++)
{
if($i!=$line-1)
{
fwrite($fp,$file[$i]);
}
else
{
fwrite($fp,$rep."\r\n");
echo "Update no ".$line." Edited :)<br/>";
}
}
fclose($fp);
if($fp) {
echo '&raquo; <a href="update_add.php?pass='.$pass.'">Back</a><br/>';
}
 echo '</div>';
break;
default:
 echo '<div class="body">
 <form action="'.$_SERVER['PHP_SELF'].'?a=kirim&amp;b='.$b.'&amp;nom='.$nom.'&amp;pass='.$pass.'" method="post">
* Category :<br/>
 <input name="new_nick" type="text" value="'.$nick.'"/><br/>
 Url :<br/>
 <input name="new_mail" type="text" value="'.$mail.'"/><br/>
 * Details :<br/>
 <input name="new_site" type="text" value="'.$site.'"/><br/>
 <input name="new_date" type="hidden" value="'.$jam.'"/>
<input name="new_tgl" type="hidden" value="'.$tgl_site.'"/>
<input name="new_bln" type="hidden" value="'.$bln_site.'"/>
<input name="new_thn" type="hidden" value="'.$thn_site.'"/>
<input name="new_ua" type="hidden" value="'.$ua.'"/>
<input name="new_ip" type="hidden" value="'.$ip.'"/>
<input name="new_via" type="hidden" value="'.$via.'"/>
';
if ($b == "gb"){
echo ':D : <br/>
<select name="new_pilih">
<option value="gb">Public</option>

</select><br/>';
} else {
echo '<input name="new_pilih" type="hidden" value="'.$pilih.'"/>';
}
echo '<input name="send" type="submit" value="Edit"/><br/>
 <span style="color: #999999; font-weight: bold;">* require !</span>
 </form>
 </div>';
break;
}
echo $foot;
}
?>