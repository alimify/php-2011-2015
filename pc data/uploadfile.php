<title>Remote upload made by Jewel</title>
<center>
<?php
$folderid = $_GET['folderid'];
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
print '<form method="post"><input name="folderid" size="40" type="hidden" value="'.$folderid.'" />URL :<br/>
<input name="url" size="50" /><br/>File Name :<br/><input name="fyname" size="50" /><br/>
<input name="submit" type="submit" />
</form>';

// maximum execution time in seconds
set_time_limit (24 * 60 * 60);

if (!isset($_POST['submit'])) die();
$fldid = $_POST['folderid'];
$fldurl = mysql_fetch_array(mysql_query("SELECT folderurl FROM folder WHERE folderid='".$fldid."'"));
// folder to save downloaded files to. must end with slash
$destination_folder = 'files/'.$fldurl[0].'/';
$url = $_POST['url'];
$fyname = $_POST['fyname'];        
$file_extension=pathinfo(($url), PATHINFO_EXTENSION);
$ext=$file_extension;
$flname ="$fyname(AnyMaza.Com).$ext";
$newfname = $destination_folder . $flname;
$file = fopen ($url, "rb");
if ($file) {
  $newf = fopen ($newfname, "wb");

  if ($newf)
  while(!feof($file)) {
    fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
  }
}

if ($file) {
  fclose($file);
}

if ($newf) {
  fclose($newf);
}

?>
</center>
