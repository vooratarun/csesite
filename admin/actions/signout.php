<?php
if(isset($_COOKIE['CSAdmin']))
{
	setcookie("CSAdmin", null, time()-3600, "/");
	setcookie("CSadminfname", null, time()-3600, "/");
}
else 
{
	//do nothing..
}
?>