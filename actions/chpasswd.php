<?php
include("../actions/dbconnect.php");
$old=$_POST['oldpswd'];
$new=$_POST['newpswd'];
mysql_select_db('cse');
$user=$_COOKIE['CSAuth'];
$query=mysql_query("UPDATE users SET password='$new' WHERE password='$old' and username='$user'");
if($query)
{
	echo "green";
}
else 
{
	echo "red";
}
?>