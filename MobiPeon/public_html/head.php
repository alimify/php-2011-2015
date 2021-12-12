<!DOCTYPE html><html amp lang="en"><head><meta charset="utf-8"><script async src="https://cdn.ampproject.org/v0.js"></script><script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script><title><?php print $page_title; ?></title><link rel="canonical" href="<?php print "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" /><meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"><?php include 'class.css';?></head>
<body>





<header class="header clear"><a class="clear" href="/">MobiPeon.Com</a><div class="pfrom clear mh"><form method="get" action="/search" target="_blank"><input type="text" name="q" required><input type="submit" value="Search"/> </form></div></header>

<nav class="navigation">
<div class="dropdown mh">
  <a href="/mobile">Mobile</a>
  <div class="dropdown-content">
<?php
$sql="SELECT * FROM brand limit 0,5;";
$sites=MySQL_Query($sql);
while($site=MySQL_Fetch_Array($sites))
  {
    $id = $site['id'];
    $brand=urldecode($site['name']);
  print '<a href="/mobile/brand/'.$site['name'].'/'.$id.'">'.$brand.'</a>';
}
?>
 <a href="/more_brand">More...</a>
  </div></div><div class="dropdown ph">
  <a>Mobile</a>
  <div class="dropdown-content">
<a href="/mobile">Latest</a>
<?php
$sql="SELECT * FROM brand limit 0,5;";
$sites=MySQL_Query($sql);
while($site=MySQL_Fetch_Array($sites))
  {
    $id = $site['id'];
    $brand=urldecode($site['name']);
  print '<a href="/mobile/brand/'.$site['name'].'/'.$id.'">'.$brand.'</a>';
}
?>
 <a href="/more_brand">More...</a>
  </div></div>
<a href="/news">News</a>
<a href="/">Blog</a>
</nav>


<div class="content clear">
