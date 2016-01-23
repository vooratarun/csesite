<?php
	include("../actions/dbconnect.php");
	mysql_select_db("cse");
	$id=$_POST['id'];
	$all=array($id);
	$arr[20]=array();
	for($i=0;$i<1;$i++) {
	$count=0;	
	$a=mysql_query("SELECT count(sname) FROM resource WHERE year='$all[$i]'");
	$c=mysql_fetch_row($a);
	$count=$c[0];
	//echo $all[$i]." ".$count[0]."<br>";
	$b=mysql_query("SELECT *FROM resource WHERE year='$all[$i]'");
	for($j=0;$j<$count;$j++) {
	while($row=mysql_fetch_array($b)){
		$arr[$j]=$row['sname'];
		$d=mysql_query("SELECT count(sname) FROM resource1 WHERE sname='$arr[$j]'");
		$c1=mysql_fetch_row($d);
		$count1=$c1[0];
		if($count1!=0){
		echo "<table class='resource-list'>";
		echo "<tr><td class='subjectname'>".$row['fullname']."</td></tr>";
	//echo "<i>".$row['fullname']."</i><br>";
	}
		$book=mysql_query("SELECT *FROM resource1 WHERE sname='$arr[$j]'");
		
				while($row1=mysql_fetch_array($book)){
					echo "<tr><td class='td1' id='$arr[$j]'><a href='resources/".$all[$i]."/".$arr[$j]."/".$row1['filename']."' target='_blank'>".$row1['filename']."</a></td></tr>";
					//echo $row1['filename']."<br>";
				//echo $row1['filename']."<br>";
				}
				echo "</table>";
				
}}}
?>