<?php
	include "dbconnect.php";
	mysql_select_db("cse");
	$query=mysql_query("SELECT * FROM users WHERE online='1'");
	echo "<div style='border-bottom:1px solid silver;padding:5px;text-align:center;'>Users Online</div>";
	$count=mysql_affected_rows();
	if($count>0)
	{
	while($row=mysql_fetch_array($query))
	{
		echo "<div style='padding-top:5px;padding-left:10px;' title='".$row['fullname']."'>".$row['username']."</div>";
	}
	}
	else
	{
		echo "<div style='padding-top:5px;padding-left:10px;color:gray;font-style:italic;'>No users online</div>";
	}
?>