<?php
include "dbconnect.php";
mysql_select_db('cse');
$fullname=$_POST['uname'];
$studentid=$_POST['sid'];
$catid=$_POST['cid'];
$problem=$_POST['problem'];
$problem=addslashes($problem);
$query=mysql_query("INSERT INTO contactus_messages(fullname, stuid, message, category) VALUES('$fullname','$studentid','$problem','$catid')");
if(!$query)
{
	echo "red";
}
else
{
	echo "green";
}
?>