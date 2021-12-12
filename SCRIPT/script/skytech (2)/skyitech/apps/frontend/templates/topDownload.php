<?php if($sf_params->get('type')): ?>
<h2>
	<?php
		if($sf_params->get('type')=='today' ||  $sf_params->get('type')=='yesterday')
			echo $sf_params->get('type').'\'s Most Popular Downloads';
		if($sf_params->get('type')=='week' ||  $sf_params->get('type')=='month')
			echo 'This '. $sf_params->get('type') . '\'s Most Popular Downloads';
		if($sf_params->get('type')=='all')
			echo 'All Time\'s Most Popular Downloads';
	?>
</h2>
<div class="path">
<span class="bld">Top 21 Files:</span>
<?php
echo link_to('Today','@topFiles?type=today');
echo ', '.link_to('Yesterday','@topFiles?type=yesterday');
echo ', '.link_to('This Week','@topFiles?type=week');
echo ', '.link_to('This Month','@topFiles?type=month');
echo ', '.link_to('All Time','@topFiles?type=all');
?>
</div>
<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_listStart.php'); ?>
<div class="devider">&nbsp;</div>
	<?php
	$filename2hide = sfConfig::get('app_filename2hide');
	$class = 'even';
	foreach($filess as $files):
		$class = myClass::getOddEven($class);
	?>
		<div class="fl <?php echo $class?>">
	    <?php 
				$thumbServer = 'sft'.ceil($files->id/500);
				echo '<a class="fileName" href="'.url_for('@filesShow?id='.$files->id.'&name='.substr($files->file_name,0,strpos($files->file_name,sfConfig::get('app_filename2hide')))).'">';
				echo '<div><div>';
	    	if(is_file(sfConfig::get('sf_upload_dir').'/thumb/'.$thumbServer.'/small_'.$files->id.'.jpg'))
	    		echo image_tag(SETTING_THUMB_DOMAIN.'/'.$thumbServer.'/small_'.$files->id.'.jpg',array('class'=>'thumb'));
				elseif(is_file(sfConfig::get('sf_upload_dir').'/thumb/c/'.$files->category_id.'_1.jpg'))
		  		echo image_tag(SETTING_THUMB_DOMAIN.'/c/'.$files->category_id.'_1.jpg',array('class'=>'thumb'));
	    	else
	    		echo image_tag('filetype/'.$files->extension.'.gif',array());
    		echo '</div><div>'.str_replace('_',' ',myUser::fileName($files->file_name));
			if(!in_array($files->extension,array('JPG','PNG')))
			 echo "<br/><span>[".myClass::formatsize($files->size)."]</span>";
				echo '<br/><span>'.$files->download.' Hits</span>';
    		echo '</div></div></a>';
	    	?>
	  </div>
<?php
	endforeach;
?>
<?php endif; ?>
<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_allPageBottom.php'); ?>
<div class="path">
<span class="bld">Top 21 Files:</span>
<?php
echo link_to('Today','@topFiles?type=today');
echo ', '.link_to('Yesterday','@topFiles?type=yesterday');
echo ', '.link_to('This Week','@topFiles?type=week');
echo ', '.link_to('This Month','@topFiles?type=month');
echo ', '.link_to('All Time','@topFiles?type=all');
?>
</div>
