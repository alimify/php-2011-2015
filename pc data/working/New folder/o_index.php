<?php
$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
if($zip)
{include('zip.php');}
print $top;include("ads/ads_config.php");print "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57983417-2', 'auto');
  ga('send', 'pageview');

</script>";print '<title>AnyMaza.Com - The Space Of Free Download And Entertainment</title><meta name="google-site-verification" content="zBpEm83rk2AwctkKff2TYn3SYTZn4zHt5p2QlG7aZe8" /><meta content="chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0; maximum-scale=1.0;"/>
<meta name="revisit-after" content="1 days"/>
<meta content="10" name="pagerank™" />
<meta content="1,2,3,10,11,12,13,ATF" name="serps"/>
<meta content="5" name="seoconsultantsdirectory"/>
<meta content="Abdul Alim Jewel" name="author"/>
<meta content="General" name="Rating"/>
<meta content="never" name="Expires"/>
<meta content="all" name="audience"/>
<meta content="english" name="Language" />
<meta name="format-detection" content="telephone=no"/>
<meta name="HandheldFriendly" content="true"/>
<meta name="robots" content="index,follow"/><meta name="description" content="anymaza,anymaza.com free download,anymaza.com videos,free mp3,fusionbd,fusionbd.com,sumirbd,download bollywood videos,bangla mp3,hindi mp3,english songs download now"/>
<meta name="distribution" content="global"/><meta name="keywords" content="anymaza,anymaza.com,latest bangla mp3,hindi mp3,latest english mp3,latest bollywood mp3,kalkata movie,free download,3gp,mp4,hd mp4,pc hd mp4,hr mp4,hq mp4,mp3,bangla unreleased music,android,apk,fusionbd,sumirbd"/>
<meta name="Identifier-URL" content="http://www.anymaza.com"/><meta http-equiv="Cache-control" content="no-cache"><link rel="shortcut icon" href="http://www.bollyclassic.com/uploads/favicon.ico"/>
<link rel="stylesheet" href="/css/style.css" type="text/css" /></head>
<body>';
print '<div class="logo" align="center"><img src="/logo.png" alt="Anymaza.Com Logo"/></div><div align="center"><div align="center"><div id="mainDiv"><div class="ad2 tCenter"><a href="http://facebook.com/anymazapage">Follow Us For New Updates <img src="fblike.png" alt="AnyMaza.Com on facebook"/></a>
</div> </div></div></div> <div name="search" class="srcb" align="center"><form action="http://google.com/m/search">Search : <input type="text" name="q" size="15%" maxlength="2048" value="" /><input type="hidden" name="as_sitesearch" value="anymaza.com"/><input type="submit" value="Search" /></form></div>';
include("ads/uc_ads.php");
print '<div class="title">Latest Updates</div>';
include("ads/adplay.php");
include("update.php");
include("ads/adiquity.php");
if(!$dir)
{print '<div class="title">Select Category</div>';}
else
{

}


//Subfolders
$sfile ='index.txt';
$index = implode('<br/>', file($sfile));
echo $index;
include("ads/uc_ads.php");
print '<div class="foot" align="center"><b><a href="/desclaimer.php"><font color="white">Desclaimer</font></a> <font color="#006699">|</font> <a href="/contact.html"><font color="white">Contatct</font></a></b></div><div class="footer" align="center">Copyright &copy; AnyMaza.Com</div>';
print $foot;
?>