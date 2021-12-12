<?php
//
//   CF Users Online 0.9
//   -------------------------------
//
//   Author:    codefuture.co.uk
//   Version:   0.9
//   Date:      21-Jan-11
//
//   download the latest version from - http://codefuture.co.uk/projects/usersonline/
//
//   Copyright (c) 2011 codefuture.co.uk
//   This file is part of the Users Online 0.9.
//
//   CF Users Online Script is free software: you can redistribute it and/or modify
//   it under the terms of the GNU General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   CF Users Online Script is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//   You should have received a copy of the GNU General Public License
//   along with CF Users Online Script.  If not, see http://www.gnu.org/licenses/.
//
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// Settings


// This is the file were we will store the visitors online counter
// you may need to make this file and CHMOD the file to 777 so we can read and write it.
// File Name
	$counterName = "counter.db";

// Change the value here to change how long a user is counted online for.
// Value is in seconds. 300 = 5 minutes
	$timeOut = 300;

// 
	$salting = 'rLT19?;Pw|2ei}0MtbA~hYaE{SOHzzG6';

// Image color setup
	$outerBorder	= "b9b9b9"; // ob=b9b9b9
	$innerBorder	= "ffffff"; // ib=ffffff
	$leftFill		= "cccccc"; // lf=cccccc
	$leftTextColor	= "555555"; // ltc=555555
	$rightFill		= "dddddd"; // rf=dddddd
	$rightTextColor	= "555555"; // rtc=555555

// image quality from 0-100
	$scaleQuality = 1;

// text on image
	$rightText = 'USERS ONLINE';
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
// Do not edit beyond this line

// get on-the-fly color settings
	if(isset($_GET['ob'])) $outerBorder		= $_GET['ob'];
	if(isset($_GET['ib'])) $innerBorder		= $_GET['ib'];
	if(isset($_GET['lf'])) $leftFill		= $_GET['lf'];
	if(isset($_GET['ltc'])) $leftTextColor	= $_GET['ltc'];
	if(isset($_GET['rf'])) $rightFill		= $_GET['rf'];
	if(isset($_GET['rtc'])) $rightTextColor	= $_GET['rtc'];

// if the visitors is just a bot no need to go on
	if(stripos($_SERVER['HTTP_USER_AGENT'], 'bot')) exit;

// get ip and time for user
	$userip = md5($salting.getIpAddress());
	$timenow = time();
	$this_user_added = false;

// Load DB
	$db = load_db($counterName);
	
// gab Users online list
	if(isset($db['online'])) $online = $db['online'];
	else $online = array();

// see if list is empty
	if (!empty($online)){
	// loop user online list
		foreach ($online as $k => $v){
		// if this users ip is in the list then update the time for it
			if($v['ip'] == $userip){ 
				$oline[$k]['time'] = $timenow;
				$this_user_added = true;
			}
		// if the time on this ip address in the loop is past the timeout setting then remove it from the list
			elseif($v['time'] <= $timenow - $timeOut){ 
				unset($online[$k]);
			}
		}
	}
// if user online db is empty or we have not found them in the db
// then add them to the db
	if (!$this_user_added || empty($online)) $online[] = array('ip'=>$userip,'time'=>$timenow);

// set counter text
	$leftText = count($online);

// save counter file with new hits
	$db['online'] = $online;
	save_db($counterName,$db);

// draw the image
	DrawButton(	$outerBorder,$innerBorder,
				$leftFill,$leftText,$leftTextColor, 
				$rightFill,$rightText,$rightTextColor,$scaleQuality);

//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
// Functions

