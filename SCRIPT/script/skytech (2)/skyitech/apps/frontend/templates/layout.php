<?php 
if(USERDEVICE=='p')
echo '<!DOCTYPE html>';
else
echo '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>

<meta name="language" content="en" />
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW, ARCHIVE" />
<?if($sf_params->get('module').$sf_params->get('action')=='fileslist'){?>
<meta name="Description" content="<?=$catName;?> Mp3 Song Download, <?=$catName;?> 64 Kbps Mp3 Song Download, <?=$catName;?> 128 Kbps Song Free Download, <?=$catName;?> 320 Kbps Song Free Download" /> 
<?}?>
<?if($sf_params->get('module').$sf_params->get('action')=='categorylist'){?>
<meta name="Description" content="<?=$catName;?> Mp3 Songs Download, <?=$catName;?> 64 Kbps Mp3 Song Download, <?=$catName;?> 128 Kbps Mp3 Song Download, <?=$catName;?> 320 Kbps Mp3 Song Download, <?=$catName;?> Songs Free Download"  /> <?}?>
<?if($sf_params->get('module').$sf_params->get('action')=='filesshow'){?>
<meta name="description" content="<?php echo str_replace(sfConfig::get('app_filename2hide'),'', str_replace('_',' ',$files->file_name)); ?> Mp3 Songs Download, <?php echo str_replace(sfConfig::get('app_filename2hide'),'', str_replace('_',' ',$files->file_name)); ?> 320 Kbps Mp3 Song Download, <?php echo str_replace(sfConfig::get('app_filename2hide'),'', str_replace('_',' ',$files->file_name)); ?> 128 Kbps Mp3 Song Download, <?php echo str_replace(sfConfig::get('app_filename2hide'),'', str_replace('_',' ',$files->file_name)); ?> 64 Kbps Mp3 Song Download, <?php echo str_replace(sfConfig::get('app_filename2hide'),'', str_replace('_',' ',$files->file_name)); ?> Album Songs Free Download"  /> <?}?>
<meta name="keywords" content="Free Bengali Mp3 Songs, Bollywood Movie Songs, Instrumental, Punjabi Hits, Bhojpuri Songs, DJ Remix Mp3 Songs Free Collection" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<META NAME="copyright" CONTENT="Copyright © 2015 SKYMp3.In. All Rights Reserved.">
<META NAME="author" CONTENT="Roni Haldar">
<link rel="sitemap" href="/sitemap.xml" title="SKYMp3.In Site Map"/>
<meta name="revisit-after" content="1 days"/>
<meta name="country" content="India" />
<meta name="city" content="Berhampore" />
<meta name="GOOGLEBOT" content="INDEX, FOLLOW"/>
<meta name="Robots" content="INDEX,FOLLOW" />
<meta name="distribution" content="Global" />
<meta name="Administrator" content="Globa" />
<meta name="Designer" content="Globa" />
<meta name="Copyright" content="SKYMp3.In" />
<meta name="Geography" content="http://SKYMp3.In" />
<meta name="Classification" content="Unlimited Free Download Portal" />
<meta name="subject" content="Unlimited Free Download Portal" />
<META NAME="revisit-after" CONTENT="1">
<link href="/css/<?php echo sfConfig::get('app_smallname')?>.css?4.4" type="text/css" rel="stylesheet"/>
<?php if($catDescription): ?>
<meta name="description" content="<?php echo str_replace(chr(13),'<br />',$catDescription); ?>"/>
<?php endif; ?>
<link rel="shortcut icon" href="/favicon.ico" />
<?php 
if($sf_params->get('module').$sf_params->get('action')=='defaultindex')
	include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/meta.php');
else
	include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/metaAllPage.php');
?>
</head>
<body>
<div class="logo">
	<?php echo link_to(image_tag(sfConfig::get('app_sitename').'_logo.png',array('alt'=>sfConfig::get('app_sitename'))),sfConfig::get('app_webpath')); ?>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54123564-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="mainDiv">
	
