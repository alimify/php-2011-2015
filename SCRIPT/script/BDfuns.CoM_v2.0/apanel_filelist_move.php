<?php
//include 'setup.php';
include 'core.php';
// include 'apanel_settings.php';
include 'apanel_antilogin.php';
$rename=$_GET['folderpath']; $renamer=$_GET['folderpath']; $torename=$_GET['to'];
echo $head;
if(isset($torename)) { if(rename($rename,"$torename")) { echo 'Moved'; } }
else { echo '<form method="get" action="apanel_filelist_move.php">Move To: <input type="hidden" name="folderpath" value="'.$rename.'"/><input type="text" value="'.$renamer.'" name="to"/><input type="submit" value="Submit"></form>'; }
echo $foot; ?>
