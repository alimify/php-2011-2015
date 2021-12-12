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

 $more = ''.htmlspecialchars($_GET['more']).''; 
  $pwd = ''.htmlspecialchars($_GET['pwd']).''; 
   $uid = ''.htmlspecialchars($_GET['uid']).''; 
    $pg = ''.htmlspecialchars($_GET['pg']).''; 

    $search= ''.htmlspecialchars($_GET['search']).''; 
	if (empty($_GET['search']) )	{
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
echo "<head>\n";
echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>";
		
				echo "<div class=sender><center> <b>Control Panel </b></div>";	   
				echo "<form action=\"search.php?"."\" method=\"get\"> \n";
	       

	        	echo "<div class=\"head_title_blue\"><b>enter the word to search:</b></div> \n";
	        	echo "<input name=\"search\" id=\"search\" size=\"15\" maxlength=\"50\" /><br/> \n";
	        	echo "<input  type=\"submit\" value=\"submit\" /> <br/></div>\n";

				echo "</form></center>";      	
					

			include "foot.php";
	     exit;
	}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";




	echo"<head>";
	echo"<title>Search</title>";
	echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">";
	echo"</head>";
	echo"<body>";
	echo"<div class=\"header\"><div class=\"t1\"><b>Search</b></div></div>";
	echo"<div align=\"left\">";
	if(!isset($_GET['more'])){$more=0;}else{$more=$_GET['more'];} 
	if(!isset($_GET['pg'])){$page=1;}else{$page=$_GET['pg'];} 
	
	$max_results=10;
	$from=(($page*$max_results)-$max_results);
	
	$sql=MySQL_Query("SELECT * FROM sites WHERE sitelink LIKE '%".$search."%'  AND id >='0' LIMIT $from, $max_results");
	while($row=MySQL_Fetch_Array($sql))
	{
		$sname=$row['sitelink'];
		$link=$row['sitename'];
		$id=$row['id'];
		$from=$from+1;
		
			$snms=htmlspecialchars_decode($sname);
		$ssnm=htmlspecialchars_decode($link);
		echo"$from. $snms <br/>by:$ssnm ";	
	
	if($pg==0)$pg=1;
	$pg--;
	$lmt=$pg*10;
	$pg++;
	$cou=$lmt+1;

	$scount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM sites WHERE sitelink LIKE '%".$search."%'"));

	$pgs=Ceil($scount[0]/10);

	if($more==1){


echo "<br/><textarea name=\"sms\" rows=\"4\" cols=\"40\">$snms
by:$ssnm </textarea><br/>";
echo "<a href=\"search.php?more=0&amp;pg=$pg&amp;search=$search\">Copy SMS Off</a>";
}


$by =" -by-";
$bys ="-www.smspower.uk.to";
	if($more==0)
{
echo "<br/><a href=\"".$self."?more=1&amp;search=$search&amp;pg=".$pg."\">Copy SMS</a>";
}
echo "<br/><a href=\"sms:?body=".$snms.$by.$ssnm .$bys."\">Forward</a><hr>";
	}
	
	echo "<hr>";
	
	
	
	echo"<br/>";

	if($pg>3){echo"<span class=\"pages\"><a href=\"search.php?pg=1\">&#171;</a></span>";}
		if($pg>1){$pp1=$pg-1;echo"<span class=\"pages\"><a href=\"search.php?$pp1&amp;search=$search&amp;more=$more\"><</a></span>";}
		if($pg>=3){$pp2=$pg-2;echo"<span class=\"pages\"><a href=\"search.php?pg=$pp2&amp;search=$search&amp;more=$more\">$pp2</a></span>";}
		if($pg>=2){$pp3=$pg-1;echo"<span class=\"pages\"><a href=\"search.php?pg=$pp3&amp;search=$search&amp;more=$more\">$pp3</a></span>";}
		echo"<span class=\"current\">$pg</span>";
		if($pg<=$pgs&&$pg<=$pgs-1){$np1=$pg+1;echo"<span class=\"pages\"><a href=\"search.php?pg=$np1&amp;search=$search&amp;more=$more\">$np1</a></span>";}
		if($pg<=$pgs-2){$np2=$pg+2;echo"<span class=\"pages\"><a href=\"search.php?pg=$np2&amp;search=$search&amp;more=$more\">$np2</a></span>";}
		if($pg<=$pgs-1){$np3=$pg+1;echo"<span class=\"pages\"><a href=\"search.php?pg=$np3&amp;search=$search&amp;more=$more\">></a></span>";}
		if($pg<=$pgs-3){echo"<span class=\"pages\"><a href=\"search.php?pg=$pgs&amp;search=$search&amp;more=$more\">&#187;</a></span>";}
	echo"</div>";
	echo"<br/>";
	include"foot.php";
	echo"</body>";

echo"</html>";

?>