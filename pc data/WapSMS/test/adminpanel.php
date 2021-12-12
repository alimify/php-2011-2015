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
if(isadmin($uid,$pwd))
{
	echo"<div class=\"t1\"><b>Add category</b></div>";
    echo"<div aling=\"left\">";
    echo"<form action=\"categorygonfirm.php?uid=$uid&amp;pwd=$pwd\" method=\"post\">";
    echo"Name:<br/><input name=\"cnm\" maxlength=\"30\"/><br/>";
	    echo"description:<br/><input name=\"descs\" maxlength=\"30\"/><br/>";
    echo"Adult: <input type=\"checkbox\" name=\"adult\" value=\"1\"><br/>";
    echo"<input type=\"submit\" value=\"Add\">";
    echo"</form>";
	echo"<img src=\"images/close.png\"/><a href=\"index.php?uid=$uid&amp;pwd=$pwd\">INDEX</a>";
	echo"<br/><img src=\"images/close.png\"/><a href=\"adminallsms.php?uid=$uid&amp;pwd=$pwd\">All Sms</a>";
	echo"<div class=\"t1\"><b>update category</b></div>";
    echo"<div aling=\"left\">";
    echo"<form action=\"catupdate.php.php?uid=$uid&amp;pwd=$pwd\" method=\"post\">";
    echo"Name:<br/><input name=\"cnm\" maxlength=\"30\"/><br/>";
	echo"Category*:<br/><select name=\"catg\">";
	  $cats=mysql_query("SELECT * FROM cats ORDER BY name;");
	while($cat=mysql_fetch_array($cats)){echo"<option value=\"$cat[0]\">$cat[1]</option>";}
	echo"</select><br/>";
	    echo"description:<br/><input name=\"descs\" maxlength=\"30\"/><br/>";
    echo"Adult: <input type=\"checkbox\" name=\"adult\" value=\"1\"><br/>";
    echo"<input type=\"submit\" value=\"Add\">";
    echo"</form>";
	
	echo"</div><br/>";
	
	
	
	
	 echo"<form action=\"adminsms.php?uid=$uid&amp;pwd=$pwd\" method=\"post\"> ";
	
	echo"<hr>admin<hr>your name*:<br/><input name=\"snm\" maxlength=\"30\"/><br/>";
	echo"your sms*:<br/><textarea name=\"lnk\" maxlength=\"900\" rows=\"4\" cols=\"40\"/></textarea><br/>";
	
           
                 
		echo"Category*:<br/><select name=\"catg\">";
	$cats=mysql_query("SELECT * FROM cats ORDER BY name;");
	while($cat=mysql_fetch_array($cats)){echo"<option value=\"$cat[0]\">$cat[1]</option>";}
	echo"</select><br/>";
	echo"<input type=\"submit\" value=\"Add\">";
	echo"</form>";
}
else{echo"<p aling=\"center\"><img src=\"images/close.png\" alt=\"\"/>You don't have the Privileges to do this.</p>";}
include"foot.php";
echo"</body></html>";
?>