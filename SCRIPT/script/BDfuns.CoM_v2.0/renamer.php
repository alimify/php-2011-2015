
 <?php
 error_reporting(0);
      include 'apanel_antilogin.php';   /*

 list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include './moduls/ini.php';
session_name ('SID') ;
session_start() ;
include './moduls/fun.php';
include './moduls/connect.php';
include './moduls/header.php';

###################################################
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
/////////////////////////////////////////////////////////////////
        */

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1;charset=windows-1252' />
<meta name="keywords" content="mp3 tag editor,php mp3 tag editor,automatic mp3 tag editor" />
<meta name="description" content="Edit mp3 tags online." />
<meta http-equiv="Cache-Control" content="max-age=0" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="Pragma" content="no-cache" />
<style type="">
</style>
</head>
<body>
<pre>
<h2>Mass File Renamer-BDfuns.com</h2>







<?php



/****************************************************************************
* DO NOT REMOVE *

Project: PHPWeby file renamer version 1.0
Url: http://phpweby.com/
Copyright: (C) 2008 Blagoj Janevski - bl@blagoj.com
Project Manager: Blagoj Janevski

More info, sample code and code implementation can be found here:
http://phpweby.com/software/filerenamer

For help, feature requests, comments, feedback, discussion ... please join our
Webmaster forums - http://forums.phpweby.com

Visit http://phpweby.com for the latest PHP tutorials, articles, etc.

///PLEASE BACKUP YOUR FILES BEFORE EXECUTING THIS SCRIPT///

*****************************************************************************
*  If you like this software please link to us!                             *
*  Use this code:						                                    *
*  <a href="http://phpweby.com/software/filerenamer">PHP file renamer</a>   *
*****************************************************************************

License:
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.

*********************************************************/
$default_folde = "./files/";

$default_y_format = $_POST['yformat'] ;
$default_n_format = $_POST['nformat'] ;
$default_prefix = "";

$default_replace = $_POST['repl_comment'];
$default_rwith = "BDfuns.Com";

if(isset($_POST['submit'])){
    $mp3_fold = $_POST['dfol'];

    $default_change_format = $_POST['yformat'] ;
    $default_withoutcng_format = $_POST['nformat'] ;
    $mp3_filename = $_POST['pref_filename'];

    $mp3_comment = $_POST['repl_comment'];
    $mp3_artist = $_POST['wrepl_artist'];

///PLEASE BACKUP YOUR FILES BEFORE EXECUTING THIS SCRIPT///

// the directory
// './' - is the current directory
// '../' - is the parent directory
// case sensitive
// e.x.: /home/user or c:\files
$dir= $_POST['dfol'];

// 1 - uppercase all files
// 2 - lowercase all files
// 3 - do not uppercase or lowercase
$up=3;

//rename files that have $w in their filename
//case sensitive
//set to '' if you want to rename all files
$w= $_POST['yformat'] ;

//do not rename files having $n in their filename
$n= $_POST['nformat'] ;

//add prefix to files
$prefix= $_POST['pref_filename'];

//add postfix
$postfix='';

//replace
$replace= $_POST['repl_comment'];
$replace_with= $_POST['wrepl_artist'];

//true - traverse subdirectories
//false - do not traverse subdirectories
$tr=true;



////// do NOT change anything below this /////////
set_time_limit(1200);
$files=array();
error_reporting(E_ERROR | E_PARSE);
function prep($f,$dir)
{
	global $up,$prefix,$postfix,$w,$replace_with,$replace,$n,$files;
	if(strpos($f,$n)!==false)
	return $f;
	$f=str_replace($replace,$replace_with,$f);
	if($up==1)
	$f=strtoupper($f);
	elseif($up==2)
	$f=strtolower($f);
	$f=$prefix.$f.$postfix;
	$files[]=$dir.$f;
	return $f;
}
$i=0;
function dir_tr($dir)
{
	global $i,$w,$tr,$files;
	$dir=rtrim(trim($dir,'\\'),'/') . '/';
	$d=@opendir($dir);
	if(!$d)die('The directory ' .$dir .' does not exists or PHP have no access to it<br><a target="_blank" href="http://fb.com/shaon1993">Need help?</a>');


	while(false!==($file=@readdir($d)))
	{
		if ($file!='.' && $file!='..' && $file!='renamer.php')
		{
			if(is_file($dir.$file))
			{
				if($w=='' || (strpos($file,$w)!==false))
				{
					if(!in_array($dir.$file,$files))
					{
						rename($dir.$file,$dir.(prep($file,$dir)));
						$i++;
					}
				}
			}
			else
			{
				if(is_dir($dir.$file))
				{
					if($tr)
					dir_tr($dir.$file);
				}
			}
		}
	}
	@closedir($d);
}
dir_tr($dir);
echo '<br>Renamed ' . $i . ' files in directory<br>' . $dir;
echo "<br>Let me know your Feelings<br>";
echo '<br><br>Script Modefied by<a href="http://fb.com/shaon1993" target="_blank" style="color:blue;font-weight:bold;"> Shopnil Shaon</a><br> ' ;
echo 'For help, comments, feedback, discussion ... please Contact
	<a href="http://fb.com/shaon1993" target="_blank" style="color:blue;font-weight:bold;">Shopnil Shaon</a>'; }
?>


<form method="post" action="" enctype="multipart/form-data">
<br />&raquo; Select Folder     <small> eg: ./files/ </small>
<br /><input size="50" type="text" class="input" name="dfol" value="<?php echo $default_folde ; ?>" />

<br />&raquo; the format name that u want to change <small>(eg: .png )</small>
<br /><input size="50" type="text" class="input" name="yformat" value="<?php echo $default_y_format ; ?>" />
<br />&raquo; the format that u don't want to change <small>(eg .mp4)</small>
<br /><input size="50" type="text" class="input" name="nformat" value="<?php echo $default_n_format ; ?>" />
<br />&raquo; Add prefix
<br /><input size="50" type="text" class="input" name="pref_filename" value="<?php echo $default_prefix ; ?>" />

<br />&raquo; Replace
<br /><input size="50" type="text" class="input" name="repl_comment" value="<?php echo $default_replace ; ?>" />
<br />&raquo; Replace With
<br /><input size="50" type="text" class="input" name="wrepl_artist" value="<?php echo $default_rwith ; ?>" />
<br /><input size="50" type="submit" name="submit" value="Submit" />
</form>
<br />
<a href="./apanel.php">Admin Home</a><br/></center>

</pre>
</body>
</html>
