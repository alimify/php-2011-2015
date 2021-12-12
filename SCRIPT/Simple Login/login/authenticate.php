<?
// Include Database
include_once "database.php";

// Authenticate Function
function authenticate($username,$password){
	// Secure the variables being passed (make sure variables passed are proper strings not malicious code)
	$username = htmlspecialchars(mysql_real_escape_string(addslashes($username)));
	$password = htmlspecialchars(mysql_real_escape_string(addslashes($password)));
	
	// Check User Now
	$result=mysql_query("SELECT * FROM users WHERE username='$username' and password='$password'");
	$count=mysql_num_rows($result);
	
	// If the $count variable is equal to one (meaning there is a user in the database meeting the credentials) grab info
	if($count==1){
		// If MySQL connection fails then send them back to your main page "index.php"
		$row = @mysql_fetch_array($result) or die("<script type='text/javascript'>window.location='index.php';</script>");;
		extract($row);
		
		// Set up some global variables you can use in your code
		global $my_id, $my_username, $my_email, $my_ip;
		$my_id = $id;
		$my_username = $username;
		$my_password = $password;

		return true;
	} else {
		return false;
	}
}

// Using the "authenticate()" function
// If the cookie username and the cookie password are not correct or set up then re-direct user to main page "index.php"
if(!authenticate($_COOKIE['username'],$_COOKIE['password'])){
	// You Can use php headers() instead of a javascript redirect if you want
	print "<script type='text/javascript'>window.location='index.php';</script>";
}
?>