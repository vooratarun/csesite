<?php
include "dbconnect.php";
mysql_select_db("cse");
$userid = $_GET['user'];
$query=mysql_query("SELECT * FROM profiles WHERE id='".$userid."'");
$row=mysql_fetch_array($query);
if($row['completed']=='0')
	echo "0";
else
	echo "1";
?>