<?php
$url=$_GET['videoid'];
$url=str_replace('m.','',$url);	
$url=str_replace('www.','',$url);
function getYouTubeVideoId($url)
{
    $video_id = false;
    $url = parse_url($url);
    if (strcasecmp($url['host'], 'youtu.be') === 0)
    {
        #### (dontcare)://youtu.be/<video id>
        $video_id = substr($url['path'], 1);
    }
    elseif (strcasecmp($url['host'], 'youtube.com') === 0)
    {
        if (isset($url['query']))
        {
            parse_str($url['query'], $url['query']);
            if (isset($url['query']['v']))
            {
                #### (dontcare)://www.youtube.com/(dontcare)?v=<video id>
                $video_id = $url['query']['v'];
            }
        }
        if ($video_id == false)
        {
            $url['path'] = explode('/', substr($url['path'], 1));
            if (in_array($url['path'][0], array('e', 'embed', 'v')))
            {
                #### (dontcare)://www.youtube.com/(whitelist)/<video id>
                $video_id = $url['path'][1];
            }
        }
    }
    return $video_id;
}
$videois=getYouTubeVideoId($url);
if(!$videois){$videoid=$url;}else{$videoid=$videois;}
print $videois;
exit;
if($videoid){header("Location:/view/$videoid");}else{print 'please input videoid or url';}
?>