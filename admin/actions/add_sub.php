<html>
<head>
<title>Admin_resources</title>
<script type="text/javascript" src="script2.js">
</script>
<script type="text/javascript" src="jquery_min.js">
</script>
</head>
<body><br>
<form method="POST" action="" name="resources" enctype="multipart/form-data">
Select Category: 
<select id="category" name="cate">
<option value="none">select</option>
<option value="e3">Engg.3</option>
<option value="e2">Engg.2</option>
<option value="e1">Engg.1</option>
<option value="sw">Softwares</option>
<option value="pro">Programming</option>
<option value="other">Others</option>
</select><br><br>
</select>
Enter Subject Short Name: 
<input type="text" name="sname" id="sname" title="ex: DOA,NS,OS,GT"><br><br>
Enter Subject Full Name: 
<input type="text" name="fname" id="fname" title="ex: Graph Thoery,Network Security"><br><br>
<input type="submit" name="submit" value="submit">
</form>
</body>
</html>
<?php
include("dbconnect.php");
mysql_select_db("cse");
if(isset($_POST['submit'])) {
	$sname=$_POST['sname'];
	$fname=$_POST['fname'];
	$year=$_POST['cate'];	
	$query=mysql_query("INSERT INTO resource(sname,fullname,sem,year,active) VALUES('$sname','$fname','sem','$year','1')");
      		if(!$query)
					echo "red";
				else 
					echo "<br>green";
	
}?>