<?php
include "../actions/dbconnect.php";
mysql_select_db('cse');
$user = $_COOKIE['CSAuth'];
$query=mysql_query("SELECT * FROM profiles WHERE id='".$user."'");
while($row=mysql_fetch_array($query))
{
	$uname=$row['name'];
	$class=$row['class'];
	$intro=$row['intro_info'];
	$skills=$row['skills'];
	$interests=$row['interests'];
	$achievements=$row['achievements'];
	$areas=$row['areas'];
	$address=$row['address'];
	$contact=$row['contact'];
	$mail=$row['mail'];
	$date=$row['date'];
	$month=$row['month'];
	$year=$row['year'];
	$completed=$row['completed'];
	echo $uname."|||".$class."|||".$intro."|||".$skills."|||".$interests."|||".$achievements."|||".$areas."|||".$address."|||".$contact."|||".$mail."|||".$date."|||".$month."|||".$year."|||";
}
?>