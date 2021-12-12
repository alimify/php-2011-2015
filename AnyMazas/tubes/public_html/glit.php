<?php
	$data = getpage('https://www.youtube.com/watch?v='.$_GET['id'].'');
	
	preg_match('/ytplayer.config = {(.*?)};/',$data,$match);
	
	$o = json_decode('{'.$match[1].'}') ;
	$player = explode('s.ytimg.com/yts/jsbin/html5player-',$o->assets->js);
	$player = explode('/',$player[1]);
	$player = $player[0];
	
	print $player;

?>