<?php
		if($sf_params->get('module')=='default'){
			include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_homeTop.php');
		}
		elseif($sf_params->get('module').$sf_params->get('action')!='filessearch')
		{
			include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_allPageTop.php');
		}
	?>
<?php
		if($sf_params->get('module').$sf_params->get('action')=='defaultindex' || $sf_params->get('module').$sf_params->get('action')=='filessearch')
		{
		echo '<div class="search tCenter">';
		echo form_tag('files/search','method=get');
		echo 'Search File : '.input_tag('find',($sf_params->get('action')=='search' ? base64_decode($sf_params->get('find')):''),'size=20');
		echo select_tag('ext', options_for_select(myUser::searchExts(), $sf_params->get('ext') ? $sf_params->get('ext') : 'ALL'));
		echo submit_tag('Search','id=file');
		echo '</form>';
		echo '</div>';
		}
	?>
	<?php echo $sf_data->getRaw('sf_content') ?>
	<?php
	if($sf_params->get('module').$sf_params->get('action')=='categorylist')
		include(success_dir.'categoryList.php');
	if($sf_params->get('module').$sf_params->get('action')=='fileslist')
		include(success_dir.'filesList.php');
	if($sf_params->get('module').$sf_params->get('action')=='filesshow')
		include(success_dir.'fileShow.php');
	if($sf_params->get('module').$sf_params->get('action')=='fileslastadded')
		include(success_dir.'lastAdded.php');
	if($sf_params->get('module').$sf_params->get('action')=='filesfeatured')
		include(success_dir.'featured.php');
	if($sf_params->get('module').$sf_params->get('action')=='filestop')
		include(success_dir.'topDownload.php');
	?>

	<?php
	if($sf_params->get('module')=='default'){
		include_partial('global/featured');
		include_partial('global/updates');
		include(sfConfig::get('sf_upload_dir').'/advt/'.USERDEVICE.'_homeMiddle.php');
		include_partial('global/category');
		include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_homeCategoryEnd.php');
	}
	/*
	* Close Mysql Connection
	*/
	closeDB();
	?>
<?php if($sf_params->get('module')=='default'): ?>
	


<div class="catRow"><?php echo link_to('<div>Top 21 Files</div>','@topFiles?type=today'); ?></div>

	<div class="catRow"><a href="/newitems/1.html">Last Added Files</a></div>
<?php endif; ?>

<?php if($sf_params->get('module')=='default'): ?>
	<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_homeBottom.php'); ?>
<?php elseif($sf_params->get('module').$sf_params->get('action')=='infolatestupdates'): ?>
<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_allPageBottom.php'); ?>
<?php endif; ?>
<?php
	if(strtoupper(SETTING_ONLINE_COUNTER)=='ON'){
		if(strtoupper(SETTING_ONLINE_SHOW_COUNT)=='ON')
			echo "<div id='online'>Online User: ".myClass::getOnlineVisitors(1).'</div>';
		else
			myClass::getOnlineVisitors(0);
	}
?>
<!-- div class="db">Developed By : <a href="http://www.skyitech.com">SKYiTech.com</a><div -->
</div>
<div align="center"><div class="copyright"><a href="/info/disclaimer"><font color="white"><b>Disclaimer</b></font></a> <font color="white">-</font> <a href="/contact"><font color="white"><b>Contact Us !</b></font></a><br/> <a href="/" class="sitelink"><font color="white"><b>SKYMp3.in - 2015</b></font></a>
</div>
<div class="tCenter"><b>

<script type="text/javascript" src="http://widget.supercounters.com/online_t.js"></script><script type="text/javascript">sc_online_t(1162214,"","ffffff");</script><br><noscript><a href="http://www.supercounters.com/">Free Users Online Counter</a></noscript>

</b></div></body>
</html>