function load_db($fileaddress){
	if (file_exists($fileaddress ))	$filearray = unserialize(file_get_contents($fileaddress)); 
	else $filearray = array();
	return $filearray;
}
function save_db($fileaddress,$db){
	$fp = fopen($fileaddress, 'w+') or die('I could not open '.$fileaddress.'.');
	fwrite($fp, serialize($db));
	fclose($fp);
	return true;
}
function ImageColorAllocateHex( $image, $hex ) { 
	for( $i=0; $i<3; $i++ ) {
		$temp = substr($hex, 2*$i, 2); 
		$rgb[$i] = 16 * hexdec( substr($temp, 0, 1) ) + hexdec(substr($temp, 1, 1)); 
	}
	return ImageColorAllocate ( $image, $rgb[0], $rgb[1], $rgb[2] );
}
function getRGB($hex) { 
	for( $i=0; $i<3; $i++ ) {
		$temp = substr($hex, 2*$i, 2); 
		$rgb[$i] = 16 * hexdec( substr($temp, 0, 1) ) + hexdec(substr($temp, 1, 1)); 
	}
	return $rgb;
}
function DrawButton($ob,$ib,$lf,$lt,$ltc,$rf,$rt,$rtc,$sq){

	$font['image'] = 'iVBORw0KGgoAAAANSUhEUgAAANYAAAASCAMAAAAQRNC+AAAALHRFWHRDcmVhdGlvbiBUaW1lAE1vbiAxOSBNYXkgMjAwMyAwMzoyNToxNiAtMDUwMDJdFyEAAAAHdElNRQfTBRMSGh/wtTMQAAAACXBIWXMAAArwAAAK8AFCrDSYAAAABGdBTUEAALGPC/xhBQAAAwBQTFRF////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACyO34QAAAAF0Uk5TAEDm2GYAAAFKSURBVHja7VaLDsMgCOT+/6f3qI87QOPqlqxJSeOoK8hxCpoBZs/hNbL+Hlmtj5GO8lZ1qA+nI7ga/hwmG4Lxw0OEhfY/7Ih46gxtOQ+ruiqLtSX2YNUsei4oudkXDBsUH1mLThYNE7q14N5HtcZW9oD+bwDyzapM5bCEpm1USUb1QLXZHo4jIj1bFiyZX6YEDLd9sA/sp/Ln4d1yy1UEQf9GqT5j5YpfrUx1yuk88hWCKhi4YnMBpK7cA+7m1NOtv5EFNwtx4Ksn12K1dKked7cSkfYDWYA7teBKryyytHa6FJZr5ZDkaNvS26C5bxwsZcvvGzJysEoqEvI02eNN6EiJbCG45hTFPGpOOcSy/cD+5mylezJlK0EVnLas04WPQ/MXuZWz1V8gy8zOlhJLF0c6Wx4SJzak2GxC8DnB2tRHdyMszNxyaXkAG0YCM5BD9fgAAAAASUVORK5CYII=';
	$font['xy'] = array(65 => array("x"=>0, "y"=>0, "w"=>5),66 => array("x"=>6, "y"=>0, "w"=>5),67 => array("x"=>12, "y"=>0, "w"=>5),68 => array("x"=>18, "y"=>0, "w"=>5),69 => array("x"=>24, "y"=>0, "w"=>5),70 => array("x"=>29, "y"=>0, "w"=>5)	,71 => array("x"=>34, "y"=>0, "w"=>5),72 => array("x"=>40, "y"=>0, "w"=>5),73 => array("x"=>46, "y"=>0, "w"=>3),74 => array("x"=>49, "y"=>0, "w"=>5),75 => array("x"=>55, "y"=>0, "w"=>5),76 => array("x"=>61, "y"=>0, "w"=>5),77 => array("x"=>66, "y"=>0, "w"=>6),78 => array("x"=>73, "y"=>0, "w"=>6),79 => array("x"=>80, "y"=>0, "w"=>5),80 => array("x"=>86, "y"=>0, "w"=>5),81 => array("x"=>92, "y"=>0, "w"=>5),82 => array("x"=>98, "y"=>0, "w"=>5),83 => array("x"=>104, "y"=>0, "w"=>5),84 => array("x"=>110, "y"=>0, "w"=>5),85 => array("x"=>115, "y"=>0, "w"=>5),86 => array("x"=>121, "y"=>0, "w"=>6),87 => array("x"=>128, "y"=>0, "w"=>6),88 => array("x"=>135, "y"=>0, "w"=>6),89 => array("x"=>142, "y"=>0, "w"=>6),90 => array("x"=>149, "y"=>0, "w"=>5),32 => array("x"=>154, "y"=>0, "w"=>2),49 => array("x"=>0, "y"=>10, "w"=>5),50 => array("x"=>5, "y"=>10, "w"=>5),51 => array("x"=>11, "y"=>10, "w"=>5),52 => array("x"=>17, "y"=>10, "w"=>5),53 => array("x"=>23, "y"=>10, "w"=>5),54 => array("x"=>29, "y"=>10, "w"=>5),55 => array("x"=>35, "y"=>10, "w"=>5),56 => array("x"=>41, "y"=>10, "w"=>5),57 => array("x"=>47, "y"=>10, "w"=>5),48 => array("x"=>53, "y"=>10, "w"=>4));

	header ("Content-type: image/png");
	$im = @imagecreatetruecolor(80, 15) or die ("Cannot Initialize new GD image stream");
	imagerectangle($im, 0, 0, 79, 14, ImageColorAllocateHex($im, $ob));
	imagerectangle($im, 1, 1, 78, 13, ImageColorAllocateHex($im, $ib));

	imageline ($im, 18, 1, 18, 12, ImageColorAllocateHex($im, $ib));

	imagefilledrectangle($im, 2, 2, 17, 12, ImageColorAllocateHex($im, $lf));
	imagefilledrectangle($im, 19, 2, 77, 12, ImageColorAllocateHex($im, $rf));

	$lp = (strlen($lt) < 3?(strlen($lt) <2?8:5):3);

	$im = right2img($ltc,strtoupper($lt),$lp,$font['image'],$font['xy'],$im);
	$im = right2img($rtc,strtoupper($rt),21,$font['image'],$font['xy'],$im);

	imagepng($im,NULL,(9 - round(($sq/100) * 9)),NULL);
	imagedestroy($im);
}
function right2img($color,$text,$pos,$font,$fontxy,$im){
	$letters = imagecreatefromstring(base64_decode($font));
	$rgb = getRGB($color);
	$index = imagecolorexact($letters, 0, 0, 0);
	imagecolorset ($letters, $index, $rgb[0], $rgb[1], $rgb[2]);
	for($i=0;$i<strlen($text);$i++){
		$c = ord($text[$i]);
		imagecopy ($im, $letters, $pos, 5, $fontxy[$c]["x"], $fontxy[$c]["y"], $fontxy[$c]["w"], 5);
		$pos+=$fontxy[$c]["w"];
	}
	return $im;
}
function getIpAddress() {
	$check = array('HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_X_CLUSTER_CLIENT_IP','HTTP_FORWARDED_FOR','HTTP_FORWARDED','REMOTE_ADDR');
	$ip = '0.0.0.0';
	foreach ($check as $key) {
		if (isset($_SERVER[$key])) {
			list ($ip) = explode(',', $_SERVER[$key]);
			break;
		}
	}
	return $ip;
}
?>