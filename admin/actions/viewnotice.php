<?php
include "dbconnect.php";
mysql_select_db("cse");
$id=$_POST['id'];
$query=mysql_query("SELECT * FROM notices WHERE id='$id'") or die(mysql_error());
$row=mysql_fetch_array($query);
$time=$row['time'];
$time=strftime("%b %d, %Y",$time);
echo $row['id']."|".$row['title']."|".$row['body']."|".$time;
?>