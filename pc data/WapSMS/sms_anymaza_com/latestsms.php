<?php
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$pg= $_GET['page'];
print '<html><head><link rel="stylesheet" href="/m.css" type="text/css" /><title>Latest SMS :: WapSmsBD.Com</title></head><body>';
include("head.php");
print '<div class="h1">Latest SMS</div>';
echo '<div class="box">';
////Sms List
if($pg==0)$pg=1;
	$scount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM smsdata"));
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
	$sql="SELECT * FROM smsdata ORDER BY id DESC LIMIT ".$lmt.", 20;";
	$sites=MySQL_Query($sql);
	while($site=MySQL_Fetch_Array($sites))
	{
$smsview = $site['smsview'];
$smstext=htmlspecialchars_decode($smsview);			
$snms = nl2br($smstext);
$smsid = $site['id'];
$like = $site['slike'];
$cid = $site['cid'];
print '<div class="smsbox"><div class="sms">'.$cou.' ) '.$snms.'</div><div class="share"><a href="/copy/'.$cid[0].'/'.$smsid.'/'.$pg.'.html"><b>Copy</b></a> | <a href="/like/'.$cid[0].'/'.$smsid.'/'.$pg.'.html">Like</a> - '.$like.' | <a href="/copy/'.$cid[0].'/'.$smsid.'/'.$pg.'.html">Share</a></div></div>';		
		$cou++;
	}
echo '<div class="paging">';
   ///// Paging
   if(1<$pgs)
	{   if($pre>0){print '<a href="/latestsms/'.$prev.'.html">Prev</a>';}else{print '<b>Prev</b>';}
		if($pgs>$nex-1){print '<a href="/latestsms/'.$next.'.html">Next</a>';}else{print '<b>Next</b>';}
		if($pgs>$pg){print '<a href="/latestsms/'.$pgs.'.html">Last</a>';}else{print '<b>Last</b>';}
		if($pg>=3){$pp2=$pg-2;echo"<a href=\"/latestsms/$pp2.html\">$pp2</a>";}
		if($pg>=2){$pp3=$pg-1;echo"<a href=\"/latestsms/$pp3.html\">$pp3</a>";}
		echo"<b>$pg</b>";
		if($pg<=$pgs&&$pg<=$pgs-1){$np1=$pg+1;echo"<a href=\"/latestsms/$np1.html\">$np1</a>";}
		if($pg<=$pgs-2){$np2=$pg+2;echo"<a href=\"/latestsms/$np2.html\">$np2</a>";}
		if($pg<=$pgs-1){$np3=$pg+1;echo"<a href=\"/latestsms/$np3.html\">$np3</a>";}
		if($pg<=$pgs-3){echo"<a href=\"/latestsms/$pgs.html\">$pgs</a>";}
		
		
	}
echo '</div></div>';	
print '<a href="/"><b>Home</b></a>';
include("foot.php");
?>