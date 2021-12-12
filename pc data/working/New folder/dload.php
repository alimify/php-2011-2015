<?php

 include("conf.php");

 include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);

$file = $_GET['file'];

 $sc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mydnld WHERE nm = '".$file."'"));

 if($sc[0]==0)
         {

      $res = mysql_query("INSERT INTO mydnld SET nm='".$file."', dload='1', lastdload='".time()."'");

         }else{

      $nmbr = mysql_fetch_array(mysql_query("SELECT dload FROM mydnld WHERE nm='".$file."'"));
      $finl = $nmbr[0]+1;
      $res = mysql_query("UPDATE mydnld SET dload='".$finl."', lastdload='".time()."' WHERE nm='".$file."'");
            
         }

header("Location:$file");




?> 




