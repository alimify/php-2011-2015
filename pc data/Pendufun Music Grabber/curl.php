<?php
// PenduFun Music Grabber
// Developed by CXUideas
// Scripted by Febin Baiju
// Contact: cxuideas@gmail.com
// Scripted on 19/05/2013

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER,'http://www.google.com');
@curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);
$store = curl_exec ($ch);
curl_close($ch);
?>
