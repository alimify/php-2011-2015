<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';

print $top;
include 'css.php';
print '<title>Copyright of WapSmsBd.Com</title></head><body>';

include 'head.php';
print '<h1>Copyright or Disclaimer</h1><div class="abt"><div class="box"><div>- Please Read The Disclaimer for any issue regarding copyright and ownership of content.</div><div>- This is a public web/wapsite only, All content/sms appears here are added by Registered users or by Owner of site.</div><div>-content on this site is only related to mobile sms, hense it is always open and does not came under copyright law.</div><div>- All the content are approved by admin for regards of removing bad words, any kind of insulting to religion or perticular person etc..</div><div>- All content found on this site have been added by registered group owners or collected from various sources across the web and are believed to be in the "public domain".</div> </div></div>';

include 'foot.php';
print $foot;
?>