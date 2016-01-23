<?php
//$pid=$_REQUEST['id'];
$pid=1;
include "dbconnect.php";
mysql_select_db('cse');
$pagelimit=10;//setting no. of notifications per page
$bnlimit=($pid-1)*$pagelimit;//final num of notification of that page
$nlimit=$pid*$pagelimit;//total notification count
$count=0;
$ncount=0;
$result=mysql_query("SELECT * FROM notices WHERE active='1' ORDER BY time DESC");
$notice_count=mysql_num_rows($result);
if($notice_count>0)
{
	echo "<table class='table'>";
	echo "<tr><th style='text-align:center;'>ID</th><th style='text-align:center;'>Title</th><th style='text-align:center;'>Time</th><th style='text-align:center;'>Operations</th></tr>";
	while($row=mysql_fetch_array($result))
	{
		$count++;
		if($ncount>=$pagelimit)
		{
			break;
		}
		//echo $count."-".$bnlimit."-".$nlimit."<br>";
		if($count>$bnlimit && $count<=$nlimit)
		{
			$time=$row['time'];
			$time=strftime("%b %d, %Y",$time);
			echo "<tr>";
			echo "<td width='4%'>".$row['id']."</td>";
			echo "<td class='note_title' id='".$row['id']."' onclick=\"viewanotice('".$row['id']."')\">".$row['title']."</td>";
			echo "<td width='15%' style='text-align:center;'>".$time."</td>";
			echo "<td style='text-align:center;width:15%;cursor:pointer;'><span style='color: #CC4852;' onclick=\"deletenotice('".$row['id']."')\">Delete</span></td>";
			echo "</tr>";
			$ncount++;
		}
		else
		{
			
		}
	}
		echo "</table>";
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