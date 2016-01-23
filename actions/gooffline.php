<?php
if(isset($_COOKIE['CSAuth']))
{
	include("dbconnect.php");
	$username=$_COOKIE['CSAuth'];
	mysql_select_db('cse');
	$query=mysql_query("UPDATE users SET online='0' WHERE username='$username'") or die(mysql_error());
}
else 
{
	//do nothing..
}
?>