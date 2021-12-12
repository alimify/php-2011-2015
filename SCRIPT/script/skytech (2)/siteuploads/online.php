<?php
$sqliteDataDir = '../skyitech/log';
if(is_file($sqliteDataDir.'/'.date('Ymd').'.db')){
    $conn = sqlite_open($sqliteDataDir.'/'.date('Ymd').'.db', 0666, $sqliteerror) or die ($sqliteerror);
    $sql = "SELECT COUNT(*) FROM online WHERE updated_at>'".date('H:i:s',time()-600)."'";
    $rs = sqlite_query($conn, $sql);
          sqlite_close($conn);
    echo sqlite_fetch_single($rs).' ';
}
?>
<?
$load = exec('uptime');
$load = explode("average: ",$load);
$load = explode(", ", $load[1]);

echo '<b>'.$load[0].'-'.$load[1].'</b> <small>'.date('h:i:s').'</small>';

include('../skyitech/dbconnect.php');
connectDB();
$sum = skyMysqlRow('select sum(today) from files');
//echo ' Files: '.skyMysqlCount('files');
echo '<b> '.$sum[0].'</b> ';

echo ' <small>- '.$_SERVER['SERVER_ADDR'].'</small>';
echo '<!-- Remote: '.$_SERVER['REMOTE_ADDR'].' - Server: '.$_SERVER['SERVER_ADDR'].' -->';
?>