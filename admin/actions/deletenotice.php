<?php
include "dbconnect.php";
mysql_select_db("cse");
$id=$_REQUEST['id'];
if($_COOKIE['CSAdmin']!=null)
{
	$query=mysql_query("UPDATE notices SET active='0' WHERE id = '$id'") or die(mysql_error());
	if($query)
	{
		echo "green";
	}
	else
	{
		echo "red";
	}
}
?>