<?php

include("conf.php");

function connectdb()

{

    global $dbname, $dbuser, $dbhost, $dbpass;

    $conms = @mysql_connect($dbhost,$dbuser,$dbpass); //connect mysql

    if(!$conms) return false;

    $condb = @mysql_select_db($dbname);

    if(!$condb) return false;

    return true;

}
