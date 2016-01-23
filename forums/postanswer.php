<?php
include("../actions/dbconnect.php");
mysql_select_db('discussion_forum');
$username=$_POST['usr'];
$catname=$_POST['catid'];
$qid=$_POST['qid'];
//$answer=nl2br($answer);
$answer=$_POST['answer'];
//$answer=addslashes($_POST['answer']);
$answer=htmlspecialchars($answer, ENT_COMPAT);
$answer=str_replace("*","&#42;",$answer);
$time=time();
//$time = $time+(4*60*60+(30*60));
$query=mysql_query("INSERT INTO forum_answers(post_id,post_category,answer,posted_time,posted_user) VALUES('$qid','$catname','$answer','$time','$username')") or die(mysql_error());
if($query)
{
	echo "green";
}
else
{
	echo mysql_error();
}
?>