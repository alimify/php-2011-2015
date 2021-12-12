<?php
// PenduFun Music Grabber
// Developed by CXUideas
// Scripted by Febin Baiju
// Contact: cxuideas@gmail.com
// Scripted on 19/05/2013

include 'header.php';
$ch = curl_init();
$url = urldecode(''.url3.'/muzic/view/'.t.'');
include 'curl.php';
preg_match_all('|<img alt="(.*?)" src="(.*?)">|is',$store,$outs);
$outs[2][0] = str_replace('><br>',null,$outs[2][0]);
$outs[2][0] = str_replace('<span',null,$outs[2][0]);
echo '<div class="t">Download Page</div><center><img src="'.$outs[2][0].'" alt="'.$outs[1][0].'" width="'.width.'" height="'.height.'" /></center>';
preg_match_all('|<span class="style1">(.*?)</span>|is',$store,$outs);
$title = ''.$outs[1][0].'';
echo '<title>'.$title.'</title>';
preg_match_all('|<a href="/muzic/artist/(.*?)"><span class="mr">(.*?)</span></a>|is',$store,$arts);
$artist = implode(', ',$arts[0]);
$artist = str_replace('<span class="mr">',null,$artist);
$artist = str_replace('</span>',null,$artist);
$artist = str_replace('/muzic/artist/','artist.php?t=',$artist);
preg_match_all('|<span class="style1"> Releases Date :</span> (.*?)<br>|is',$store,$dateA);
echo '<div class="t">File Information</div>';
echo '<div class="l">Name: '.$title.'</div>';
$year= intval($dateA[1][0]);
if($year=='0'){
$year = 'Unknown'; }
echo '<div class="l">Year: '.$year.'</div>';
echo '<div class="l">Album Artists: '.$artist.'</div>';
preg_match_all('|<a href="(.*?)">(.*?)</a>|is',$store,$outs);
echo '<div class="t">Download</div>';
foreach($outs[0] as $out){
if(preg_match('/muzic\/download\//i',$out)){
$out = str_replace('/muzic/download/','download.php?act=a&t=',$out);
echo '<div class="l">'.darrow.''.$out.'</div>'; }
}
include 'footer.php';
?>
