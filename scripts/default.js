$(document).ready(function()
{
	getonline();
	getstate();
	slideshow();
	var tmppage=$("#tempstore").val();
	if($.cookie("CSAuth")==null)
	{
		$("#not_count").hide();
	}
	if(tmppage=="")
	{
		loadpage("home");
	}
	else
	{
		loadpage(tmppage);
	}
	getusrname();
	$(".ddmenu").hide();
	$(".not-menu").hide();
	profileimg();
	$.post("actions/trace.php");
});
/* Global temporary variables    */

var resettmp="";

/* Global temporary variables   */

window.onbeforeunload = function()
{
	$.post("actions/gooffline.php",function(data){})
}
function loadpage(id)
{
	$("#site_body").html("<br><br><img src='images/loading.gif' id='loading'><br><br>").load("pages/"+id+".php");
	savepage(id);
	hidetoparea();
}
function hidetoparea()
{
	$(".not-menu").hide();
	$(".ddmenu").hide();
}
function savepage(id)
{
	$("#tempstore").val(id);
}
function loadonline()
{
	setInterval(function(){getfriends();getnotinum();loadtop5();},10000);
}
function getonline()
{
	$.post("actions/online.php",function(data){});
}
function getfriends()
{
	usr=$.cookie("CSAuth");
	$.post("actions/getfriends.php",{user:usr},function(data)
	{
		$("#online_friends").html(data);
	});
}
function showsignin()
{
	$("#recovery_ui").fadeOut('slow');
	document.title="Sign In";
	$("#popup_bg_wrapper").fadeIn("slow");
	$("#signin_ui").fadeIn("slow");
	$(".form-error").hide(0);
	$("#password").val("");
	var username=$("#username").val();
	var password=$("#password").val();
	if(username!="")
	{
		$("#password").focus();
	}
	else
	{
		$("#username").focus();
	}
	$(window).keyup(function(event)
	{
		if(event.which==27)
		{
			$(".restricted").fadeOut("slow");
			document.title="Computer Science Engineering";
		}
	});
	$("#username").keyup(function(event)
	{
		var username=$("#username").val();
		if(event.which==13)
		{
			if(username=="")
			{
				$("#username-error").slideDown();
			}
			else
			{
				$("#password").focus();
			}
		}
		else
		{
			//do nothing..
		}
	});
	$("#password").keyup(function(event)
	{
		var password=$("#password").val();
		if(event.which==13)
		{
			if(password=="")
			{
				$("#password-error").slideDown();
			}
			else
			{
				$("#invalid-error").slideUp();
				sendcredentials()
			}
		}
		else
		{
			//do nothing..
		}
	});
}
function hideerrors(id,value)
{
	if(id=="username")
	{
		if(value.length>4)
		{
			$("#username-error").slideUp("slow");
		}
		else
		{
			//do nothing..
		}
	}
	else if(id=="password")
	{
		if(value.length>4)
		{
			$("#password-error").slideUp("slow");
		}
		else
		{
			//do nothing..
		}
	}
	else
	{
		//do nothing..
	}
}
function showusermenu()
{
	$(".ddmenu").slideToggle(100);
	$(".not-menu").hide();
}
function shownotmenu()
{
	$(".ddmenu").hide();
	$(".not-menu").slideToggle(100);
}
function getstate()
{
	$("#notifications").hide();
	$("#notifications").css("background-color","#d74937").css("color","white").css("border","1px solid #d74937");
	getnotinum();
}
function getnotinum()
{
	$.post("actions/getnotnum.php",function(data)
	{
		if(data==0)
		{
			$("#notifications").css("background-color","rgb(240,240,240)").css("color","gray").css("border","1px solid silver");
			$("#notifications").html(data);
			$("#notifications").fadeIn('slow');
			$("#current_notifications").html("<center>No new notifications</center>");
			$("#not_count").hide();
		}
		else
		{
			$("#notifications").css("background-color","#d74937").css("color","white").css("border","1px solid #d74937");
			$("#notifications").html(data);
			$("#notifications").fadeIn('slow');
			$("#not_count").show().html(data);
		}
	});
}
function getnotices()
{
	$.post("actions/getnotices.php",function(data)
	{
		$("#current_notifications").html(data);
	});
}
function viewtheprofile(id)
{
	var tmppage=$("#tempstore").val();
	if(tmppage=="profiles")
	{
		viewotherprofile(id);
	}
	else
	{
		$("#site_body").html("<br><br><img src='images/loading.gif' id='loading'>");
		$.get("actions/viewotherprofile.php",{identity:id},function(data)
		{
			if(data=="green")
			{
				$.get("actions/viewprofile.php",{identity:id},function(data)
				{
					$("#site_body").html("<div id='support-header'>Profiles</div>"+data);
					$("#searchbutton").css("display","none");
					$("#editprofile").css("display","none");
				});
			}
			else
			{
				$("#site_body").html("<div id='support-header'>Profiles</div><div style='margin-top:50px;font-size:14px;color:rgb(144,88,100);text-align:center;'>"+data+"</div>");
			}
		});
	}
}
function getusrname()
{
	var ckname=$.cookie("CSusrfname");
	if(ckname==null)
	{
		$("#online_friends").hide();
		$("#top-user-area").hide();
		$(".ddmenu").hide();
		$("#signin").show().html("Sign In");
	}
	else
	{
		getstate();
		loadtop5();
		$("#online_friends").show();
		getfriends();
		loadonline();
		$("#signin").hide();
		$("#top-user-area").show();
		$("#signinuser").html(ckname);
	}
}
function loadtop5()
{
	$.get("actions/get5notifications.php",function(data)
	{
		if(data=="*")
		{
			$("#current_notifications").html("<span id='not-text'>No new notifications avaiable</span><br>");
		}
		else
		{
			var notification=data.split("*");
			var len=notification.length;
			$("#current_notifications").html("");
			for(var i=1;i<len;i++)
			{
				note_title=notification[i].split("|");
				if(note_title[0].length>40)
				{
					var sbstr=note_title[0].substring(0,40);
					$("#current_notifications").append("<div id='not-text' onclick=\"viewanotice('"+note_title[2]+"')\">"+sbstr+"...<br><span style='float:right;font-size:11px;'>Posted "+note_title[1]+"</span></div>");
				}
				else
				{
					$("#current_notifications").append("<div id='not-text' onclick=\"viewanotice('"+note_title[2]+"')\">"+note_title[0]+"<br><span style='float:right;font-size:11px;'>Posted "+note_title[1]+"</span></div>");
				}
			}
		}
	});
}
function signout()
{
	$.post("actions/signout.php",function()
	{
		getusrname();
		loadpage('home');
		$("#pwd").val("");
		$("#online_friends").hide();
	});
}
function hidelogin()
{
	$(".login").fadeOut('slow');
}
function showlogin()
{
	$(".login").fadeIn('slow');
}
function sendcredentials()
{
	var username=$("#username").val();
	var password=$("#password").val();
	if(username==""&&password=="")
	{
		$("#username-error").slideDown();
		$("#password-error").slideDown();
	}
	else if(username=="")
	{
		$("#username").focus();
		$("#username-error").slideDown();
	}
	else if(password=="")
	{
		$("#password").focus();
		$("#password-error").slideDown();
	}
	else
	{
		$.post("actions/authorize.php",{username: username, password: password},function(data)
		{
			if(data=="green")
			{
				getonline();
				profileimg();
				$("#signin-hint").hide();
				$(".restricted").fadeOut();
				getusrname();
				tmp=$("#tempstore").val();
				if(tmp=="profiles")
				{
					loadpage("profiles");
				}
				else if(tmp=="discussion")
				{
					loadpage("discussion");
				}
				else
				{
					//do nothing.
				}
			}
			else if(data=="red")
			{
				$("#invalid-error").slideDown();
			}
			else
			{
				alert(data);
			}
		});
	}
}
function profileimg()
{
	$.post("actions/profile_img.php",function(data)
	{
		if(data=="green")
		{
			$("#profile_img").html("<img src='actions/users-pics/"+$.cookie('CSAuth')+".png' width='100%'>");
		}
		else
		{
			$("#profile_img").html("<img src='actions/users-pics/duser.png'>");
		}
	});
}
function hidelogintext()
{
	$("#signin").html("");
}
function changepaswd()
{
	$(".chpswd").fadeIn('slow');
	hidetoparea();
}
function hidechpwd()
{
	$(".chpswd").fadeOut('slow');
}
function changepassword()
{
	var old=$("#oldpwd").val();
	var newpd=$("#newpwd").val();
	var rnewpwd=$("#rnewpwd").val();
	if(old=="")
	{
		alert('Please enter old password')
	}
	else if(newpd=="")
	{
		alert('Please enter the new password')
	}
	else if(rnewpwd=="")
	{
		alert('Please re-enter the new password')
	}
	else
	{
		if(newpd.length!=rnewpwd.length)
		{
			alert('Please enter same new password in both fields')
		}
		else
		{
			if(newpd!=rnewpwd)
			{
				alert('Please enter same new password in both fields');
			}
			else
			{
				$.post("actions/chpasswd.php",{oldpswd: old, newpswd: newpd},function(signal)
				{
					if(signal=="green")
					{
						alert('Password had successfully changed')
						clearallf();
						hidechpwd();
					}
					else
					{
						alert('Something error occured, while changing the password.')
					}
				});
			}	
		}	
	}
}
function clearallf()
{
	$("#oldpwd").val("");
	$("#newpwd").val("");
	$("#rnewpwd").val("");
}
function slideshow()
{
	$("#div1").fadeIn("slow").delay(3000).fadeOut("slow");
}
function viewanotice(id)
{
	$(".ddmenu").hide();
	$(".not-menu").hide();
	$.post("actions/get_specific_notice.php",{id:id},function(data)
	{
		$("#site_body").html(data);
	});
}
function chgimg(id)
{
	$(".prolistimg").html("<img src='images/radio.png' />");
	$("#"+id).html("<img src='images/radio_selected.png' />");
	if(resettmp!=id)
	{
		resettmp=id;
		$(".reset-options").slideUp('slow');
		$("#"+id+"_opt").slideDown('slow');
	}
	else
	{
		//do nothing..
	}
}
function loadreset()
{
	$("#signin_ui").hide();
	$("#recovery_ui").show();
	$(".reset-options").hide();
	$(".resetpasswd-step1").hide();
	$(".resetopt").show();
	$(".prolistimg").html("<img src='images/radio.png' />");
	resettmp="";
	document.title="Recover your CSE account";
}
function loadsignin()
{
	$("#signin_ui").show();
	$("#username").focus();
	$("#recovery_ui").hide();
	document.title="Sign In";
}
function resetpasswd()
{
	$(".resetopt").hide();
	$(".resetpasswd-step1").show();
	$("#reset-username").focus();
}