<?php
	include "dbconnect.php";
	
	//TOTAL NO. OF USERS ONLINE
	
	mysql_select_db("cse");
	$query1=mysql_query("SELECT * FROM users WHERE online='1'");
	$count_online=mysql_affected_rows();
	echo "<div class='div1'>";
	echo "<div class='div11'>";
	echo $count_online;
	echo "</div><div style='font-size:20px;'>Online Users</div></div>";
	
	//TOTAL NO. OF DISCUSSIONS
	
	mysql_select_db("discussion_forum");
	$query2=mysql_query("SELECT count(*) FROM forum_questions");
	$row1=mysql_fetch_array($query2);
	$count_discussions=$row1[0];
	echo "<div class='div1'>";
	echo "<div class='div11'>";
	echo $count_discussions;
	echo "</div><div style='font-size:20px;'>Total Discussions</div></div>";
	
	//TOTAL VIEWS
	
	mysql_select_db("trace");
	$query=mysql_query("SELECT * FROM con_users order by sno DESC");
	$count_views=mysql_affected_rows();
	echo "<div class='div1'>";
	echo "<div class='div11'>";
	echo $count_views;
	echo "</div><div style='font-size:20px;'>Site Views</div></div>";	
	$r10=mysql_fetch_array($query);
	echo "<br><center>Last viewed by ".$r10['ip_addr']."</center>";
	//TOTAL COMPLETE PROFILES	
	
	echo "<div style='padding-bottom:5px;border-bottom:1px solid silver;text-align:left;font-size:18px;'>Complete Profiles</div>";
	mysql_select_db("cse");
	echo "<table style='width: 85%;margin: 20px auto;text-align:center;' cellpadding='10' cellspacing='5'><tr style='font-size:20px;box-shadow: 0 0 2px silver;'><td>E3</td>";
	for($i=1;$i<7;$i++)
	{
		echo "<td>CSE - 0".$i."</td>";
	}
	echo "</tr><tr style='font-size:18px;box-shadow: 0 0 2px silver;'><td>Boys</td>";
	for($i=1;$i<7;$i++)
	{
		$query4=mysql_query("SELECT * FROM profiles WHERE id LIKE '%N08%' and completed='1' and gender='Male' and class='CSE-0".$i."'");
		$count_male=mysql_affected_rows();
		echo "<td>$count_male</td>";
	}
	echo "</tr><tr style='font-size:18px;box-shadow: 0 0 2px silver;'><td>Girls</td>";
	for($i=1;$i<7;$i++)
	{		
		$query5=mysql_query("SELECT * FROM profiles WHERE id LIKE '%N08%' and completed='1' and gender='Female' and class='CSE-0".$i."'");
		$count_female=mysql_affected_rows();
		echo "<td>$count_female</td>";
	}
	echo "</tr></table>";
	echo "<table style='width: 85%;margin: 0 auto;text-align:center;' cellpadding='10' cellspacing='5'><tr style='font-size:20px;box-shadow: 0 0 2px silver;'><td>E2</td>";
	for($i=1;$i<7;$i++)
	{
		echo "<td>CSE - 0".$i."</td>";
	}
	echo "</tr><tr style='font-size:18px;box-shadow: 0 0 2px silver;'><td>Boys</td>";
	for($i=1;$i<7;$i++)
	{
		$query4=mysql_query("SELECT * FROM profiles WHERE id LIKE '%N09%' and completed='1' and gender='Male' and class='CSE-0".$i."'");
		$count_male=mysql_affected_rows();
		echo "<td>$count_male</td>";
	}
	echo "</tr><tr style='font-size:18px;box-shadow: 0 0 2px silver;'><td>Girls</td>";
	for($i=1;$i<7;$i++)
	{		
		$query5=mysql_query("SELECT * FROM profiles WHERE id LIKE '%N09%' and completed='1' and gender='Female' and class='CSE-0".$i."'");
		$count_female=mysql_affected_rows();
		echo "<td>$count_female</td>";
	}
	echo "</tr></table>";
?>
