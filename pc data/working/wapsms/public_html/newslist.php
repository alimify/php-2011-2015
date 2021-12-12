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
$page = $pg;
$folderavaile = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM ntl WHERE cfid = '".$cid."' AND bdtype='1'"));
if($pg==0)$pg=1;
print $top;
print '<link rel="stylesheet" href="/m.css" type="text/css"/>';
$catnm=MySQL_Fetch_Array(MySQL_Query("SELECT name FROM ntl where id='".$cid."'"));
if(!$catnm[0]){ $catnm[0] = 'খবরের বিভাগ সমুহ'; }
print '<title>'.$catnm[0].' :: WapSmsBD.Com</title></head><body>';
include("head.php");
if(!$cid){print '<div class="h1">নতুন খবর</div>';
echo '<div class="box">';
$usql="SELECT * FROM ntl WHERE bdtype = '1' AND ftype = '2' ORDER BY place DESC LIMIT 0, 10;";
	$usites=MySQL_Query($usql);
	while($usite=MySQL_Fetch_Array($usites))
	{
$id = $usite['id'];
$uname = $usite['name'];
print '<div class="udtem"><a href="/news/'.$id.'">'.$uname.'</a></div>';
	}
echo '</div>';	
	}
print '<div class="h1">'.$catnm[0].'</div>';
echo "<div class='box'>";
///Admin Function 
if($mysql_admin){}
if($mysql_admin=='1'){
	$create=$_GET['create'];
	if(isset($_POST['submit'])){
	$ctname=$_POST['ctname'];
	$ctime = time();
	$place=$folderavaile[0]+1;
	$rests = mysql_query("INSERT INTO ntl SET name='".$ctname."', bdtype='1', cuid='".$mysql_id."', ctime='".$ctime."', place='".$place."', cfid='".$cid."'");
	if($rests){echo yes_its_done;}else{echo sql_error;}
	}else{
	if($create=='folderi'){print '<form method="post"><input type="text" name="ctname" value=""/><input type="submit" name="submit" value="submit"/></form>';}
	print '<a href="?cid='.$cid.'&create=folderi">Create New Category</a> | <a href="?cid='.$cid.'&create=add_news">Add News</a>';}}

////Sms List
if(!$folderavaile[0]==0){$fdcount=MySQL_Fetch_Array(MySQL_Query("SELECT COUNT(*) FROM ntl where cfid='".$cid."' and bdtype='1'")); $pgs=Ceil($fdcount[0]/30);}
	if($pg>$pgs){$pg=$pgs;}
	$pre=$pg-1;
    if($pre>0){$prev=$pre;}else{$prev=1;}
	$nex=$pg+1;
	if($nex>$pgs){$next=$pgs;}else{$next=$nex;}
	$pg--;
	$lmt=$pg*30;
	$pg++;
	$cou=$lmt+1;
	if($pgs=="0")$pgs="1";
/// Folder List
if($folderavaile[0]==0){} else{
$fsql="SELECT * FROM ntl where cfid='".$cid."' and bdtype='1' ORDER BY place DESC LIMIT ".$lmt.", 30;";
$flist=MySQL_Query($fsql);
while($fsite=MySQL_Fetch_Array($flist)){$sid = $fsite['id'];$fname = $fsite['name']; $type = $fsite['ftype'];
/// Foldercreating
if($mysql_admin=='1')
{   $sldurl = mysql_fetch_array(mysql_query("SELECT url FROM ntl WHERE id='".$sid."'"));
	if(!$sldurl[0]){$sldurl2='news';}else{$sldurl2=$sldurl[0];}
	$mkdirs="/".$sldurl2."/".$sid."/";
if(!file_exists($mkdirs)){
    $flmdone=mkdir("'.$sldurl2.'/".$sid);
	if($flmdone){
	echo done;
	$mksql="".$sldurl2."/".$sid."";
	$mksqld = mysql_query("UPDATE ntl SET url='".$mksql."' WHERE id='".$sid."'");
	}
}}
if($type=='1'){print '<div class="utem">» <a href="/news/'.$sid.'" title="'.$fname.'" />'.$fname.'</a></div>';}elseif($type=='2'){print '<div class="newslist">» <a href="/news/'.$sid.'" title="'.$fname.'" />'.$fname.'</a></div>';}
 $cou++;}}	
echo '<div class="paging">';
   ///// Paging
   if(1<$pgs)
	{   if($pre>0){print '<a href="/news/'.$cid.'/'.$prev.'">Prev</a>';}else{print '<b>Prev</b>';}
		if($pgs>$nex-1){print '<a href="/news/'.$cid.'/'.$next.'">Next</a>';}else{print '<b>Next</b>';}
		if($pgs>$pg){print '<a href="/news/'.$cid.'/'.$pgs.'">Last</a>';}else{print '<b>Last</b>';}
		if($pg>=3){$pp2=$pg-2;echo"<a href=\"/news/$cid/$pp2\">$pp2</a>";}
		if($pg>=2){$pp3=$pg-1;echo"<a href=\"/news/$cid/$pp3\">$pp3</a>";}
		echo"<b>$pg</b>";
		if($pg<=$pgs&&$pg<=$pgs-1){$np1=$pg+1;echo"<a href=\"/news/$cid/$np1\">$np1</a>";}
		if($pg<=$pgs-2){$np2=$pg+2;echo"<a href=\"/news/$cid/$np2\">$np2</a>";}
		if($pg<=$pgs-1){$np3=$pg+3;echo"<a href=\"/news/$cid/$np3\">$np3</a>";}
		if($pg<=$pgs-3){echo"<a href=\"/news/$cid/$pgs\">$pgs</a>";}
		
		
	}
echo '</div></div>';	


///Return Function
$fldurl = mysql_fetch_array(mysql_query("SELECT url FROM ntl WHERE id='".$cid."' AND bdtype='1'"));
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

$previous=MySQL_Fetch_Array(MySQL_Query("SELECT id from ntl where url='".join('/', $j)."';"));
$g[$i]= ' » <a href="/news/'.$previous[0].'/'.$page.'"><b>'.transdir($u).'</b></a>';

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