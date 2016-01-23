<?php
include("../actions/dbconnect.php");
$catname=$_POST['catid'];
$qid=$_POST['qid'];
mysql_select_db("discussion_forum");
$query=mysql_query("SELECT * FROM forum_answers WHERE post_id='$qid' and post_category='$catname'") or die(mysql_error());
$count=mysql_affected_rows();
$adata=null;
if($count>0)
{
	while($row=mysql_fetch_array($query))
	{
		$user=$row['posted_user'];
		$time=$row['posted_time'];
		$time = strftime("%Y-%m-%d %H:%M:%S",$time);
		$answer=$row['answer'];
		//$answer=htmlspecialchars($answer, ENT_COMPAT);
		$answer=addslashes($answer);
		//$answer=wordwrap($answer,100);
		$aid=$row['ans_id'];
		$solution=$row['isSolution'];
		$markedby=$row['marked_by'];
		$votes=$row['votes'];
		$adata=$adata."*".$user."|".$time."|".$answer."|".$aid."|".$solution."|".$markedby."|".$votes;
	}
	echo $adata;
}
else
{
	echo "red";
}
?>