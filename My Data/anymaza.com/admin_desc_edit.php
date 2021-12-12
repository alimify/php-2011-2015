<? include("mylogin.php"); ?>
 <?
////****************************************************************** Admin Panel By Jewel *****************************************************************************
/// Folder Description Editor
/// Script By Jewel
/// Release : 2014
include 'admin_file_header.php';
print '<h2> Edit Description</h2>';
if($_POST['Submit']){
$dir = $_GET['dir'];
$open = fopen("files/$dir/file.txt","w+");
$text = $_POST['update'];
fwrite($open, $text);
fclose($open);
echo "File updated.<br /><title>Successfully Updated !</title>"; 

if(file_exists('files/'.$dir.'/file.txt'))
{
echo "File: ";
$file = file("files/$dir/file.txt");
foreach($file as $text) {
echo $text."<br />";
}
}

}else{
print '<title>Edit Description</title>';
$dir = $_GET['dir'];
if(file_exists('files/'.$dir.'/file.txt'))
{$file = file("files/$dir/file.txt");}
echo "<form action=\"".$PHP_SELF."\" method=\"post\">";
echo "<textarea Name=\"update\" cols=\"50\" rows=\"10\">";
if(file_exists('files/'.$dir.'/file.txt'))
{
foreach($file as $text) {
echo $text;
} }
echo "</textarea>";
echo "<input type=\"hidden\" name=\"dir\" value=\"$dir\"/><input name=\"Submit\" type=\"submit\" value=\"Update\" />\n
</form>";
}
print '<a href="/admin_file_list.php?dir='.$dir.'&p=1&sort=1">Back TO List</a>';
include 'admin_file_footer.php';
?>