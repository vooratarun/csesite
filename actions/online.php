<?php
if(isset($_COOKIE['CSAuth']))
{
	include "dbconnect.php";
	$username=$_COOKIE['CSAuth'];
	mysql_select_db('cse');
	$query=mysql_query("UPDATE users SET online='1' WHERE username='$username'") or die(mysql_error());
	echo mysql_error();
}
else
{
	//
}
?>