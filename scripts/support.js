$(document).ready(function()
{
	$("#user-problem").keyup(function(event)
	{
		if(event.which==27)
		{
			$("#contactus").fadeOut(1000);			
			$("#start-new-bg").fadeOut(1000);
		}
	});
	$("#close_contact").click(function()
	{
		$("#contactus").fadeOut();
		$("#start-new-bg").fadeOut();
		clearall();
	});
});
function animate(id)
{
	var id=$(id).attr("id");
	var state=$("#"+id+"-state").val();
	if(state=="1")
	{
		$("#"+id+"-desc").fadeOut(50, function()
		{
			$("#"+id).animate({height: 98}, 250);
			$("#"+id+"-state").val("0");
		});
	}
	else
	{
		$(".product-items").animate({height: 98}, 250, function()
		{
			$(".options").hide();
			$(".status").val("0");
		});
		$("#"+id).animate({height: 160}, 250, function()
		{
			$("#"+id+"-state").val("1");
			$("#"+id+"-desc").fadeIn(100);
		});
	}
}
function getvalues()
{
	$("#userid").val($.cookie("CSAuth"));
	$("#user-name").val($.cookie("CSusrfname"));
}
function write2us(id)
{
	if($.cookie("CSAuth")==null)
	{
		alert("You must be authorized to do this operation.")
	}
	else
	{
		getvalues();
		$("#contactus").fadeIn();
		$("#start-new-bg").fadeIn();
		$("#user-problem").focus();
		$("#categoryid").val(id);
	}
}
function clearall()
{
	$("#user-problem").addClass("inputs").removeClass("reds").val("");
}
function godefault(id)
{
	$("#user-problem").removeClass("reds").addClass("inputs");
}
function postproblem(prob)
{
	var username=$("#user-name").val();
	var studentid=$("#userid").val();
	var categoryid=$("#categoryid").val();
	var problemo=$("#"+prob).val();
	if(problemo=="")
	{
		$("#user-problem").addClass("reds").removeClass("inputs");
	}
	else
	{
		$.post("actions/postproblem.php",{uname: username,sid: studentid,cid: categoryid,problem: problemo},function(data)
		{
			if(data=="green")
			{
				$("#required-footer").show().html("<font color='green'>Your request has been successfully submitted.</font>");
				$("#contactus").delay(1000).fadeOut(function()
				{
					$("#start-new-bg").fadeOut();
					clearall();
					$("#required-footer").show().html("Please send message regarding the problems that you are facing with our services.");
				});	
			}
			else
			{
				$("#required-footer").show().html("<font color='red'>Ooops, An unexpected error occured while processing you request.</font>");
				$("#contactus").delay(1000).fadeOut(function()
				{
					$("#start-new-bg").fadeOut();
					clearall();
					$("#required-footer").show().html("Please send message regarding the problems that you are facing with our services.");
				});
			}
		});
	}
}