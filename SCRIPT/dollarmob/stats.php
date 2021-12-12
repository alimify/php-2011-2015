<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/

include 'db.php';
include 'functions.php';

headtag("$SiteName Dashboard");


if($userlog==1){
$uid=dump_udata("id");

$d=date("d");

echo '<div class="title">Showing Stats of '.date("F, Y").'</div>';


echo '<div class="form"><table style="border-collapse: collapse;" align="center">
<tr>
<th class="tbl2">Date</th>
<th class="tbl2">Impressions</th>
<th class="tbl2">Clicks</th>
<th class="tbl2">CTR</th>
<th class="tbl2">Earned</th>
</tr>';

for($i=$d;$i>0;$i--){

if(strlen($i)==1){
 $i="0$i";
}

$datee=date("".$i."-m-Y");

$imps=mysql_fetch_array(mysql_query("SELECT * FROM imp WHERE uid='$uid' AND date='$datee'"));
$imp=$imps["imp"];
if(empty($imp)){
$imp=0;
}
$clicks=mysql_num_rows(mysql_query("SELECT * FROM clicks WHERE userid='$uid' AND time='$datee' AND status='VALID'"));
$ctr=($clicks/$imp)*100;
$earn=($clicks*0.005);

echo '<tr>
<td class="tbl">'.$datee.'</td>
<td class="tbl"><b id="num">'.$imp.'</b></td>
<td class="tbl"><b id="num">'.$clicks.'</b></td>
<td class="tbl"><b id="num">'.substr($ctr,0,5).'%</b></td>
<td class="tbl"><b id="num">'.$earn.' $</b></td>
</tr>';

}
$timps=mysql_query("SELECT * FROM imp WHERE uid='$uid'");
$timp=0;

while($tshow=mysql_fetch_array($timps)){
$timp=($timp+$tshow['imp']);
}
$tclicks=mysql_num_rows(mysql_query("SELECT * FROM clicks WHERE userid='$uid' AND status='VALID'"));
$tctr=($tclicks/$timp)*100;
$tearn=($tclicks*0.005);

echo '<tr>
<td class="tbl2">Total</td>
<td class="tbl2"><b id="num">'.$timp.'</b></td>
<td class="tbl2"><b id="num">'.$tclicks.'</b></td>
<td class="tbl2"><b id="num">'.substr($tctr,0,5).'%</b></td>
<td class="tbl2"><b id="num">'.$tearn.' $</b></td>
</tr>';

echo '



</table></div>';

echo '<div class="ad"><img src="/home.png"/> <a href="/">Home</a> | <a href="/user/dashboard">Dashboard</a></div>';

include 'foot.php';

}
else {
header('Location:/');
}
?>
