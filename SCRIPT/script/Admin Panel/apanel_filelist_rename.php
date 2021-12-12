<?php
 include 'apanel_settings.php';
include 'apanel_antilogin.php';
$rename=$_GET['folderpath']; $renamer=$_GET['renamer']; $torename=$_GET['to'];
echo $head;
if(isset($torename)) { if(rename($rename,"./files/$renamer/$torename")) { echo 'Renamed'; } }
else { echo '<form method="get" action="admin_file_rename.php">Rename To: <input type="hidden" name="folderpath" value="'.$rename.'"/><input type="hidden" name="renamer" value="'.$renamer.'"/><input type="text" name="to"/><input type="submit" value="Submit"></form>'; }
?>
