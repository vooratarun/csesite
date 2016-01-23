<?php
$catid=$_POST['catid'];
$qid=$_POST['qid'];
$usr=$_POST['usr'];
$type=$_POST['vtype'];
$post_type=$_POST['ptype'];
include "../actions/dbconnect.php";
mysql_select_db("discussion_forum");
if($post_type=='question')
{
	$query=mysql_query("SELECT * FROM forum_questions WHERE post_id='$qid' and post_category='$catid'") or die(mysql_error());
	if($query)
	{
		$row=mysql_fetch_array($query);
		$voters=$row['voters'];
		$votes=$row['votes'];
		if($type=='1')
		{
			$votes=$votes+1;
			$voters=$usr."``".$voters;
			$update=mysql_query("UPDATE forum_questions SET votes='$votes', voters='$voters' WHERE post_id='$qid' AND post_category='$catid'") or die(mysql_error());	
		}
		if($type=='0')
		{
			$votes=$votes-1;
			$voters=$usr."``".$voters;
			$update=mysql_query("UPDATE forum_questions SET votes='$votes', voters='$voters' WHERE post_id='$qid' AND post_category='$catid'") or die(mysql_error());
		}
		if($update)
		{
			echo "green";
		}
	}
}
if($post_type=='ans')
{
	$aid=$_POST['aid'];
	$query=mysql_query("SELECT * FROM forum_answers WHERE post_id='$qid' and ans_id='$aid' and post_category='$catid'") or die(mysql_error());
	if($query)
	{
		$row=mysql_fetch_array($query);
		$voters=$row['voters'];
		$votes=$row['votes'];
		if($type=='1')
		{
			$votes=$votes+1;
			$voters=$usr."``".$voters;
			$update=mysql_query("UPDATE forum_answers SET votes='$votes', voters='$voters' WHERE post_id='$qid' AND ans_id='$aid' AND post_category='$catid'") or die(mysql_error());	
		}
		if($type=='0')
		{
			$votes=$votes-1;
			$voters=$usr."``".$voters;
			$update=mysql_query("UPDATE forum_answers SET votes='$votes', voters='$voters' WHERE post_id='$qid' AND ans_id='$aid' AND post_category='$catid'") or die(mysql_error());
		}
		if($update)
		{
			echo "green";
		}
	}
}
?>