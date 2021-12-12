<?php myUser::getc('RmlsZSBMaXN0',1); ?>
<?php
	$class = 'even';
	$cnt=0;
	$filename2hide = sfConfig::get('app_filename2hide');
	$adAfterFiles = (SETTING_ADVT_AFTER_EACH_FILES ? SETTING_ADVT_AFTER_EACH_FILES : 3);
	foreach($filess as $files):
		$class = myClass::getOddEven($class);
		$cnt++;
	?>
	<div class="fl <?php echo $class?>">
		<?php 
			$thumbServer = 'sft'.ceil($files->id/500);
			echo '<a class="fileName" href="'.url_for('@filesShow?id='.$files->id.'&name='.myUser::slugify( myUser::fileName($files->file_name,false) )).'">';
			echo '<div>';
	  	if(is_file(sfConfig::get('sf_upload_dir').'/thumb/'.$thumbServer.'/small_'.$files->id.'.jpg'))
	  		echo '<div>'.image_tag(SETTING_THUMB_DOMAIN.'/'.$thumbServer.'/small_'.$files->id.'.jpg',array()).'</div>';
			elseif(is_file(sfConfig::get('sf_upload_dir').'/thumb/c/'.$files->category_id.'_1.jpg'))
	  		echo '<div>'.image_tag(SETTING_THUMB_DOMAIN.'/c/'.$files->category_id.'_1.jpg',array()).'</div>';
	  	else
    		echo '<div>'.image_tag('filetype/'.$files->extension.'.gif',array()).'</div>';
    	echo '<div>'.str_replace('_',' ',myUser::fileName($files->file_name))."<br />";
                        if($files->description)
                         echo "<font color='green'>$files->description</font><br />";
			if(!in_array($files->extension,array('JPG','GIF','PNG')))
			 echo "<span><b>".myClass::formatsize($files->size)."</b></span><br />";
			if($sf_params->get('action')=='lastadded')
				echo '<span>'.myClass::TimeAgo(strtotime($files->created_at)).'</span><br/>';
//			echo '<span>'.$files->download.' Hits</span>';
			echo '</div>';
			echo '</div></a>'
			?>
  </div>
  <?php if( $cnt % $adAfterFiles == 0): ?>
	<div class="fl odd"><?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_betweenFile.php'); ?></div>
  <?php endif; ?>
<?php endforeach; ?>
<?php  myUser::getc('RmlsZSBMaXN0IENvbXBsZXRl',1); ?>