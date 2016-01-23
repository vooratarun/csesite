<?php
include "dbconnect.php";
mysql_select_db("cse");
$ntitle=$_POST['ntitle'];
$nbody=$_POST['nbody'];
$ntitle=addslashes($ntitle);
$nbody=addslashes($nbody);
$time = time();
$today_date=strftime("%Y-%m-%d",$time);
$query=mysql_query("INSERT INTO notices(title,body,time,date) VALUES('$ntitle','$nbody','$time','$today_date')") or die(mysql_error());
if($query)
{
	echo "green";
}
else
{
	echo "red";
}
?>