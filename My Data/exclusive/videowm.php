



<?php
    exec("ffmpeg -i movie.mp4 -i logo.png -filter_complex 'overlay=10:main_h-overlay_h-10' output2.mp4");
?>