<?php
include("../actions/dbconnect.php");
$cname=$_COOKIE['CSAuth'];
if(isset($cname))
{
	mysql_select_db("cse");
	$query=mysql_query("SELECT * FROM users WHERE username='$cname'");
	$array=mysql_fetch_array($query);
	echo $array['fullname'];	
}
else 
{
	echo "Sign In";
}
?>