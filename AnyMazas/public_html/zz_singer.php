<?php
$singer=htmlspecialchars($_GET['singer']);
$singerst= str_replace (" ", "_", $singer);
$singerst= str_replace ("-", "_", $singerst);
$singerst = strtolower($singerst);
header('location:/singer_'.$singerst.'_mp3_songs');

?>