</div>


<footer class="footer ph clear"> <div id="search"> <form method="get" action="/search" class="search-form" target="_blank"><input class="inp-text" type="text" name="query" required><input type="submit" value="Search" class="inp-button"/> </form> </div><ul class="col-full category-list" id="category"><div class="clear"></div>
<ul class="col-half">
<?php

$sql="SELECT * FROM brand where bottom='1';";
$sites=MySQL_Query($sql);
while($site=MySQL_Fetch_Array($sites))
	{
		$id = $site['id'];
		$brand=urldecode($site['name']);
  print '<li class="link"><a href="/mobile/brand/'.$site['name'].'/'.$id.'">'.$brand.'</a></li>';
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
  print '<li class="link"><a href="/mobile/brand/'.$site['name'].'/'.$id.'">'.$brand.'</a></li>';
}
?>
	
</ul><div class="clear"></div></ul><ul class="footer-links"> <li><a href="/">Help</a></li><li><a href="/">About</a></li><li><a href="/">Terms</a></li> <li id="right"><a href="#top">Goto Top</a></li></ul> <div class="clear"></div> <div class="copyright">© 2010-2016 MobiPeon.Com</div> </footer>
<footer class="footer mh clear"><ul class="footer-links"> <li><a href="/">Help</a></li><li><a href="/">About</a></li><li><a href="/">Terms</a></li> <li id="right"><a href="#top">Goto Top</a></li></ul> <div class="clear"></div> <div class="copyright">© 2010-2016 MobiPeon.Com</div></footer>	</body>
</html>