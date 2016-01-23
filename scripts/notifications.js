$(document).ready(function()
{
	$("#note-loader").html("<img src='images/loading.gif' id='loading'>").load("actions/getnotices.php?id=1");
});
function loadnextnotice(id)
{
	$('#note-loader').load('actions/getnotices.php?id='+id);
}