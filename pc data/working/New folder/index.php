<?php
$title='AnyMaza.Com - The Space Of Free Download And Entertainment';
$pagedescription='Anymaza.com,free bollywood,tollywood,bangla,english mp3 and videos download,youtube video downloader';
$pagekeywords='anymaza,anymaza.com,bollywood,bangla,tollywood,english,hindi,mp3,music,songs,album,movie,mp4,3gp,anymaza,fusionbd,sumirbd,.mobi,.com';
$topextra='<div class="dj c1" align="center"><strong><a href="http://m.facebook.com/anymazapage">Like Us On Facebook</a></strong></div>';
include 'zz_css.php';
include 'zz_config.php';
print $head;
print '<div class="src src1 c1"><small>File Search</small><form action="http://google.com/m/search"><input type="text" name="q" size="15" maxlength="2048" value="" /><input type="hidden" name="as_sitesearch" value="AnyMaza.com" /><input type="submit" value="Search" /></form></div>';
if($adset=='1'){include 'ads/top.php';}
print '<div class="foot">..:: Latest Updates ::..</div>';
include 'update.php';
print '<div id="cateogry">
<h1>Select Categories</h1>';
$sfile ='index.txt';
$index = implode('<br/>', file($sfile));
echo $index;
echo '</div>';
print $foot;
?>