<?php
include("../actions/dbconnect.php");
mysql_select_db("discussion_forum");
$catid=$_POST['catid'];
$catname=mysql_query("SELECT cat_name FROM categories WHERE cat_id='$catid'");
$c=mysql_fetch_array($catname);
$category=$c['cat_name'];
$qid=$_POST['qid'];
$usr=$_POST['user'];
$update_views=mysql_query("UPDATE forum_questions SET post_views = post_views+1 WHERE post_id='$qid' and post_category='$catid'");
if($usr==null || $usr=='')
{
	$update_visited=mysql_query("UPDATE forum_questions SET visited_by = 'Guest' WHERE post_id='$qid' and post_category='$catid'");
}
else
{
	$update_visited=mysql_query("UPDATE forum_questions SET visited_by = '$usr' WHERE post_id='$qid' and post_category='$catid'");
}
$query=mysql_query("SELECT * FROM forum_questions WHERE post_id='$qid' and post_category='$catid'");
$row=mysql_fetch_array($query);
$title=$row['post_title'];
$body=$row['post_body'];
$body=htmlspecialchars($body, ENT_COMPAT);
$body=addslashes($body);
//$body=wordwrap($body,120);
$user=$row['posted_user'];
$time=$row['posted_time'];
$time = strftime("%Y-%m-%d %H:%M:%S",$time);
$answered=$row['answered'];
$views=$row['post_views'];
$votes=$row['votes'];
echo $title."````".$body."````".$time."````".$user."````".$category."````".$views."````".$answered."````".$votes;
?>
