<?php
include '../actions/dbconnect.php';
mysql_select_db("cse");
$book=$_GET['id'];
if($book=="")
{
	echo "";
}
else
{
	$select=mysql_query("SELECT * FROM resource1 WHERE filename LIKE '%$book%' OR sname LIKE '%$book%'");
	while($row=mysql_fetch_array($select))
	{	
		$sname1=$row['sname'];
		
		$select2=mysql_query("SELECT * FROM resource WHERE sname='$sname1'");
		while($row2=mysql_fetch_array($select2))
		{	
		if(strlen($row['filename'])>48)
		{
			echo "<a href='resources/".$row2['year']."/".$row['sname']."/".$row['filename']."' target='_blank'>".substr($row['filename'],0,48)."...</a><br>";
		}
		else
		{
			echo "<a href='resources/".$row2['year']."/".$row['sname']."/".$row['filename']."' target='_blank'>".$row['filename']."</a><br>";
		}
	}}
}
mysql_close($connect);
?>
