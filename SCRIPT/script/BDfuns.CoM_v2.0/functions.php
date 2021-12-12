<?php
function files($fldr)
{
$dh = opendir($fldr);
while(($f= readdir($dh)) !== false){
if ($f != '.' && $f != '..' && $f != 'index.php') {
$path = $fldr.'/'.$f;
if(is_dir($path)) {
$count += files($path, $count);
} elseif(is_file($path)) {
$count++;
}
}
}
closedir($dh);
return $count;
}
?>
