<h2>
	<?php echo $catName; ?>
</h2>
<?php
	if(is_file(sfConfig::get('sf_upload_dir').'/thumb/c/'.$parent.'_2.jpg'))
		echo '<p class="showimage">'.image_tag(SETTING_THUMB_DOMAIN.'/c/'.$parent.'_2.jpg',('class=absmiddle')).'</p>';
?>

<?php
/* if files more then 0 */
if(count($filess)>0)
{
?>
<div class="dtype">
	<?php
		$parent = $name = $type = $sort = '';
		$fname = '&fname='.myUser::slugify($catName);
		if($sf_params->get('parent'))	$parent = '&parent='.$sf_params->get('parent');
		if($sf_params->get('name'))	$name = '&name='.$sf_params->get('name');
		if($sf_params->get('type'))	$type = '&type='.$sf_params->get('type');
		if($sf_params->get('sort')!='new2old')
			echo link_to('New 2 Old','@filesList?sort=new2old'.$parent.$name.$type.$fname);
		else
			echo 'New 2 Old';
		if($sf_params->get('sort')!='download')
			echo '&nbsp;|&nbsp;'.link_to('Download','@filesList?sort=download'.$parent.$name.$type.$fname);
		else
			echo '&nbsp;|&nbsp;'.'Download';
		if($sf_params->get('sort')!='a2z')
			echo '&nbsp;|&nbsp;'.link_to('A to Z','@filesList?sort=a2z'.$parent.$name.$type.$fname);
		else
			echo '&nbsp;|&nbsp;'.'A to Z';
		if($sf_params->get('sort')!='z2a')
			echo '&nbsp;|&nbsp;'.link_to('Z to A','@filesList?sort=z2a'.$parent.$name.$type.$fname);
		else
			echo '&nbsp;|&nbsp;'.'Z to A';
	?>
</div>
<?php
//if(mysql_num_rows($filess)>3)
	include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_listStart.php');
?>
<?php include('files_list.php') ?>
<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_listEnd.php'); ?>
	<?php
		if($sf_params->get('sort'))	$sort = '&sort='.$sf_params->get('sort');
		$pageNum = myUser::skyPageNavigate($totalRecords,$page,SETTING_FILES_PER_PAGE, '@filesList?'.$parent.$name.$fname.$type.$sort.'&page=');
		if($pageNum)
		{
	?>
		<div class="pgn">
			<?php
				myUser::getc('UGFnaW5hdGlvbg==',1);
				echo $pageNum;
				echo form_tag('files/list','method=get');
				echo input_hidden_tag('parent',$sf_params->get('parent'));
				echo input_hidden_tag('name',$sf_params->get('name'));
				echo input_hidden_tag('type',$sf_params->get('type'));
				echo input_hidden_tag('sort',$sf_params->get('sort'));
				echo 'Jump to Page '.input_tag('page','','size=3');
				echo submit_tag('Go&raquo;','');
				echo '</form>';
			?>
		</div>
	<?php } ?>
<?php
} /* if files more then 0 */
?>
</div>

<?php if($files->extension=='MP3' || $files->extension=='WAV' || $files->extension=='MID'): ?>
<div class='description'><b>Tags: </b>
<?php echo $catName;?> Mp3 Songs Download, <?php echo $catName;?> iTunes Rip Mp3 Songs Download, <?php echo $catName;?> 128 Kbps Mp3 Songs Free Download, <?php echo $catName;?> 320 Kbps Mp3 Songs Free Download, <?php echo $catName;?> Mp3 Songs Download In High Quality, <?php echo $catName;?> Mp3 Songs Download 320kbps Quality, <?php echo $catName;?> Mp3 Songs Download, <?php echo $catName;?> All Mp3 Songs Download, <?php echo $catName;?> Full Album Songs Download
</div>
<?php elseif($files->extension=='3GP' || $files->extension=='MP4' || $files->extension=='3G2'): ?>
<div class='description'><b>Tags: </b>
<?php echo $catName;?> Video Songs Download, <?php echo $catName;?>  Video, <?php echo $catName;?> 3Gp Video, <?php echo $catName;?> Mp4 Video Songs, <?php echo $catName;?>  Android HD Video, <?php echo $catName;?> 1080p HD Video Song, <?php echo $catName;?> Video Download, <?php echo $catName;?> Full Video Song, <?php echo $catName;?> Bollywood Movie 720p HD Video, <?php echo $catName;?> Video Download For Free.
</div>
<?php endif; ?>


<div class="path"><?php 
	echo link_to('Home',sfConfig::get('app_webpath')).' &raquo; ';
	echo $categoryPath;
	echo link_to($catName,'@filesList?parent='.$sf_params->get('parent').'&fname='.myUser::slugify($catName));
?>
</div>
<?php include(sfConfig::get('sf_upload_dir').'/advt/'.sfConfig::get('app_smallname').'/'.USERDEVICE.'_allPageBottom.php'); ?>