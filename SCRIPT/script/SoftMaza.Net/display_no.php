<?
function display_pageno($total_no,$a,$link,$limit)
{
$totalLink = 5;
$pagination='';
if($a!=1)
$pagination = '<a href="'.$link.'1">Fast</a> | ';

$no_of_page=ceil($total_no/$limit);

if ($a*$limit > $limit)
$pagination .= '<a href="'.$link.($a-1).'">Prev</a>';

$count_record=0;
$i=1;
if($a > $totalLink)
$i=$a-floor($totalLink/2);
/*   elseif($a<=$no_of_page)
{
$i=$a-((int)($a%$limit))+1;
if($i<=0){ $i=1; }
elseif(((int)($a%$limit))<=0){ $i=$a-((int)(($a-1)%$limit)); }
}
*/
for (;$i<=$no_of_page;$i++)
{
if($a==$i)
$pagination .= $i;
else
$pagination .= ' | <a href="'.$link.$i.'">'.$i.'</a> | ';
$count_record=$count_record+1;
if ($count_record==$totalLink)
break;
}

if($a < $no_of_page)
{
$pagination .= '<a href="'.$link.($a+1).'">Next</a> | ';
$pagination .= '<a href="'.$link.$no_of_page.'">Last</a>';
}
echo $pagination;
}
?>
