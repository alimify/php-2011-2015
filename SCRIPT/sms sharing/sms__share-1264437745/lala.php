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

$pwd=$_post["pwd"];
$uid=$_post["uid"];
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
echo "<head>\n";

echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
echo"<title>$site_name - Add Category</title>";
echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>";
echo"</head>";
if (empty($_GET['uid']) or empty($_GET['p']))
	{
	
		
		
				echo "<div class=sender><center> <b>Control Panel </b></div>";	   
				echo "<form action=\"adminpanel.php?".SID."\" method=\"get\"> \n";
	        	echo "<div class=\"cont1\">";
				echo "<div class=\"head_title_blue\"><b>admin username</b></div> \n";
	        	echo "<input class=\"itext\" type=\"text\" name=\"uid\" id=\"uid\" maxlength=\"6\" format=\"NNN\" emptyok=\"true\" size=\"15\" /><br/> \n";
	        	echo "<div class=\"head_title_blue\"><b>your password:</b></div> \n";
	        	echo "<input class=\"itext\" type=\"password\" name=\"pwd\" id=\"pwd\" size=\"15\" maxlength=\"50\" /><br/> \n";
	        	echo "<input class=\"ibutton\" type=\"submit\" value=\"submit\" /> <br/></div>\n";
	        	echo "<div class=\"menu\">";
				echo "</form></center>";      	
					

			include "foot.php";
	     
	        exit;
	}
	?>