<?php
 include 'db.php'; 
include 'functions.php';

headtag("$SiteName Forum");

$user=dump_udata("firstname");
$id=formget("id");
$sql="SELECT * FROM forum_question WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

$avatar="SELECT * FROM userdata WHERE id='$id'";
$result8=mysql_query($avatar);
$row=mysql_fetch_array($result8);

$avatar = $row['avatar'];


echo '<div class="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td rowspan="2" align="left">';
 if($avatar!='')
{
echo "<img src='$avatar' width='45' height='50' alt='Avatar' />";
}
else
{
echo "<img src='$siteurl/web/avatar.jpg' width='45' height='50' alt='Guest'>";
}  echo '</td> <td><b>
 '.$rows['name'].'</b>
</td>   <td align="right">
  '.$rows['datetime'].'

<br/>';
echo '<div align="right">Views : '.$rows["view"].'<br/>Replies : '.$rows["reply"].'
</td>
</tr>
</table><div class="ar"></div><div class="msg"><font color="blue"><b> '.$rows["detail"].'</b></font></div></div>';
$sql2="SELECT * FROM forum_answer WHERE question_id='$id'";
$result2=mysql_query($sql2);
while($rows=mysql_fetch_array($result2)) { 

echo '<div class="fhead"><table width="98%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td rowspan="2" align="left"><div class="ln">';
 if($avatar!='')
{
echo "<img src='$avatar' width='45' height='50' alt='Avatar' />";
}
else
{
echo "<img src='/web/avatar.jpg' width='45' height='50' alt='Guest'>";
}  
echo '</td>

<td><strong>'.$rows['a_name'].'</strong></td><td align="right">'.$rows['a_datetime'].'
</td>
</tr>
</table><div class="ar"></div><div class="msg"> '.$rows['a_answer'].'</div></div>'; 
 } 
$sql3="SELECT view FROM forum_question WHERE id='$id'"; $result3=mysql_query($sql3); $rows=mysql_fetch_array($result3);
$view=$rows['view'];
if(empty($view)){$view=1;
$sql4="INSERT INTO forum_question(view) VALUES('$view') WHERE id='$id'";
$result4=mysql_query($sql4); }
$addview=$view+1;
$sql5="update forum_question set view='$addview' WHERE id='$id'";
$result5=mysql_query($sql5);

if($userlog==1)
{
echo '<div class="title">Reply Answers</div> <div class="form"><form name="form1" method="post" action="/add_answer.php"><input name="a_name" type="hidden" id="a_name" value="'.$user.'">
<textarea name="a_answer" cols="25" rows="3" id="a_answer"></textarea>
<input name="id" type="hidden" value="'.$id.'"><input type="submit" name="Submit" value="Comment"> </form></div>';
 }

 include 'foot.php'; ?>