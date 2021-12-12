<?php
/*
*/
$alim = array(
'<a href="http://click.buzzcity.net/click.php?partnerid=105176&bn=2"><img src="http://show.buzzcity.net/show.php?partnerid=105176&bn=2" height="30" width="235" alt=" "/><br/><b>Click Here</b></a>',
'<a href="http://click.buzzcity.net/click.php?partnerid=105176&bn=1"><img src="http://show.buzzcity.net/show.php?partnerid=105176&bn=1" height="30" width="235" alt=" "/><br/><b>Click Here</b></a>',
'<a href="http://click.buzzcity.net/click.php?partnerid=105176&bn=3"><img src="http://show.buzzcity.net/show.php?partnerid=105176&bn=3" height="30" width="235"/><br/><b>Click Here</b></a>',
'<a href="http://click.buzzcity.net/click.php?partnerid=105176&bn=1"><img src="http://show.buzzcity.net/show.php?partnerid=105176&bn=1" height="30" width="235" alt=" "/><br/><b>Click Here</b></a>',
);
// You Can add more links before ");"
$alim = $alim[ rand(0, (count($alim)-1)) ];
print $alim;
?>
