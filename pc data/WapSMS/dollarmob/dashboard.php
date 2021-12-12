<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/
include 'db.php';
include 'functions.php';

headtag("$SiteName Dashboard");


if($userlog==1){
$uid=dump_udata("id");
$user=dump_udata("firstname");
$act=formget("act");
if(dump_udata("status")=='INACTIVE'){
echo '<div class="error">Your account is inactive. Please click on the link sent to your email to activate your account!</div>';
echo '<div class="ad"><img src="/home.png"> <a href="/">Home</a></div>';
include 'foot.php';
exit;
}


 $act=formget("act");
$id=formget("id");
$user=dump_udata("firstname");
$hammad1=mysql_query("SELECT * FROM notifications WHERE user='$user'");
$khan1=mysql_fetch_array($hammad1);


if($act=="remove")
{

mysql_query('DELETE FROM notifications WHERE id="'.$id.'" AND user="'.$user.'"');
header('Location:/user/dashboard'); 
}
$result=mysql_query('SELECT * FROM notifications WHERE user="'.$user.'"');
   echo '</div><div class="title">
Notifications
</div>';

if($khan1['id']=="")
{
  echo '<div class="ad">No Notifications...</div>';
} 
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
   echo '<div class="ad"><b>'.$row['news'].'  <a href="?act=remove&id='.$row['id'].'"><font align="right" color="red">[X]</font></a></b></div>';
}

$uc = mysql_query("SELECT * FROM ucuser WHERE user='$user'");
$ucweb = mysql_fetch_array($uc);
$ucbal = $ucweb['ucbal'];
$install = $ucweb['install'];
$hmm = mysql_num_rows($uc);

$rupee = dump_udata("pubalance")*$dollarrate;
$dollar = substr(dump_udata("pubalance"), 0, 4);
$rupees = substr($rupee, 0, 4);

echo '<div class="title">Hi, <font color="red"><b>'.ucfirst(dump_udata("lastname")).'</b></font></div>';

echo '<div class="form" style="padding:0px;margin:0px;"><div style="border-bottom:1px dashed #ccc;padding:4px;">Publisher Balance (BDT): <b id="num">'.$rupees.' Taka</b> </div><div style="border-bottom:1px dashed #ccc;padding:4px;">Publisher Balance (Dollar): <b id="num">'.dump_udata("pubalance").'$</b> </div><div style="border-bottom:1px dashed #ccc;padding:4px;">UcWeb Balance (Dollar): <b id="num">'.$ucbal.' $</b> </div><div style="border-bottom:1px dashed #ccc;padding:4px;">UCBrowser Installation: <b id="num">'.$install.' Install</b> </div><div style="border-bottom:1px dashed #ccc;padding:4px;">Advertiser Balance:<b id="num">'.dump_udata("adbalance").' $</b></div></div>';

$user=dump_udata("firstname");
 echo '<div align="left" class="top"><a href="../wallarea/"><input type="submit" value="Wall Area"></a> <strong style="color:red">Note:</strong><b>If you Need Public help Please open a Topic! But Do Not Spam On Wall Otherwise You Get Blocked And Not Get Paid. </b><a href="http://topka.mobi"><input type="submit" value="Create Wap Toplist"></a></div>';

 $sql=mysql_query("SELECT * FROM forum_question ORDER BY id DESC LIMIT 1");
while($rows=mysql_fetch_array($sql))
{
 // Start looping table row
echo '<div class="shout"><div style="padding:5px; text-align:left;"><b color="green">'.$rows["name"].'</b><br/><img src="/web/say.gif" alt="say" /><font color="blue"><b>'.$rows["detail"].'</b></font><br/><div class="shoutreply"><a href="/view/'.$rows["id"].'">Reply!</a></b></div><br/><div align="right">- With '.$rows["view"].' views And '.$rows["reply"].' Replies...</div></div></div>';
}

echo '<div class="form"><form id="form1" name="form1" method="post" action="/add_topic.php">
Create a Topic:<br/><textarea name="detail" id="detail" rows="2"></textarea><input name="name" type="hidden" id="name" value="'.$user.'" /><input type="submit" name="Submit" value="Post" />
</form></div>';



echo '<div class="title">My Dashboard</div>';

echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/web/stats.png" alt="-" width="35" height="40"/></td><td><b><a href="/stats">Statistics</a></b><br/><small>Analyze Your Statistics</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/web/sites.png" alt="-" width="35" height="40"/></td><td><b><a href="/sites">Sites</a></b><br/><small>Edit, Add, Delete, Get Adcode Of Your Site</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/uc.png" alt="-" width="35" height="40"/></td><td><b><a href="/ucweb">Promote  Ucweb</a></b><br/><small>Add site & View statistics & Get Install code for your Site and Earn each Install</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/uc.png" alt="-" width="35" height="40"/></td><td><b><a href="/ucreport">Ucweb Report</a></b><br/><small>Get Your Daily Install Report</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/aff.png" alt="-" width="35" height="40"/></td><td><b><a href="/reffer">Affiliation</a></b><br/><small>Reffer Your Friends And Earn Some Extra</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/cs.png" alt="-" width="35" height="40"/></td><td><b><a href="/request">Payout</a></b><br/><small>Withdraw Your Earning Balance</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/inv.png" alt="-" width="35" height="40"/></td><td><b><a href="/invoices/">Invoices</a></b><br/><small>View Your Payments History</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/adf.png" alt="-" width="35" height="40"/></td><td><b><a href="/gainadbalance">Add Funds</a></b><br/><small>Add Funds For Your Premium Advertisement</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/trd.png" alt="-" width="35" height="40"/></td><td><b><a href="/send/send">Send Money</a></b><br/><small>Transfer Money To Other User</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/advv.png" alt="-" width="35" height="40"/></td><td><b><a href="/advertise">Advertises</a></b><br/><small>Manage Your Advertises</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/Messages.png" alt="-" width="35" height="40"/></td><td><b><a href="/support-ticket">Support Ticket</a></b><br/><small>Support Ticket For Help</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/set.png" alt="-" width="35" height="40"/></td><td><b><a href="/myaccount">Account Setting</a></b><br/><small>Manage Your Account Setting</small></td></tr></table></div>';
echo '<div class="ad"><table><tr><td><img src="http://dollarmob.com/hp.png" alt="-" width="35" height="40"/></td><td><b><a href="/contact">Contact Admin</a></b><br/><small>Contact With Us For Getting Help</small></td></tr></table></div>';




echo '<div class="ad"><img src="/home.png"> <a href="/">Home</a> | <a href="/user/logout">Logout ('.ucfirst(dump_udata("firstname")).')</a></div>';//enf

}
else {
header('Location:/');
}

include 'foot.php';

?>
