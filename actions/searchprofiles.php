<?php
include '../actions/dbconnect.php';
mysql_select_db("cse");
$term=$_GET['id'];
if($term=="")
{
	//
}
else
{
	$query=mysql_query("SELECT * FROM profiles WHERE name LIKE '%$term%' OR id LIKE '%$term%'");
	if(mysql_num_rows($query)>0)
	{	
		echo "<table id='profileresults'>";
		while($row1=mysql_fetch_array($query))
		{
			echo "<tr class='line1'><td style='padding: 5px 20px;' id='".$row1['id']."' onclick=\"viewotherprofile('".$row1['id']."')\"><b>".$row1['name']."</b><br>".$row1['id'].", ".$row1['class']."</td></tr>";
		}
		echo "</table>";
	}
	else
	{
		echo 0;
	}	
}
mysql_close($connect);
?>