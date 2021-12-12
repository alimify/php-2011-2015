<!doctype html>
<html amp lang="en">
  <head>
    
  </head>
  <body><script type='text/javascript' src='http://www.mobilemaya.com/scripts/swfobject.js'></script>
      <div id='chart5Div'></div>
    <script type='text/javascript'>           
      var version = deconcept.SWFObjectUtil.getPlayerVersion();
      if (document.getElementById)
        var flash_version=version['major'];
      if(flash_version<6)
{
        document.write('<img src=http://www.mobilemaya.com/price_history_img/6116.png width=400 height=300 >');
function SetCookie(cookieName,cookieValue,nhours) {
 var today = new Date();
 var expire = new Date();
 expire.setTime(today.getTime() + 3600000*nhours);
 document.cookie = cookieName+'='+escape(cookieValue)
                 + ';expires='+expire.toGMTString();
}
SetCookie('fv','f','12');
}
      else
      {
        var chart2 = new FusionCharts('http://www.mobilemaya.com/scripts/FCF_MSLine.swf', 'ChId1', '450', '300');
        chart2.setDataURL('http://www.mobilemaya.com/price_history_static.php?id=6116');
        chart2.render('chart5Div');
      }
    </script>
    
    <img src=http://www.mobilemaya.com/price_history_img/6116.png width=400 height=300 alt='Xiaomi Redmi 3 2GB/16GB- Price History' > </body>
</html>