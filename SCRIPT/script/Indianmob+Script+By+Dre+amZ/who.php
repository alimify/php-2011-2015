<?php 

echo '<link rel="shortcut icon" href="favicon.ico">
<link href="/enter/style.css" type=text/css rel=stylesheet>';
echo "<title>$sites</title>";
echo '<body id="bodystyle">
<div class="all"> 
<div class="head"><img src="$sitelogourl"></div>';

 Error_Reporting(E_ALL & ~E_NOTICE);
$gl='../';
echo '
<div class="mes">';
print "Online: </div><br />";
$data = file('online.dat');
foreach($data as $val)
{
   $ex = explode('::', $val);
   $ex2 = explode(' ', $ex[0]);
   print "-- <b>".$ex2[0]."</b> - ".date('H:i:s',(int)(trim($ex[2])))."<br />";
}
print '<hr />'; ?>
<?php 
$ip = $_SERVER["REMOTE_ADDR"]; 
print 'Your IP: '.$ip; ?>
<br />
<div class="copy">
<?php

echo "<a href='$djkang'>Home</a><br>";

?>
