
<div class="clear"></div><div class="mdis1"><footer class="footer"><ul class="footer-links"> <li><a href="">Help</a></li><li><a href="">About</a></li><li><a href="">Terms</a></li> <li id="right"><a href="#top">Goto Top</a></li></ul> <div class="clear"></div> <div class="copyright">© 2010-2016 MostBD.Com</div></footer></div>

<div class="pcdis1"><footer class="footer"> <div id="search"> <form method="get" action="" class="search-form"> <input type="text" name="q" class="inp-text"/> <input type="submit" value="Search" class="inp-button"/> </form> </div><ul class="col-full category-list" id="category"><div class="clear"></div>
<ul class="col-half">
<?php

$sql="SELECT * FROM brand where bottom='1';";
$sites=MySQL_Query($sql);
while($site=MySQL_Fetch_Array($sites))
	{
		$id = $site['id'];
		$brand=urldecode($site['name']);
  print '<li class="link"><a href="">'.$brand.'</a></li>';
}
?>
	
</ul>

<ul class="col-half">

<?php
$sql="SELECT * FROM brand where bottom='2';";
$sites=MySQL_Query($sql);
while($site=MySQL_Fetch_Array($sites))
	{
		$id = $site['id'];
		$brand=urldecode($site['name']);
  print '<li class="link"><a href="">'.$brand.'</a></li>';
}
?>
	
</ul><div class="clear"></div></ul><ul class="footer-links"> <li><a href="">Help</a></li><li><a href="">About</a></li><li><a href="">Terms</a></li> <li id="right"><a href="#top">Goto Top</a></li></ul> <div class="clear"></div> <div class="copyright">© 2010-2016 MostBD.Com</div> </footer></div></body> </html>



$admin_l=admin_check($type,$admin,$password);
if($admin_l=='1'){$edit_news='<div class="center"><a href="/edit_news.php?id='.$news_id.'"><b>Edit News</b></a></div>';}









