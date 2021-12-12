<?php
$q=$_GET['q'];
$q=urlencode($q);
if($q){header("Location:/index/$q");}else{print 'please input something';}

?>