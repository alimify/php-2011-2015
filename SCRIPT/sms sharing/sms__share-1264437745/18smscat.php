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
	
	echo "<br/>This is Adult category .if you are over 18 then<a href=\"smscat.php?more=0&amp;cid=$cid\">continue</a>";
	echo "otherwise<a href=\"index.php\">[exit]</a>";
	include"foot.php";
	echo"</body>";

echo"</html>";
?>