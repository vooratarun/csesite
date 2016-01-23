<?php
$qid=$_POST['qid'];
include "../actions/dbconnect.php";
mysql_select_db("discussion_forum");
$query=mysql_query("SELECT votes FROM forum_questions WHERE post_id='$qid'");
$row=mysql_fetch_array($query);
echo $row['votes'];
?>