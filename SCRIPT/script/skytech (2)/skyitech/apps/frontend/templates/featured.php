<h2>Featured Files</h2>
<?php include(sfConfig::get('sf_upload_dir').'/advt/'.USERDEVICE.'_listStart.php'); ?>
<?php include('files_list.php') ?>
<?php include(sfConfig::get('sf_upload_dir').'/advt/'.USERDEVICE.'_listEnd.php'); ?>
	<?php
		$pageNum = myUser::skyPageNavigate($totalRecords,$page,SETTING_FILES_PER_PAGE,'@featured?page=');
		if($pageNum){
	?>
		<div class="pgn">
			<?php
				myUser::getc('UGFnaW5hdGlvbg==',1);
				echo $pageNum;
				echo '<form action="/files/featured" method="get">';
				echo 'Jump to Page '.input_tag('page','','size=3');
				echo submit_tag('Go&raquo;','');
				echo '</form>';
			?>
		</div>
	<?php } ?>
<?php include(sfConfig::get('sf_upload_dir').'/advt/'.USERDEVICE.'_allPageBottom.php'); ?>