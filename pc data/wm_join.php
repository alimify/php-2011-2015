<?php
$frmt = $_GET['frmt'];
$file = $_GET['file'];
$id = $_GET['id'];
$save=$id;
if($frmt=='1'){
	exec("ffmpeg -i wmc/data/3gp.wmv -i $file -filter_complex '[0:v]setpts=PTS-STARTPTS[v0];[1:v]scale=176:144,setsar=1/1,setpts=PTS-STARTPTS[v1];[v0][0:a][v1][1:a]concat=n=2:v=1:a=1[v][a]' -map '[v]' -map '[a]' -s 176x144 -aspect 16:9 -vcodec mpeg4 -acodec aac -b:v 350k -r 15 -b:a 48k -ar 24000 -ac 1 -strict -2 $save");
	
	}elseif($frmt=='2'){
	exec("ffmpeg -i $file -i wmc/data/mp4.png -s 320x240 -vcodec mpeg4 -acodec aac -b:v 500k -r 15 -b:a 64k -ar 32000 -filter_complex 'overlay=main_w-overlay_w-0:main_h-overlay_h-0' -ac 2 -strict -2 $save");
}elseif($frmt=='3'){
	
	exec("ffmpeg -i $file -i wmc/data/hq.png -s 640x480 -vcodec mpeg4 -acodec aac -b:v 750k -r 25 -b:a 128k -ar 44100 -filter_complex 'overlay=main_w-overlay_w-0:main_h-overlay_h-0' -ac 2 -strict -2 $save");
	
}elseif($frmt=='4'){	
exec("ffmpeg -i $file -i wmc/data/join.mp4 -filter_complex '[0:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v0];[1:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v1];[v0][0:a][v1][1:a]concat=n=2:v=1:a=1[v][a]' -map '[v]' -map '[a]' -s 1280x720 -aspect 16:9 -vcodec h264 -acodec aac -b:v 3000k -r 25 -b:a 128k -ar 44100 -ac 2 -strict -2 $save");
}
?>