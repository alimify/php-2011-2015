<? include("mylogin.php"); ?><?php
// Script By Jewel
// Release : 2014
// Powerd By KingBD.Net


$dir = $_GET['dir'];
if($_GET['up']){
//get the url
$url = $_POST['url'];
$filedir = $_POST['dir'];
 
//add time to the current filename
$saved ="./files/$filedir/";
$sname = "album.jpg";
$name = $saved.$sname;
print '<center>'.$url.'</center>';

//check if the files are only image 
if($ext == "jpg" or $ext == "png" or $ext == "gif"){

$upload = file_put_contents("$name",file_get_contents($url));

if($upload)  echo "Success: <a href='".$name."'>Check Uploaded</a>"; else "please check your folder permission";
}else{
echo "Please upload only image files";
}
}
else
print '<form action="" method="POST">
        Your URL: <br/><input type="text" name="url" /><input type="hidden" name="dir" value="'.$dir.'" /><br/><input type="submit" name="up" value="submit"/>
    </form>';
?>