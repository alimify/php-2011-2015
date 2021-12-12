<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>

<!-- This Script By alim -->

<title>Top 10 Files | SoftMaza.Net</title><link rel="icon" href="icon.ico" />
<meta name="description" content="Top 10 Files Of SoftMaza.Net"/>
<meta name="keyword" content="games,android apps,android games,android themes,nokia themes,nth themes,sis themes,sisx themes,symbian softwares,mp3,bangla mp3,bollywood mp3,english mp3,kolkata bangla mp3,videos songs,bollywood videos,kolkata bangla videos,bangla videos,latest mp3,wallpaper,themes,software,games,etc"/> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

<?php

///This Script By alim

include("header.php");
// Make a MySQL Connection
  mysql_connect("localhost", "jewelxp_alimc", "(yT=8ZW&72=n") or die(mysql_error());
  mysql_select_db("jewelxp_alimc") or die(mysql_error());

// Get all the data from the "mydnld" table
  $result = mysql_query("SELECT * FROM mydnld GROUP BY nm ORDER BY dload DESC LIMIT 0, 10") 
  or die(mysql_error());  

  
  
  echo"<h2>Top 10 Files</h2>";


// keeps getting the next row until there are no more to get
  while($row = mysql_fetch_array( $result )) {

	// Print out the contents of each row into a table
 $link = $row['nm'];
 $dlaod = $row['dload'];

 //File Extension
   $ext = pathinfo($link, PATHINFO_EXTENSION);

 //Filename 

  $filename = basename($link);

///Table
    echo "<tr><td>"; 

///Thumb
if($ext=='mkv') $dthumb= '<img src="ext/mkv.gif" width="60" height="70" alt="" />';

if($ext=='swf') $dthumb= '<img src="ext/swf.gif" width="60" height="70" alt="" />';

if($ext=='mp3') $dthumb= '<img src="ext/mp3.gif" width="60" height="70" alt="" />';

if($ext=='avi') $dthumb= '<img src="ext/avi.gif" width="60" height="70" alt="" />';

if($ext=='jar') $dthumb= '<img src="ext/jar.gif" width="60" height="70" alt="" />';

if($ext=='3gp') $dthumb= '<img src="ext/3gp.gif" width="60" height="70" alt="" />';

if($ext=='mp4') $dthumb= '<img src="ext/mp4.gif" width="60" height="70" alt="" />';

if($ext=='zip') $dthumb= '<img src="ext/zip.gif" width="60" height="70" alt="" />';

if($ext=='sis') $dthumb= '<img src="ext/sis.gif" width="60" height="70" alt="" />';

if($ext=='sisx') $dthumb= '<img src="ext/sisx.gif" width="60" height="70" alt="" />';

if($ext=='apk') $dthumb= '<img src="ext/apk.gif" width="60" height="70" alt="" />';

if($ext=='apt') $dthumb= '<img src="ext/apk.gif" width="60" height="70" alt="" />';

if($ext=='nth') $dthumb= '<img src="ext/nth.gif" width="60" height="70" alt="" />';

if($ext=='thm') $dthumb= '<img src="ext/thm.gif" width="60" height="70" alt="" />';

if($ext=='wav') $dthumb= '<img src="ext/wav.gif" width="60" height="70" alt="" />';

if($ext=='mid') $dthumb= '<img src="ext/mid.gif" width="60" height="70" alt="" />';

if($ext=='exe') $dthumb= '<img src="ext/exe.gif" width="60" height="70" alt="" />';

//Screenshot

if(file_exists('thumb/'.$filename.'.gif'))

$thumb= '<img src="thumb/'.$filename.'.gif" width="60" height="70" alt="Screen" /><br/>';

else $thumb=$dthumb;

if(file_exists('thumb/'.$filename.'.jpg'))

{print '<img src="pic.php?file=thumb/'.$filename.'.jpg" alt="Screen" /><br />';}

if(file_exists('thumb/'.$filename.'.png'))

{print '<img src="pic.php?file=thumb/'.$filename.'.png" alt="Screen" /><br />';}

if($ext=='jpeg' or $ext=='gif' or $ext=='jpg' and $p)

$thumb= '<img src="pic.php?file='.$link.'" alt="Screen" /><br/>';

///End Thumb

///File Size

  $fil = $link ;
  $size = filesize($fil);

  if($size>1048576)
  $size=round($size/1048576, 2).' MB';
  elseif($size>1024)
  $size=round($size/1024, 2).' KB';
  else
  {$size.=' bytes';}

///End Filesize
  {
  $post_bg=($bg++%2== 0) ? "" : "item1";
        echo "<div class='$post_bg'><table width='100%'><tr><td width='5%'>";
	
        print''.$thumb.' ';
	echo "</td><td></td><td width='95%'>"; 

	echo"<a href='file.php?p=1&file=$link&amp;sort=1'>$filename</a><br/>Size: $size <br/>Hits: $dlaod";
	echo "</td></tr></table></div>"; 
} 
}
  echo"<div class='title'><center><a href='index.php'>Home</a></center></div>";
        

include("footer.php");
?>