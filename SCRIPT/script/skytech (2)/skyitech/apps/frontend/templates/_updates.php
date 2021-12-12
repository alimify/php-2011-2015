<?php
	$updates = skyMysqlQuery("select id, description from updates where status='A' order by created_at desc");
	myUser::getc('RGlzcGxheSBVcGRhdGVz',1);
?>
<div class="updates">
  <h2>Latest Updates</h2>
<?php
$find = array(str_ireplace('http://m.','http://www.',sfConfig::get('app_webpath')));
$replace = array(sfConfig::get('app_webpath'));
	while($value = mysql_fetch_object($updates)): ?>
  <div>
  	<?php /*echo link_to($value->getDescription(),$value->getLink(), array('class'=>'')) */?>
  	<?php echo str_replace($find,$replace,$value->description) ?>
  </div>
<?php endwhile;?>
<div>
  	  	<img alt="" src="/images/1122.jpg" style="width: 38px; height: 38px; float: left;"> <b>Android HOT Market App Added!
<br>

<a href="http://goo.gl/pRCTZ5">Download &amp; Install (For HOT Apps)</a></b>  </div>
  <div>
  	<?php echo link_to('[More Updates...]','@latestUpdates', array('class'=>'')) ?>
  </div>
</div>
<div class="devider">&nbsp;</div>