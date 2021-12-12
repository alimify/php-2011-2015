<?php
$i = $_GET['nom'];
$file = file('file/243.dat');
$content = explode("|", $file[$i]);
echo $content[0];
echo $content[1];
?>