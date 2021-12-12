<h2>
	<?php echo 'Free Download '. str_replace('_',' ',myUser::fileName($files->file_name)); ?>
</h2>
<div class="fshow">
<?php
		$thumbServer = 'sft'.ceil($files->id/500);
		if(is_file(sfConfig::get('sf_upload_dir').'/thumb/'.$thumbServer.'/mid_'.$files->id.'.jpg')){
				echo '<p class="showimage">';
				echo image_tag(SETTING_THUMB_DOMAIN.'/'.$thumbServer.'/mid_'.$files->id.'.jpg',array('class'=>'absmiddle'));
				echo '</p>';
		}
		elseif(is_file(sfConfig::get('sf_upload_dir').'/thumb/c/'.$files->category_id.'_1.jpg')){
				echo '<p class="showimage">';
				echo image_tag(SETTING_THUMB_DOMAIN.'/c/'.$files->category_id.'_1.jpg',array('class'=>'absmiddle'));
				echo '</p>';
		}
?>
<?php myUser::getc('RG93bmxvYWQgTGluaw==',1);?>
<div class="fInfo">
<?php $dataServer = 'sfd'.ceil($files->id/500); ?>
<?php if($files->extension=='MP3' &&  $files->size < SETTING_MP3_PLAY_LIMIT*1024*1024 ): ?>

<?php endif; ?>
	<?php if($files->extension=='JPG' || $files->extension=='PNG'): ?>
		<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_beforeDownload.php'); ?>
		<div class="fhd">Select Your Screen Size:</div><br />
		<?php 
		echo link_to('<b>128x128</b>','files/download?id='.$files->id.'&size=128x128',array('class'=>'dwnLink','rel'=>'nofollow')).',';
		echo link_to('<b>128x160</b>','files/download?id='.$files->id.'&size=128x160',array('class'=>'dwnLink','rel'=>'nofollow')).',';
		echo link_to('<b>176x220</b>','files/download?id='.$files->id.'&size=176x220',array('class'=>'dwnLink','rel'=>'nofollow')).',<br/>';
		echo link_to('<b>220x176</b>','files/download?id='.$files->id.'&size=220x176',array('class'=>'dwnLink','rel'=>'nofollow')).',';
		echo link_to('<b>240x320</b>','files/download?id='.$files->id.'&size=240x320',array('class'=>'dwnLink','rel'=>'nofollow')).',<br/>';
		echo link_to('<b>320x240</b>','files/download?id='.$files->id.'&size=320x240',array('class'=>'dwnLink','rel'=>'nofollow')).',';
		echo link_to('<b>320x480</b>','files/download?id='.$files->id.'&size=320x480',array('class'=>'dwnLink','rel'=>'nofollow')).',';
		echo link_to('<b>360x640</b>','files/download?id='.$files->id.'&size=360x640',array('class'=>'dwnLink','rel'=>'nofollow')).',<br/>';
		echo link_to('<b>480x640</b>','files/download?id='.$files->id.'&size=480x640',array('class'=>'dwnLink','rel'=>'nofollow')).',';
		echo link_to('<b>640x480</b>','files/download?id='.$files->id.'&size=640x480',array('class'=>'dwnLink','rel'=>'nofollow')).',';
		?>
		<br />
		<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_afterDownload.php'); ?>
	<?php else: ?>
		<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_beforeDownload.php'); ?>
		<?php echo '<div class="fhd">Download</div><br/>'.link_to( str_replace('_',' ',myUser::fileName($files->file_name)) ,'files/download?id='.$files->id,array('class'=>'dwnLink','rel'=>'nofollow')).'</div>' ?>
		<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_afterDownload.php'); ?>
		<div class="fhd">Size of file</div>
		<?php echo '<div>&nbsp;<span class="bld">'.myClass::formatSize($files->size).'</span></div>'; ?>
	<?php endif; ?>
		<div class="fhd">Hits</div>
	<?php echo '<div>&nbsp;<span class="bld">'.$files->download.' </span></div>'; ?>
<div class="fhd">Singer</div><br/>
<?php if($files->description): ?>
	<?php echo str_replace(chr(13),'<br />',$files->description); ?>
	<div class="devider">&nbsp;</div>
