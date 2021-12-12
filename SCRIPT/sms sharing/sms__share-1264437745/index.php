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
 echo'<?xml version="1.0"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<html><head>';
print'<style type="text/css">';
include ("style.css");
print'</style>';
echo '<title>Welcome</title>';
print'</head><body>';
print'<div class="header">Sms World Demo</div>';
echo"</head>";
//HEADERS END
echo"<body>"; 
echo"<div class=\"center\">";
echo"<center>".Date("D, d F Y ")."</center>";
 echo"<center><form action=\"usersms.php\" method=\"post\">";
	echo"<hr>your name*:<br/><input name=\"snm\" maxlength=\"30\"/><br/>";
	echo"your sms*:<br/><textarea name=\"lnk\" maxlength=\"900\" rows=\"4\" cols=\"25\"/></textarea><br/>";
	 echo "<div>enter the code: <b>";
                     include "brow.dat"; 
                        echo "</b></div><input type=\"text\"  name=\"chis\" maxlength=\"10\" /><br>";
		echo"Category*:<br/><select name=\"catg\">";
	$cats=mysql_query("SELECT * FROM cats ORDER BY name;");
	while($cat=mysql_fetch_array($cats)){echo"<option value=\"$cat[0]\">$cat[1]</option>";}
	echo"</select><br/>";
	echo"<input type=\"submit\" value=\"Add\">";
	echo"</center></form>";
echo"<hr/>";
$rgs=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM sites "));

echo"<img src=\"images/documentsorcopy.png\"/> <a href=\"20sms.php\">Latest 20 Sms</a><br/>";
$result=MySQL_Query("SELECT * from sites WHERE   banned='0' ORDER BY RAND(".time()." * ".time().") LIMIT 1");
$num_rows=MySQL_Num_Rows($result);
$rowrandy=MySQL_Fetch_Array($result);
$id=$rowrandy["id"];
$snm=htmlspecialchars_decode($rowrandy["sitename"]);

$snms=htmlspecialchars_decode($rowrandy["sitelink"]);
$rgs=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM sites"));
if(0<$rgs)
{
	echo"<div class=\"cb\"><div class=\"sender\"><img src=\"images/blank.png\"><b>Random Sms</b></div></div>";
	
	$stringlength = strlen("{$snms}");
if ($stringlength<9)
{$ranzit2 = $snms;
}else
{$ranzit2 = substr("{$snms}",0,40);
$ranzit2 = str_replace('"', '',$ranzit2);
$ranzit2 = "$ranzit2 [...]";
}
	echo"<img src=\"images/textfile.png\" alt=\"\"/> <a href=\"sms.php?sms=$id\">$id $ranzit2</a>";
	{
$chis=$id;
$bro=fopen("brow.dat", "r+");
while (!feof ($bro))
{
$brow=fgets ($bro,1024);
}
if ($chis==$brow) {echo""; $brow =$id;
$bro=fopen("brows.dat", "w+");
chmod("brow.dat", 0666);
fwrite($bro, $brow);
fclose($bro);} else {$brow =$id;
$bro=fopen("brows.dat", "w+");
chmod("brow.dat", 0666);
fwrite($bro, $brow);
fclose($bro); 
}}
}
echo"<hr><div class='sender'><img src=\"images/blank.png\"/><b>Categories:</b></div>";
$cats=MySQL_Query("SELECT * FROM cats;");

while($cat=MySQL_Fetch_Array($cats))

{

	$sno=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM sites WHERE cid='".$cat[0]."' and banned='0'"));
	$desc=MySQL_Fetch_Array(MySQL_Query("SELECT description FROM cats where id='".$cat[0]."'"));
	if($cat[2]=="1")
{
if(isadmin($uid,$pwd)){echo"<img src=\"images/folder.png\"/> <a href=\"smscat.php?cid=$cat[0]&amp;uid=$uid&amp;pwd=$pwd\">$cat[1] ($sno[0])</a> ";}
	else { 
	echo"<img src=\"images/folder.png\"/> <a href=\"18smscat.php?cid=$cat[0]\"><font color=\"red\">$cat[1] ($sno[0])</font></a> ";echo"$desc[0]";}
	if(isadmin($uid,$pwd)){echo"<a href=\"catdelsing.php?cid=$cat[0]&amp;uid=$uid&amp;pwd=$pwd\"><font color=\"red\">X</font></a>";}
	echo"<br/>";
}
elseif($cat[2]=="" OR $cat[2]=="0")
{
	if(isadmin($uid,$pwd)){echo"<img src=\"images/folder.png\"/> <a href=\"smscat.php?cid=$cat[0]&amp;uid=$uid&amp;pwd=$pwd\">$cat[1] ($sno[0])</a> ";}
	else {
	echo"<img src=\"images/folder.png\"/> <a href=\"smscat.php?cid=$cat[0]\">$cat[1] ($sno[0])</a> ";echo"$desc[0]";}
	if(isadmin($uid,$pwd)){echo"<a href=\"catdelsing.php?cid=$cat[0]&amp;uid=$uid&amp;pwd=$pwd\"><font color=\"red\">X</font></a>";}
	echo"<br/>";
}
}






echo"<hr/>";
echo"<img src=\"images/search.png\" alt=\"\"/> <a href=\"search.php\">search sms</a><br/>";
	echo"<hr/>THE RED CATEGORY INDICATE OVER 18.DONT CLICK IF YOU ARE NOT 18.";
echo"<div class=\"footer\">";

echo"<b>&#169; ".date("Y")." $site_name</b><br/>";
echo"</div>";
echo"<div class=\"center\">";
echo"</div>";
echo"</body></html>";
?>