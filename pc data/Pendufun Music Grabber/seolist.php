<?php
$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
$pg= $_GET['page'];
$cid= $_GET['cid'];
$pg = preg_replace('#[^0-9]#i', '', $pg);
$pg = ereg_replace("[^0-9]", "", $pg);
$cid = preg_replace('#[^0-9]#i', '', $cid);
$cid = ereg_replace("[^0-9]", "", $cid);
if($pg){$fds = ' (Page-'.$pg.')';}
$seodesc=@file_get_contents('seo/'.$cid.'-desc.txt');
$seokey=@file_get_contents('seo/'.$cid.'-key.txt');
$page = $pg;
if($pg==0)$pg=1;
print $top;
if($seodesc){print '<meta name="description" content="'.$seodesc.'"/>';}
if($seokey){print '<meta name="keywords" content="'.$seokey.'">';}
include 'css.php';
$catnm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM folder where id='".$cid."'"));
$dcnm=str_replace(' ','-',$catnm[0]);
if(!$catnm[0]){ $catnm[0] = 'Select Categories'; }
print '<title>'.$catnm[0].' - Bangla '.$catnm[0].''.$fds.' - Bangla Sms :: WapSmsBD.Com</title></head><body>';
include("head.php");
print '<div class="h1">'.$catnm[0].'</div>';

echo "<div class='box'>";
if($cid!='0'){if($cid!='66'){print '<div align="center"><a href="/usersms/'.$cid.'"><b>Add Your Sms</b></a></div>';}}
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
if($smsavaile[0]==0){} else{
	$sql="SELECT * FROM smsdata where cid='".$cid."' ORDER BY id DESC LIMIT ".$lmt.", 20;";
	$sites=MySQL_Query($sql);	
while($site=MySQL_Fetch_Array($sites))
	{
$smv = $site['smsview'];
$file = file('sms/'.$cid.'.dat');
$smsview = explode("|", $file[$smv]);
$smsview[0]= str_replace ("dslash", "|", $smsview[0]);
$smsid = $site['id'];
$uid = $site['uid'];
$stime = $site['stime'];
$like = $site['slike'];
$unm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM user where id='".$uid."'"));
$gtime = date("20y-m-d H:i:s", $stime);
$timeAgoObject = new convertToAgo;
$ts = $gtime;
$convertedTime = ($timeAgoObject -> convert_datetime($ts));
$when = ($timeAgoObject -> makeAgo($convertedTime));
$smslength = strlen($smsview[0]);
$smsview[0]= str_replace ("mydjslash", "
", $smsview[0]);
print '<div class="smsbox"><div class="sms"><b>'.$cou.' )</b> '.$smsview[0].'<br/>By <a href="http://wapsmsbd.com/profile/'.$uid.'"><b>'.$unm[0].'</b></a><div class="likes" align="center"><font color="gray">Likes : '.$like.',Length : '.$smslength.',Added : '.$when.'</font></div>';
if($mysql_admin=='1' or $mysql_id==$uid){echo editdlt;}
print '<div class="share"><div align="left">'.$smstm.'</div><a href="/bangla-sms/'.$dcnm.'-'.$cid.'.'.$smsid.'-'.$pg.'"><b>Copy</b></a> | <a rel="nofollow" href="/like/'.$cid.'/'.$smsid.'/'.$pg.'.html">Like</a> | <a href="/bangla-sms/'.$dcnm.'-'.$cid.'.'.$smsid.'-'.$pg.'">Share</a></div></div></div>';		
	$cou++;
	}}
/// Folder List
if($folderavaile[0]==0){} else{
$fsql="SELECT * FROM folder where cfid='".$cid."' ORDER BY place DESC LIMIT ".$lmt.", 20;";
$flist=MySQL_Query($fsql);
while($fsite=MySQL_Fetch_Array($flist)){$sid = $fsite['id'];$fname = $fsite['name']; $smstcount = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE cid = '".$sid."'")); $adult = $fsite['adult'];
$fnames=str_replace(' ','-',$fname);
if($adult=="1"){
print '<div class="fmenu">» <a href="/adult/'.$sid.'/'.$fnames.'.html" title="'.$fname.'" />'.$fname.'</a> ('.$smstcount[0].')</div>';} else{print '<div class="fmenu">» <a href="/bangla-sms/'.$fnames.'-'.$sid.'" title="'.$fname.'" />'.$fname.'</a> ('.$smstcount[0].')</div>';}
 $cou++;}}	
echo '<div class="paging">';
   ///// Paging
   if(1<$pgs)
	{   if($pre>0){print '<a href="/bangla-sms/'.$dcnm.'-'.$cid.'.'.$prev.'">Prev</a>';}else{print '<b>Prev</b>';}
		if($pgs>$nex-1){print '<a href="/bangla-sms/'.$dcnm.'-'.$cid.'.'.$next.'">Next</a>';}else{print '<b>Next</b>';}
		if($pgs>$pg){print '<a href="/bangla-sms/'.$dcnm.'-'.$cid.'.'.$pgs.'">Last</a>';}else{print '<b>Last</b>';}
		if($pg>=3){$pp2=$pg-2;echo"<a href=\"/bangla-sms/$dcnm-$cid.$pp2\">$pp2</a>";}
		if($pg>=2){$pp3=$pg-1;echo"<a href=\"/bangla-sms/$dcnm-$cid.$pp3\">$pp3</a>";}
		echo"<b>$pg</b>";
		if($pg<=$pgs&&$pg<=$pgs-1){$np1=$pg+1;echo"<a href=\"/bangla-sms/$dcnm-$cid.$np1\">$np1</a>";}
		if($pg<=$pgs-2){$np2=$pg+2;echo"<a href=\"/bangla-sms/$dcnm-$cid.$np2\">$np2</a>";}
		if($pg<=$pgs-1){$np3=$pg+3;echo"<a href=\"/bangla-sms/$dcnm-$cid.$np3\">$np3</a>";}
		if($pg<=$pgs-3){echo"<a href=\"/bangla-sms/$dcnm-$cid.$pgs\">$pgs</a>";}
		
		
	}
echo '</div></div>';	
/// End Sms List

///Return Function
$fldurl = mysql_fetch_array(mysql_query("SELECT url FROM folder WHERE id='".$cid."'"));
$dir=htmlspecialchars($fldurl[0]);
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
$frnm=str_replace(' ','-',transdir($u));
$g[$i]= ' » <a href="/bangla-sms/'.$frnm.'-'.$previous[0].'"><b>'.transdir($u).'</b></a>';

unset($j[count($j)-1]);

}

}

for($i=count(@$g)-1; $i>=0; $i--)

print $g[$i];
}


}
if(!$mysql_status){print '<div class="seotags"><b>Tags : </b>Bangla Sms,'.$catnm[0].',Bangla '.$catnm[0].',Free '.$catnm[0].','.$catnm[0].' Bangla,Bengali '.$catnm[0].','.$catnm[0].' Bengali,'.$catnm[0].'</div>';}
include("foot.php");
print $foot;
?>