<?php endif; ?>
    
	<div class="fhd">Category</div>
	<?php echo '<div>&nbsp;<span class="bld">'.$catName.'</span></div>'; ?>
</div>
</div>

<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_RelatedItemsBefore.php'); ?>
<div class="randomFile">
<h3>Related Files</h3>
<?php
$sql = "select id,file_name,category_id,extension,size,download from files where category_id=".$files->category_id.' order by rand() limit 3';
$randomfiles = skyMysqlQuery($sql);
while($file = mysql_fetch_object($randomfiles))
{
	?>
	<div class="fl odd">
		<?php 
			$thumbServer = 'sft'.ceil($file->id/500);
			echo '<a class="fileName" href="'.url_for('@filesShow?id='.$file->id.'&name='.myUser::slugify( myUser::fileName($file->file_name,false) )).'">';
			echo '<div>';
		  	if(is_file(sfConfig::get('sf_upload_dir').'/thumb/'.$thumbServer.'/small_'.$file->id.'.jpg'))
		  		echo '<div>'.image_tag(SETTING_THUMB_DOMAIN.'/'.$thumbServer.'/small_'.$file->id.'.jpg',array()).'</div>';
				elseif(is_file(sfConfig::get('sf_upload_dir').'/thumb/c/'.$file->category_id.'_1.jpg'))
		  		echo '<div>'.image_tag(SETTING_THUMB_DOMAIN.'/c/'.$file->category_id.'_1.jpg',array()).'</div>';
		  	else
	    		echo '<div>'.image_tag('filetype/'.$file->extension.'.gif',array()).'</div>';
    	echo '<div>'.str_replace('_',' ',myUser::fileName($file->file_name))."<br />";
			if(!in_array($file->extension,array('JPG','GIF','PNG')))
			 echo "<span>[".myClass::formatsize($file->size)."]</span><br />";
			if($sf_params->get('action')=='lastadded')
				echo '<span>'.myClass::TimeAgo(strtotime($file->created_at)).'</span><br/>';
//			echo '<span>'.$file->download.' Hits</span>';
			echo '</div>';
			echo '</div></a>';
			?>
  </div>
<?php
}
?>
</div>


<div class="path"><?php 
	if(isset($_SERVER['HTTP_REFERER']) && strstr($_SERVER['HTTP_REFERER'],strtolower(sfConfig::get('app_sitename'))))
		echo '&laquo; '.link_to('Go Back',$_SERVER['HTTP_REFERER']).'<br />';
	echo link_to('Home',sfConfig::get('app_webpath')).' &raquo; ';
	echo $categoryPath;
	echo link_to($catName,'@filesList?parent='.$files->category_id.'&fname='.myUser::slugify($catName));
?>
</div>
<div class="devider">&nbsp;</div>

<?php if($files->extension=='MP3' || $files->extension=='WAV' || $files->extension=='MID'): ?>
<div class='description'><center><b>Tags: </b>
<?php echo str_replace("(SKYMp3.In).mp3" , "" , "$files->file_name");?> Mp3 Songs Download, <?php echo str_replace("(SKYMp3.In).mp3" , "" , "$files->file_name");?> iTunes Rip Mp3 Songs Download, <?php echo str_replace("(SKYMp3.In).mp3" , "" , "$files->file_name");?> 128 Kbps Mp3 Songs Free Download, <?php echo str_replace("(SKYMp3.In).mp3" , "" , "$files->file_name");?> 320 Kbps Mp3 Songs Free Download, <?php echo str_replace("(SKYMp3.In).mp3" , "" , "$files->file_name");?> Mp3 Songs Download In High Quality, <?php echo str_replace("(SKYMp3.In).mp3" , "" , "$files->file_name");?> Mp3 Songs Download 320kbps Quality, <?php echo str_replace("(SKYMp3.In).mp3" , "" , "$files->file_name");?> Mp3 Songs Download, <?php echo str_replace("(SKYMp3.In).mp3" , "" , "$files->file_name");?> All Mp3 Songs Download, <?php echo str_replace("(SKYMp3.In).mp3" , "" , "$files->file_name");?> Full Songs Download</center></div>
<?php endif; ?>
<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_allPageBottom.php'); ?>