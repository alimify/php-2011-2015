<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>

    	SKYMp3.In :: Contact Us

	</title>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="language" content="en" />
	<meta name="description" content="SKYMp3.In :: Free Bengali Mp3 Songs, Bollywood Movie Songs, Instrumental, Punjabi Hits, Bhojpuri Songs, DJ Remix Mp3 Songs Free Collection" />

	<meta name="keywords" content="SKYMp3.In :: Free Bengali Mp3 Songs, Bollywood Movie Songs, Instrumental, Punjabi Hits, Bhojpuri Songs, DJ Remix Mp3 Songs Free Collection" />

	<meta name="robots" content="index, follow" />

	<link rel="shortcut icon" href="http://www.skymp3.in/favicon.ico" />
     
	<link rel="stylesheet" href="http://www.skymp3.in/css/skymp3.css?5.0" type="text/css" />

<div class="logo"><a href="http://skymp3.in/"><img alt="skymp3.in" width="180" height="30" src="http://www.skymp3.in/images/SKYMp3.In_logo.png" /></a></div>

</head>
<body>


<center>
<div class="devider">&nbsp;</div>
<h2>For any Complain / Request / Any Suggestion / Problems in Download?</h2>
</div>
<center>
<form method="post" action="sendmail.php">
<?php
$ipi = getenv("REMOTE_ADDR");
$httprefi = getenv ("HTTP_REFERER");
$httpagenti = getenv ("HTTP_USER_AGENT");
?>
<input type="hidden" name="ip" value="<?php echo $ipi ?>" />
<input type="hidden" name="httpref" value="<?php echo $httprefi ?>" />
<input type="hidden" name="httpagent" value="<?php echo $httpagenti ?>" />

<FONT COLOR="#C71585"><b>Your Name:</b></FONT> <br />
<input type="text" name="visitor" size="35" />
<br />
<FONT COLOR="#FFOOOO"><b>Your Email:</b></FONT><br />
<input type="text" name="visitormail" size="35" />
<br />
<FONT COLOR="#228B22"><b>Mobile No:</b></FONT><br />
<input type="text" name="number" size="20" />
<br />
<FONT COLOR="#OOOOFF"><b>About What?:</b></FONT><br />
<select name="attn" size="1">
<option value=" Request ">Request</option>
<option value=" Suggestions ">Suggestions</option>
<option value=" Partnership ">Partnership</option>
<option value=" Link Exchange ">Link Exchange</option>

</select>
<br /><br />
<FONT COLOR="#FFOOOO"><b>Mail Message:</b></FONT><br />
<textarea name="notes" rows="4" cols="40"></textarea>
<br />
<input type="submit" value="Send Mail" />
</form>
	
</body>
	<!-- div class="db">Developed By : <a href="http://www.skyitech.com">SKYiTech.com</a><div --><div class="f1">
	<a href="/" class="siteLink">SKYMp3.In</font>
</div>
</body>
</html>