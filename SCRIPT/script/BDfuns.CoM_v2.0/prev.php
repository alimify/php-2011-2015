<?
include 'apanel_antilogin.php';
include 'setup.php';
{ if(!$_POST){
print ''.$head.'<h2>Tag Image<br>In the pictures will be marked specified label, removing it is impossible!<br></h2>
<div class="">
<form action="prev.php" method="post">
Directory containing images:<input name="dir" type="text" value="./load/Wallpapers"><br>
Text:(Ex: BDfuns.Com)<br>
<input name="text" type="text" value="BDfuns.Com"><br>
Location<br>
<select name="y">
<option value="top">top</option>
<option value="foot">below</option>
</select><br>
Font Size<br>
<input name="size" type="text" size="3" maxlength="1" value="2"><br>
Color<br>
<input name="color[]" type="text" size="3" maxlength="3" value="200">
<input name="color[]" type="text" size="3" maxlength="3" value="200">
<input name="color[]" type="text" size="3" maxlength="3" value="200"><br>
<input class="buttom" type="submit" value="Submit">
</form>
</div>';
}
else{
@set_time_limit(0);
$dir='./'.$_POST['dir'];
if ( $dh = opendir ( $dir ))
{
while (($file = readdir($dh))!==false ) {
$path=$dir.'/'.$file;
if(substr($path,-3) == 'gif')
{
$pic = imageCreateFromGif($path);
$f = 'imageGif';
}
elseif(substr($path,-3) == 'png'){
$pic = imageCreateFromPng($path);
$f = 'imagePng';
}
elseif(substr($path,-3) == 'jpg' || substr($path,-3) == 'jpe' || substr($path,-3) == 'jpeg'){
$pic = imageCreateFromJpeg($path);
$f = 'imageJpeg';
}
if($pic){
$color = imagecolorallocate($pic, $_POST['color'][0], $_POST['color'][1], $_POST['color'][2]);
if($_POST['y']=='foot'){
$y = imageSY($pic)-($_POST['size']*8);
}
else {
$y = 1;
}
imagestring($pic, $_POST['size'], (imageSX($pic)/2)-(strlen($_POST['text'])*3), $y, $_POST['text'], $color);

if($f($pic,$path,100))

{ echo 'dOnE<br/>';
}

}

}} } }
?>
