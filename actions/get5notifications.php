<?php
include("../actions/dbconnect.php");
mysql_select_db("cse");
$query=mysql_query("SELECT * FROM notices WHERE active='1' ORDER BY time DESC LIMIT 0,5");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");
$top="";
while($row=mysql_fetch_array($query))
{
	$id=$row['id'];
	$title=$row['title'];
	$time=$row['time'];
	$time=strftime("%b %d, %Y",$time);
	$date=$row['date'];
	if($date==$today_date)
	{
		$posted="Today";
		$top=$top."*<b>".$title."</b>|".$posted."|".$id;
	}
	else
	{
		$posted=$time;
		$top=$top."*".$title."|".$posted."|".$id;
	}
}
echo $top;
?>