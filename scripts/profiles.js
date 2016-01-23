$(document).ready(function()
{
	checkprofilestatus();
	$("#hiddenuid").val($.cookie("CSAuth"));
	getfieldvals('user_name','user_phone','user_email','user_date','user_month','user_year','introduction','interests','skills','achievements','areasofinterest','address');
	uploadpic();
});
function newbook()
{
	$(".new-book").fadeIn('slow');
	hidetoparea()
}
function searchprof()
{
	$("#search-profile-ui").fadeIn('slow');
	$("#start-new-bg").fadeIn('slow');
}
function closenewbook()
{
	if($.cookie("CSAuth")!=null)
	{
		$(".new-book").fadeOut('slow');
		$("#start-new-bg").fadeOut('slow');
		$("#required-footer").html("");
		clearall();
	}
	else
	{
		showlogin();
		$(".new-book").fadeOut('slow');
		$("#start-new-bg").show();
		$("#required-footer").html("");
		clearall();
	}
}
function checkprofilestatus()
{
	var usr=$.cookie('CSAuth');
	if(usr!=null)
	{
		$.get("actions/checkstatus.php",{user:usr},function(data)
		{
			if(data==0)
			{
				getfieldvals('user_name','user_phone','user_email','user_date','user_month','user_year','introduction','interests','skills','achievements','areasofinterest','address');
				showeditui();
				$("#profile-body").html("<center><span style='font-family:calibri,ubuntu,sans;font-size:14px;color:rgb(144,88,100);'>Please provide complete information about you. Please <span style='cursor:pointer;font-weight:bold;' onclick='showeditui()'><u>Update Profile</u></span> Here.</span></center>");
			}
			else
			{
				viewprofile(usr);	
			}
		});
	}
	else
	{
		$("#edit-profile-ui").hide();
		showsignin();
		$("#profile-body").delay(1000).html("<center><span style='font-family:calibri,ubuntu,sans;font-size:14px;color:rgb(144,88,100);'>You must Login to view this page. Please <span style='cursor:pointer;font-weight:bold;' onclick='showsignin()'><u>Login</u></span>.</span></center>");
	}	
}
function viewprofile(uid)
{
	$("#profile-body").html("<img src='images/loading.gif' id='loading'>");
	$.get("actions/viewprofile.php",{identity:uid},function(data)
	{
		if(uid!=$.cookie('CSAuth'))
		{
			$("#profile-body").html(data);
			$("#editprofile").css("display","none");
		}
		else
		{
			$("#profile-body").html(data);
		}
	});
}
function viewotherprofile(id)
{
	$.get("actions/viewotherprofile.php",{identity:id},function(data)
	{
		if(data=="green")
		{
			closenewbook();
			viewprofile(id);
		}
		else
		{
			closenewbook();
			$("#profile-body").html("<div style='font-family:calibri,ubuntu,sans;font-size:14px;color:rgb(144,88,100);text-align:center;'>"+data+"</div>");
		}
	});
}
function showeditui()
{
	var cook=$.cookie("CSAuth");
	if(cook==null)
	{
		showlogin();
	}
	else
	{
		getfieldvals('user_name','user_phone','user_email','user_date','user_month','user_year','introduction','interests','skills','achievements','areasofinterest','address');
		$("#start-new-bg").fadeIn('slow');
		$("#edit-profile-ui").fadeIn('slow');
		godefault('user_name');
		godefault('user_phone');
		godefault('user_email');
		godefault('user_date');
		godefault('user_month');
		godefault('user_year');
		godefault('introduction');
		godefault('interests');
		godefault('skills');
		godefault('achievements');
		godefault('areasofinterest');
		godefault('address');
	}
}
function clearall()
{
	$(".head-input").val("");
	$(".inputs").val("");
	$("#user_date").val("");
	$("#user_month").val("");
	$("#user_year").val("");
	$("#search-profs").val("");
	$("#results-area").text("");
}
function search_profiles()
{
	if($.cookie("CSAuth")==null)
	{
		showlogin();
	}
	else
	{
		var id=$("#search-profs").val();
		if(id=="")
		{
			$("#results-area").html("");
			$("#required-footer").html("");
		}
		else
		{
			$.get("actions/searchprofiles.php",{id: id},function(data)
			{
				if(data!=0)
				{
					//$("#required-footer").html("<font color='green'><b>results found for keyword "+id+".</b></font>");
					$("#results-area").html(data);
				}
				else
				{
					$("#results-area").html("");
					$("#required-footer").html("<font color='red'><b>No results found for "+id+".</b></font>");
				}
			});
		}
	}
}
function getfieldvals(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12)
{
	if(id12=='0')
	{
		$("#required-footer").html("You haven't provided your complete information yet.");
	}
	$.post("actions/getprofvals.php",function(data)
	{
		id1_val="#"+id1;
		id2_val="#"+id2;
		id3_val="#"+id3;
		id4_val="#"+id4;
		id5_val="#"+id5;
		id6_val="#"+id6;
		id7_val="#"+id7;
		id8_val="#"+id8;
		id9_val="#"+id9;
		id10_val="#"+id10;
		id11_val="#"+id11;
		id12_val="#"+id12;
		raw_output=data.split("|||");
		$(id1_val).val(raw_output[0]);
		$(id2_val).val(raw_output[1]);
		$(id7_val).val(raw_output[2]);
		$(id9_val).val(raw_output[3]);
		$(id8_val).val(raw_output[4]);
		$(id10_val).val(raw_output[5]);
		$(id11_val).val(raw_output[6]);
		$(id12_val).val(raw_output[7]);
		$(id2_val).val(raw_output[8]);
		$(id3_val).val(raw_output[9]);
		$(id4_val).val(raw_output[10]);
		$(id5_val).val(raw_output[11]);
		$(id6_val).val(raw_output[12])
		$("#pic-uploader").load("pages/upload.php");
	});
}
function godefault(id)
{
	$("#"+id).css("border","1px solid #d7d8d9").css("box-shadow","none");
}
function updatemyprofile(id0,id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12)
{
	id0_val=$("#"+id0).val();
	id0_val=id0_val.replace(/</g,"&lt;");
	id0_val=id0_val.replace(/>/g,"&gt;");
	id1_val=$("#"+id1).val();
	id1_val=id1_val.replace(/</g,"&lt;");
	id1_val=id1_val.replace(/>/g,"&gt;");
	id2_val=$("#"+id2).val();
	id2_val=id2_val.replace(/</g,"&lt;");
	id2_val=id2_val.replace(/>/g,"&gt;");
	id3_val=$("#"+id3).val();
	id3_val=id3_val.replace(/</g,"&lt;");
	id3_val=id3_val.replace(/>/g,"&gt;");
	id4_val=$("#"+id4).val();
	id4_val=id4_val.replace(/</g,"&lt;");
	id4_val=id4_val.replace(/>/g,"&gt;");
	id5_val=$("#"+id5).val();
	id5_val=id5_val.replace(/</g,"&lt;");
	id5_val=id5_val.replace(/>/g,"&gt;");
	id6_val=$("#"+id6).val();
	id6_val=id6_val.replace(/</g,"&lt;");
	id6_val=id6_val.replace(/>/g,"&gt;");
	id7_val=$("#"+id7).val();
	id7_val=id7_val.replace(/</g,"&lt;");
	id7_val=id7_val.replace(/>/g,"&gt;");
	id8_val=$("#"+id8).val();
	id8_val=id8_val.replace(/</g,"&lt;");
	id8_val=id8_val.replace(/>/g,"&gt;");
	id9_val=$("#"+id9).val();
	id9_val=id9_val.replace(/</g,"&lt;");
	id9_val=id9_val.replace(/>/g,"&gt;");
	id10_val=$("#"+id10).val();
	id10_val=id10_val.replace(/</g,"&lt;");
	id10_val=id10_val.replace(/>/g,"&gt;");
	id11_val=$("#"+id11).val();
	id11_val=id11_val.replace(/</g,"&lt;");
	id11_val=id11_val.replace(/>/g,"&gt;");
	id12_val=$("#"+id12).val();
	id12_val=id12_val.replace(/</g,"&lt;");
	id12_val=id12_val.replace(/>/g,"&gt;");
	if(id1_val=="")
	{
		$("#required-footer").html("Please provide your full name");
		$("#"+id1).css("border","1px solid #d21010").css("box-shadow","0px 0px 1px #ef9797");
		return false;
	}
	if(id3_val=="")
	{
		$("#required-footer").html("Please provide your E-mail");
		$("#"+id3).css("border","1px solid #d21010").css("box-shadow","0px 0px 1px #ef9797");
		return false;
	}
	if(id4_val==""||id5_val==""||id6_val=="")
	{
		$("#required-footer").html("Please provide your Date of Birth");
		$("#"+id4).css("border","1px solid #d21010").css("box-shadow","0px 0px 1px #ef9797");
		$("#"+id5).css("border","1px solid #d21010").css("box-shadow","0px 0px 1px #ef9797");
		$("#"+id6).css("border","1px solid #d21010").css("box-shadow","0px 0px 1px #ef9797");
		return false;
	}
	if(id8_val=="")
	{
		$("#required-footer").html("Please fill your personal interests.");
		$("#"+id8).css("border","1px solid #d21010").css("box-shadow","0px 0px 1px #ef9797");
		return false;
	}
	if(id11_val=="")
	{
		$("#required-footer").html("Please fill your areas of interests.");
		$("#"+id11).css("border","1px solid #d21010").css("box-shadow","0px 0px 1px #ef9797");
		return false;
	}
	if(id12_val=="")
	{
		$("#required-footer").html("Please fill your permanent address.");
		$("#"+id12).css("border","1px solid #d21010").css("box-shadow","0px 0px 1px #ef9797");
		return false;
	}
	else
	{
		$.post("actions/editprofile.php",{userId:id0_val,userName:id1_val,userContact:id2_val,userMail:id3_val,userDate:id4_val,userMonth:id5_val,userYear:id6_val,userIntro:id7_val,userInterests:id8_val,userSkills:id9_val,userAchieve:id10_val,userAreas:id11_val,userAddr:id12_val},function(data)
		{
			if(data=="red")
			{
				$("#required-footer").html("<font color='red'>Oops, Error processing your request. Try again.");
			}
			else
			{
				$("#required-footer").html("<font color='green'>Success. Your profile has been updated successfully.");
				$(".new-book").delay(1500).fadeOut(800,function()
				{
					$("#required-footer").html("(<span class='star'>*</span>) fields are required fields.");
					$("#start-new-bg").fadeOut("slow");
				});
				viewprofile($.cookie("CSAuth"));
			}
		});
	}
}
function uploadpic()
{
	$("#pic-uploader").html("").load("pages/upload.php");	
}