$(document).ready(function()
{
	loadfirstdiv();
	get_resources('e1');
	get_resources('e2');
	get_resources('e3');
	get_resources('pro');
	get_resources('sw');
	get_resources('exam');
	$("#search-resource").focus(function()
	{
		$("#request-book").slideUp(500);
	});
	$("#search-resource").keyup(function(event)
	{
		if(event.which==27)
		{
			$("#search-resource").val("");
			$("#results").html("");
		}
		else
		{
			gosearch();
		}
	});
});
function changebg(id)
{
	var divid=$(id).attr("id");
	$(".desc-body").hide();
	$("#"+divid+"-body").show();
	$(".category").css("background-color","rgb(0, 114, 198)").css("border-bottom-color","rgb(0, 114, 198)").css("color","white");
	$("#"+divid).css("background-color","white").css("border-bottom-color","white").css("color","black");
}
function loadfirstdiv()
{
	changebg('e3');
	$(".desc-body").hide();
	$("#e3-body").show();
	$("#e3").css("background-color","white").css("border-bottom-color","white").css("color","black");
}
function get_resources(id)
{
	$("#"+id+"-body").html("<img src='images/loading.gif' id='loading'>");
	$.post("actions/get_resources.php",{id:id},function(data)
	{
		$("#"+id+"-body").html(data);
	});
}
function newbook()
{
	$("#request-book").slideToggle(500);
}
function godefault(id)
{
	$("#"+id).css("border","1px solid silver").css("box-shadow","none");
}
function clearvals()
{
	$("#book-name").val("");
	$("#book-author").val("");
	$("#book-publishers").val("");
	$("#book-info").val("");
	$("#book-request-status").html("");
}
function submit_book_req()
{
	bname=$("#book-name").val();
	bauth=$("#book-author").val();
	bpubs=$("#book-publishers").val();
	binfo=$("#book-info").val();
	if(bname=="")
	{
		$("#book-name").css("border","1px solid #d21010").css("box-shadow","0px 0px 1px #ef9797");
	}
	else
	{
		$.post("actions/requestbook.php",{name: bname,auth: bauth,pubs :bpubs,info: binfo},function(data)
		{
			if(data=="green")
			{
				$("#book-request-status").html("<font color='green'>Successfully Posted.</font>");
				$("#request-book").delay(1500).fadeOut(300,function()
				{
					clearvals();
				});
			}
			else
			{
				$("#book-request-status").html("<font color='red'>An Error Occured.</font>");
				$("#request-book").delay(1500).fadeOut(300,function()
				{
					clearvals();
				});
			}
		});
	}
}
function gosearch()
{
	var id=$("#search-resource").val();
	if(id=="")
	{
		$("#results").html("");
		$("#results").css("border-top","none");
	}
	else
	{
		$.get("actions/searchresources.php",{id: id},function(data)
		{
			hint = "Press Esc to Cancel";
			if(data=="")
			{
				$("#results").html("<center>"+hint+"<br>Not Found</center>");
			}
			else
			{
				$("#results").html("<center>"+hint+"</center><br>"+data);
			}
		});
	}
}