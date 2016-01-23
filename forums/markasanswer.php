<?php
$catid=$_POST['catid'];
$aid=$_POST['aid'];
$qid=$_POST['qid'];
$usr=$_POST['usr'];
include "../actions/dbconnect.php";
mysql_select_db("discussion_forum");
$query=mysql_query("UPDATE forum_questions SET answered='1' WHERE post_id=$qid") or die(mysql_error());
$query1=mysql_query("UPDATE forum_answers SET isSolution='1', marked_by='$usr' WHERE post_id='$qid' and ans_id='$aid'") or die(mysql_error());
if($query&&$query1)
{
	echo "green";	
}
else
{
	echo "red";
}
?>