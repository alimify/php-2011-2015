<?php
/*
* *
* Updates Script By alim http://facebook.com/alimify
* Release : 2013
* 
* * *
*/
require ('update_config.php');
$a = $_GET['a'];
$adminpass = $set[2];
if (isset($_GET['nom'])) { $nom = $_GET['nom']; } else { $nom = ''; }
if (isset($_GET['pass'])) { $pass = $_GET['pass']; } else { $pass = ''; }
if ($pass != $adminpass) { die('Password salah');
exit;
}
if ($a == "hapus"){
 $fl = 'update.dat';
 $line = $nom;
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
 Header('Location: http://SoftMaza.Net/update_add.php/index.php?pass='.$pass.'');
 }
  }
 fclose($fp);
exit;
}
if ($a == "hapus_shout"){
 $fl = 'shout.dat';
 $line = $nom;
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
 Header('Location: http://SoftMaza.Net/update_add.php/index.php?pass='.$pass.'');
 }
  }
 fclose($fp);
exit;
}
if ($a == "hapus_teman"){
 $fl = 'update.dat';
 $line = $nom;
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
 Header('Location: http://SoftMaza.Net/update_add.php?pass='.$pass.'');
 }
  }
 fclose($fp);
exit;
}
if ($a == "hapus_allgb"){
$hapus = fopen("pesan.dat","w+");
header("Location: http://SoftMaza.Net/update_add.php/?pass=".$pass);
exit;
}
if ($a == "hapus_allshout"){
$hapus = fopen("shout.dat","w+");
header("Location: http://SoftMaza.Net/update_add.php/?pass=".$pass);
exit;
}
if ($a == "hapus_allteman"){
$hapus = fopen("update.dat","w+");
header("Location: http://SoftMaza.Net/update_add.php/?pass=".$pass);
exit;
}
?>