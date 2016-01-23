<?php
$catid=$_POST['catid'];
$aid=$_POST['aid'];
$qid=$_POST['qid'];
$usr=$_POST['usr'];
include "../actions/dbconnect.php";
mysql_select_db("discussion_forum");
$answered=mysql_query("SELECT * FROM forum_answers WHERE isSolution='1' and post_id='$qid' and ans_id='$aid'");
$count=mysql_affected_rows();
if($count==1)
{
	$query=mysql_query("UPDATE forum_questions SET answered='0' WHERE post_id=$qid") or die(mysql_error());
	if($query)
	{
		$query1=mysql_query("UPDATE forum_answers SET isSolution='0', marked_by=NULL WHERE post_id='$qid' and ans_id='$aid' and post_category='$catid'") or die(mysql_error());
		if($query1)
		{
			echo "green";	
		}
	}
}
else
{
	$query1=mysql_query("UPDATE forum_answers SET isSolution='0', marked_by=NULL WHERE post_id='$qid' and ans_id='$aid' and post_category='$catid'") or die(mysql_error());
	if($query1)
	{
		echo "green";	
	}
}
?>