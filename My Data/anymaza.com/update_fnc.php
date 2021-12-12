<?php
/*
* *
* Updates Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/
function GantiNama($temanku){
$data_teman = file("teman.dat");
$total_teman = count($data_teman);
for($z = 0; $z < $total_teman; $z++){
$teman = explode("|", $data_teman[$z]);
$temanku = str_ireplace("$teman[0]","<a href=\"$teman[1]\">".$teman[0]."</a> [".$teman[2]."]", $temanku);
}
//Tambah data teman spesial km di sini
$temanku = str_replace("admin", "<b><font color=\"red\">J</font><font color=\"lime\">a</font><font color=\"white\">e</font><font color=\"darkkhaki\">y</font><font color=\"fuchsia\">&trade;</font></b>", $temanku);
return $temanku;
}
function GantiPesan($pesan){

$pesan = ereg_replace("no=[0-z]+", "<a href=\"http://gbs.patria.web.id/guest.php?\\0\">\\0</a>", $pesan);
$pesan = ereg_replace("id=[0-z]+", "<a href=\"http://gbs.4ndr3.com/guest.php?\\0\">\\0</a>", $pesan);
$pesan = ereg_replace("ui=[0-z]+", "<a href=\"http://indowab.com/gbs/guest.php?\\0\">\\0</a>", $pesan);
$pesan = ereg_replace("jaey=[0-z]+", "<a href=\"http://jaey.mobi.ps/index.php?\\0\">\\0</a>", $pesan);
$pesan = ereg_replace("gb=[0-z]+", "<a href=\"http://fegawap.net/gb/guest.php?\\0\">\\0</a>", $pesan);
$pesan = ereg_replace("cp=[0-z]+", "<a href=\"http://bejo.coolpage.biz/viewgb.php?\\0\">\\0</a>", $pesan);
$pesan = str_replace("anjing","*", $pesan);
$pesan = str_replace("bego","*", $pesan);
$pesan = str_replace("babi","*", $pesan);
$pesan = str_replace("kunyuk","*", $pesan);
$pesan = str_replace("ngentot","*", $pesan);
$pesan = str_replace("ngewe","*", $pesan);
$pesan = str_replace("itil","*", $pesan);
$pesan = str_replace("kabbo.wen.ru","great foll", $pesan);
$pesan = str_replace("faxbook,in","haha i am bolod", $pesan);
$pesan = str_replace("","<a href=\"\"></a>", $pesan);
$pesan = str_replace("tai","*", $pesan);
$pesan = str_replace("ketek","*", $pesan);
$pesan = ereg_replace("login=[0-z]+", "<a href=\"http://mobiwap.uw.hu/gbs2/webgb.php?\\0\">\\0</a>", $pesan);
return $pesan;
}


/*
* *
* Updates Script By Jewel
* Release : 2014
* Powerd By KingBD.Net
* * *
*/

?>
