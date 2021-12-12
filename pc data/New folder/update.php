<?php

$amount = '20';
$zona = '0';
$array = file('update.dat');
$count = count($array);
$list  = $amount;
$page = 1;
$j = ($count-1)-(($page-1)*$list);
$i = $j-$list;
for(; $i<$j && $j>=0; $j--) {
$up = $j + 1;
$text = explode("|",$array[$j]);

// Mulai data waktu
$wap = mktime(0, 0, 0, $text[6], $text[5], $text[7]);
$sekarang = mktime(0, 0, 0, date("m", time() + ($zona * 6)), date("j", time() + ($zona * 6)), date("y", time() + ($zona * 6)));
{
$post_bg=($bg++%2== 0) ? "" : "";
$text[0]=str_replace('[url=','<a href="',$text[0]);
$text[0]=str_replace('[url]','">',$text[0]);
$text[0]=str_replace('[/url]','</a>',$text[0]);
$text[0]=str_replace('<b>','<strong>',$text[0]);
$text[0]=str_replace('</b>','</strong>',$text[0]);
$text[0]=str_replace('[span=c2]','<span class="c2">',$text[0]);
$text[0]=str_replace('[/span]','</span>',$text[0]);
echo '<div class="update">'.$text[0].'</div>';}}
?>