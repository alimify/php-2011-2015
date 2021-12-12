<?php
$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$pg= $_GET['page'];
$cid= $_GET['cid'];
$page = $pg;
if($pg==0)$pg=1;
print $top;
print '<link rel="stylesheet" href="/m.css" type="text/css"/>';
$catnm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM folder where id='".$cid."'"));
$fldurl = mysql_fetch_array(mysql_query("SELECT url FROM folder WHERE id='".$cid."'"));
$dir=htmlspecialchars($fldurl[0]);
print "<title>$catnm[0] :: WapSmsBD.Com</title></head><body>";
include("head.php");
if(!$dir)
{print '<div class="h1">SMS Categories</div>';
}
else
{
print '<div class="h1">'.$catnm[0].'</div>';
}
echo "<div class='box'>";
////Sms List
$folderavaile = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM folder WHERE cfid = '".$cid."'"));
$smsavaile = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE cid = '".$cid."'"));
if(!$folderavaile[0]==0){$fdcount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM folder where cfid='".$cid."'")); $pgs=Ceil($fdcount[0]/20);}
if(!$smsavaile[0]==0){$scount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM smsdata where cid='".$cid."'")); $pgs=Ceil($scount[0]/20);}
	if($pg>$pgs){$pg=$pgs;}
	$pre=$pg-1;
    if($pre>0){$prev=$pre;}else{$prev=1;}
	$nex=$pg+1;
	if($nex>$pgs){$next=$pgs;}else{$next=$nex;}
	$pg--;
	$lmt=$pg*20;
	$pg++;
	$cou=$lmt+1;
	if($pgs=="0")$pgs="1";
////Sms List	
if($smsavaile[0]==0){} else{$sql="SELECT * FROM smsdata where cid='".$cid."' ORDER BY id DESC LIMIT ".$lmt.", 20;";
	$sites=MySQL_Query($sql);	
while($site=MySQL_Fetch_Array($sites))
	{
$smsview = $site['smsview'];
$smstext=htmlspecialchars_decode($smsview);			
$snms = nl2br($smstext);
$smsid = $site['id'];
$like = $site['slike'];
print '<div class="smsbox"><div class="sms">'.$cou.' ) '.$snms.'</div><div class="share"><a href="/copy/'.$cid.'/'.$smsid.'/'.$pg.'.html"><b>Copy</b></a> | <a href="/like/'.$cid.'/'.$smsid.'/'.$pg.'.html">Like</a> - '.$like.' | <a href="/copy/'.$cid.'/'.$smsid.'/'.$pg.'.html">Share</a></div></div>';		
		$cou++;
	}}
/// Folder List
if($folderavaile[0]==0){} else{
$fsql="SELECT * FROM folder where cfid='".$cid."' ORDER BY place DESC LIMIT ".$lmt.", 20;";
$flist=MySQL_Query($fsql);
while($fsite=MySQL_Fetch_Array($flist)){$sid = $fsite['id'];$fname = $fsite['name']; $adult = $fsite['adult'];if($adult=="1"){
print '<div class="fmenu">» <a href="/adult/'.$sid.'/'.$fname.'.html" title="'.$fname.'" />'.$fname.'</a></div>';} else{print '<div class="fmenu">» <a href="/'.$sid.'/'.$fname.'.html" title="'.$fname.'" />'.$fname.'</a></div>';}
 $cou++;}}	
echo '<div class="paging">';
   ///// Paging
   if(1<$pgs)
	{   if($pre>0){print '<a href="/'.$cid.'/'.$catnm[0].'/'.$prev.'.html">Prev</a>';}else{print '<b>Prev</b>';}
		if($pgs>$nex-1){print '<a href="/'.$cid.'/'.$catnm[0].'/'.$next.'.html">Next</a>';}else{print '<b>Next</b>';}
		if($pgs>$pg){print '<a href="/'.$cid.'/'.$catnm[0].'/'.$pgs.'.html">Last</a>';}else{print '<b>Last</b>';}
		if($pg>=3){$pp2=$pg-2;echo"<a href=\"/$cid/$catnm[0]/$pp2.html\">$pp2</a>";}
		if($pg>=2){$pp3=$pg-1;echo"<a href=\"/$cid/$catnm[0]/$pp3.html\">$pp3</a>";}
		echo"<b>$pg</b>";
		if($pg<=$pgs&&$pg<=$pgs-1){$np1=$pg+1;echo"<a href=\"/$cid/$catnm[0]/$np1.html\">$np1</a>";}
		if($pg<=$pgs-2){$np2=$pg+2;echo"<a href=\"/$cid/$catnm[0]/$np2.html\">$np2</a>";}
		if($pg<=$pgs-1){$np3=$pg+1;echo"<a href=\"/$cid/$catnm[0]/$np3.html\">$np3</a>";}
		if($pg<=$pgs-3){echo"<a href=\"/$cid/$catnm[0]/$pgs.html\">$pgs</a>";}
		
		
	}
echo '</div></div>';	
/// End Sms List

///Return Function
{

print '<div class="path"><left>
<a href="/"><b>Home</b></a>';

if(($countj=count(explode('/',$dir)))>1)
{
$j=explode('/',$dir);

for($i=0; $i<=$countj; $i++)

{

$u=@$j[count($j)-1];

if($u)

{

$previous=MySQL_Fetch_Array(MySQL_Query("SELECT id from folder where url='".join('/', $j)."';"));
$g[$i]= ' » <a href="/'.$previous[0].'/'.transdir($u).'/'.$page.'.html"><b>'.transdir($u).'</b></a>';

unset($j[count($j)-1]);

}

}

for($i=count(@$g)-1; $i>=0; $i--)

print $g[$i];
}


}
include("foot.php");
print $foot;
?>