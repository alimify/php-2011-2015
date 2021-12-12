<?php

$amount = '20';
$zona = '0';
$array = file('file/'.$getflist.'');
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

// Mulai data waktu
$wap = mktime(0, 0, 0, $text[6], $text[5], $text[7]);
$sekarang = mktime(0, 0, 0, date("m", time() + ($zona * 6)), date("j", time() + ($zona * 6)), date("y", time() + ($zona * 6)));
{
$post_bg=($bg++%2== 0) ? "up" : "up";
echo '<div class="fl odd"><a href="'.$text[1].'"><b>'.$text[0].'</b></a> [<a href="/admin_update_rename.php?nom='.$up.'&a='.$fldid.'"> R </a>] [<a href="/admin_update_dlt.php?nom='.$up.'&a='.$fldid.'"> D </a>]</div>';}}

//// paging
$all = ceil($count/$list);
echo '<div class="pgn" align="center">';if ($page > 1){ echo '
<div>Page '.$page.' of '.$all.'</div><a href="/admin_file_list.php?folderid='.$fldid.'&sort=0&page='.($page-1).'&p=0">Prev</a>';} else { echo '<div>Page '.$page.' of '.$all.'</div>';}
$all = ceil($count/$list);
if ($all >= 5){
$tmp = 5;
} else {
$tmp = $all;
}
for ($i=1;$i<=$tmp;$i++) {
if ($page==$i) {

}else {
echo '<a href="/admin_file_list.php?folderid='.$fldid.'&sort=0&page='.$i.'&p=0">'.$i.'</a> ';
}
}if ($page < $all){
echo '<a href="/admin_file_list.php?folderid='.$fldid.'&sort=0&page='.($page+1).'&p=0">Prev</a>';
} echo '</div>';
?>