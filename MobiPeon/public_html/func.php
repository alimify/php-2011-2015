<?
date_default_timezone_set('Asia/Dhaka');
if(!connect($dbhost,$dbname,$dbuser,$dbpass)){exit('There is an error to connect sql!');}
//Admin Check
function admin_check($type,$admin,$password){
$u=$_COOKIE['u'];
$me=$_COOKIE['me'];

if($u && $me){
if($password!=$u){
$errors[]='incorrect something !';
}
if($admin!=$me){
$errors[]='incorrect something !';
}
}else{
  $errors[]='incorrect something !';
}
if(empty($errors)){  
$result=1;
}else{$result=2;}
if($type=='1'){
  if($result=='1'){}else{header('location:/login.php');}
}
return $result;
}
///Read_SQL_Row
function read_sql_row($id,$row,$table){
  if($id && $row && $table){
$sql="SELECT $row FROM $table where id='".$id."'";
$result=mysql_fetch_array(mysql_query($sql));

$resultera=urldecode($result[0]);
$resulter=htmlspecialchars($resulter);
$text=htmlspecialchars_decode($resultera);

}
return $text;
}

///Update_SQL_Row
function update_sql_row($id,$row,$table,$data){
if($id && $row && $table && $data){
$rnm=ucwords(str_replace('_',' ',$row)); 
$rtm=ucwords(str_replace('_',' ',$table)); 

$sql="UPDATE $table SET $row='".$data."' WHERE id='".$id."'";
$res = mysql_query($sql);
if($res){$result='<font color="green"><b>'.$rtm.' : '.$rnm.' - </b>Data Updated !</font>';}else{$result='<font color="red"><b>'.$rtm.' : '.$rnm.' - </b>No Data Updated !</font>';}
if($row=='publish'){
if($table=='news'){$type=2;}elseif($table=='mobile'){$type=1;}
$hsql="UPDATE home_menu SET publish='".$data."' WHERE mid='".$id."' and type='".$type."'";
$hres = mysql_query($hsql);
}

}
return $result;
}

///Update_SQL_Row
function delete_sql_row($id,$row,$table){
if($id && $row && $table){


}
return $result[0];
}

///Home_menu_id
function read_home_row($id,$type){
  if($id && $type){
$sql="SELECT id FROM home_menu where mid='".$id."' and type='".$type."'";
$result=mysql_fetch_array(mysql_query($sql));}
return $result[0];
}






///Add Brand Name
    function add_brand_name($brand_name,$brand_new_mobile_count,$brand_total_mobile){
$res = mysql_query("INSERT INTO brand SET name='".$brand_name."', new_added='".$brand_new_mobile_count."', total='".$brand_total_mobile."'");

if($res){$result='<div class="notification"><font color="green"><b>Brand Name : '.$brand_name.' Added</b></font></div>';}elseif(!$res){$result='<div class="notification"><font color="red"><b>Error : </b>Brand Name Not Added !</font></div>';}
return $result;
}   


/// Add Mobile
    function add_new_mobile($brand_id,$mobile_name,$mobile_price,$mobile_camera,$mobile_internet,$mobile_radio,$mobile_audio_player,$mobile_video_player,$mobile_usb,$mobile_infrared,$mobile_weight,$mobile_status,$mobile_display,$mobile_talk_time,$mobile_stand_by,$mobile_browser,$mobile_java,$mobile_release_date,$mobile_memory,$mobile_memory_slot,$mobile_bluetooth,$mobile_other_feat,$mobile_publish,$mobile_tags){
$res = mysql_query("INSERT INTO mobile SET brand_id='".$brand_id."', name='".$mobile_name."', price='".$mobile_price."', camera='".$mobile_camera."', internet='".$mobile_internet."', radio='".$mobile_radio."', audio_player='".$mobile_audio_player."', video_player='".$mobile_video_player."', release_date='".$mobile_release_date."', memory='".$mobile_memory."', memory_slot='".$mobile_memory_slot."', bluetooth='".$mobile_bluetooth."', usb='".$mobile_usb."', infrared='".$mobile_infrared."', weight='".$mobile_weight."', status='".$mobile_status."', display='".$mobile_display."', talk_time='".$mobile_talk_time."', stand_by='".$mobile_stand_by."', browser='".$mobile_browser."', java='".$mobile_java."', publish='".$mobile_publish."', other_feat='".$mobile_other_feat."'");


if($res){
$mid=mysql_fetch_array(mysql_query("SELECT id FROM mobile where name='".$mobile_name."'"));
  $home_menu=mysql_query("INSERT INTO home_menu SET type='1', publish='".$mobile_publish."', tags='".$mobile_tags."', mid='".$mid[0]."'");  
  $result='<div class="notification"><font color="green"><b>New Mobile : </b>'.urldecode($mobile_name).' Added</font><br/><a href="/edit_mobile.php?mobile_id='.$mid[0].'"><b>Editing</b></a></div>';}elseif(!$res){$result='<div class="notification"><font color="red"><b>Error : </b>New Mobile Name Not Added !</font></div>';}
return $result;
}
 




