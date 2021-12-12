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
if(!$dir)
{print '<title>SMS Manager :: WapSmsBD.Com</title>';
}
else
{
print '<title>$catnm[0] :: WapSmsBD.Com</title>';
}
print "</head><body>";
include("head.php");
if(!$dir)
{print '<div class="h1">SMS Categories</div>';
}
else
{
print '<div class="h1">'.$catnm[0].'</div>';
}
echo "<div class='box'>";

// Admin Function
///// Create Folder
$fold.=$dir;
$createdir=$_GET['createdir'];
$cnfolder=$_GET['cnfolder'];
if($createdir) { if(mkdir("./files/$fold/$createdir")) { echo 'New Category Added..!'; } }
if($cnfolder=='new') { echo '<form method="get" action="adminlist-j+z.php">Folder Name:<input type="hidden" name="foldername" value="foldername"/><input type="hidden" name="cid" value="'.$cid.'"/><input type="text" name="createdir" value="New Category"/><input type="submit" value="Submit"/></form>';  }
else { echo '<div class="sms"><b><a href="/adminlist-j+z.php?cnfolder=new&cid='.$cid.'&foldername=Folder">Create New Category</a> | <a href="/admin_addsms.php?cid="'.$cid.'>Add Sms</a></b></div>'; }


//Subfolders
$glob_dir=glob('files/'.$dir.'/*',GLOB_ONLYDIR);
if($glob_dir)
{
$count=sizeof($glob_dir);
$countstr=ceil($count/30);
$start = $page * 30;
if($start>=$count OR $start<0)
{$start=0;}
$end = $start + 30;
if($end>=$count)
{$end = $count;}
for($i=$start; $i<$end; $i++)
{
$dirt=str_replace('files/',null,$glob_dir[$i]);
$dir_exp=explode('/',$dirt);
$count=countf($dirt);
$ctot=ceil($count);
{
$post_bg=($bg++%2== 0) ? "item2" : "item1";
$sc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM folder WHERE url = '".$dirt."'"));
$spc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM folder WHERE cfid = '".$cid."'"));
 $mpc = $spc[0]+1;
 if($sc[0]==0)
         {

      $res = mysql_query("INSERT INTO folder SET name='".transdir($dir_exp[count($dir_exp)-1])."', place='".$mpc."', url='".$dirt."', cfid='".$cid."'");

         }

$folderid = mysql_fetch_array(mysql_query("SELECT id FROM folder WHERE url='".$dirt."'"));
$foldername = mysql_fetch_array(mysql_query("SELECT name FROM folder WHERE url='".$dirt."'"));
print '<div class="fmenu">» <a href="/adminlist-j+z.php?cid='.$folderid[0].'" title="'.$foldername[0].'" />'.$foldername[0].'</a>[<a href="/editf/'.$folderid[0].'/'.$pg.'.html"><b>E</b></a>|<a href="/dltf/'.$folderid[0].'/'.$pg.'.html"><b>X</b></a>]</div>';
}
}
}
////Sms List
    $scount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM smsdata where cid='".$cid."'"));
	$pgs=Ceil($scount[0]/20);
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
	$sql="SELECT * FROM smsdata where cid='".$cid."' ORDER BY id DESC LIMIT ".$lmt.", 20;";
	$sites=MySQL_Query($sql);
	while($site=MySQL_Fetch_Array($sites))
	{
$smsview = $site['smsview'];
$smstext=htmlspecialchars_decode($smsview);			
$snms = nl2br($smstext);
$smsid = $site['id'];
$like = $site['slike'];
print '<div class="smsbox"><div class="sms">'.$cou.' ) '.$snms.'</div><div class="share"><a href="/edits/'.$cid.'/'.$smsid.'/'.$pg.'.html"><b>E</b></a> | <a href="/like/'.$cid.'/'.$smsid.'/'.$pg.'.html">Like</a> - '.$like.' | <a href="/dlts/'.$cid.'/'.$smsid.'/'.$pg.'.html">X</a></div></div>';		
		$cou++;
	}
echo '<div class="paging">';
   ///// Paging
   if(1<$pgs)
	{   if($pre>0){print '<a href="/adminlist-j+z.php?cid='.$cid.'&page='.$prev.'">Prev</a>';}else{print '<b>Prev</b>';}
		if($pgs>$nex-1){print '<a href="/adminlist-j+z.php?cid='.$cid.'&page='.$next.'">Next</a>';}else{print '<b>Next</b>';}
		if($pgs>$pg){print '<a href="/adminlist-j+z.php?cid='.$cid.'&page='.$pgs.'">Last</a>';}else{print '<b>Last</b>';}
		if($pg>=3){$pp2=$pg-2;echo"<a href=\"/adminlist-j+z.php?cid=$cid&page=$pp2\">$pp2</a>";}
		if($pg>=2){$pp3=$pg-1;echo"<a href=\"adminlist-j+z.php?cid=$cid&page=$pp3\">$pp3</a>";}
		echo"<b>$pg</b>";
		if($pg<=$pgs&&$pg<=$pgs-1){$np1=$pg+1;echo"<a href=\"adminlist-j+z.php?cid=$cid&page=$np1\">$np1</a>";}
		if($pg<=$pgs-2){$np2=$pg+2;echo"<a href=\"adminlist-j+z.php?cid=$cid&page=$np2\">$np2</a>";}
		if($pg<=$pgs-1){$np3=$pg+1;echo"<a href=\"adminlist-j+z.php?cid=$cid&page=$np3\">$np3</a>";}
		if($pg<=$pgs-3){echo"<a href=\"adminlist-j+z.php?cid=$cid&page=$pgs\">$pgs</a>";}
		
		
	}
echo '</div></div>';	
/// End Sms List

///Return Function
{

print '<div class="path"><left>
<a href="/adminlist-j+z.php"><b>Root</b></a>';

if(($countj=count(explode('/',$dir)))>1)
{
$j=explode('/',$dir);

for($i=0; $i<=$countj; $i++)

{

$u=@$j[count($j)-1];

if($u)

{

$previous=MySQL_Fetch_Array(MySQL_Query("SELECT id from folder where url='".join('/', $j)."';"));
$g[$i]= ' » <a href="/adminlist-j+z.php?cid='.$previous[0].'"><b>'.transdir($u).'</b></a>';

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