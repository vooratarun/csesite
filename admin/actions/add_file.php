<html>
<head>
<title>Admin_resources</title>
<script type="text/javascript" src="../js/jquery_min.js"></script>
<script type="text/javascript">
function get_sub()
{
	var txt="<option>Select Subject</option>";
	var id=$("#category").val();
	$.get("getlist.php",{id: id},function(result)
	{
		$("#sub").html(txt+result);
		$("#sub").fadeIn();
	});	
}
</script>
</head>
<body style="font-family:calibri,sans,ubuntu;"><br>
<form method="POST" action="" name="resources" enctype="multipart/form-data"  onsubmit="return getallresources();">
<select id="category" name="cate" onchange="get_sub()" style="padding:5px;margin:10px;">
<option value="none">Select Category</option>
<option value="comp">Competitive Exams</option>
<option value="intern">Internships</option>
<option value="proj">Projects</option>
<option value="other">Other</option>
<option value="e3">Engg.3</option>
<option value="e2">Engg.2</option>
<option value="e1">Engg.1</option>
<option value="sw">Softwares</option>
<option value="pro">Programming</option>
<option value="exam">Exam Papers</option>
</select>
<select id="sub" name="sub" style="padding:5px;margin:10px;display:none;">
<option value="none">Select Subject</option>
</select><br><br>
<input type="checkbox" name="noti" title="this is added to the notifications">Notify this update
<br><br>
Upload File:
<input type="file" name="file" id="file">
<input type="submit" name="submit" value="Upload">
</form>
</body>
</html>
<?php
include "dbconnect.php";
mysql_select_db("cse");
if(isset($_POST['submit']))
{
	$cat=$_POST['cate'];
	$sname=$_POST['sub'];
	$noti=$_POST['noti'];
	$q2=mysql_query("SELECT * FROM resource WHERE sname='$sname'") or die(mysql_error());
	while($r2=mysql_fetch_array($q2)){
		$fname=$r2['fullname'];
		}
	if ($_FILES["file"]["error"] > 0){
		
		echo "Problem with file uploading ";
		echo " Error: " . $_FILES["file"]["error"] . "<br />";
		}
	else{
  		if (file_exists("../../resources/".$cat."/".$sname."/".$_FILES["file"]["name"])){
			
  			echo $_FILES["file"]["name"] . " already exists. ";
  		}
	   else
	   {
      	move_uploaded_file($_FILES["file"]["tmp_name"],"../../resources/".$cat."/".$sname."/".$_FILES["file"]["name"]);
      	$filename=$_FILES["file"]["name"];
  			$filetype=$_FILES["file"]["type"];
  			$filesize=$_FILES["file"]["size"] / 1024;
  			$filepath=$_FILES["file"]["tmp_name"];
  			//echo "Upload: " .$filename. "<br />";
 			//echo "Type: " .$filetype. "<br />";
  			//echo "Size: " .$filesize. " Kb<br />";
  			//echo "Stored in: " .$filepath;
  			$query=mysql_query("INSERT INTO resource1(filename,sname,active) VALUES('$filename','$sname','1')");
  			if($query)
  			{
  				echo mysql_error();
  				echo "<font color='green'>".$filename." is Successfully uploaded.</font><br><br>";
  				$linkk="http://10.11.2.99/cse/resources/".$cat."/".$sname."/".$_FILES["file"]["name"];
  				//echo $linkk;
  				$linkk="Link:<br><a href='".$linkk."'target='_blank'>".$linkk."</a><br>";
  				echo $linkk;
  				$ntitle="Resources Has Updated";
  				$nbody="<br> Resources Has updated in the ".$fname."<br>".$linkk." ";
  				$ntitle=addslashes($ntitle);
				$nbody=addslashes($nbody);
				$time = time();
				$today_date=strftime("%Y-%m-%d",$time);
  				if($noti=='on'){
					$query1=mysql_query("INSERT INTO notices(title,body,time,date) VALUES('$ntitle','$nbody','$time','$today_date')") or die(mysql_error());
					if($query1)
						echo "<br>Notification is posted";
					}
  				
  			}
  			else
  			{
  				echo mysql_error();
  				echo "<br><center><font color='red'>An unexpected error occured while Processing your request.</font></center>";
  			}
      	
		}
	} 
}
?>
