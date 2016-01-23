<?php
echo "<div style='text-align:center;font-size:14px;border-bottom: 1px solid silver;padding-bottom:5px'>Classmates Online</div>";
include "dbconnect.php";
mysql_select_db("cse");
$user=$_POST['user'];
$q1=mysql_query("SELECT * FROM users WHERE username='$user'");
$r1=mysql_fetch_array($q1);
$class=$r1['e2_class'];
$year=$r1['year'];
$q2=mysql_query("SELECT * FROM users WHERE username!='$user' and online='1' and e2_class='$class' and year='$year'");
$count=mysql_affected_rows();
if($count>0)
{
	while($r2=mysql_fetch_array($q2))
	{
		$name=$r2['username'];
		$q3=mysql_query("SELECT * FROM profiles WHERE id='$name'");
		$r3=mysql_fetch_array($q3);
		echo "<div title='".$r3['name']."' style='font-size:14px;text-align:center;padding:3px;cursor:pointer;color:rgb(33, 75, 126);' onclick=\"viewtheprofile('".$r2['username']."')\">".$r2['username']."</div>";
	}
}
else
{
	echo "<div style='font-style:italic;text-align:center;font-size:12px;'>Nobody online.</div>";
}
?>