<html>
<head>
<script type="text/javascript" src="js/notify.js"></script>
<link rel="stylesheet" href="css/notify.css">
<script type="text/javascript" >
$(function()
{
	$('#mkBold').click(function(){document.execCommand('bold', false, null);$('#answer-input').focus();return false;});
	$('#mkItalic').click(function(){document.execCommand('italic', false, null);$('#answer-input').focus();return false;});
	$('#underLine').click(function(){document.execCommand('underline', false, null);$('#answer-input').focus();return false;});
	$('#insLink').click(function()
	{
		var url = prompt("Inser URL Here","http://");
		document.execCommand('createLink',false,url);
		$('#answer-input').focus();
		return false;
	});
	$('#ul').click(function()
	{
		document.execCommand('insertOrderedList',false,null);
		$('#answer-input').focus();
		return false;
	});
	$('#ol').click(function()
	{
		document.execCommand('insertUnorderedList',false,null);
		$('#answer-input').focus();
		return false;
	});
});
</script>
</head>
<body>
<div id="window-viewer">
	<div id="tabs-wrapper">
		<div class="tabs" id="view_all" onclick="loadtab('view_all')">View All</div>
		<div class="tabs" id="add_new" onclick="loadtab('add_new')">Add New</div>
		<div class="tabs" id="trash" onclick="loadtab('trash')">Trash</div>
	</div>
	<div id="tabs-loader">
		<div class="tabs_target" id="view_all_target"></div>
		<div class="tabs_target" id="add_new_target">
			<div id="post-notice-body">
				<table summary="" class="table">
					<tr><th>Notice Title</th></tr>
					<tr><td><input type="text" maxlength="100" id="notice_title" class="input-fields" style="width: 100%;"></td></tr>
					<tr><th>Notice Body</th></tr>
					<tr><td>
					<div id="top_bar">
						<button id="mkBold" class="top_list" title="Bold"><b>B</b></button>
						<button id="mkItalic" class="top_list" title="Italic"><i>i</i></button>
						<button id="underLine" class="top_list" title="Underline"><u>U</u></button>
						<button id="insLink" class="top_list" style="color:blue;" title="Link">URL</button>
						<button id="ul" class="top_list" title="Ordered List"><img src="../images/ol.gif" alt="" ></button>
						<button id="ol" class="top_list" title="Unordered List"><img src="../images/ul.gif" alt="" ></button>
					</div>
					</td></tr>
					<tr><td>
					<div id="notice_body" contenteditable="true" style="height: 200px;">
					</div>
					</td></tr>
					<tr><td><center><button id="post_notice" onclick="post_notice()">Post Notification &rarr;</button></center></td></tr>
				</table>			
			</div>
		</div>
		<div class="tabs_target" id="trash_target">Trash</div>	
	</div>
</div>
<div id="notice_viewer">
	<div id="nhint">Notice Viewer<span style="float:right;font-size:12px;color:gray;margin-right: 10px;">Press Esc to Close</span></div>
	<div id="ntit"></div>
	<div id="ntime"></div>
	<div id="nbody"></div>
</div>
</body>
</html>
