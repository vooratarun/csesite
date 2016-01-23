<div id="support-header">Notifications</div>
<?php
$id=$_POST['id'];
include "dbconnect.php";
mysql_select_db("cse");
$query=mysql_query("SELECT * FROM notices WHERE id='$id' and active='1'");
$row=mysql_fetch_array($query);
$title=$row['title'];
$body=$row['body'];
$time=$row['time'];
$time=strftime("%b %d, %Y",$time);
$date=$row['date'];
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");
if($date==$today_date)
{
	echo "<div id='single-note' style='width: 70%;margin:3em auto;border: 1px solid silver;padding: 10px;'>";
	echo "<div style='font-size: 14px;text-align:center;font-weight:bold;text-decoration:underline;'>".$title."</div>";
	echo "<div style='font-size:12px;text-align:right;'>- Posted <b>Today</b></div>";
	echo "<div style='font-size: 12px; padding: 5px;'>".$body."</div>";
}
else
{
	echo "<div id='single-note' style='width: 70%;margin:3em auto;border: 1px solid silver;padding: 10px;'>";
	echo "<div style='font-size: 14px;text-align:center;font-weight:bold;text-decoration:underline;'>".$title."</div>";
	echo "<div style='font-size:11px;text-align:right;'>- Posted on ".$time."</div>";
	echo "<div style='font-size: 12px; padding: 5px;'>".$body."</div>";
}
?>