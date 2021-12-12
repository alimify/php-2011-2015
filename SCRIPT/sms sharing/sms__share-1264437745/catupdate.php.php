<?php
///////////////////////sms sharing with mysql and admin panel beta 
/*

shared and made by wapadmin.info from mobtop

miss you rey :)
report bugs at bugs[at]wapadmin.info

/*/
if($gzip=="on"){ob_start("ob_gzhandler");}else{ob_start();}
list($msec,$sec)=explode(chr(32),microtime());
$headtime=$sec+$msec;
include("func.php");
include("conf.php");
connect($dbserver,$dbname,$dbuser,$dbpass);
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$cnm=$_POST["cnm"];
$adult=$_POST["adult"];
$descs=$_POST["descs"];
$catg=$_POST["catg"];
$res=updatecat($uid,$pwd,$cnm,$catg,$descs,$adult);
//HEADERS
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
echo "<head>\n";

echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
echo"<title>$site_name - Add Category</title>";
echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"themes/$site_theme.css\"/>";
echo"</head>";
//HEADERS END
echo"<body>";
echo"<div align=\"center\">";
if($res)
{
	echo"<img src=\"images/accept.png\"/> <b>$cnm</b> added Successfully.<br>";
    echo"<img src=\"images/foldermove.png\"/><a href=\"adminpanel.php?uid=$uid&amp;pwd=$pwd\">Add Another Category</a><br>";
    echo"<img src=\"images/configure.png\"/><a href=\"index.php?uid=$uid&amp;pwd=$pwd&amp;logm=gt\">CPanel</a>";
}
else{echo"<img src=\"images/close.png\" alt=\"\">You don't have the privileges to do this.";}
echo"</div><br>";
include"foot.php";
echo"</body></html>";
?>