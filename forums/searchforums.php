<head>
<style type="text/css">

</style>
</head>
<body>
<table class="listof_posts">
<?php
$key=$_POST['key'];
include "../actions/dbconnect.php";
mysql_select_db("discussion_forum");
$query=mysql_query("SELECT * FROM forum_questions WHERE post_title LIKE '%".$key."%' OR keywords LIKE '%".$key."%'") or die(mysql_error());
$count=mysql_affected_rows();
if($count>0)
{
	while($row=mysql_fetch_array($query))
	{
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
<tr>
<td class="r1">
<?php
	echo "<div class='post-head' onclick=\"showquestion('".$cat."|".$qid."|".$views."')\">".$title."</div>";
	echo "<div class='post-foot'>By ".$user." in <span style='font-weight: bold;'>".$category."</span> at ".$time."</div>";
?>
</td>
<td class="r2"><?php echo $views; ?><br>Views</td>
<td class="r2"><?php echo $votes; ?><br>Votes</td>
<td class="r3">Last viewed by<br><?php if($last_user==null) echo "None";else echo $last_user; ?></td>
</tr>
<?php
	}
}
else
{
	echo "<tr><td style='text-align:center;'>Not Found</td></tr>";
}
?>
</table>
</body>