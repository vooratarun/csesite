<?php
include("dbconnect.php");
mysql_select_db("cse");
date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d");
$query=mysql_query("SELECT * FROM notices WHERE date='$date' and active='1'");
$count=mysql_num_rows($query);
echo $count;
?>
