<style type="text/css">
input,img
{
	vertical-align: middle;
}
</style>
<script type="text/javascript" >
function uploadpic()
{
	document.reload();
	//$("#pic-uploader").html("").load("pages/upload.php");	
}
</script>
<form method="post" enctype="multipart/form-data">
<?php
if(file_exists("../actions/users-pics/".$_COOKIE['CSAuth'].".png"))
{
	echo "<img src='../actions/users-pics/".$_COOKIE['CSAuth'].".png' width='50px'>";
}
else
{
	echo "<img src='../actions/users-pics/profile.png' width='50px'>";
}
?>
<input type='file' style='margin-left:5px;font-family:calibri,sans,ubuntu;font-size:12px;' id="newpic" name="newpic"><input style="font-family:calibri,sans,ubuntu;font-size:12px;" type="submit" value="Upload" name="change" onclick="uploadpic()">
<?php
if(isset($_POST['change']))
{
	if ((($_FILES["newpic"]["type"] == "image/jpeg")||($_FILES["newpic"]["type"] == "image/png"))&&($_FILES["newpic"]["size"]<10240000))
	{
		if($_FILES["newpic"]["error"]>0)
		{
			echo "<script>alert(\"Error: " . $_FILES["newpic"]["error"] . ")</script>";
		}
		else
		{
      	$name = $_COOKIE["CSAuth"].".png";
      	$_FILES["newpic"]["name"]=$name;
	      move_uploaded_file($_FILES["newpic"]["tmp_name"],"../actions/users-pics/" . $_FILES["newpic"]["name"]);
		}
	}
	else
	{
		echo "<script>alert('Invalid file or Size too large')</script>";
		/*
		echo "Size: " . ($_FILES["newpic"]["size"] / 1024) . " Kb<br />";
		echo "Type: " . $_FILES["newpic"]["type"] . "<br />";
		echo "Stored in: " . $_FILES["newpic"]["tmp_name"];
		*/
	}
}