<?php
include("dbconnect.php");
$username=$_POST['username'];
$password=$_POST['password'];
mysql_select_db('cse');
$query=mysql_query("SELECT * FROM admin WHERE username='$username' && password='$password'");
$count=mysql_num_rows($query);
if($count==1)
{
	echo "green";
	authorize_ck();
}
else
{
	echo "red";
}
function authorize_ck()
{
	$username=$_POST['username'];
	$query1=mysql_query("SELECT * FROM admin WHERE username='$username'");
	$row=mysql_fetch_array($query1);
	$fullname=$row['fullname'];
	setcookie("CSAdmin", $username, time()+1800, "/");
	setcookie("CSadminfname", $fullname, time()+1800, "/");
}
?>