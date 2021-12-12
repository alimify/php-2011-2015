<?php
$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$pg= $_GET['page'];
$cid= $_GET['cid'];
$pg = preg_replace('#[^0-9]#i', '', $pg);
$pg = ereg_replace("[^0-9]", "", $pg);
$cid = preg_replace('#[^0-9]#i', '', $cid);
$cid = ereg_replace("[^0-9]", "", $cid);
if(!$pg)$pg="1";
if($pg=="0")$pg="1";
///HEADER
print $top;
print '<link rel="stylesheet" href="/m.css" type="text/css"/>';
$catnm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM folder where id='".$cid."'"));
if(!$catnm[0])
{$catnm[0] = 'Sms Categories';}
print '<title>'.$catnm[0].' :: WapSmsBD.Com</title>';
print '</head><body>';
include("head.php");
print '<div class="h1">'.$catnm[0].'</div>';
echo '<div class="box">';
/// Folder List
$folderavaile = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM folder WHERE cfid = '".$cid."'"));
$pgamount = 20;
$pg--;
$lmt=$pg*$pgamount;
$pg++;
if(!$folderavaile[0]==0){
$pgs = Ceil($folderavaile[0]/$pgamount);
$fsql="SELECT * FROM folder where cfid='".$cid."' ORDER BY place DESC LIMIT ".$lmt.", ".$pgamount.";";
$flist=MySQL_Query($fsql);
while($fsite=MySQL_Fetch_Array($flist)){$sid = $fsite['id'];$fname = $fsite['name']; $adult = $fsite['adult'];if($adult=="1"){
print '<div class="fmenu">» <a href="/adult/'.$sid.'/'.$fname.'.html" title="'.$fname.'" />'.$fname.'</a></div>';} else{print '<div class="fmenu">» <a href="/'.$sid.'/'.$fname.'.html" title="'.$fname.'" />'.$fname.'</a></div>';}
 $cou++;}}	
///SMS LIST
if(file_exists('sms/s'.$cid.'.dat')){
$smsamount = '20';
$pgamount = $smsamount;
$smslist  = $smsamount;
$smsfolder = file('sms/s'.$cid.'.dat');
$smscount = count($smsfolder);
$pgs = Ceil($smscount/$smsamount);
$j = ($smscount-1)-(($pg-1)*$smslist);
$i = $j-$smslist;
for(; $i<$j && $j>=0; $j--) {
$up = $smscount - $j;
$text = explode("|",$smsfolder[$j]);
{
$post_bg=($bg++%2== 1) ? "up" : "up";
echo '<div class="smsbox"><div class="sms">'.$up.')'.$text[0].'</div><div class="share"><a href="/copy/'.$j.'/'.$cid.'/'.$pg.'.html">Copy</a>|<a href="/like/'.$j.'/'.$cid.'/'.$pg.'.html">Like</a>-'.$text[1].'|<a href="/copy/'.$j.'/'.$cid.'/'.$pg.'.html">Share</a></div></div>'; $smsif++; }}}

///Paging FuncTop
echo '<div class="paging">';
if($pg>$pgs){$pg=$pgs;}
	$pre=$pg-1;
    if($pre>0){$prev=$pre;}else{$prev=1;}
	$nex=$pg+1;
	if($nex>$pgs){$next=$pgs;}else{$next=$nex;}
	if($pgs=="0")$pgs="1";
///Paging
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
//// Return Function
$url = mysql_fetch_array(mysql_query("SELECT url FROM folder WHERE id='".$cid."'"));
$dir=htmlspecialchars($url[0]);
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
$g[$i]= ' » <a href="/'.$previous[0].'/'.transdir($u).'.html"><b>'.transdir($u).'</b></a>';

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