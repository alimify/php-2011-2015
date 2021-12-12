<?

setcookie("username", "", time()-3600);
setcookie("password", "", time()-3600);

// One Line of Code to authenticate users
include_once("authenticate.php");
?>