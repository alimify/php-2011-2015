<?php include 'functions.php';
//include 'setup.php';
include 'core.php';
//include 'apanel_settings.php';
include 'apanel_antilogin.php';
echo $head;
$fold.=$_GET['folder'];
$createdir=$_GET['createdir'];
$cnfolder=$_GET['cnfolder'];
if($createdir) { if(mkdir("./load/$fold/$createdir")) { echo 'Folder Created..!'; } }
if($cnfolder=='new') { echo '<form method="get" action="apanel_filelist.php">Folder Name:<input type="hidden" name="folder" value="'.$fold.'"/><input type="text" name="createdir" value="New Folder"/><input type="submit" value="Submit"/></form>';  }
else { echo '<div class="even"><a href="apanel_filelist.php?cnfolder=new">Create New Folder</a></div>'; }
$dir=opendir("load/$fold");
$cfolder=explode("/",$fold);
$cfolder=array_reverse($cfolder); $cpfolder=$cfolder[0];
$cpfolder=str_replace('_',' ',$cpfolder);
//~ Vinay :: Name of Current Folder ~//
if(!$fold) { echo '<h2>Select Categories</h2>'; }
else { echo '<h2>'.$cpfolder.'</h2>'; }

//**Filelist//
//*Folders//
while(($file=readdir($dir))) { $folder=$fold.'/'.$file;
if(is_dir("load/$folder") && $file!=='.' && $file!=='..' && substr($file,-4)!=='.php') { $folders[]=$file;
$folders=array_merge($folders);
$foldername=$folders;
$foldername=str_replace('_',' ',$foldername);
$foldername=array_reverse($foldername);
}
//*Files
if(is_file("load/$folder") && $file!=='.' && $file!=='..' && substr($file,-4)!=='.php') {  //@//*Array*//@//
$files[]=$file;
$files=array_merge($files);

$filename=$files;
$filename=str_replace('_',' ',$filename);

$filename=array_reverse($filename);
/*VINAY*/ $autoextension=substr($file,-3);
if(substr($file,-4)=='.zip') { $preview='<table><tr><td><img src="./ext/zip.png" height="60" width="55"/></td>'; }
else { if(file_exists("./ext/$autoextension.png")) { $preview='<table><tr><td><img src="./ext/'.$autoextension.'.png" height="60" width="55"/></td>'; }
else { $preview=''; } } } }
//**End of Filelist**//
closedir($dir);
if(is_array($files) || is_array($folders)) { $page=strip_tags($_GET['page']);
if(empty($page)){$page=1;}
$item=($per*$page)-$per;
$fitem=($fper*$page)-$fper;
if(is_array($files)) { $files=array_reverse($files); }
if(is_array($folders)) { $folders=array_reverse($folders); }
$count=count($files)-1;
$fcount=count($folders)-1;
$yo=ceil($count/$per);
$fyo=ceil($fcount/$fper);
$dj=$item+$per;
$fdj=$fitem+$fper;
}
for($f=$fitem;$f<$fdj;$f++) {
if(is_dir("./load/$fold/$folders[$f]") and !empty($folders[$f])) { $cfolds = files("./load/$fold/$folders[$f]");
if($counting=='ON') {
if(empty($cfolds)) { $cfolds = 0; }
$focount = ' ['.$cfolds.']'; }

else { $focount=''; }
echo '<div class="even"><a href="?folder='.$fold.'/'.$folders[$f].'"><div>'.$foldername[$f].''.$focount.'</div></a><br/><a href="apanel_filelist_rename.php?folderpath=./load/'.$fold.'/'.$folders[$f].'&renamer='.$fold.'">[R]</a> <a href="apanel_filelist_move.php?folderpath=./load/'.$fold.'/'.$folders[$f].'&renamer='.$fold.'">[M]</a></div>';
} }
for($i=$item;$i<=$dj;$i++) {
if(is_file("./load/$fold/$files[$i]")) { $printsize=filesize("./load/$fold/$files[$i]");
if($printsize>1024) { $printsize=$printsize/1024;
$printsize=round($printsize); $size="$printsize Kb"; }
elseif($printsize<=1024) { $size=$printsize.' Bytes'; }
echo '<div class="odd">'.$preview.' <td><b><a href="download.php?fileurl=load/'.$fold.'/'.$files[$i].'">'.$filename[$i].'</a></b><br/>['.$size.']</td></tr></table><br/><a href="apanel_filelist_rename.php?folderpath=./load/'.$fold.'/'.$files[$i].'&renamer='.$fold.'">[R]</a> <a href="apanel_filelist_move.php?folderpath=./load/'.$fold.'/'.$files[$i].'&renamer='.$fold.'">[M]</a></div>';   } }
$prevpage=$page-1;
$nextpage=$page+1;
if($yo >= $page){$next='<a href="?folder='.$fold.'&page='.$nextpage.'">Next ></a>';} else{$next="Next >";}
if($page > 1){$prev='<a href="?folder='.$fold.'&page='.$prevpage.'">< Prev</a>';} else{$prev="< Prev";}
if($yo >= $page) { echo '<div class="even" align="left">Page ('.$page.'/'.$yo.')<br/>';
echo '<a href="?folder='.$fold.'&page=1"><< First</a> | '.$prev.' | '.$next.' | <a href="?folder='.$fold.'&page='.$yo.'">Last >></a><form method="get" action="?folder='.$fold.'">Go to Page: <input type="text" name="page" value="'.$page.'" size="3"/><input type="submit" value="Go &#187;"/></form></div>'; }
if($fyo >= $page){$next='<a href="?folder='.$fold.'&page='.$nextpage.'">Next ></a>';}else{$next="Next >";}
if($page > 1){$prev='<a href="?folder='.$fold.'&page='.$prevpage.'">< Prev</a>';} else{$prev="< Prev";}
if($fyo >= $page) { echo '<div class="even" align="left">Page ('.$page.'/'.$fyo.')<br/>';
echo '<a href="?folder='.$fold.'&page=1"><< First</a> | '.$prev.' | '.$next.' | <a href="?folder='.$fold.'&page='.$fyo.'">Last >></a><br/><form method="get" action="?folder='.$fold.'">Go to Page: <input type="text" name="page" value="'.$page.'" size="3"/><input type="submit" value="Go &#187;"/></form></div>'; }
echo $foot;
?>
