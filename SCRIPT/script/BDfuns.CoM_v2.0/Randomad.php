<?
$xfile = @file("toplists.txt");
$random_num = rand (0,count($xfile)-1);
$udata = explode("::",$xfile[$random_num]);
echo "$udata[1]<br/>";
?>