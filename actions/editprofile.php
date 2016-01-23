<?php
include "../actions/dbconnect.php";
mysql_select_db('cse');
$uid=$_POST['userId'];
$name=$_POST['userName'];
$phone=$_POST['userContact'];
$mail=$_POST['userMail'];
$date=$_POST['userDate'];
$month=$_POST['userMonth'];
$year=$_POST['userYear'];
$intro=$_POST['userIntro'];
$intro=addslashes($intro);
$interest=$_POST['userInterests'];
$interest=addslashes($interest);
$skills=$_POST['userSkills'];
$skills=addslashes($skills);
$achieve=$_POST['userAchieve'];
$achieve=addslashes($achieve);
$areas=$_POST['userAreas'];
$areas=addslashes($areas);
$addr=$_POST['userAddr'];
$addr=addslashes($addr);
if(($name!='')&&($mail!='')&&($date!='')&&($month!='')&&($year!='')&&($interest!='')&&($areas!='')&&($addr!=''))
{
	$completed=1;
	$full=0;
}
if(($name!='')&&($phone!='')&&($mail!='')&&($date!='')&&($month!='')&&($year!='')&&($intro!='')&&($interest!='')&&($skills!='')&&($achieve!='')&&($areas!='')&&($addr!=''))
{
	$completed=1;
	$full=1;
}
else
{
	//donothing
}
$query=mysql_query("UPDATE profiles SET name='$name',intro_info='$intro',skills='$skills',interests='$interest',achievements='$achieve',areas='$areas',address='$addr',contact='$phone',mail='$mail',date='$date',month='$month',year='$year',completed='$completed',full='$full' WHERE id='$uid'");
if(!$query)
{
	echo "red";
}
else
{
	echo "green";
}
?>