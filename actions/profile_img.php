<?php
if(file_exists("../actions/users-pics/".$_COOKIE['CSAuth'].".png"))
{
	echo "green";
}
else
{
	echo "red";
}
?>