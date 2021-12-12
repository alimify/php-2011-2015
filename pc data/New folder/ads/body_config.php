<?php
     /**************************************************************************
     *  Adiquity Ad Code - Adiquity.com
     *  Copyright Adiquity Technologies Pvt Ltd . All rights reserved. 
     *  Language: PHP (Curl)
     *  Version: 18072011
     **************************************************************************/

$Adq_COOKIE = "adq_site_cookie";
//Set user cookie
setUserCookie();
function adiquity_ad($adq_params){
        global $Adq_COOKIE;

        $gender = '';
        $age = '';
        $longitude = '';
        $latitude = '';
        $location = ''; 
        if(! empty($longitude) && ! empty($latitude)) {
                $location=$latitude.",".$longitude;
        }
        $ext_user_id=getadqCookie();



        $params = array();
        $params = array(
                        "ua=" . urlencode($_SERVER["HTTP_USER_AGENT"]),
                        "TIP=". urlencode($_SERVER["REMOTE_ADDR"]),
                        "aclang=". "php",
                        "acver=". "18072011" ,
                        "cat"=>"s1,en"
                        );
        if (!empty($adq_params["ADQ_PARAMS"])){
                foreach ($adq_params["ADQ_PARAMS"] as $k => $v){
                        $params[] = urlencode($k) . "=" . urlencode($v);
                }
        }
        foreach ($_SERVER as $k => $v) {
                if ((substr($k, 0, 4) == "HTTP") ||(substr($k, 0, 3) == "REQ"))  {
                        $params[] = $k . "=" . urlencode($v);
                }
        }
        $post = implode("&", $params);
        $extras ="&gender=".$gender."&age=".$age."&location=".$location;
        
        if($ext_user_id != null) {
                $extras .= "&ext_user_id=".$ext_user_id;
        }

        $post.=$extras;
               $request = curl_init();
        $request_timeout = 10; // 10 seconds timeout
        $adq_url = "http://ads.adiquity.com/mads";
        curl_setopt($request, CURLOPT_URL, $adq_url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_TIMEOUT, $request_timeout);
        curl_setopt($request, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded", "Connection: Close", "X-ADQ-pazid: adqk55sn-14z1lol9-ub6bq"));
        curl_setopt($request, CURLOPT_POSTFIELDS, $post);

        $contents = curl_exec($request);
        if (curl_getinfo($request,CURLINFO_HTTP_CODE) == 200)
        {
                if ($contents === true || $contents === false)
                        $contents = "";
                        echo $contents;
        }
        curl_close($request);

}

function getadqCookie(){
    global $Adq_COOKIE;
    $ext_user_id = null;
    if(isset($_COOKIE[$Adq_COOKIE])) {
        $ext_user_id = $_COOKIE[$Adq_COOKIE];
    }
    return $ext_user_id;
}

function setUserCookie() {
    global $Adq_COOKIE;
    if(! isset($_COOKIE[$Adq_COOKIE])) {
        $value =  time().rand();
        setcookie($Adq_COOKIE, $value, time()+3600*24*75, "/");
    }
}

?>	
