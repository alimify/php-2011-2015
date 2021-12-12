<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';

print $top;
include 'css.php';
print '<title>Contact with WapSmsBd.Com</title></head><body>';

include 'head.php';
print '<h1>Contact with Us</h1><div class="abt"><div class="box">
For any kind of help,complain or suggestion you can contact us. We will reply As Soon As Possible
<br/><b>Email:</b><font color="red"> jewelbd960@gmail.com</font>
</div></div>';

include 'foot.php';
print $foot;
?>