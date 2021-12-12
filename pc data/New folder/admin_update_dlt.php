<?php
$a =$_GET['a'];
$nom =$_GET['nom'];
if ($a == "update"){
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
 Header('Location: http://anymaza.com/admin_update.php');
 }
  }
 fclose($fp);
exit;
}
if ($a == "242"){
 $fl = 'file/242.dat';
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
 Header('Location: http://anymaza.com/admin_file_list.php?folderid=242');
 }
  }
 fclose($fp);
exit;
}
if ($a == "243"){
 $fl = 'file/243.dat';
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
 Header('Location: http://anymaza.com/admin_file_list.php?folderid=243');
 }
  }
 fclose($fp);
exit;
}
if ($a == "244"){
 $fl = 'file/244.dat';
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
 Header('Location: http://anymaza.com/admin_file_list.php?=244');
 }
  }
 fclose($fp);
exit;
}
if ($a == "245"){
 $fl = 'file/245.dat';
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
 Header('Location: http://anymaza.com/admin_file_list.php?folderid=245');
 }
  }
 fclose($fp);
exit;
}


?>
