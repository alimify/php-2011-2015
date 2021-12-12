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
Connect($dbserver,$dbname,$dbuser,$dbpass);
$snm=$_POST["snm"];
$snm=HTMLSpecialChars($snm);
$snm=strtolower($snm);
$lnk=$_POST["lnk"];
$lnk=HTMLSpecialChars($lnk);
$catg=$_POST["catg"];

$catg=HTMLSpecialChars($catg);
$search = array(' ', '.');
$replace = array('_', '');
$snm =str_replace($search, $replace, $snm);

$snm =str_replace($search, $replace, $snm);

$search = array('admin', 'owner', 'fuck', 'suck', 'sex', 'gay', 'fck', 'sexy', '  ', '.');
$replace = array('unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', '', '');
$snm =str_replace($search, $replace, $snm);

//HEADERS

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
echo "<head>\n";
echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
echo"<title>$site_name - Add Site</title>";
echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>";
echo"</head>";
//HEADERS END
echo"<body>";

$ss="the name contains less than 4 words or the sms has less than 10 words plz go back and correct it";
 if((strlen($snm)<4)||(strlen($snm)<4)){{include"header.php";}{echo "$ss";} {include"foot.php";}exit();}
 $sss="the name contains greater than 14 words or the sms has greater than 800 words";
 if((strlen($snm)>14)||(strlen($snm)>800)){{include"header.php";}{echo "$ss plz go back and correct it.";}{include"foot.php";} exit();}
{
$chis=$_POST['chis'];
$bro=fopen("brow.dat", "r+");
while (!feof ($bro))
{
$brow=fgets ($bro,1024);
}
if ($chis==$brow) {echo""; $brow =rand(1000, 9999);
$bro=fopen("brow.dat", "w+");
chmod("brow.dat", 0666);
fwrite($bro, $brow);
fclose($bro);} else {$brow =rand(1000, 9999);
$bro=fopen("brow.dat", "w+");
chmod("brow.dat", 0666);
fwrite($bro, $brow);
fclose($bro);  echo"<div class=\"footer\">";
echo"<b>&#169; ".date("Y")." $site_name</b><br/></div>";


echo"</body></html>";
exit;
}}
 
$banned=mysql_fetch_array(mysql_query("SELECT * FROM sites WHERE sitelink='".$lnk."'"));
		if($banned){echo "the sms already there please add another sms.";}else{
$adds=mysql_query("INSERT INTO sites SET sitename='".$snm."',sitelink='".$lnk."',cid='".$catg."',uid='".$uid."'");

$uidid=MySQL_Fetch_Array(MySQL_Query("SELECT * from sites where id>'".$uid."';"));

$snm=HTMLSpecialChars($snm);

	$stid=MySQL_Fetch_Array(MySQL_Query("SELECT * from sites where sitelink='".$lnk."';"));
	
    echo"<div class=\"header\">sms added succesfully</div><br/><img src=\"images/accept.png\"/>dear <b>$snm</b> your sms has been  added Successfully.</div>";
    echo"<div aling=\"left\">";
    echo"sms number: <b>$stid[0]</b><br/>";   
	
echo"<div class=\"center\">";

 echo"<center><hr><form action=\"usersms.php\" method=\"post\">";
	echo"your name*:<br/><input name=\"snm\" maxlength=\"30\"/><br/>";
	echo"your sms*:<br/><textarea name=\"lnk\" maxlength=\"900\" rows=\"4\" cols=\"25\"/></textarea><br/>";
	 echo "<div>enter the code: <b>";
                     include "brow.dat"; 
                        echo "</b></div><input type=\"text\"  name=\"chis\" maxlength=\"10\" /><br>";
		echo"Category*:<br/><select name=\"catg\">";
	$cats=mysql_query("SELECT * FROM cats ORDER BY name;");
	while($cat=mysql_fetch_array($cats)){echo"<option value=\"$cat[0]\">$cat[1]</option>";}
	echo"</select><br/>";
	echo"<input type=\"submit\" value=\"Add\">";
	echo"</center></form><hr>";


echo"<br/>";}
include"foot.php";
