<?php
include("dbconnect.php");
mysql_select_db("cse");
$pid=$_REQUEST['id'];
$pagelimit=5;//setting no. of notifications per page
$bnlimit=($pid-1)*$pagelimit;//final num of notification of that page
$nlimit=$pid*$pagelimit;//total notification count
$count=0;
$ncount=0;
$query=mysql_query("SELECT * FROM notices WHERE active='1' ORDER BY time DESC");
$notice_count=mysql_num_rows($query);
$today_date=date("Y-m-d");
if($notice_count>0)
{
	while($row=mysql_fetch_array($query))
	{
		$count++;
		if($ncount>=$pagelimit)
		{
			break;
		}
		if($count>$bnlimit && $count<=$nlimit)
		{
			$title=$row['title'];
			$body=$row['body'];
			$time=$row['time'];
			$time=strftime("%b %d, %Y",$time);
			$date=$row['date'];
			if($date==$today_date)
			{
				echo "<table class='table'>";
				echo "<tr class='subjectname'><th style='font-size: 14px;'>".$title."</th><td style='font-size:12px;width: 12%;text-align:right;'>Posted <b>Today</b></td></tr>";
				echo "<tr><td colspan='2' style='font-size: 14px; padding: 5px;'>".$body."</td></tr>";
				echo "</table>";
			}
			else
			{
				echo "<table class='table'>";
				echo "<tr class='subjectname'><th style='font-size: 14px;'>".$title."</th><td style='font-size:12px;width: 18%;text-align:right;'>Posted on ".$time."</td></tr>";
				echo "<tr><td colspan='2' style='font-size: 14px; padding: 5px;'>".$body."</td></tr>";
				echo "</table>";
			}
		}
		else
		{
			//do nothing
		}
	}
	$pages=ceil(($notice_count/$pagelimit));
	$current=$pid;
	echo "<div class='pagination'><span>Page ".$current." of ".$pages."</span>";
	for($i=1;$i<=$pages;$i++)
	{
		if($i==$current)
		{
			echo "<span class=\"current\">".$i."</span>";
		}
		else
		{
			echo "<a onclick=\"loadnextnotice('".$i."');\" class='inactive'>".$i."</a>";
		}
	}
	echo "</div>";
}

else
{
	echo "<center>Currently, there are no notifications.</center>";
}
?>