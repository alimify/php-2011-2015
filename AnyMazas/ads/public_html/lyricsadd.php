<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
print '<html><head><link rel="stylesheet" href="/m.css" type="text/css"/><title>Post New Lyrics :: WapSmsBD.Com</title></head>';
echo '<body>';
print '<div class="logo" align="left"><div><a href="/"><font size="5" color="white">WapSmsBD.Com</font></a></div></div>';
print '<div class="h1">Add Lyrics</div>';
echo '<div class="box">';
if($mysql_status=='2'){print 'Your account is inactive,you need to active your account.to active your account please login your email and check inbox,also spam folder.<br/>dont recieve mail? <a href="/resendmail"><b>Resend</b></a> ';}
if($mysql_status=='3'){print 'Your Account has been blocked';}
if(!$mysql_status){  header('Location:/user/login/');  }
if($mysql_status=='1'){

if(isset($_POST['Submit'])){
	$entitle=urlencode(htmlspecialchars($_POST["entitle"]));
	$bntitle=urlencode(htmlspecialchars($_POST["bntitle"]));
	$album=urlencode(htmlspecialchars($_POST["album"]));
	$singer=urlencode(htmlspecialchars($_POST["singer"]));
	$tags=urlencode(htmlspecialchars($_POST["tags"]));


$res = mysql_query("INSERT INTO extra SET uid='".$mysql_id."', entitle='".$entitle."',bntitle='".$bntitle."',album='".$album."',singer='".$singer."',tags='".$tags."', type='1'");

if($res){

	$stid=MySQL_Fetch_Array(MySQL_Query("SELECT * from extra where entitle='".$entitle."' and bntitle='".$bntitle."' and album='".$album."' and singer='".$singer."' and tags='".$tags."';"));


$lyrics=htmlspecialchars($_POST['lyrics']);
$d_open = fopen("extra/lyricsTxt/lid_$stid[0].txt","w+");
$lwrite=fwrite($d_open, $lyrics);
$lclose=fclose($d_open);
if($lwrite && $lclose){print '<center><font color="green">Successfully Added !</font><br/><a href="/lyricsedit.php?sid='.$stid[0].'"><b>Editing</b></a></center>';}	

}

}


print '<center><form action="" method="post">Lyrics : <br/><textarea name="lyrics"></textarea><br/>English Title : <br/><input type="text" name="entitle"><br/>Bangla Title : <br/><input type="text" name="bntitle"><br/>Album :<br/><input type="text" name="album"><br/>Singer : <br/><input type="text" name="singer"><br/>Tags : <br/><textarea name="tags"></textarea><br/><input type="submit" name="Submit"></form></center>';
}
echo '</div>';

print '<a href="/"><b>Home</b></a>';

include("foot.php"); 
echo '</body></html>';
?>