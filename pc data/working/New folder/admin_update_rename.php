<?php
print '<title>Renamer</title>'; 
 

$a =$_GET['a'];
$nom =$_GET['nom'];
$post =$_GET['post'];
if ($post == "submit"){
 $bit =$_GET['bit'];
 $new_name = $_GET['new_name'];
$new_url = $_GET['new_url'];
$newwht = $_GET['newwht'];
 $rep = "$new_name|$new_uri|$newwht";
 $fl = $bit;
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
fwrite($fp,$rep."\r\n");
echo "Update no ".$line." Edited :)<br/><a href="/admin_file_list.php">Back</a>";
 }
  }
 fclose($fp);
exit;}
if ($a == "update"){
print '<form action="" method="GET"><textarea name="new_name"></textarea><input type="hidden" name="bit" value="update.dat"><input type="hidden" name="post" value="submit"><input type="hidden" name="nom" value="'.$nom.'"><input type="submit" name="submit" value="submit"></form>'; }
else
{ print '<form action="" method="GET"><input type="hidden" name="bit" value="file/'.$a.'.dat">Title : <br/><input type="text" name="new_name" value=""><input type="hidden" name="post" value="submit"><br/>Url : <br/><input type="text" name="new_url" value=""><input type="hidden" name="nom" value="'.$nom.'"><input type="submit" name="submit" value="submit"></form>'; }

print '<a href="/admin_file_list.php">Back</a>';
?>













