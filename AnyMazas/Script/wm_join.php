<?php
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$frmt = $_GET['frmt'];
$file = $_GET['file'];
$id = $_GET['id'];
$fldurl = mysql_fetch_array(mysql_query("SELECT folderurl FROM folder WHERE folderid='".$id."'"));
$basename=basename($file);
$fil1 = preg_replace("/\.[^.]+$/", "", $basename);
$filename=MySQL_Fetch_Array(MySQL_Query("SELECT nm from wm where id='".$fil1."';"));
if($frmt=='1'){
	$sfrmt = '-( 176x144 ).3gp';
	$save='wmc/tmp2/'.$fil1.'.3gp';
	$done=exec("ffmpeg -i wmc/data/1join.mp4 -i $file -filter_complex '[0:v]scale=176:144,setsar=1/1,setpts=PTS-STARTPTS[v0];[1:v]scale=176:144,setsar=1/1,setpts=PTS-STARTPTS[v1];[v0][0:a][v1][1:a]concat=n=2:v=1:a=1[v][a]' -map '[v]' -map '[a]' -s 176x144 -aspect 16:9 -vcodec mpeg4 -acodec aac -b:v 300k -r 15 -b:a 48k -ar 22050 -ac 1 -strict -2 $save");
	}elseif($frmt=='2'){
		$sfrmt = '-( 320x240 ).mp4';
		$save='wmc/tmp2/'.$fil1.'.mp4';
	$done=exec("ffmpeg -i wmc/data/1join.mp4 -i $file -filter_complex '[0:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v0];[1:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v1];[v0][0:a][v1][1:a]concat=n=2:v=1:a=1[v][a]' -map '[v]' -map '[a]' -s 320x240 -vcodec mpeg4 -acodec aac -b:v 500k -r 15 -b:a 64k -ar 32000 -ac 1 -strict -2 $save");
}elseif($frmt=='3'){
	$sfrmt = '-( 640x480 )HQ.mp4';
	$save='wmc/tmp2/'.$fil1.'hr.mp4';
	$done=exec("ffmpeg -i wmc/data/1join.mp4 -i $file -filter_complex '[0:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v0];[1:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v1];[v0][0:a][v1][1:a]concat=n=2:v=1:a=1[v][a]' -map '[v]' -map '[a]' -s 640x480 -vcodec mpeg4 -acodec aac -b:v 850k -r 25 -b:a 128k -ar 44100 -ac 2 -strict -2 $save");
	
}elseif($frmt=='4'){
	$sfrmt = '-( 1280x720 ) HD.mp4';
$save='wmc/tmp2/'.$fil1.'hd.mp4';
$done=exec("ffmpeg -i $file -i wmc/data/join.mp4 -filter_complex '[0:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v0];[1:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v1];[v0][0:a][v1][1:a]concat=n=2:v=1:a=1[v][a]' -map '[v]' -map '[a]' -s 1280x720 -aspect 16:9 -vcodec h264 -acodec aac -b:v 3000k -r 25 -b:a 128k -ar 44100 -ac 2 -strict -2 $save");
}elseif($frmt=='5'){
	$sfrmt = '-( 320x240 ).3gp';
	$save='wmc/tmp2/'.$fil1.'n.3gp';
	$done=exec("ffmpeg -i wmc/data/1join.mp4 -i $file -filter_complex '[0:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v0];[1:v]scale=1280:720,setsar=1/1,setpts=PTS-STARTPTS[v1];[v0][0:a][v1][1:a]concat=n=2:v=1:a=1[v][a]' -map '[v]' -map '[a]' -s 320x240 -vcodec mpeg4 -acodec aac -b:v 400k -r 15 -b:a 64k -ar 32000 -ac 1 -strict -2 $save");
	}
$nms = ''.$filename[0].'(AnyMaza.Com)'.$sfrmt.'';
	$saved ="./files/$fldurl[0]/";
$sname = $saved.$nms;
if(copy($save,$sname)){echo copy_done;
}

$glob_file="files/$fldurl[0]/$nms";
$filesc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mydnld WHERE nm = '".$glob_file."'"));
if($filesc[0]==0)
         {

      $fileres = mysql_query("INSERT INTO mydnld SET nm='".$glob_file."', dload='1', lastdload='".time()."'");

         }
$fileig=md5(basename($glob_file));
$rnd=rand(30,59);
$ssc='00:00:'.$rnd.'.435';
$thumout='thumb/video/'.$fileig.'.jpg';
exec("ffmpeg -i $file -ss $ssc -vframes 1 -f image2 -s 120x80 $thumout");
echo $fileig;
?>