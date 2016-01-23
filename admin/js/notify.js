$(document).ready(function()
{
	loadtab("view_all");
	loadallnotice();
	loadtrash();
	$(window).keyup(function(event)
	{
		if(event.which==27)
		{
			$("#notice_viewer").fadeOut();
			$("#notice_editor").fadeOut();
			$("#black").fadeOut();
		}
	});
});
function loadtab(id)
{
	$(".tabs").css("border","none").css("background","none");
	$(".tabs_target").hide();
	$("#"+id).css("border","1px dotted rgba(0,0,0,0.1)").css("border-right","none").css("background","#e0e6f6");
	$("#"+id+"_target").show();
}
function loadallnotice()
{
	$("#view_all_target").load('actions/view_all_notices.php?id=1');
}
function loadtrash()
{
	$("#trash_target").load('actions/trash.php?id=1');
}
function loadnextnotice(id)
{
	$('#view_all_target').load('actions/view_all_notices.php?id='+id);
}
function loadnexttrash(id)
{
	$('#view_all_target').load('actions/trash.php?id='+id);
}
function post_notice()
{
	usr=$.cookie("CSAdmin");
	if(usr==null)
	{
		showsignin();
	}
	else
	{
		ntitle = $("#notice_title").val();
		nbody = $("#notice_body").html();
		$.post("actions/postnotice.php",{ntitle:ntitle,nbody:nbody},function(data)
		{
			if(data=="green")
			{
				loadallnotice();
				loadtab('view_all');
				$("#notice_title").val("");
				$("#notice_body").html("");
			}
			else
			{
				alert("An unexpected error occured while processing your request. Please Try again.");
				return false;
			}
		});
	}
}
function viewanotice(id)
{
	$.post("actions/viewnotice.php",{id:id},function(data)
	{
		$("#black").fadeIn();
		$("#notice_viewer").fadeIn();
		dataarray=data.split("|");
		ntitle=dataarray[0]+"."+dataarray[1];
		nbody=dataarray[2];
		ntim=dataarray[3];
		$("#ntit").html(ntitle);
		$("#nbody").html(nbody);
		$("#ntime").html("Posted on "+ntim);
	});
}
function deletenotice(id)
{
	var del=confirm("Are you sure?");
	if(del==true)
	{
		$.post("actions/deletenotice.php",{id:id},function(data)
		{
			if(data=="green")
			{
				loadallnotice();
				loadtrash();
			}
			else
			{
				alert("An unexpected error occured while processing your request. Please Try again.");
				return false;
			}
		});
	}
	else
	{
		return false;
	}
}
function restorenotice(id)
{
	var del=confirm("Are you sure?");
	if(del==true)
	{
		$.post("actions/restorenotice.php",{id:id},function(data)
		{
			if(data=="green")
			{
				loadtrash();
				loadallnotice();
			}
			else
			{
				alert("An unexpected error occured while processing your request. Please Try again.");
				return false;
			}
		});
	}
	else
	{
		return false;
	}
}