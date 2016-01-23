<?php
$catid=$_POST['catid'];
$aid=$_POST['aid'];
$qid=$_POST['qid'];
$usr=$_POST['usr'];
include "../actions/dbconnect.php";
mysql_select_db("discussion_forum");
$query=mysql_query("SELECT * FROM forum_answers WHERE post_id='$qid' and post_category='$catid' and isSolution='1'") or die(mysql_error());
echo mysql_affected_rows();
?>