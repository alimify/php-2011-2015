<?if(!strstr($PHP_SELF,"index.php") && !$member){$noface=1;include("index.php");}?><?
echo('<?xml version="1.0" encoding="UTF-8"?>');

if($WAP==2)
{
?>

<!-- Start xhtml -->
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="WapRanking.iN is a mobile toplist for mobile web sites. We have over 2000 registered sites." />

	<meta name="keywords" content="WapRanking.iN,Mobile Wap Sites, creat wap toplist, toplist,wap toplist,mobile,toplist,directory,link,mobile toplist,wap,top sites"/> 


<style type="text/css">
body {background-color:#ececec}
a {color:#0000ff;text-decoration:none;}
a:hover{text-decoration: underline;}
body,td {font-family:Arial;color:#000000;font-size:13px;}
tr {background-color:#ffffff}
th,tr.dark {background-color:#cccccc}
.header,.footer{background-color:#A75C7A;padding:3px;color:#ffffff;}
.border{border-bottom:1px solid #98A5B0;border-left:1px solid #98A5B0;border-right:1px solid #98A5B0;}
.ran{background-color:#ececec;}
.ran td{border-bottom:1px solid #98A5B0;}
.ran2{background-color:#ececec;}
.red{color:#FF0000;}
</style>

<title>WapRanking.iN :: No 1 Toplist</title>
</head>
<body>
<div class="header"><b>WapRanking.iN</b></div>
<center>Bookmark Now!<br/>
<a href="http://mywapi.com/?id=waprankingin"><span style="color: #ff0000">New</span> Download</a><br/>
<a href="l.php?t=<?echo($jsum)?>&amp;link=FREE-downloads">New Downloads</a><br/>
<a href="l.php?t=<?echo($jsum)?>&amp;link=NEW-downloads">Free Downloads</a><br/>
<div class="header"><b>Free Download Menu</b></div>
</center>

<table width="100%" cellspacing="0" cellpadding="2">

<?
}
else
{
?>

<!-- Start wml -->
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">
<wml>
<template>
<do type="prev" name="Back">
<prev/>
</do>
</template>
<card id="home" title="WapRanking.iN :: No 1 Toplist">
<p>
<a href="l.php?t=<?echo($jsum)?>&amp;link=new-downloads">New Downloads</a><br/>
Categories:<br/>
<a href=".php"></a><br/>

<br/>
Best:<br/>
<!-- End wml -->

<?
}
?><?
if($WAP==2)
{
?>

<!-- Start xhtml -->
</table>
<div class="header">

<a href="main13.php">&lt; Prev</a><br/>
</div>
<small><?php include("user_online.php");?></small><br/>
<small>7 active sites</small><br/>
<small>in-out stats for 48 hours</small><br/>
<a href="edit.php?wap=add">Add/Edit site</a><br/>
<a href="http://mywapi.com/?id=waprankingin">More Toplist</a>
<div class="header"><b>WapRanking.iN</b></div><p>


<!-- End xhtml -->

<?
}
else
{
?>

<!-- Start wml -->
<br/>
#%NEXT_START%#<a href="#%NEXTPAGE%#.php">Next &gt;</a><br/>#%NEXT_END%#
<a href="main13.php">&lt; Prev</a><br/>
<br/>
<small>7 active sites</small><br/>
<a href="webmasters.php?wap=add">Add site</a><br/>
<!-- End wml -->
<p style="display:none;">
<?
}
?>
<?if($WAP==2){echo('</p></body></html>');}else{echo('</p></card></wml>');}?>