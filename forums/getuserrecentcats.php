<head>
<style type="text/css">

</style>
</head>
<body>
<?php
include("../actions/dbconnect.php");
mysql_select_db("discussion_forum");
$id=$_GET['id'];
$query=mysql_query("SELECT * FROM forum_questions WHERE post_category='$id' ORDER BY posted_time DESC");
$c=mysql_affected_rows();
if($c>0)
{
while($row=mysql_fetch_array($query))
{
	mysql_select_db("discussion_forum");
	$qid=$row['post_id'];
	$title=$row['post_title'];
	$cat=$row['post_category'];
	$cat1=mysql_query("SELECT cat_name FROM categories WHERE cat_id='$cat'");
	$row1=mysql_fetch_array($cat1);
	$category=$row1['cat_name'];
	$user=$row['posted_user'];
	$time=$row['posted_time'];
	$time=strftime("%b %d,%Y",$time);
	$views=$row['post_views'];
	$votes=$row['votes'];
	$last_user=$row['visited_by'];
?>
<table class="listof_posts">
<tr>
<td class="r1">
<?php
	mysql_select_db("cse");
	$q1=mysql_query("SELECT * FROM profiles WHERE id='".$row['posted_user']."'") or die(mysql_error());
	$r1=mysql_fetch_array($q1);
	$uname=$r1['name'];
	echo "<div class='post-head' onclick=\"showquestion('".$cat."|".$qid."|".$views."')\">".$title."</div>";
	echo "<div class='post-foot'>By <span title='$uname'>$user</span> in <span style='font-weight: bold;cursor:pointer;' onclick=\"loadcategory('".$cat."')\">".$category."</span> at ".$time."</div>";
?>
</td>
<td class="r2"><?php echo $views; ?><br>Views</td>
<td class="r2"><?php echo $votes; ?><br>Votes</td>
<td class="r3">Last viewed by<br><?php if($last_user==null) echo "None";else echo $last_user; ?></td>
</tr>
</table>
<?php
}
}
else
{
	echo "<center>Currently there are no posts in this section.</center>";
}
?>
</body>