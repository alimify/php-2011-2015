<?php
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$fileid=$_GET['fileid'];
$fileg=MySQL_Fetch_Array(MySQL_Query("SELECT nm from mydnld where id='".$fileid."';"));
$file=$fileg[0];

$filename = @array_pop(@explode('/',$file));
$ext = @array_pop(@explode('.',$file));
$file= urldecode($file);
if(file_exists($file))
    {
   header("Location:$file");
    }else{echo erro;}
?> 