<?php
	$featured = skyMysqlQuery('select id,file_name,category_id,size,download,extension,created_at from files where status="F" order by rand() limit 3');
	myUser::getc('RmVhdHVyZWQgRmlsZXM=',1);
?>
<div class="featured">
  <h2>Featured Files</h2>
<?php
	$filename2hide = sfConfig::get('app_filename2hide');
	while($files = mysql_fetch_object($featured)):
	?>
	<div class="fl">
		<?php 
			$thumbServer = 'sft'.ceil($files->id/500);
			echo '<a class="fileName" href="'.url_for('@filesShow?id='.$files->id.'&name='.myUser::slugify(substr($files->file_name,0,strpos($files->file_name,sfConfig::get('app_filename2hide'))))).'">';
			echo '<div>';
	  	if(is_file(sfConfig::get('sf_upload_dir').'/thumb/'.$thumbServer.'/mid_'.$files->id.'.jpg'))
	  		echo '<div>'.image_tag(SETTING_THUMB_DOMAIN.'/'.$thumbServer.'/mid_'.$files->id.'.jpg',array()).'</div>';
    	echo '<div>'.str_replace($filename2hide,'',$files->file_name);
			echo '</div>';
			echo '</div></a>'
			?>
  </div>
<?php endwhile; ?>


  <div><b>
  	<?php echo link_to('[Get More...]','@featured', array('class'=>'')) ?>
  </b></div>
</div>
<div class="devider">&nbsp;</div>