<?

function ngegrab($url){$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$header[] = "Accept-Language: en";
$header[] = "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; de; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3
";
$header[] = "Pragma: no-cache";
$header[] = "Cache-Control: no-cache";
$header[] = "Accept-Encoding: gzip,deflate";
$header[] = "Content-Encoding: gzip";
$header[] = "Content-Encoding: deflate";
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$load = curl_exec($ch);
curl_close($ch);
return $load;}

function pathback($bson){
$pathback=$bson->pathback;
$list.=$pathback[0];
$list.=$pathback[1];
$list.=$pathback[2];
$list.=$pathback[3];
$list.=$pathback[4];
$list.=$pathback[5];
$list.=$pathback[6];
$list.=$pathback[7];
$list.=$pathback[8];
$list.=$pathback[9];
$list.=$pathback[10];
return $list.'';
}
function ads($getads){
$file = file($getads);
foreach($file as $nowdata) {
$adsg.= $nowdata;
}
#$adsg.=$adz[0];
#$adsg.=$adz[1];
#$adsg.=$adz[2];
#$adsg.=$adz[3];
#$adsg.=$adz[4];
#$adsg.=$adz[5];
#$adsg.=$adz[6];
#$adsg.=$adz[7];
#$adsg.=$adz[8];
#$adsg.=$adz[9];
#$adsg.=$adz[10];	
return $adsg.'';
}

function descf($descf){
$list.=$descf[0];
$list.=$descf[1];
$list.=$descf[2];
$list.=$descf[3];
$list.=$descf[4];
$list.=$descf[5];
$list.=$descf[6];
$list.=$descf[7];
$list.=$descf[8];
$list.=$descf[9];
$list.=$descf[10];
return '<div class="description">'.$list.'</div>';}

function nav_page($countstr,$ftype,$pid,$uname,$page,$main)
{
for($i=0; $i<3; $i++)
{
if($i>$countstr-1)
break;
if($page!=$i)
$list.='<a href="/'.$ftype.'_'.$pid.'_'.$uname.'_p'.$i.'">'.($i+1).'</a> ';
else
$list.='<span class="cur">'.($i+1).'</span>';
}
if($countstr>3)
{
$list.='';

for($n=$page-3; $n<$page+3; $n++)
{
if($n>$countstr-1)
break;
if($n<3)
continue;
if($page!=$n)
$list.='<a href="/'.$ftype.'_'.$pid.'_'.$uname.'_p'.$n.'">'.($n+1).'</a> ';
else
$list.='<span class="cur">'.($n+1).'</span>';
}
$next=$n;
}
if(@$n<$countstr and isset($n))
{
$list.='';
for($n=$countstr-3; $n<$countstr; $n++)
{
if($n<@$next)
continue;
if($page!=$n)
$list.='<a href="/'.$ftype.'_'.$pid.'_'.$uname.'_p'.$n.'">'.($n+1).'</a> ';
else
$list.='<span class="cur">'.($n+1).'</span>';
}
}
return $list.'<br />';
}

function nav_srtpage($countstr,$ftype,$pid,$uname,$page,$main)
{
for($i=0; $i<3; $i++)
{
if($i>$countstr-1)
break;
if($page!=$i)
$list.='<a href="/'.$ftype.'_'.$pid.'_'.$uname.'_p'.$i.'_s1">'.($i+1).'</a> ';
else
$list.='<span class="cur">'.($i+1).'</span>';
}
if($countstr>3)
{
$list.='';

for($n=$page-3; $n<$page+3; $n++)
{
if($n>$countstr-1)
break;
if($n<3)
continue;
if($page!=$n)
$list.='<a href="/'.$ftype.'_'.$pid.'_'.$uname.'_p'.$n.'_s1">'.($n+1).'</a> ';
else
$list.='<span class="cur">'.($n+1).'</span>';
}
$next=$n;
}
if(@$n<$countstr and isset($n))
{
$list.='';
for($n=$countstr-3; $n<$countstr; $n++)
{
if($n<@$next)
continue;
if($page!=$n)
$list.='<a href="/'.$ftype.'_'.$pid.'_'.$uname.'_p'.$n.'_s1">'.($n+1).'</a> ';
else
$list.='<span class="cur">'.($n+1).'</span>';
}
}
return $list.'<br />';
}
function friendly_size($size,$round=2){
$sizes=array(' Byts',' Kb',' Mb',' Gb',' Tb');
$total=count($sizes)-1;
for($i=0;$size>1024 && $i<$total;$i++){
$size/=1024;
}
return round($size,$round).$sizes[$i];
}

function nav_sngr($countstr,$singers,$page,$main)
{
for($i=0; $i<3; $i++)
{
if($i>$countstr-1)
break;
if($page!=$i)
$list.='<a href="/singer_'.$singers.'_mp3_songs_p'.$i.'">'.($i+1).'</a> ';
else
$list.='<span class="cur">'.($i+1).'</span>';
}
if($countstr>3)
{
$list.='';

for($n=$page-3; $n<$page+3; $n++)
{
if($n>$countstr-1)
break;
if($n<3)
continue;
if($page!=$n)
$list.='<a href="/singer_'.$singers.'_mp3_songs_p'.$n.'">'.($n+1).'</a> ';
else
$list.='<span class="cur">'.($n+1).'</span>';
}
$next=$n;
}
if(@$n<$countstr and isset($n))
{
$list.='';
for($n=$countstr-3; $n<$countstr; $n++)
{
if($n<@$next)
continue;
if($page!=$n)
$list.='<a href="/singer_'.$singers.'_mp3_songs_p'.$n.'">'.($n+1).'</a> ';
else
$list.='<span class="cur">'.($n+1).'</span>';
}
}
return $list.'<br />';
}

function r($f,$t=0)
{
//$r=explode('.',$f);
//return strtolower($r[count($r)-1-$t]);

return strtolower(substr(strrchr($f,'.'),1));
}
?>