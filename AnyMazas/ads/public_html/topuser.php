<?php
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$pg= $_GET['page'];
$pg = preg_replace('#[^0-9]#i', '', $pg);
$pg = ereg_replace("[^0-9]", "", $pg);
if($pg>0){$page=' - '.$pg.'';}
if($pg==0)$pg=1;
print $top;
include 'css.php';
print '<title>Top USER'.$page.' :: WapSmsBD.Com</title></head><body>';
include("head.php");
print '<div class="h1">Top USER</div>';
echo '<div class="box">';
////Sms List
	$scount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM user"));
	$pgs=Ceil($scount[0]/20);
	if($pg>$pgs){$pg=$pgs;}
	$pre=$pg-1;
    if($pre>0){$prev=$pre;}else{$prev=1;}
	$nex=$pg+1;
	if($nex>$pgs){$next=$pgs;}else{$next=$nex;}
	$pg--;
	$lmt=$pg*20;
	$pg++;
	$cou=$lmt+1;
	if($pgs=="0")$pgs="1";
	$sql="SELECT * FROM user ORDER BY sms DESC LIMIT ".$lmt.", 20;";
	$sites=MySQL_Query($sql);
	while($site=MySQL_Fetch_Array($sites))
	{
$id = $site['id'];
$name = $site['name'];
$sms = $site['sms'];
print '<div class="utem"><img src="/userar.png" alt="»"/> <a href="/profile/'.$id.'"><b>'.$name.'</b> ( '.$sms.' )</a></div>';		
		$cou++;
	}
echo '<div class="paging">';
   ///// Paging
   if(1<$pgs)
	{   if($pre>0){print '<a href="/topuser/'.$prev.'.html">Prev</a>';}else{print '<b>Prev</b>';}
		if($pgs>$nex-1){print '<a href="/topuser/'.$next.'.html">Next</a>';}else{print '<b>Next</b>';}
		if($pgs>$pg){print '<a href="/topuser/'.$pgs.'.html">Last</a>';}else{print '<b>Last</b>';}
		if($pg>=3){$pp2=$pg-2;echo"<a href=\"/topuser/$pp2.html\">$pp2</a>";}
		if($pg>=2){$pp3=$pg-1;echo"<a href=\"/topuser/$pp3.html\">$pp3</a>";}
		echo"<b>$pg</b>";
		if($pg<=$pgs&&$pg<=$pgs-1){$np1=$pg+1;echo"<a href=\"/topuser/$np1.html\">$np1</a>";}
		if($pg<=$pgs-2){$np2=$pg+2;echo"<a href=\"/topuser/$np2.html\">$np2</a>";}
		if($pg<=$pgs-1){$np3=$pg+1;echo"<a href=\"/topuser/$np3.html\">$np3</a>";}
		if($pg<=$pgs-3){echo"<a href=\"/topuser/$pgs.html\">$pgs</a>";}
		
		
	}
echo '</div></div>';	
print '<a href="/"><b>Home</b></a>';
include("foot.php");
?>