<?php
///////////////////////sms sharing with mysql and admin panel beta 
/*

shared and made by wapadmin.info from mobtop

miss you rey :)
report bugs at bugs[at]wapadmin.info

/*/
include("conf.php");
if(!get_magic_quotes_gpc())
{
	$_GET=array_map('trim',$_GET);
	$_POST=array_map('trim',$_POST);
	$_COOKIE=array_map('trim',$_COOKIE);
	$_GET=array_map('addslashes',$_GET);
	$_POST=array_map('addslashes',$_POST);
	$_COOKIE=array_map('addslashes',$_COOKIE);
}

////////////////////////////////////////////////
function connect($dbhost,$dbname,$dbuser,$dbpass)
{
    $conn=@mysql_connect($dbhost,$dbuser,$dbpass);
    if(!$conn)return false;
    $db=@mysql_select_db($dbname);
    if(!$db)return false;
    return true;
}

////////////////////////////////////////////////
function isadmin($uid,$pwd)
{
	$pass=md5($pwd);
	$pasw=mysql_fetch_array(mysql_query("SELECT * FROM tusers WHERE name='".$uid."' and pass='".$pass."' and admin='1';"));
	if($pasw[0]){return true;}else{return false;}
}

////////////////////////////////////////////////

//////////////////////////////////////////////////

///////////////////////////////////////////////////
function addcat($username,$pass,$cnm,$descs,$adult)
{
	if (isadmin($username,$pass)) 
	{
		$addc=mysql_query("INSERT INTO cats SET name='".$cnm."',description='".$descs."',adult='".$adult."'");
        if($addc){return true;}
		else{return false ;}
    }
	else{return false;}
}

function updatecat($username,$pass,$cnm,$catg,$descs,$adult)
{
	if (isadmin($username,$pass)) 
	{

		$addc=mysql_query("UPDATE cats SET name='".$cnm."',description='".$descs."',adult='".$adult."'WHERE id='".$catg."'");
        if($addc){return true;}
		else{return false ;}
    }
	else{return false;}
}
///////////////////////////////////////////////////
function edtsite($username,$pass,$snm,$lnk,$imgu,$catg,$uid,$dsc,$keywords,$sid)
{
	if(login($username,$pass)==0)
    {
		$adds=mysql_query("UPDATE sites SET sitename='".$snm."',sitelink='".$lnk."', slogo='".$imgu."', cid='".$catg."', uid='".$uid."', dscr='".$dsc."',keywords='".$keywords."' WHERE id='".$sid."'");
        if($adds){return true;}
		else{return false;}
    }
	else{return false;}
}

/////////////////////////////////////////////////


//////////////////////////////////////
function register($username,$pass,$email)
{
	
		if(spacesin($username)){return 4;}
        if(spacesin($pass)){return 5;}
        if(spacesin($email)){return 11;}
        if((scharin($username))||(scharin($pass))){return 7;}
        if((strlen($username)<4)||(strlen($pass)<4)){return 8;}
        $ch=substr($username,0,1);
		if(!ereg("[a-z]",$ch)){return 9;}
        if(!$username==null)
		{
			if(!$pass==null)
			{
				if(!$email==null)
				{
					$hashedpass=md5($pass);
					$inserting=mysql_query("INSERT INTO tusers SET name='".$username."',pass='".$hashedpass."',email='".$email."'");
					if($inserting){return 0;}else return 6;
				}
				
			}
			else return 2;
		}
		else return 3;
	}


/////////////////////////////////////
function spacesin($word)
{
	$pos=strpos($word," ");
	if($pos===false){return false;}
	else{return true;}
}

/////////////////////////////////
function scharin($word)
{
	for($i=0;$i<strlen($word);$i++)
	{
		$ch=substr($word,$i,1);
		$sres=ereg("[a-z0-9.-_]",$ch);
		if(!$sres){return true;}
	}
	return false;
}
?>