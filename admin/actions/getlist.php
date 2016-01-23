<?php
include("dbconnect.php");
$id=$_GET['id'];
mysql_select_db("cse");
$query=mysql_query("SELECT * FROM resource WHERE year='$id'");

while($row=mysql_fetch_array($query)){
		echo "<option value='".$row['sname']."'>".$row['fullname']."</option><br>";
	
	}
?>