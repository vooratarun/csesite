<?php
include("../actions/dbconnect.php");
mysql_select_db("cse");
$user=$_COOKIE['CSAuth'];
date_default_timezone_set("Asia/Kolkata");
$query=mysql_query("UPDATE `users` SET `notifications`='1' WHERE `username`='$user'");
?>