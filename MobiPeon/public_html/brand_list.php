<?php
include 'db.php';
include 'config.php';
include 'func.php';
$page_title='Mobile Brand';
$sidebar=2;

include 'head.php';
print '<div class="main_content clear">';
print '<h1>Mobile Brand</h1>';


print '<div class="brand_list"><div><a href="/mobile">All Mobile</a></div>';
$sql="SELECT * FROM brand;";
$sites=MySQL_Query($sql);
while($site=MySQL_Fetch_Array($sites))
  {
    $id = $site['id'];
    $brand=urldecode($site['name']);
  print '<div><a href="/mobile/brand/'.$site['name'].'/'.$id.'">'.$brand.'</a></div>';
}
print '</div>';


print '</div>';
include 'sidebar.php';
include 'foot.php';
?>