<?php
$homepage = file_get_contents('./faq.txt');
echo '<div class="search" align="center">Admin Area</div>
<div class="mp3t">Mloader Wap Live News :</div>
        <div class="djafile2"><div align="left"><font size="1"><marquee direction="left" scrollamount="3" scrolldelay="80" onmouseover="this.stop();" onmouseout="this.start();"> <font color="#00FF00">::</font> <b>';
echo $homepage;
echo '</marquee>';
?>