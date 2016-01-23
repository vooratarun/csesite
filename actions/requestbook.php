<?php
include '../actions/dbconnect.php';
mysql_select_db('cse');
$bookname=$_POST['name'];
$bookname=addslashes($bookname);
$bookauthor=$_POST['auth'];
$bookauthor=addslashes($bookauthor);
$bookedition=$_POST['pubs'];
$bookedition=addslashes($bookedition);
$otherinfo=$_POST['info'];
$otherinfo=addslashes($otherinfo);
$time=time();
$time=strftime("%b %d, %Y",$time);
$ip=$_SERVER['REMOTE_ADDR'];
$query=mysql_query("INSERT INTO bookrequests(bookname, bookauthor, bookedition, otherinfo, time, ip) VALUES('$bookname','$bookauthor','$bookedition','$otherinfo','$time','$ip')");
if(!$query)
{
	echo "red";
}
else 
{
	echo "green";
}
?>