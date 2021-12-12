<?php
$mt=microtime(1);
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';
print $top;
print '<meta name="description" content="বাংলা sms,bangla sms,বাংলা এস এম এস,bangla love sms,bangla sad sms,bangla koster sms,shuvo sokal sms,শুভ সকাল এস এম এস,www.bangla sms.com,bangla good night sms"/>
<meta name="keywords" content="বাংলা sms,bangla sms,বাংলা এস এম এস,bangla love sms,bangla sad sms,bangla koster sms,shuvo sokal sms,শুভ সকাল এস এম এস,bangla sms.com,bangla good night sms,এস এম এস,love sms,sad sms,bengali love sms,bengali sad sms,romantic sms,bangla,bengali,sms"/>';
include 'css.php';
print '<title>WapSmsBD.Com - Bangla SMS Portal</title></head><body>';
include("head.php");
print '<div class="box"><div class="utem"><a href="/latestsms.php">Latest SMS</a></div><div class="utem"><a href="/topsms.php">Top SMS</a></div><div class="utem"><a href="/topuser.php">Top USER</a></div></div>';

///Latest Added !!
print '<div class="h1">Lyrics Update</div><div class="box">';
$sql="SELECT * FROM extra WHERE type='1' ORDER BY timestamps DESC LIMIT 0,20;";

  $sites=MySQL_Query($sql); 
while($site=MySQL_Fetch_Array($sites))
  {
$id=$site['id'];
$type=$site['type'];
$singer=urldecode($site['singer']);
$album=urldecode($site['album']);

$bntitle=urldecode($site['bntitle']);
$entitles=urldecode($site['entitle']);
$views=$site['views'];
$timestamps=$site['timestamps'];



///Replacing
$entitle=strtolower($entitles);
$entitle=str_replace("'", "_", $entitle);
$entitle=str_replace(" ", "_", $entitle);
$entitle=str_replace(".", "_", $entitle);
$entitle=str_replace("?", "_", $entitle);
$entitle=str_replace("-", "_", $entitle);
$entitle=str_replace('"', '_', $entitle);
$entitle=str_replace(",", "_", $entitle);

$singer=strtolower($singer);
$singer=str_replace("'", "_", $singer);
$singer=str_replace(" ", "_", $singer);
$singer=str_replace(".", "_", $singer);
$singer=str_replace("?", "_", $singer);
$singer=str_replace("-", "_", $singer);
$singer=str_replace('"', '_', $singer);
$singer=str_replace(",", "_", $singer);

echo '<div class="utem">';
if($type=='1'){
print '<a href="/lyricsr_'.$id.'_'.$entitle.'_'.$singer.'"><b>'.$entitles.' ('.$album.') Song Lyrics</b></a>';

}elseif ($type=='2') {
	print '<a href="/bangla_joksr_'.$id.'_'.$entitle.'">[কৌতুক] <b>'.$bntitle.'</b></a>';
}elseif ($type=='3') {
	print '<a href="/bangla_golpo_'.$id.'_'.$entitle.'">[গল্প] <b>'.$bntitle.'</b></a>';
}elseif ($type=='4') {
	print '<a href="/bangla_kobita_'.$id.'_'.$entitle.'">[কবিতা] <b>'.$bntitle.'</b></a>';
}elseif ($type=='5') {
}

echo '</div>';
  $cou++;
}
print '<div class="utem" align="right"><a href="http://wapsmsbd.com/bangla_song_lyrics"><b>More Song Lyrics....</b></a></div></div>';


##//print '<div class="h1">Special</div><div class="box"><div class="utem"><a href="/bangla_song_lyrics">গানের কথা</a></div><div class="utem"><a href="/bangla_jokes">বাংলা কৌতুক</a></div><div class="utem"><a href="/bangla_golpos">গল্প</a></div><div class="utem"><a href="/bangla_kobitas">কবিতা</a></div><div class="utem"><a href="">ধাঁধাঁ</a></div></div>';//##

print '<h2>Bangla,Bengali,Love,Sad,Good Morning,Night Sms,Shuvo Sokal,Birthday,Noboborsho,Eid Mubarak Sms</h2>';
if(!$dir)
{print '<div class="h1">Sms Categories</div>';}
else
{

}
echo'<div class="box">';

$fsql="SELECT * FROM folder where cfid='0' ORDER BY place DESC";
$flist=MySQL_Query($fsql);
while($fsite=MySQL_Fetch_Array($flist)){$sid = $fsite['id']; if($sid=="66"){$smstcount1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE cid = '67' or cid = '68' or cid = '69' or cid = '70' or cid = '71' or cid = '72' or cid = '73' or cid = '74' or cid = '75' or cid = '76' or cid = '77' or cid = '78' or cid = '79' or cid = '80' or cid = '81' or cid = '82' or cid = '83'"));	
$smstcount = $smstcount1[0];} else{$smstcount2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM smsdata WHERE cid = '".$sid."'")); $smstcount = $smstcount2[0];} $fname = $fsite['name'];
$fnames = str_replace(' ','-',$fname);
$adult = $fsite['adult'];if($adult=="1"){
print '<div class="utem">» <a href="/adult/'.$sid.'/'.$fname.'.html" title="'.$fname.' Bangla Sms" />'.$fname.'</a> ('.$smstcount.')</div>';} else{print '<div class="utem">» <a href="/bangla-sms/'.$fnames.'-'.$sid.'" title="'.$fname.' Bangla Sms" />'.$fname.'</a> ('.$smstcount.')</div>';}
 }
echo "</div>";
print '<div class="tags"><i>Bangla Sms,Bengali Sms,Bangla Golpo,Bangla Kobita,Bangla Song Lyrics,Bangla Sad Sms,Bangla Love Sms,Shuvo Sokal Sms,Good Night Sms,Good Morning Sms,Shuvo Kamona Sms,Shuvo Ratri Sms,Shuvo Nobo borsho Sms,Eid Mubarak Sms,Bengali Funny Jokes,Jokes Sms,Girl friend boy friend sms,valobashar golpo,kobita,Birthday Sms,Wapsmsbd.com</i></div>';
include("foot.php");
print $foot;
?>