<?php
///////////////////////sms sharing with mysql and admin panel beta 
/*

shared and made by wapadmin.info from mobtop

miss you rey :)
report bugs at bugs[at]wapadmin.info

/*/
if($gzip=="on"){OB_Start("ob_gzhandler");}else{OB_Start();}
list($msec,$sec)=Explode(CHR(32),MicroTime());
$headtime=$sec+$msec;
include("func.php");
include("conf.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);

$more= $_GET['more'];
$pwd=$_GET["pwd"];
$uid=$_GET["uid"];
$pg=$_GET["pg"];
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";

{if(isadmin($uid,$pwd)){
	$catnm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM cats where id='".$cid."'"));
	echo"<head>";

	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
	echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
	echo"<title>$catnm[0]</title>";
	echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>";
	echo"</head>";
	echo"<body>";
	echo"<div class=\"header\">$catnm[0]</div>";
	echo"<div class=\"left\">";
	if($pg==0)$pg=1;
	$pg--;
	$lmt=$pg*10;
	$pg++;
	$cou=$lmt+1;
	$scount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM sites where banned='0'"));
	$pgs=Ceil($scount[0]/10);
	if($pgs=="0")$pgs="1";
	$sql="SELECT * FROM sites where banned='0'  ORDER BY id DESC LIMIT ".$lmt.", 10;";
	$sites=MySQL_Query($sql);
	while($site=MySQL_Fetch_Array($sites))
	{
		$snm=htmlspecialchars_decode($site[3]);		
			$dscr=htmlspecialchars_decode($site[1]);
			$snmSS=htmlspecialchars_decode($site[2]);
		echo"$cou. $snm</a><br/> by:$dscr";
	$catnmss=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM cats where id='".$snmSS."'"));
	
		echo "<br/>category--$catnmss[0]";
			if(isadmin($uid,$pwd)){echo"<a href=\"delsmsconfirm.php?sid=$site[0]&amp;uid=$uid&amp;pwd=$pwd\"><font color=\"red\">X</font></a>";}

		if($more==1)
{

echo "<br/><a href=\"smscat.php?more=0&amp;cid=$cid&amp;pg=$pg\">Copy SMS Off</a>";

echo "<br/><textarea name=\"sms\" rows=\"4\" cols=\"40\">$snm
by:$dscr </textarea><br/>
<br/>";

}
else
{
echo "<br/><a href=\"".$self."?cid=$cid&amp;more=1&amp;pg=".$pg."\">Copy SMS</a><br/>";
}
$by ="  by-";
$bys ="-www.smspower.uk.to";

echo "<a href=\"sms:?body=".$snm.$by.$dscr .$bys."\">Forward</a><hr>";
		$cou++;
	}
	echo"</div>";
	if(1<$pgs)
	{
		echo"<div class=\"pagin\">";
		if(isadmin($uid,$pwd)){		
		if($pg>3){echo"<span class=\"pages\"><a href=\"smscat.php?pg=1&amp;uid=$uid&amp;pwd=$pwd\">&#171;</a></span>";}
		if($pg>1){$pp1=$pg-1;echo"<span class=\"pages\"><a href=\"smscat.php?cid=$cid&amp;$pp1&amp;more=$more&amp;uid=$uid&amp;pwd=$pwd\"><</a></span>";}
		if($pg>=3){$pp2=$pg-2;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$pp2&amp;cid=$cid&amp;more=$more&amp;uid=$uid&amp;pwd=$pwd\">$pp2</a></span>";}
		if($pg>=2){$pp3=$pg-1;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$pp3&amp;cid=$cid&amp;more=$more&amp;uid=$uid&amp;pwd=$pwd\">$pp3</a></span>";}
		echo"<span class=\"current\">$pg</span>";
		if($pg<=$pgs&&$pg<=$pgs-1){$np1=$pg+1;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$np1&amp;cid=$cid&amp;more=$more&amp;uid=$uid&amp;pwd=$pwd\">$np1</a></span>";}
		if($pg<=$pgs-2){$np2=$pg+2;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$np2&amp;cid=$cid&amp;more=$more&amp;uid=$uid&amp;pwd=$pwd\">$np2</a></span>";}
		if($pg<=$pgs-1){$np3=$pg+1;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$np3&amp;cid=$cid&amp;more=$more&amp;uid=$uid&amp;pwd=$pwd\">></a></span>";}
		if($pg<=$pgs-3){echo"<span class=\"pages\"><a href=\"smscat.php?pg=$pgs&amp;cid=$cid&amp;more=$more&amp;uid=$uid&amp;pwd=$pwd\">&#187;</a></span>";}
		echo"</div>";
		
	}
		else{
		if($pg>3){echo"<span class=\"pages\"><a href=\"smscat.php?pg=1\">&#171;</a></span>";}
		if($pg>1){$pp1=$pg-1;echo"<span class=\"pages\"><a href=\"smscat.php?cid=$cid&amp;$pp1&amp;more=$more\"><</a></span>";}
		if($pg>=3){$pp2=$pg-2;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$pp2&amp;cid=$cid&amp;more=$more\">$pp2</a></span>";}
		if($pg>=2){$pp3=$pg-1;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$pp3&amp;cid=$cid&amp;more=$more\">$pp3</a></span>";}
		echo"<span class=\"current\">$pg</span>";
		if($pg<=$pgs&&$pg<=$pgs-1){$np1=$pg+1;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$np1&amp;cid=$cid&amp;more=$more\">$np1</a></span>";}
		if($pg<=$pgs-2){$np2=$pg+2;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$np2&amp;cid=$cid&amp;more=$more\">$np2</a></span>";}
		if($pg<=$pgs-1){$np3=$pg+1;echo"<span class=\"pages\"><a href=\"smscat.php?pg=$np3&amp;cid=$cid&amp;more=$more\">></a></span>";}
		if($pg<=$pgs-3){echo"<span class=\"pages\"><a href=\"smscat.php?pg=$pgs&amp;cid=$cid&amp;more=$more\">&#187;</a></span>";}
		echo"</div>";}
	}
echo "<a href=\"anothersms.php\">Add Your Sms</a><hr>";
	echo"Page <b>$pg</b> of <b>$pgs</b><hr>";
	echo"<b>$scount[0]</b> sms in this category<br>";
	echo"</p>";

	include"foot.php";
	echo"</body>";}
	else {

}
echo"</html>";}
?>