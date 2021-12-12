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
?>