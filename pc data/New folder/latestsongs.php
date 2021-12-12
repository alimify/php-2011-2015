<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>

<!-- This Script By Jewel -->

<title>Latest Uploaded Music | AnyMaza.Com</title><meta name="google-site-verification" content="zBpEm83rk2AwctkKff2TYn3SYTZn4zHt5p2QlG7aZe8" /><meta content="chrome=1" http-equiv="X-UA-Compatible"/>
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
<meta name="robots" content="index,follow"/>
<meta name="distribution" content="global"/><meta name="Identifier-URL" content="http://www.anymaza.com"/><meta http-equiv="Cache-control" content="no-cache"><link rel="shortcut icon" href="http://www.bollyclassic.com/uploads/favicon.ico"/><style>body {border-width: 1px; border-color: black; border-bottom-style: solid; padding-top: 3px; padding-bottom: 3px; padding-left: 2px; padding-right: 0px; margin-left: 1px; margin-right: 1px; border-left-style: solid; border-right-style: solid; }.pgn{padding:2px}.pgn a{background-color: #f5f5f5; width: 50%; margin: 10px; border: 1px solid #ccc; padding: 10px;}.pgn a:hover,.newpgn span{background:#ddd;border-color:#ddd}.pgn div{padding-top:5px}.button3 { background-color: #f5f5f5; width: 50%; margin: 10px; border: 1px solid #ccc; padding: 10px;} .button3:hover { -moz-box-shadow: 0 0 5px rgba(0,0,0,0.5); -webkit-box-shadow: 0 0 5px rgba(0,0,0,0.5); box-shadow: red(0,0,0,0.5); }h1{background-color:black;color:white;font-size:15px;text-align:center;}body{max-width:550px;margin:0 auto;background:#e5e5e5}a{color:teal}.a a:link,.a a:visited{color:#ffffff;text-decoration:none}a:link{text-decoration:none}a:link,a:active,a:visited{color:teal;text-decoration:none}a:hover,a:focus{color:teal}a:focus,a:hover{text-decoration:none}a:focus,a:hover{color:teal}hr{border-bottom:1px solid #cacaca;border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-left-style:none;border-left-width:0px}a{text-decoration:none}a:active{color:#622222}a:focus,a:hover{color:maroon;text-transform:uppercase;font-weight:bolder;font-size:18px}.logo {background-color:black;text-align:center;font-size:20px;font-weight:bold;color:white;}</style>


</head>
<body>

<?php

///This Script By Jewel
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$bd = mysql_query("SELECT * FROM mydnld GROUP BY nm ORDER BY id DESC") 
  or die(mysql_error());  


//////////////////////////////////// Jewel's Pagination Logic ////////////////////////////////////////////////////////////////////////
$nr = mysql_num_rows($bd); // Get total of Num rows from the database query
if (isset($_GET['pn'])) { // Get pn from URL vars if it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
    //$pn = ereg_replace("[^0-9]", "", $_GET['pn']); // filter everything but numbers for security(deprecated)
} else { // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
}
//This is where we set how many database items to show on each page
$itemsPerPage = 30;
// Get the value of the last page in the pagination result set
$lastPage = ceil($nr / $itemsPerPage);
// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
if ($pn < 1) { // If it is less than 1
    $pn = 1; // force if to be 1
} else if ($pn > $lastPage) { // if it is greater than $lastpage
    $pn = $lastPage; // force it to be $lastpage's value
}
// This creates the numbers to click in between the next and back buttons
// This section is explained well in the video that accompanies this script
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage;
// Now we are going to run the same query as above but this time add $limit onto the end of the SQL syntax

$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
    }
    // Lay in the clickable numbers display here between the Back and Next links
    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> Next</a> ';
    }
}
///////////////////////////////////// END Adam's Pagination Display Setup ///////////////////////////////////////////////////////////////////////////

// keeps getting the next row until there are no more to get
print '<div class="title" align="center">Latest Uploaded</div>';
 $getdata = mysql_query("SELECT * FROM mydnld GROUP BY nm ORDER BY id DESC $limit") 
  or die(mysql_error());
 while($row = mysql_fetch_array( $getdata )) {

	// Print out the contents of each row into a table
 $link = $row['nm'];
 $id = $row['id'];

 //File Extension
   $ext = pathinfo($link, PATHINFO_EXTENSION);

 //Filename 

  $filename = basename($link);
$filename= str_replace ("(AnyMaza.Com)", "", $filename);
 ///File Size

  $fil = $link ;
  $size = filesize($fil);

  if($size>1048576)
  $size=round($size/1048576, 2).' MB';
  elseif($size>1024)
  $size=round($size/1024, 2).' KB';
  else
  {$size.=' bytes';}
 //Get File Extension
$file_extension=pathinfo(($link), PATHINFO_EXTENSION);
$ext=$file_extension;
 if($ext == 'mp3')
{
require_once('getid3/getid3.php');
$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($link);
getid3_lib::CopyTagsToComments($ThisFileInfo); 
$artist = @$ThisFileInfo['comments_html']['artist'][0];  
$artist= str_replace ("[ AnyMaza.Com ]", "", $artist);
$var= 'Singer : '.$artist.'';
$mrtist= ' By '.$artist.'';
}
else{ $var= 'Filesize : '.$size.'';}
///End Filesize
  {
  $post_bg=($bg++%2== 0) ? "" : "item1";
 print '<div class="button3"><a href="/music/'.$id.'">'.$filename.''.$mrtist.'</a></div>';
} 
}
 print '<div class="tags"><b>Tags : </b> Latest Bangla Mp3 Songs,Latest English Mp3 Songs,Latest Hindi Mp3 Songs,Latest Kalkata Mp3 Songs,Free Bangla Mp3 Songs,Free English Mp3 Songs,Free Hindi Mp3 Songs,Latest Kalkata Mp3 Songs</div><div class="pgn" align="center">'.$paginationDisplay.'</div>';
  echo"<div class='path'><a href='index.php'>Home</a></div>";
        

include("footer.php");
?>