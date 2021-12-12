<?php
function getHeaders($url)
{
  $ch = curl_init($url);
  curl_setopt( $ch, CURLOPT_NOBODY, true );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
  curl_setopt( $ch, CURLOPT_HEADER, false );
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
  curl_setopt( $ch, CURLOPT_MAXREDIRS, 3 );
  curl_exec( $ch );
  $headers = curl_getinfo( $ch );
  curl_close( $ch );

  return $headers;
}

function download($url, $path)
{
  $fp = fopen ($path, 'w+');
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_URL, $url );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
  curl_setopt( $ch, CURLOPT_BINARYTRANSFER, true );
  curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
  curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 100 );
  curl_setopt( $ch, CURLOPT_FILE, $fp );
  curl_exec( $ch );
  curl_close( $ch );
  fclose( $fp );

  if (filesize($path) > 0) return true;
}


$url = 'http://r9---sn-5go7dn7z.googlevideo.com/videoplayback?id=o-AL2HUpjmooS06YgoyKPDD27GnUP5_K0gOFTxd_4rHlYO&key=yt5&ipbits=0&mm=31&mn=sn-5go7dn7z&initcwndbps=501250&mime=video/webm&pl=48&ip=2a02:c200:1:10:2:4:2209:1&ms=au&source=youtube&mv=m&dur=0.000&signature=701ECB09A357A66686A19308F776F9AC63081079.353EB6A387E5A746599114A7DAEDECAA26651A01&fexp=901816,9405966,9407943,9408093,9408710,9412845,9414764,9414929,9415365,9415429,9415485,9416126,9416686,9416729,9417670,9417927,9417941&mt=1438065954&ratebypass=yes&sver=3&upn=86b-ZXGXPtc&expire=1438087672&sparams=dur,id,initcwndbps,ip,ipbits,itag,lmt,mime,mm,mn,ms,mv,pl,ratebypass,source,upn,expire&lmt=1437555427484084&itag=43&signature=&title=AnyMaza.Com_O-Lolona-Full-Video-Song--------Bonny--Koushani--Raj-Chakraborty--2015';
$headers = getHeaders($url);
$mimetype=$headers['content_type'];
if($mimetype=='video/3gpp'){$format ='3gp';}
if($mimetype=='video/mp4'){$format ='mp4';}
if($mimetype=='video/x-flv'){$format ='flv';}
echo $mimetype;
if ($headers['http_code'] === 200 and $headers['download_content_length'] < 1024*1024) {
  if (download($url, $path)){
    echo 'Download complete!'; 
  }
}
?>