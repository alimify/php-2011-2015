<?php
$amount = '20';
$array = file('sms/s1.dat');
$count = count($array);
$list  = $amount;
if (empty($_GET['page'])) {
$page = 1;
} else {
$page = (int) $_GET['page'];
}
$j = ($count-1)-(($page-1)*$list);
$i = $j-$list;
for(; $i<$j && $j>=0; $j--) {
$up = $j + 1;
$text = explode("|",$array[$j]);
{
$post_bg=($bg++%2== 0) ? "" : "";
echo '<div class="smsbox"><div class="sms">'.$up.')'.$text[0].'</div><div class="share"><a href="/copy/'.$j.'/'.$cid.'.html">Copy</a>|<a href="/like/'.$j.'/'.$cid.'.html">Like</a>-'.$text[1].'|<a href="/copy/'.$j.'/'.$cid.'.html">Share</a></div></div>';}}
?>