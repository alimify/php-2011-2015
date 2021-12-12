<?php
    exec("ffmpeg -i movie.mp4 -i movie.mp4 -filter_complex '[0:v] [0:a:0] [1:v] [1:a:0] concat=n=2:v=1:a=1 [v] [a]' -map '[v]' -map '[a]' BeSureToWearConcat.mp4");
?>