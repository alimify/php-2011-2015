<?php

$file=$_GET['file'];
$file= str_replace ("getfilesload", "&", $file);
$filename = @array_pop(@explode('/',$file));
$ext = @array_pop(@explode('.',$file));

if(file_exists($file) && strtolower($ext)=="mp3")
    {
    header('Content-Type: octet/stream');
    header('Content-Disposition: attachment;filename='.$filename.';');
    header('Content-Length: '.filesize($file));
    readfile($file);
    }
    else
header("Location:$file");
?> 




