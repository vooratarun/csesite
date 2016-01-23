<?php
include "dbconnect.php";
mysql_select_db("cse");
$id=$_POST['id'];
$query=mysql_query("UPDATE notices SET active='1' WHERE id = '$id'") or die(mysql_error());
if($query)
{
	echo "green";
}
else
{
	echo "red";
}
?>