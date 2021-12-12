<?php session_start();
//include 'setup.php';
error_reporting(0);
include 'core.php';
include 'admin_settings.php';
if(!session_is_registered($password)) { header("Location: login.php"); }

else { echo ''.$head.'<h2>Admin Panel</h2>
<div class="dl2">Normal Functions</div>
<div class="even"><a href="apanel_filelist.php"><div>File Manager</div></a></div>
<div class="odd"><a href="renamer.php"><div>Mass Renamer v2 Files</div></a></div>
<div class="even"><a href="ucopy.php"><div>URL Upload v2</div></a></div>
<div class="odd"><a href="grab2.php"><div>Folder Copy v2</div></a></div>

<div class="dl2">Advanced Functions</div>
<div class="odd"><a href="prev.php"><div>Tag Images v1</div></a></div>
<div class="even"><a href="pnlfunc.php?action=water2"><div>Watermark Images v2</div></a></div>
<div class="odd"><a href="tags.php"><div>Tag Mp3 v1.1</div></a></div>
<div class="even"><a href="urlmp3tag.php"><div>MP3 Tag+Upload v2</div></a></div>
<div class="odd"><a href="mp3tag.php"><div>Manual Mp3 Tag v2.1</div></a></div>

<div class="dl2">End</div>
<div class="even"><a href="apanel_logout.php"><div>Logout</div></a>
</div>'.$foot.''; } ?>
