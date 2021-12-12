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
$pwd=$_GET["pwd"];
$uid=$_GET["uid"];
//HEADERS
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
echo "<head>\n";
echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
echo"<title>$site_name - LATEST SMS BY USERS</title>";
echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>";
echo"</head>";
//HEADERS END
$fh = fopen("./brows.dat", "r");
$str = fgets($fh, 1024);

if ($sms==$str) {echo""; $brow =$str;

echo"<div class=\"header\"><div class=\"t1\"><b>LATEST SMS BY USERS</b></div></div>";
echo"<div align=\"left\">";
if($pg==0)$pg=1;
$pg--;
$lmt=$pg*20;
$pg++;
$cou=$lmt+1;
$pgs=Ceil($scount[0]/20);
$sql="SELECT * FROM sites where id=".$sms."  LIMIT ".$lmt.", 1;";
$sites=MySQL_Query($sql);
while($site=MySQL_Fetch_Array($sites))
{$snms=htmlspecialchars_decode($site[1]);
	$snm=htmlspecialchars_decode($site[3]);
	echo"<div class=\"cb\">$cou. $snm\n<br/>by:$snms</a></div>";
		if($more==1)
{

echo "<a href=\"sms.php?more=0&amp;sms=$sms\">Copy SMS Off</a>";

echo "<br/><textarea name=\"sms\" rows=\"4\" cols=\"40\">$snm by:$snms </textarea><br/>
";

}
else
{
echo "<a href=\"".$self."?more=1&amp;sms=$sms\">Copy SMS</a><br/>";
}
$by ="  by-";
$bys ="-www.smspower.uk.to";

echo "<a href=\"sms:?body=".$snm.$by.$dscr .$bys."\">Forward</a><hr>";
	$cou++;
}
echo"</div>";
include"foot.php";
echo"</body>";
echo"</html>";

exit;
}
else {
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
echo "<head>\n";
echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
echo"<title>$site_name - LATEST SMS BY USERS</title>";
echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>";
echo"</head>";

echo"<div class=\"header\"><div class=\"t1\"><b>LATEST SMS BY USERS</b></div></div>";
echo "go back to main page and click random sms there";
echo"</div>";
include"foot.php";
echo"</body>";
echo"</html>";








}

?>