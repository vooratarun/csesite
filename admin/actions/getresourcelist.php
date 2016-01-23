<?php
include "dbconnect.php";
mysql_select_db("cse");
$year=$_POST['cate'];
$sname=$_POST['sub'];
$query=mysql_query("SELECT * FROM resource1 WHERE sname='$sname'");
echo "<table class='table'>";
while($row=mysql_fetch_array($query))
{
	echo "<tr><td>".$row['filename']."</td></tr>";		
}
echo "</table>";
?>