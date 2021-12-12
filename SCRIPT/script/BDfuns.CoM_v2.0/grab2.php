<?php
      error_reporting(0);
      include 'apanel_antilogin.php';      /*
list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include 'moduls/ini.php';
session_name ('SID') ;
session_start();
include 'moduls/fun.php';
include 'moduls/connect.php';
include 'moduls/header1.php';
//------------------------------------------------------------------------------------------
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);

##############                                      */


##################################




###################################################




###############################################


// Powered by www.fb.com/shaon1993

// Website:WwW.BDfuns.Com


////////////////////////////////
?>

<html>
<head>
<title>BDfuns.CoM</title>
</head>
<body>
<center>
<h3>BDfuns.CoM</h3>
<br/>


<form method="post" action="<?=$_SERVER["PHP_SELF"]?>" enctype="multipart/form-data">
&raquo; Path To Save <small>(eg: ./files/Music/ )</small> <br />
<input size="50" type="text" class="input" name="dpath" value="<?php echo $file ; ?>" /><br />

Url: <br /><input type="text" name="link"><br/>
<input type="submit" value="Submit"/> <br />


<?php
$file = $_POST['dpath'] ; //location for files to be uploaded

$search = array(".swf",".zip",".rar",".sis", ".jar", ".sisx", ".3gp", ".mp4", ".avi", ".gif", ".nth", ".apk", ".mp3", ".wav", ".exe", ".jpg", ".jpeg", ".png", ".amr" );



if(isset($_POST['submit'])){
$file = $_POST['dpath'] ;   }
//////////////////////////////FUNCTIONS
function getLinks($link)
{   $ret = array();
$dom = new domDocument;
@$dom->loadHTML(file_get_contents($link));
$dom->preserveWhiteSpace = false;
$links = $dom->getElementsByTagName('a');
foreach ($links as $tag)
{
$ret[$tag->getAttribute('href')] = $tag->childNodes->item(0)->nodeValue;
}
return $ret;
}

// if(!is_dir($file)) mkdir($file);
$link = $_POST['link'];
if($link){
$urls = getLinks($link);
if(sizeof($urls) > 0)
{
foreach($urls as $key=>$value)
{
$find = str_replace($search, '|',strtolower($key));
if(substr_count($find,'|')>0){
if(substr_count($key,'http')<1)
$key = $link.$key;
$ice = explode('/',$key);
$num = count($ice)-1;
$ice = str_replace('mobizza.in','BDfuns.CoM',$ice);
$num = str_replace('mobizza.in','BDfuns.CoM',$num);
$ice = str_replace('%20','_',$ice);
$num = str_replace('%20','_',$num);
$ice = str_replace('%5b','[',$ice);
$num = str_replace('%5b','[',$num);
$ice = str_replace('.jpg','_BDfuns.jpg',$ice);
$num = str_replace('.jpg','_BDfuns.jpg',$num);
$ice = str_replace('%5d',']',$ice);
$num = str_replace('%5d','[',$num);
$ice = str_replace('WWW.mobizza.in','',$ice);
$num = str_replace('WWW.mobizza.in','',$num);
if(copy($key, $file.$ice[$num]))
echo 'Copyied <a href="'.$file.$ice[$num].'">'.$ice[$num].' </a> Successfully<br/>';
else
echo 'Could Not Copy '.$ice[$num].'<br/>';
}
}
}else{
echo "No links found at $link";
}
}
//Powered By BDfuns.CoM
?>

</center>
</body>
</html>