function add_action_form($action,$method){
$result='<form action="'.$action.'" method="'.$method.'">';

return $result;
}


function add_input_form($title,$name,$value){
$result=''.$title.' : <br/><input type="text" name="'.$name.'" value="'.$value.'"><br/>';
return $result;	
}



function add_textarea_form($title,$name,$value){
$result=''.$title.' : <br/><textarea name="'.$name.'" rows="6" cols="40">'.$value.'</textarea><br/>';
return $result;	
}

function add_checkbox_form($title,$name,$value){
$result='<input type="checkbox" name="'.$name.'" value="'.$value.'"> '.$title.'<br/>';
return $result;	
}

function add_submit_form($name,$value){
$result='<input type="submit" name="'.$name.'" value="'.$value.'"></form>';
return $result;	
}

function page($countstr,$page,$page_url,$brand_id,$brand_name)
{
 if($brand_id) {$brand='/brand/'.$brand_name.'/'.$brand_id.'';}
 
for($i=0; $i<3; $i++)
{
if($i>$countstr-1)
break;
if($page!=$i){
  if($i){$pag='/page-'.$i.'';}
  $list.='<a href="/'.$page_url.''.$brand.''.$pag.'">'.($i+1).'</a> ';
}else{$list.='<b>'.($i+1).'</b>';
}
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
$list.='<a href="/'.$page_url.''.$brand.'/page-'.$n.'">'.($n+1).'</a> ';
else
$list.='<b>'.($n+1).'</b>';
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
$list.='<a href="/'.$page_url.''.$brand.'/page-'.$n.'">'.($n+1).'</a> ';
else
$list.='<b>'.($n+1).'</b>';
}
}
return $list.'<br />';
}

///Add News
    function add_news($news_title,$news_details,$news_tags,$news_publish){
$cid=mysql_fetch_array(mysql_query("SELECT id FROM news where title='".$news_title."'"));

if(!$cid[0]) {
$res = mysql_query("INSERT INTO news SET title='".$news_title."',news_details='".$news_details."', publish='".$news_publish."'");

if($res){
$mid=mysql_fetch_array(mysql_query("SELECT id FROM news where title='".$news_title."' AND news_details='".$news_details."'"));

  $home_menu=mysql_query("INSERT INTO home_menu SET type='2',publish='".$news_publish."',tags='".$news_tags."', mid='".$mid[0]."'");
  $result='<div class="notification"><font color="green"><b>News Added</b></font><br/><a href="/edit_news.php?id='.$mid[0].'"><b>Edit This News</b></a></div>';}elseif(!$res){
  $result='<div class="notification"><font color="red"><b>Error : </b>News Not Added !</font></div>';
}
}else{

  $result='<div class="notification"><font color="red"><b>Error : </b>News Already Posted !</font></div>';

}
return $result;
}
function timecnv($datetime){
$difference = time() - strtotime($datetime) - 18000;
  
$periods = array("sec", "min", "hr", "day", "week", "month", "year", "decade");
      $lengths = array("60","60","24","7","4.35","12","10");
      for($j = 0; $difference >= $lengths[$j]; $j++)
        $difference /= $lengths[$j];
        $difference = round($difference);
      if($difference != 1) $periods[$j].= "s";
        $text = "$difference $periods[$j] ago";


        
        return $text;    
      }





       function newsfilter($id){
 if($id){
$sql="SELECT news_details FROM news where id='".$id."'";
$result=mysql_fetch_array(mysql_query($sql));
$text=urldecode($result[0]);

  // BBcode array
  $find = array(
    '~\[b\](.*?)\[/b\]~s',
    '~\[br\]~s',
    '~\[i\](.*?)\[/i\]~s',
    '~\[u\](.*?)\[/u\]~s',
    '~\[quote\](.*?)\[/quote\]~s',
    '~\[size=(.*?)\](.*?)\[/size\]~s',
    '~\[color=(.*?)\](.*?)\[/color\]~s',
    '~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
    '~\[search\](.*?)\[/search\]~s',
    '~\[youtube\](.*?)\[/youtube\]~s',
    '~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s'
  );
  // HTML tags to replace BBcode
  $replace = array(
    '<b>$1</b>',
    '<br/>',
    '<i>$1</i>',
    '<span class="underline">$1</span>',
    '<span class="quote">$1</span>',
    '<span style="font-size:$1px;">$2</span>',
    '<span style="color:$1;">$2</span>',
    '<a href="$1">$1</a>',
    '<a href="/search?q=$1">$1</a>',
    ' <iframe width="420" height="315"
src="https://www.youtube.com/embed/$1">
</iframe> ',
    '<amp-img src="$1" alt="loading" width="600px"
    height="400px" layout="responsive" heights="(max-width:600px) 200px, 60%></amp-img>'
  );
  // Replacing the BBcodes with corresponding HTML tags
  $results= preg_replace($find,$replace,$text);
}
return $results; 
      }
?>