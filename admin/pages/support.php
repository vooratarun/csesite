<html>
<head>
</head>
<body>
<?php
include "actions/dbconnect.php";
mysql_select_db("cse");
$query=mysql_query("SELECT * FROM contactus_messages");
echo "<table class='table'>";
echo "<tr><th style='text-align:center;'>ID</th><th style='text-align:center;'>Title</th><th style='text-align:center;'>Time</th><th style='text-align:center;'>Operations</th></tr>";
while($row=mysql_fetch_array($query))
{
	
}
?>
</body>
</html>
