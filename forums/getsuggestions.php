<?php
include "../actions/dbconnect.php";
mysql_select_db("discussion_forum");
$query=mysql_query("SELECT * FROM categories");
while($row=mysql_fetch_array($query))
{
	$a[]=$row['cat_name'];
	$b[]=$row['cat_id'];
}
$q=$_GET["id"];
$hint="";
if(strlen($q)>0)
{
	for($i=0; $i<count($a); $i++)
	{
		if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
		{
			if($hint=="")
			{
				$hint="<option class='cat_text' id='".$b[$i]."' onclick=\"inserttext('".$a[$i]."')\">".$a[$i]."</option>";
			}
			else
			{
				$hint=$hint."<option class='cat_text' id='".$b[$i]."' onclick=\"inserttext('".$a[$i]."')\">".$a[$i]."</option>";
			}
		}
	}
}
if($hint=="")
{
	$response="notfound";
}
else
{
	$response=$hint;
}
echo $response;
?>