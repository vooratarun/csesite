<html>
<head>
<title></title>
</head>
<body>
<div id="discussion-body">
	<?php
	include '../actions/dbconnect.php';
	mysql_select_db('cse');
	$idnum=$_GET['identity'];
	$query = mysql_query("SELECT * FROM profiles WHERE id = '$idnum'");
	$row1=mysql_fetch_array($query);
	echo "
	<div id='profilecontainer'>";
	if(file_exists("../actions/users-pics/".$idnum.".png"))
	{
		echo "<img src='actions/users-pics/".$idnum.".png' alt='' id='profile-image'>";
	}
	else
	{
		echo "<img src='actions/users-pics/profile.png' alt='' id='profile-image'>";
	}
	echo "
		<div id='imagecontainer'>
			<div id='hat'></div>$idnum<br>".$row1['class']."
		</div>
	</div>";

	echo "
	<div id='profilecontainer2'>
		<div id='profilename' class='tops'>".$row1['name']."</div>
		<div id='editbutton' class='tops'><button name='searchpro' id='searchbutton' onclick='searchprof()'>Search</button><button name='editpro' id='editprofile' onclick='showeditui()'>Edit Profile</button></div>
		<div id='pro-details'>";
			
			$query1 = mysql_query("SELECT * FROM profiles WHERE id = '$idnum'");
			while($row=mysql_fetch_array($query1))
			{
				$id=$row['id'];
				$name=$row['name'];
				$class=$row['class'];
				$intro=$row['intro_info'];
				$skills=$row['skills'];
				$interests=$row['interests'];
				$achievements=$row['achievements'];
				$areas=$row['areas'];
				$address=$row['address'];
				$mobile=$row['contact'];
				$mail=$row['mail'];
				$dob=$row['date']."<sup>th </sup>".$row['month'];
				echo "<table id='profiledetails' cellpadding='15'>";
				echo "<tr class='line'><td class='tagnames'>Introduction</td>";
				echo "<td class='tagdetails'>".$intro."</td></tr>";
				echo "<tr class='line'><td class='tagnames'>Interests</td>";
				echo "<td class='tagdetails'>".$interests."</td></tr>";
				echo "<tr class='line'><td class='tagnames'>Birthday</td>";
				echo "<td class='tagdetails'>".$dob."</td></tr>";
				echo "<tr class='line'><td class='tagnames'>Technical Skills</td>";
				echo "<td class='tagdetails'>".$skills."</td></tr>";
				echo "<tr class='line'><td class='tagnames'>Achievements</td>";
				echo "<td class='tagdetails'>".$achievements."</td></tr>";
				echo "<tr class='line'><td class='tagnames'>Areas of Interest</td>";
				echo "<td class='tagdetails'>".$areas."</td></tr>";
				echo "<tr class='line'><td class='tagnames'>Address</td>";
				echo "<td class='tagdetails'>".$address."</td></tr>";
				echo "<tr class='line'><td class='tagnames'>Mobile No.</td>";
				echo "<td class='tagdetails'>".$mobile."</td></tr>";
				echo "<tr class='line'><td class='tagnames'>E-mail</td>";
				echo "<td class='tagdetails'>".$mail."</td></tr>";
				echo "</table>";
			}
			?>
		</div>
	</div>
</div>

</body>
</html>
