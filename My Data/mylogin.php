<?php
//// Script By Jewel
/// AnyMaza.Com


##################################################################
#  SETTINGS START
##################################################################

// Add login/password pairs below, like described above
// NOTE: all rows except last must have comma "," at the end of line
$LOGIN_INFORMATION = array(
  'jimmyjewel.bd@gmail.com' => 'kingbdadmin_romim',
  'jewelbd960@gmail.com' => 'kingbdadmin_jewel'
);

// request login? true - show login and password boxes, false - password box only
define('USE_USERNAME', true);

// User will be redirected to this page after logout
define('LOGOUT_URL', 'http://jewel.anymaza.com/');

// time out after NN minutes of inactivity. Set to 0 to not timeout
define('TIMEOUT_MINUTES', 0);

// This parameter is only useful when TIMEOUT_MINUTES is not zero
// true - timeout time from last activity, false - timeout time from login
define('TIMEOUT_CHECK_ACTIVITY', true);

##################################################################
#  SETTINGS END
##################################################################


///////////////////////////////////////////////////////
// do not change code below
///////////////////////////////////////////////////////

// timeout in seconds
$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);

// logout?
if(isset($_GET['logout'])) {
  setcookie("verify", '', $timeout, '/'); // clear password;
  header('Location: ' . LOGOUT_URL);
  exit();
}

if(!function_exists('showLoginPasswordProtect')) {

// show login form
function showLoginPasswordProtect($error_msg) {
?>
<html>
<head>
  <title>Admin Login</title>
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
</head>
<body><div class="logo" align="center"><img src="http://AnyMaza.Com/mobile_logo.png" alt="AnyMaza.Com" title="AnyMaza.Com" /></div><style>
@media only screen and (max-width:600px) 
{
body{max-width:600px; margin:0 auto;}
.js { text-align:center; color:#fff; font-size:120%; padding:4px; 
background:#285F94; border:2px solid #97B0D6;border-width:2px 0;font-weight:bold; 
}
.logo {background:url(http://anymaza.com/css/bgs.png)repeat-x;color:#fff; text-align:center; }
}

@media only screen and (min-width:600px) 
{
body {min-width: 500px; max-width: 500px;margin: 0 auto; border-width: 1px; border-color: #9e9e9e; border-style: solid;border-radius: 7px; -webkit-border-radius: 7px; -moz-border-radius: 7px; -webkit-box-shadow: -1px 3px 17px 1px rgba(0,0,0,0.75); -moz-box-shadow: -1px 3px 17px 1px rgba(0,0,0,0.75); box-shadow: -1px 3px 17px 1px rgba(0,0,0,0.75);}
a {text-decoration:none;} a:active {color: #622222;} a:focus, a:hover { color: maroon; text-transform: uppercase; font-weight: bolder; font-size: 18px;}
.UPdate a {text-decoration:none;} .UPdate a:active {color: #622222;} .UPdate a:focus, .UPdate a:hover { color: red; text-transform: uppercase; font-weight: bolder; font-size: 18px;}
.js { background-color: #cdcfd2; color: white;}
.logo {background:url(http://anymaza.com/css/bgs.png)repeat-x;color:#fff; text-align:center; }
}</style><form method="post"><div class="js" align="center">Admin Lgin</div><center><font color='red'><?php echo $error_msg; ?></font><br/>Login:<br /><input type="input" name="access_login" /><br />Password:<br /><input type="password" name="access_password" /><br/><input type="submit" name="Submit" value="Submit" />
  </form></center><div class="js" align="center">Copyright &#169; AnyMaza.Com 2014</div></body>
</html>
<?php
  // stop at this point
  die();
}
}

// user provided password
if (isset($_POST['access_password'])) {

  $login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
  $pass = $_POST['access_password'];
  if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION)
  || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION[$login] != $pass ) ) 
  ) {
    showLoginPasswordProtect("Incorrect password.");
  }
  else {
    // set cookie if password was validated
    setcookie("verify", md5($login.'%'.$pass), $timeout, '/');
    
    // Some programs (like Form1 Bilder) check $_POST array to see if parameters passed
    // So need to clear password protector variables
    unset($_POST['access_login']);
    unset($_POST['access_password']);
    unset($_POST['Submit']);
  }

}

else {

  // check if password cookie is set
  if (!isset($_COOKIE['verify'])) {
    showLoginPasswordProtect("");
  }

  // check if cookie is good
  $found = false;
  foreach($LOGIN_INFORMATION as $key=>$val) {
    $lp = (USE_USERNAME ? $key : '') .'%'.$val;
    if ($_COOKIE['verify'] == md5($lp)) {
      $found = true;
      // prolong timeout
      if (TIMEOUT_CHECK_ACTIVITY) {
        setcookie("verify", md5($lp), $timeout, '/');
      }
      break;
    }
  }
  if (!$found) {
    showLoginPasswordProtect("");
  }

}

?>
