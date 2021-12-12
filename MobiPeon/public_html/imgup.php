
<?php
include 'db.php';
include 'config.php';
include 'func.php';
admin_check('1',$admin,$password);
if($_POST['tsubmit']){
$id=$_POST['id'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["thumb"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["tsubmit"])) {
    $check = getimagesize($_FILES["thumb"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["thumb"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)) {
$url=$target_file;
$thumbdir='extra/thumb/mobile_thumb_'.$id.'.png';
    if(copy($url,$thumbdir)) {unlink($url);header('location:/edit_mobile.php?mobile_id='.$id.'&msg=1');}   
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}}elseif($_POST['asubmit']){


$id=$_POST['id'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["art"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["asubmit"])) {
    $check = getimagesize($_FILES["art"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["art"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["art"]["tmp_name"], $target_file)) {
$url=$target_file;
$artdir='extra/art/mobile_art_'.$id.'.jpg';
    if(copy($url,$artdir)) {
copy('http://5.189.168.49/tscreen.php?w=200&h=150&img=/extra/art/mobile_art_'.$id.'.jpg','extra/thumb/mobile_thumb_'.$id.'.png');
        unlink($url);header('location:/edit_mobile.php?mobile_id='.$id.'&msg=1');}   
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}
elseif($_POST['arturl']){
    $id=$_POST['id'];
    $url=$_POST['url'];
$urldir='extra/art/mobile_art_'.$id.'.jpg';
if(copy($url,$urldir)){
    copy('http://5.189.168.49/tscreen.php?w=200&h=150&img=/extra/art/mobile_art_'.$id.'.jpg','extra/thumb/mobile_thumb_'.$id.'.png');
  header('location:/edit_mobile.php?mobile_id='.$id.'&msg=1');  
}
}elseif($_POST['thurl']){

 $id=$_POST['id'];
    $url=$_POST['url'];
$urldir='extra/thumb/mobile_thumb_'.$id.'.png';
if(copy($url,$urldir)){
  header('location:/edit_mobile.php?mobile_id='.$id.'&msg=1');  
}

}
?>
