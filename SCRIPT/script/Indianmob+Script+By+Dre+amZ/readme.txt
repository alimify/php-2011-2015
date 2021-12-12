[color=red]Requesting to forum admin to remove mod rewriting  limitation for files n folder with '_' under scrool symbol [/color]<br/>

once our mod rewriting limitation removed,i will share file search function,admin panel with mass mp3 tag editor,mass renamer,mass folder copier,simple uploader,file rename,delete,folder create,delete.

[U]Server requirements[/U]
paid hosting,image mgic or gd library for resizing sceenshot images.
<br/>[B]script cofigure[/B]
load is ur file storer folder,upload ur all files and folder in load.
edit core.php file,define script path,image watermark text,menubar link,default title,default keyword,ffmpeg enabling or disabling.<br/>
$url='http://yourdomain.com/';   dont forget to give / at the end of path<br/>
To change logo replace img/logo.gif  with ur own logo.<br/>
[U]Service menu[/U]
edit services.php and put ur service link in html format.
[U]Ads[/U]
ads ind ads folder.Ucan add upto 4 ads in mobile version.
Pc or web version ads places are showing in pc version,so open pc version n edit pc version ads places.
[U]Updates news[/U] 
mobile updeats in updatemobile.php  and pc updates in updatepc.php file,U v to update it when u wana add updates in site.
[U]Online counter or toplist link[/U] 
edit toplist.php file.IT will shon autometically in mobile and pc version footer.<br/>
 
[B]Script function[/B]
Autometic user redirect to mobile or pc version.Scrinshot of files from jpeg,gif,png,jar,thm,nth,3gp,mp4,avi files and saved them to skrin folder with watermark,so uses less cpu,no need to add or generate screenshot from thos files manually,Screenshot from video files possible in ffmpeg enable host n make sure ur ffmpeg enable in core.php file.
If u enable ffmpeg in non suported ffmpeg host ur video file will be iconless.If no screenshot available default screenshot of every type file will be shown.
Good seo title and keyword that comes directly from ur files n folder,Main title will be used for only index page.
Download count,files count.Dont delete d and count folder becz these folder contain data respectively.
Scrinshot from folder available,for adding manual folder icon upload m.jpg file in mobile version,and folder.jpg in pc version in the same folder for which u wana add icon.e.g if upload m.jpg n folder.jpg file in /load/Games/ u will get folder icon of  Games folder.but not on sub folder of Games,so use same way to add icon to any folder.  
For adding manual screenshot of any files upload it to skrin folder.e.g for adding manual sceen for asphalt.jar file upload asphalt.jar.gif to skrin,so screen of any file is filename with extension.gif  .  

Most advantages of this script is no mysql database needed,so its superfast,.html link from any files,folder,so good for seo search friendly,mobile css is attached with indexw.php file so its easily dected by maximum devices,near about 92% mobile device able to open this design properly with css.

[B]Script bug n fixing procedure[/B]
Do not use underscrool '_' symbol in files and folder as its using for mod rewriting.so before creating any folder remove that symbol.u can change ur files containg  '_' symbol through mass tag changer from admin panel.e.g enter _ symbol in existing tag field and put - symbol in new tag field,then hit mass tag changer.
IF ur script in any sub folder not in /public_html/ u have to define the path of indexw.php,indexpc,php,file.php n filepc.php files in .htaccess file.Position of those file relative to /public_html/ .
 