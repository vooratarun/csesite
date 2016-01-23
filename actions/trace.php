<?php
$ip_addr=$_SERVER['REMOTE_ADDR'];
$connect=mysql_connect("localhost","root","secure148") or die(mysql_error());
mysql_query("CREATE DATABASE IF NOT EXISTS trace")or die(mysql_error());
mysql_select_db("trace");
mysql_query("CREATE TABLE IF NOT EXISTS con_users(sno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,ip_addr varchar(50),time TIMESTAMP NOT NULL)")or die(mysql_error());
$result=mysql_query("INSERT INTO con_users(ip_addr) VALUES('$ip_addr')")or die(mysql_error());
mysql_close($connect);
?>