<?php

$amount = '20';
$array = file('update.dat');
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
$post_bg=($bg++%2== 0) ? "up" : "up";
echo ''.$text[0].' '.$j.' '.$text[1].'';}}

//// paging
if ($count > 20){
$all = ceil($count/$list);
echo '<div class="pgn" align="center">';if ($page > 1){ echo '
<div>Page '.$page.' of '.$all.'</div><a href="/pgn/'.$fldid.'/'.$seotitle.'/'.($page-1).'.html">Prev</a>';} else { echo '<div>Page '.$page.' of '.$all.'</div>';}
$all = ceil($count/$list);
if ($all >= 5){
$tmp = 5;
} else {
$tmp = $all;
}
for ($i=1;$i<=$tmp;$i++) {
if ($page==$i) {

}else {
echo '<a href="/pgn/'.$fldid.'/'.$seotitle.'/'.$i.'.html">'.$i.'</a> ';
}
}if ($page < $all){
echo '<a href="/pgn/'.$fldid.'/'.$seotitle.'/'.($page +1).'.html">Prev</a>';
} echo '</div>';}
?>