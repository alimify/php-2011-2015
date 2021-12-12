<?php
// PenduFun Music Grabber
// Developed by CXUideas
// Scripted by Febin Baiju
// Contact: cxuideas@gmail.com
// Scripted on 19/05/2013

include 'header.php';
$ch = curl_init();

$az = $_GET['az'];
if(empty($az)){
$url = ''.url2.'/muzic/azalbums.php?cat='.$_GET['cat'].'';
include_once 'search.php';
echo '<div class="t">A-Z Collections</div>';}

else{
$url = ''.url2.'/muzic/az.php?cat='.$_GET['cat'].'&az='.$az.'&p='.$_GET['p'].'';
include_once 'search.php';
echo '<div class="t">'.$az.'</div>';
}
include 'curl.php';
$i =0;
$url = ''.url2.'/muzic/cat/'.t.'';
preg_match_all('|<title>(.*?)</title>|is',$store,$titles);

$title = ''.$titles[1][0].'';
echo '<title>'.$title.'</title>';
preg_match_all('|<a href="/muzic/view/(.*?)">(.*?)</a>|is',$store,$outs);
foreach($outs[1] as $out){
$out = urlencode($out);
$lname = $outs[2][$i];
echo '<div class="l"><a href="'.index.'?act=c&t='.$out.'">'.$lname.'</a></div>';
$i++;
}
// To Get Next, Back pages
preg_match_all('|<a href="az.php(.*?)">(.*?)</a>|',$store,$outs);
$i =0;
foreach($outs[1] as $lnk){
$lname = $outs[2][$i];
echo '<div class="l"><a href="'.$lnk.'">'.$lname.'</a></div>';
$i++;}
include_once 'footer.php';
?>
