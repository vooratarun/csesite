<?php
if(isset($_COOKIE['CSAuth']))
{
	include("dbconnect.php");
	$username=$_COOKIE['CSAuth'];
	mysql_select_db('cse');
	$query=mysql_query("UPDATE users SET online='0' WHERE username='$username'") or die(mysql_error());
	setcookie("CSAuth", null, time()-86400, "/");
	setcookie("CSusrfname", null, time()-86400, "/");
}
else 
{
	//do nothing..
}
?>