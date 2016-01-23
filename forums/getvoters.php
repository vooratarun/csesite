<?php
$catid=$_POST['catid'];
$qid=$_POST['qid'];
$usr=$_POST['usr'];
$post_type=$_POST['ptype'];
include "../actions/dbconnect.php";
mysql_select_db("discussion_forum");
if($post_type=="question")
{
	$query=mysql_query("SELECT voters FROM forum_questions WHERE post_id='$qid' and post_category='$catid'");
	$row=mysql_fetch_array($query);
}
if($post_type=="ans")
{
	$aid=$_POST['aid'];
	$query=mysql_query("SELECT voters FROM forum_answers WHERE post_id='$qid' and ans_id='$aid' and post_category='$catid'");
	$row=mysql_fetch_array($query);
}
echo $row['voters'];
?>