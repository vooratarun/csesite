<?php
date_default_timezone_set("Asia/Kolkata");
$server="localhost";
$username="root";
$password="rgukt123"; //secure148
$connect=mysql_connect($server, $username, $password);
mysql_query("CREATE DATABASE IF NOT EXISTS cse");
mysql_query("CREATE DATABASE IF NOT EXISTS discussion_forum");
?>
