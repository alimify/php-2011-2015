<?php

include 'setup.php';
//include 'core.php';
include 'apanel_antilogin.php';
$func=array('prev'=>'Tag Images','tags'=>'MP3 Tags');
{
foreach($func as $k=>$v)
{ echo"<div class='even'><a href='$k.php'>$v</a></div>";
}
}
?>
