<?php

$dbuser="admin_blog";               //Database User Username
$dbpass="blogger";                    //Database User Password
$dbserver="localhost";          //Database Server(Usually "Localhost")
$dbname="admin_tblog";        //Database Name
 
 function connect($dbhost,$dbname,$dbuser,$dbpass)
{
    $conn=@mysql_connect($dbhost,$dbuser,$dbpass);
    if(!$conn)return false;
    $db=@mysql_select_db($dbname);
    if(!$db)return false;
    return true;
}
?>