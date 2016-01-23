
<?php
include "../actions/dbconnect.php";
$query=mysql_query("SELECT * FROM discussion_forum.categories");
while($row=mysql_fetch_array($query))
{
	$catid=$row['cat_id'];
	mysql_select_db("forum_questions");
	$q=mysql_query("SELECT * FROM discussion_forum.$catid");
	while($row1=mysql_fetch_array($q))
	{
		mysql_select_db("");
		$title=$row1['qtitle'];
		$cat=$catid;
		$body=$row1['question'];
		$body=addslashes($body);
		$body=str_replace("<","&amp;lt;",$body);
		$body=str_replace(">","&amp;gt;",$body);
		$body=str_replace("&amp;lt;br /&amp;gt;","&lt;br&gt;",$body);
		$body=str_replace("&amp;lt;pre class=\'prettyprint\'&amp;gt;","&amp;lt;pre&amp;gt;",$body);
		echo $body."<br><hr><br>";		
		$id=$row['qid'];
		$user=$row1['userid'];
		$time=$row1['time'];
		$ans=$row1['solution'];
		$views=$row1['maxviews'];
		$a=explode(" ", $time);
		$b=explode("-",$a[0]);
		$year=$b[0];
		$month=$b[1];
		$day=$b[2];
		$c=explode(":",$a[1]);
		$hour=$c[0];
		$min=$c[1];
		$sec=$c[2];
		$time=mktime($hour,$min,$sec,$month,$day,$year);
		mysql_select_db("discussion_forum");
		$i=mysql_query("INSERT INTO forum_questions(`post_id`,`post_title`, `keywords`, `post_category`, `post_body`, `posted_user`, `posted_time`, `posted_ip`, `answered`, `post_views`, `votes`, `voters`, `visited_by`) VALUES('$id','$title','','$cat','$body','$user','$time','','$ans','$views','','','')") or die(mysql_error());
		if($i)
		{
			echo $title." Successfully Posted.<br>";
		}
	}
}
$time = time();
echo $time."<br>";
//$time = strftime("%Y-%m-%d %H:%M:%S",$time);
$time=strftime("%b %d, %Y",$time);
echo $time."<br>";
?>
<html>
<head>
<title>Editor</title>
<script type="text/javascript" src="http://localhost/csehome/scripts/jquery_min.js"></script>
<style type="text/css">
body{font-family: calibri,sans,ubuntu;}
#editor
{
	border: 1px solid black;
	width: 50%;
	height: 30%;
}
#top_bar
{
	border-bottom: 1px solid black;
	width: 100%;
	height: 10%;
	padding: 5px 0;
}
.top_list{cursor: pointer;border: none;background: none;}
#mkBold{font-weight: bold;}
#mkItalic{font-style: italic;}
#underLine{text-decoration: underline;}
#text-area
{
	padding: 5px;
	height: 79%;
	font-size: 12px;
}
</style>
<script type="text/javascript" >
$(function()
{
	$('#text-area').focus();
	$('#mkBold').click(function(){document.execCommand('bold', false, null);$('#text-area').focus();return false;});
	$('#mkItalic').click(function(){document.execCommand('italic', false, null);$('#text-area').focus();return false;});
	$('#underLine').click(function(){document.execCommand('underline', false, null);$('#text-area').focus();return false;});
	$('#insCode').click(function(){});
	$('#insLink').click(function()
	{
		var url = prompt("Inser URL Here","http://");
		document.execCommand('createLink',false,url);
		$('#text-area').focus();
		return false;
	});
	$('#indent').click(function()
	{
		document.execCommand('indent',false,null);
		$('#text-area').focus();
		return false;
	});
	$('#outdent').click(function()
	{
		document.execCommand('outdent',false,null);
		$('#text-area').focus();
		return false;
	});
	$('#clear').click(function()
	{
		document.execCommand('removeFormat',false,null);
		$('#text-area').focus();
		return false;
	});
	$('#ul').click(function()
	{
		document.execCommand('insertOrderedList',false,null);
		$('#text-area').focus();
		return false;
	});
	$('#ol').click(function()
	{
		document.execCommand('insertUnorderedList',false,null);
		$('#text-area').focus();
		return false;
	});
	$('#insCode').click(function()
	{
		document.insertBefore('code');
		$('#text-area').focus();
		return false;
	});
});
</script>
</head>
<body>
<div id="editor">
	<div id="top_bar">
		<button id="mkBold" class="top_list">B</button>
		<button id="mkItalic" class="top_list">i</button>
		<button id="underLine" class="top_list">u</button>
		<button id="insCode" class="top_list">&lt;/&gt;</button>
		<button id="insLink" class="top_list">URL</button>
		<button id="indent" class="top_list">&rarr;</button>
		<button id="outdent" class="top_list">&larr;</button>
		<button id="ul" class="top_list">ul</button>
		<button id="ol" class="top_list">ol</button>
		<button id="clear" class="top_list">&times;</button>
	</div>
	<div contenteditable="true" id="text-area"></div>
</div>
</body>
</html>;