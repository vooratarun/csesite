$(document).ready(function()
{
	loadstats();
	usr=$.cookie("CSAdmin");
	if(usr==null)
	{
		showsignin();
		$("#getout").hide();
		$("#getin").show();
	}
	else
	{
		$("#Auth_user").html($.cookie("CSadminfname")+",");
		$("#getin").hide();
		$("#getout").show();
		var tmppage=$("#tempstore").val();
		if(tmppage=="")
		{
			loadpage("home");
		}
		else
		{
			loadpage(tmppage);
		}
	}
	$("#uname").keyup(function(event)
	{
		if(event.which==13)
		{
			sendcredentials();
		}
	});
	$("#pwd").keyup(function(event)
	{
		if(event.which==13)
		{
			sendcredentials();
		}
	});
});
function loadstats()
{
	$.post("actions/stats.php",function(data)
	{
		$("#stats_wrapper").html(data);
	});
	$.post("actions/online_users.php",function(data)
	{
		$("#online_users").html(data);
	});
	setInterval(function(){loader();},4000);
		
}
function loader()
{
	$.post("actions/stats.php",function(data)
	{
		$("#stats_wrapper").html(data);
	});
	$.post("actions/online_users.php",function(data)
	{
		$("#online_users").html(data);
	});	
}
function loadpage(id)
{
	$("#page_loader").load("pages/"+id+".php");
	$(".nav-opts").css("font-weight","normal");
	$(".nav-opts").css("background","none");
	$("#admin-"+id).css("font-weight","bold");
	$("#admin-"+id).css("background","rgba(0,0,0,0.1)");
	$("#tempstore").val(id);
}
function showsignin()
{
	$(".restricted").fadeIn();
	$("#uname").focus();
}
function clearfields()
{
	$("#uname").val("");
	$("#pwd").val("");
	$("#uname").focus();
}
function sendcredentials()
{
	var usrname=$("#uname").val();
	var passwd=$("#pwd").val();
	if(usrname=="")
	{
		$("#uname").focus();
	}
	else if(passwd=="")
	{
		$("#pwd").focus();
	}
	else
	{
		$.post("actions/authorize.php",{username: usrname, password: passwd},function(data)
		{
			if(data=="green")
			{
				$("#Auth_user").html($.cookie("CSadminfname")+",");
				$("#getin").hide();
				$("#getout").show();
				$("#signin-hint").hide();
				$(".restricted").fadeOut();
				loadpage("home");
			}
			else
			{
				$("#signin-hint").fadeIn();
			}
		});
	}
}
function signout()
{
	$.post("actions/signout.php",function()
	{
		$("#Auth_user").html("");
		$("#getout").hide();
		$("#getin").show();
		loadpage('home');
		clearfields();
		showsignin();
	});
}