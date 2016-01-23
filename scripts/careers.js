$(document).ready(function()
{
	changetab('comp');
	getc('comp');
	getc('proj');
	getc('intern');
	getc('other');
});
function changetab(id)
{
	$(".nav-tabs").removeClass('active');
	$("#"+id).addClass('nav-tabs active').css("border-bottom","1px solid white");
	$(".disc-body").hide();
	$("#"+id+"-body").show();
}

function getc(id)
{
	$("#"+id+"-body").html("<img src='images/loading.gif' id='loading'>");
	$.post("actions/get_resources.php",{id:id},function(data)
	{
		$("#"+id+"-body").html(data);
	});
}