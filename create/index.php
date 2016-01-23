
<?php
include "../actions/dbconnect.php";

$query=mysql_query("SELECT * FROM discussion_forum.categories");
while($row=mysql_fetch_array($query))
{
	$cat=$row['cat_id'];
	$q=mysql_query("SELECT * FROM forum_answers.$cat");
	while($r=mysql_fetch_array($q))
	{
		$qid=$r['qid'];
		$uid=$r['userid'];
		$sol=$r['perfectanswer'];
		$mby=$r['markedby'];
		$answer=$r['answer'];
		$answer=addslashes($answer);
		$answer=str_replace("<","&amp;lt;",$answer);
		$answer=str_replace(">","&amp;gt;",$answer);
		$answer=str_replace("&amp;lt;br /&amp;gt;","&lt;br&gt;",$answer);
		$answer=str_replace("&amp;lt;pre class=\'prettyprint\'&amp;gt;","&amp;lt;pre&amp;gt;",$answer);
		echo $answer."<br><hr><br>";
		$time=$r['time'];
		$a=explode(" ", $time);
		$b=explode("-",$a[0]);
		$year=$b[0];
		$month=$b[1];
		$day=$b[2];
		$c=explode(":",$a[1]);
		$hour=$c[0];
		$min=$c[1];
		$sec=$c[2];
		$time=mktime($hour,$min,$sec,$month,$day,$year);
		echo "<hr>INSERT INTO discussion_forum.forum_answers(post_id,post_category,answer,posted_time,posted_user,isSolution,marked_by) VALUES('$qid','$cat','$answer','$time','$uid','$sol','$mby');<br>";		
		$q1=mysql_query("INSERT INTO discussion_forum.forum_answers(post_id,post_category,answer,posted_time,posted_user,isSolution,marked_by) VALUES('$qid','$cat','$answer','$time','$uid','$sol','$mby');") or die(mysql_error());
	}
	//mysql_query("ALTER TABLE forum_questions.$cat CHANGE qid qid BIGINT NOT NULL") or die(mysql_error());
	//mysql_query("ALTER TABLE forum_questions.$cat DROP PRIMARY KEY") or die(mysql_error());
	//mysql_query("ALTER TABLE forum_answers.$cat CHANGE aid aid BIGINT NOT NULL") or die(mysql_error());
	//mysql_query("ALTER TABLE forum_answers.$cat DROP PRIMARY KEY") or die(mysql_error());	
}

//this is for questions
/*
$q=mysql_query("SELECT post_id,post_category,post_title FROM discussion_forum.forum_questions");
while($row=mysql_fetch_array($q))
{
	$id=$row['post_id'];
	$cat=$row['post_category'];
	$title=$row['post_title'];
	$query=mysql_query("SELECT qid FROM forum_questions.$cat WHERE qtitle='$title'") or die(mysql_error());
	while($r1=mysql_fetch_array($query))
	{
		$alter=mysql_query("ALTER TABLE forum_questions.$cat DROP PRIMARY KEY");
		$oldqid=$r1['qid'];
		$q1=mysql_query("UPDATE forum_questions.$cat SET qid='$id' WHERE qtitle='$title'") or die(mysql_error());
		echo "Questions ".$cat." Done<br>";
		$q2=mysql_query("UPDATE forum_answers.$cat SET qid='$id' WHERE qid='$oldqid'") or die(mysql_error());
		echo "Answers ".$cat." Done<br>";
		
	}
}
*/


?>
