<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$pg= intval($_GET['page']);
$uid=intval($_GET['uid']);
$unms=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM user where id='".$uid."'"));


if($pg>0){$page=' - '.$pg.'';}
if($pg==0)$pg=1;
print $top;
include 'css.php';
print '<title>Sms of '.$unms[0].''.$page.'</title></head><body>';
include("head.php");
print '<div class="h1">'.$unms[0].' - SMS</div>';
echo '<div class="box">';
////Sms List
	$scount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM smsdata WHERE uid = '".$uid."'"));
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
	$sql="SELECT * FROM smsdata WHERE uid='".$uid."' ORDER BY id DESC LIMIT ".$lmt.", 20;";
	$sites=MySQL_Query($sql);
	while($site=MySQL_Fetch_Array($sites))
	{
$smsid = $site['id'];
$like = $site['slike'];
$cid = $site['cid'];
$smv = $site['smsview'];
$file = file('sms/'.$cid.'.dat');
$smsview = explode("|", $file[$smv]);
$smsview[0]= str_replace ("dslash", "|", $smsview[0]);
$uid = $site['uid'];
$stime = $site['stime'];
$smslength = strlen($smsview[0]);
$cnm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM folder where id='".$cid."'"));
$fnm=str_replace(' ','-',$cnm[0]);
$unm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM user where id='".$uid."'"));
$gtime = date("20y-m-d H:i:s", $stime);
$timeAgoObject = new convertToAgo;
$ts = $gtime;
$convertedTime = ($timeAgoObject -> convert_datetime($ts));
$when = ($timeAgoObject -> makeAgo($convertedTime));
$smsview[0]= str_replace ("mydjslash", "
", $smsview[0]);
print '<div class="smsbox"><div class="sms"><b>'.$cou.' )</b> '.$smsview[0].'<br/>By <a href="/profile/'.$uid.'"><b>'.$unm[0].'</b></a> In <a href="/bangla-sms/'.$fnm.'-'.$cid.'">'.$cnm[0].'</a><div class="likes" align="center"><font color="gray">Likes : '.$like.',Length : '.$smslength.',Added : '.$when.'</font></div></div><div class="share"><a href="/bangla-sms/'.$fnm.'-'.$cid.'.'.$smsid.'-'.$pg.'"><b>Copy</b></a> | <a rel="nofollow" href="/like/'.$cid.'/'.$smsid.'/'.$pg.'.html">Like</a>| <a href="/bangla-sms/'.$fnm.'-'.$cid.'.'.$smsid.'-'.$pg.'">Share</a></div></div>';		
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
		if($pg<=$pgs-1){$np3=$pg+3;echo"<a href=\"/latestsms/$np3.html\">$np3</a>";}
		if($pg<=$pgs-3){echo"<a href=\"/latestsms/$pgs.html\">$pgs</a>";}
		
		
	}
echo '</div></div>';	
print '<a href="/"><b>Home</b></a>';
include("foot.php");













exit;
$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
if(Connect($dbserver,$dbname,$dbuser,$dbpass)){print yes;}else{print nt;};
require 'func_s.php';
$uid= intval($_GET['uid']);

$smsn = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE uid = '1'"));

echo $smsn[0];

$sql="SELECT * FROM smsdata where uid='1' ORDER BY id DESC LIMIT 1, 20;";
	$sites=MySQL_Query($sql);	
while($site=MySQL_Fetch_Array($sites))
	{
$smv = $site['smsview'];
$file = file('sms/'.$cid.'.dat');
$smsview = explode("|", $file[$smv]);
$smsview[0]= str_replace ("dslash", "|", $smsview[0]);
$smsid = $site['id'];
$uid = $site['uid'];
$stime = $site['stime'];
$like = $site['slike'];
$unm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM user where id='".$uid."'"));
$gtime = date("Y-m-d H:i:s", $stime);
$when=getDateTime($gtime);
$smslength = strlen($smsview[0]);
$smsview[0]= str_replace ("mydjslash", "
", $smsview[0]);
print '<div class="smsbox"><div class="sms"><b>'.$cou.' )</b> '.$smsview[0].'<br/>By <a href="http://wapsmsbd.com/profile/'.$uid.'"><b>'.$unm[0].'</b></a><div class="likes" align="center"><font color="gray">Likes : '.$like.',Length : '.$smslength.',Added : '.$when.'</font></div>';
if($mysql_admin=='1' or $mysql_id==$uid){echo editdlt;}
print '<div class="share"><div align="left">'.$smstm.'</div><a href="/bangla-sms/'.$dcnm.'-'.$cid.'.'.$smsid.'-'.$pg.'"><b>Copy</b></a> | <a rel="nofollow" href="/like/'.$cid.'/'.$smsid.'/'.$pg.'.html">Like</a> | <a href="/bangla-sms/'.$dcnm.'-'.$cid.'.'.$smsid.'-'.$pg.'">Share</a></div></div></div>';		
	$cou++;
	}

?>