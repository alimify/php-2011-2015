<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';

print $top;
include 'css.php';
print '<title>About of WapSmsBd.Com</title></head><body>';

include 'head.php';
print '<h1>About Us</h1><div class="abt"><div class="box"><div>- <b>WapSmsBd.Com</b> is bengali sms portal and song lyrics directory based sharing platfrom.</div><div>- Register user of <b>WapSmsBd.Com</b> can share bengali song lyrics,bengali sms,poem,jokes etc.</div><div>- Available all service are free,traffic cost are may apply.</div><div>- only register user can enjoy the full feature of <b>WapSmsBd.Com</b>.</div><div>- Register user can make favourite sms list,favourite poem list,jokes list etc with thier own choices..</div> </div></div>';

include 'foot.php';
print $foot;
?>