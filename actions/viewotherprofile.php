<?php
include '../actions/dbconnect.php';
mysql_select_db("cse");
$term=$_GET['identity'];
$query=mysql_query("SELECT * FROM profiles WHERE ID='".$term."'");
while($row=mysql_fetch_array($query))
{
	if(($row['full']=='0')&&($row['completed']=='0'))
	{
		echo $row['name']." hasn't provided any information yet. Please check later.";
	}
	else
	{
		echo "green";
	}
}
?>