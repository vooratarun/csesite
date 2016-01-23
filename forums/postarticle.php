<?php
include "../actions/dbconnect.php";
mysql_select_db("discussion_forum");
$title=$_POST['ptitle'];
$cat=$_POST['pcat'];
$category=mysql_query("SELECT cat_id FROM categories WHERE cat_name='$cat'");
$row=mysql_fetch_array($category);
$cat=$row['cat_id'];
$keys=$_POST['pkey'];
$body=$_POST['pbody'];
//$body=nl2br($body);
//$body=addslashes($body);
$body=htmlspecialchars($body, ENT_COMPAT);
$body=str_replace("*","&#42;",$body);
$user=$_COOKIE['CSAuth'];
$time=time();
//$time=$time+(4*60*60+(30*60));
$ip=$_SERVER['REMOTE_ADDR'];
$query=mysql_query("INSERT INTO forum_questions(post_title,keywords,post_category,post_body,posted_user,posted_time,posted_ip) VALUES('$title','$keys','$cat','$body','$user','$time','$ip')") or die(mysql_error());
if($query)
{
	echo "green";
}
?>