$(document).ready(function()
{
	changetab('all');
	getarticles('all');
	getarticles('solved');
	getarticles('unsolved');
	getarticles('most');
	getarticles('recent');
	$("#nav-cat-title").html("");
	$(function()
	{
		$('#pBold').click(function(){document.execCommand('bold', false, null);$('#disc-body').focus();return false;});
		$('#pItalic').click(function(){document.execCommand('italic', false, null);$('#disc-body').focus();return false;});
		$('#punderLine').click(function(){document.execCommand('underline', false, null);$('#disc-body').focus();return false;});
		$('#pinsLink').click(function()
		{
			var url = prompt("Inser URL Here","http://");
			document.execCommand('createLink',false,url);
			$('#disc-body').focus();
			return false;
		});
		$('#pul').click(function()
		{
			document.execCommand('insertOrderedList',false,null);
			$('#disc-body').focus();
			return false;
		});
		$('#pol').click(function()
		{
			document.execCommand('insertUnorderedList',false,null);
			$('#disc-body').focus();
			return false;
		});
		$('#pinsCode').click(function()
		{
			//document.execCommand('formatBlock',false,"pre");
			$("#disc-suggestion").slideDown(200).html("<font color='#C58A3A'>To insert code, type in your code between <code>&lt;pre&gt;&lt;/pre&gt;</code> tags.");
			$('#disc-body').focus();
			return false;
		});
	});
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
		$('#insCode').click(function()
		{
			pasteHtmlAtCaret(event,'answer-input');
			//document.execCommand('formatBlock',false,"pre");
			$("#answer-results").slideDown(200).html("<font color='#C58A3A'>To insert code, type in your code between <code>&lt;pre&gt;&lt;/pre&gt;</code> tags.");
			$('#answer-input').focus();
			return false;
		});
	});
});
function changetab(id)
{
	$("#temptab").val(id);
	$(".nav-tabs").removeClass('active');
	$("#"+id).addClass('nav-tabs active');
	$(".disc-body").hide();
	$("#"+id+"-body").show();
	if(id=='startnew')
	{
		$("#search-wrapper").hide();
		if($.cookie("CSAuth")==null)
		{
			changetab('all')
			alert("You must be authorized to do this operation.");
		}
	}
	else
	{
		$("#search-wrapper").show();
	}
}
/*Posting article starts */

function getsuggestions(id)
{
	if(id.length>0)
	{
		$.get("forums/getsuggestions.php",{id: id},function(data)
		{
			if(data=="notfound")
			{
				$("#cat_results").show().html("Not Found");
			}
			else
			{
				$("#cat_results").show().html(data);
			}
		});
	}
	else
	{
		hide_cat_results();
	}
}
function inserttext(txt)
{
	$("#disc-cats").val(txt).focus();
	hide_cat_results();
}
function hide_cat_results()
{
	$("#cat_results").hide().html("");
}
function loadcategories(id)
{
	$.get("forums/allcategories.php",function(data)
	{
		$("#"+id).html(data);
	});
}
function postarticle()
{
	dtitle=$("#disc-title").val();
	dcat=$("#disc-cats").val();
	dkeys=$("#disc-keyws").val();
	dbody=$("#disc-body").html();
	if(dtitle=='')
	{
		$("#disc-suggestion").slideDown(200).html("<font color='red'>Please provide some title for your discussion.</font>");
		$("#disc-title").focus();
		return false;
	}
	else if(dcat=='')
	{
		$("#disc-suggestion").slideDown(200).html("<font color='red'>Please choose the category for your discussion.</font>");
		$("#disc-cats").focus();
		return false;
	}
	else if(dkeys=='')
	{
		$("#disc-suggestion").slideDown(200).html("<font color='red'>Please suggest some keywords for your discussion.</font>");
		$("#disc-keyws").focus();
		return false;
	}
	else if(dbody=='')
	{
		$("#disc-suggestion").slideDown(200).html("<font color='red'>Please type some text or code to post your discussion.</font>");
		$("#disc-body").focus();
		return false;
	}
	else
	{
		$("#disc-suggestion").slideDown(200).show().html("<font color='green'>Processing...</font>");
		$.post("forums/postarticle.php",{ptitle:dtitle,pcat:dcat,pkey:dkeys,pbody:dbody},function(data)
		{
			if(data=='green')
			{
				$("#disc-suggestion").slideDown(200).show().html("<font color='green'>Successfully posted.</font>");
				clearall();
				$("#tempstore").val('forums');
				getarticles('all');
				changetab('all');
				getarticles('solved');
				getarticles('unsolved');
				getarticles('most');
				getarticles('recent');
				//$.post("actions/postactivity.php",{id1:$.cookie('CSAuth'),type:1,id2:null},function(data){});
			}
			else
			{
				$("#disc-suggestion").slideDown(200).show().html("<font color='red'>Something went wrong while processing your request.</font>");
			}
		});
	}
}
function clearall()
{
	$('input').val("");
	$('textarea').val("");
	$("#disc-suggestion").slideUp(200).html("");
}

/*Posting the article ends*/

/*Getting articles starts*/

function getarticles(id)
{
	$("#"+id+"-body").load("forums/get"+id+"articles.php");
}

/*Getting articles ends*/

/*Time calculation*/

function calculatetime(time,id)
{
	var timestamp=time.split(" ");
	var date=timestamp[0];
	var time=timestamp[1];
	var gdate=date.split("-");
	var getyear=gdate[0];
	var getmonth=gdate[1];
	var getdate=gdate[2];
	var gtime=time.split(":");
	var gethour=gtime[0];
	var getmin=gtime[1];
	var getsec=gtime[2];
	var curntyear=new Date().getFullYear();
	var curntmonth=new Date().getMonth()+1;
	var curntdate=new Date().getDate();
	var curnthour=new Date().getHours();
	var curntmin=new Date().getMinutes();
	var curntsec=new Date().getSeconds();
	if(curntyear>getyear)
	{
		var count=curntyear-getyear;
		if(count>1)
		{
			time="Posted "+count+" years ago";
		}
		else
		{
			time="Posted "+count+" year ago";
		}
		$("#"+id).show().html(time);
	}
	else
	{
		if(curntmonth>getmonth)
		{
			var count=curntmonth-getmonth;
			if(count>1)
			{
				time="Posted "+count+" months ago";
			}
			else
			{
				time="Posted "+count+" month ago";
			}
			$("#"+id).show().html(time);
		}
		else
		{
			if(curntdate>getdate)
			{
				var count=curntdate-getdate;
				if(count>1)
				{
					time="Posted "+count+" days ago";
				}
				else
				{
					time="Posted "+count+" day ago";
				}
				$("#"+id).show().html(time);
			}
			else
			{
				if(curnthour>gethour)
				{
					var count=curnthour-gethour;
					if(count>1)
					{
						time="Posted "+count+" hours ago";
					}
					else
					{
						time="Posted an "+count+" hour ago";
					}
					$("#"+id).show().html(time);
				}
				else
				{
					if(curntmin>getmin)
					{
						var count=curntmin-getmin;
						if(count>1)
						{
							time="Posted "+count+" minutes ago";
						}
						else
						{
							time="Posted "+count+" minute ago";
						}
						$("#"+id).show().html(time);
					}
					else
					{
						if(curntsec>getsec)
						{
							var count=curntsec-getsec;
							if(count>1)
							{
								time="Posted "+count+" seconds ago";
							}
							else
							{
								time="Posted "+count+" second ago";
							}
							$("#"+id).show().html(time);
						}
						else if(curntsec==getsec)
						{
							$("#"+id).html("0 seconds ago");
						}
						else
						{
							alert('Error 302: Problem with time settings for this Post.');
						}
					}
				}
			}
		}
	}
}

/*Time calculation*/

function showquestion(id)
{
	$("#qorg-id").val(id);
	sqid=id.split("|");
	catid=sqid[0];
	postid=sqid[1];
	views=sqid[2];
	views++;
	$("#post-catid").val(catid);
	$("#post-id").val(postid);
	$("#views-count").val(views);
	$("#post-views").html(views);
	$("#voting_td").html("<input id='quv' type='image' src='images/up_big.png' title='Upvote' onclick=\"vote(catid,postid,'null','question','1')\"><div id='voting' style='padding: 5px;font-weight:bold;font-size:34px;'>0</div><input id='qdv' type='image' src='images/down_big.png' title='Downvote' onclick=\"vote(catid,postid,'null','question','0')\">");
	usr=$.cookie("CSAuth");
	$.post("forums/getquestion.php",{catid: catid, qid: postid, user: usr},function(data)
	{
		totaldata=data.split("````");
		ptitle=totaldata[0];
		pbody=totaldata[1];
		pbody=pbody.replace(/&amp;/g,"&");
		pbody=pbody.replace(/&amp;lt;pre&amp;gt;/g,"<pre>");
		pbody=pbody.replace(/&amp;lt;\/pre&amp;gt;/g,"</pre>");
		pbody=pbody.replace(/&lt;pre&gt;/g,"<pre>");
		pbody=pbody.replace(/&lt;\/pre&gt;/g,"</pre>");
		pbody=pbody.replace(/&lt;br&gt;/g,"<br>");
		pbody=pbody.replace(/&lt;b&gt;/g,"<b>");
		pbody=pbody.replace(/&lt;\/b&gt;/g,"</b>");
		pbody=pbody.replace(/&lt;i&gt;/g,"<i>");
		pbody=pbody.replace(/&lt;\/i&gt;/g,"</i>");
		pbody=pbody.replace(/&lt;u&gt;/g,"<u>");
		pbody=pbody.replace(/&lt;\/u&gt;/g,"</u>");
		pbody=pbody.replace(/&lt;span style=&quot;/g,"<span style=\"");
		pbody=pbody.replace(/&lt;\/span&gt;/g,"</span>");
		pbody=pbody.replace(/&lt;a/g,'<a');
		pbody=pbody.replace(/href=&quot;/g,"href=\"");
		pbody=pbody.replace(/&quot;&gt;/g,'\">');
		pbody=pbody.replace(/&amp;lt;img src=&quot;/g,"<img src=\"");
		pbody=pbody.replace(/alt=&quot;/g,'alt=\"');		
		pbody=pbody.replace(/ng&quot;/g,'ng\"');				
		pbody=pbody.replace(/ng\"&amp;gt;/g,'ng">');
		pbody=pbody.replace(/&amp;quot;&amp;gt;/g,'\">');
		pbody=pbody.replace(/&lt;\/a&gt;/g,"</a>");
		pbody=pbody.replace(/&lt;ol&gt;/g,"<ol>");
		pbody=pbody.replace(/&lt;\/ol&gt;/g,"</ol>");
		pbody=pbody.replace(/&lt;ul&gt;/g,"<ul>");
		pbody=pbody.replace(/&lt;\/ul&gt;/g,"</ul>");
		pbody=pbody.replace(/&lt;li&gt;/g,"<li>");
		pbody=pbody.replace(/&lt;\/li&gt;/g,"</li>");
		pbody=pbody.replace(/&amp;nbsp;/g,"\ ");
		ptime=totaldata[2];
		puser=totaldata[3];
		pcategory=totaldata[4];
		pviews=totaldata[5];
		panswered=totaldata[6];
		pvotes=totaldata[7];
		if(panswered==0)
		{
			$("#answered-status").html("<img src='images/unanswered.png'>");
		}
		else
		{
			$("#answered-status").html("<img src='images/answered.png'>");
		}
		$("#post-views").html(pviews);
		$("#views-count").val(pviews);
		calculatetime(ptime,'posted-time');
		$("#voting").html(pvotes);
		$("#getqtitle").html(ptitle);
		$("#qmetadata").html("Posted by "+puser+" in "+pcategory);
		$("#nav-cat-title").html(" <img src='images/go.png'>  <span style='cursor:pointer;' onclick=\"loadcategory('"+catid+"')\">"+pcategory+"</span>");
		$("#getqbody").html(pbody);
		show_instant_answer(catid,postid);
		$("#disc-nav-tabs").hide();
		$("#disc-nav-body").hide();
		$("#getdesiredpost").slideDown();
	});
}
function reply()
{
	$("#answer-input").focus();
}
function replyquestion()
{
	id=$("#qorg-id").val();
	auth=$.cookie("CSAuth");
	if(auth==null)
	{
		alert("Please login to reply a discussion")
	}
	else
	{
		usr=$.cookie('CSAuth');
		answer=$("#answer-input").html();
		if(answer=="")
		{
			$("#answer-input").focus().css("background-color","#fff0f0");
			$("#answer-results").slideDown(200).removeClass("answer_green").addClass("answer_red").html("Please Enter some text or code to reply this discussion.");
		}
		else
		{
			$("#answer-input").prop("disabled", true).css("background-color","#fcfcfc").css("color","#919191");
			$("#answer-results").addClass("answer_green").html("Posting your answer...").slideDown(200);
			catid=$("#post-catid").val();
			postid=$("#post-id").val();
			$.post("forums/postanswer.php",{catid: catid, qid: postid, answer: answer, usr: usr},function(signal)
			{
				if(signal=="green")
				{
					$("#answer-results").removeClass("answer_red").addClass("answer_green").html("Successfully answered to the question.").delay(2000).fadeOut('slow');
					$("#answer-input").html("").prop("disabled", false).css("background-color","white").css("color","#484848");
					$("#adata").show().slideDown(200);
					show_instant_answer(catid,postid);
				}
				else
				{
					$("#answer-results").removeClass("answer_green").addClass("answer_red").html("Error occured, while posting your answer. Please try again.");
					$("#adata").show().slideDown(200);
					show_instant_answer(catid,postid);
				}
			});
		}
	}
}

function show_instant_answer(catid,postid)
{
	$.post("forums/getanswers.php",{catid: catid, qid: postid},function(data)
	{
		if(data=="red")
		{
			var loopcount=0;
			$("#adata").hide();
			$("#answercount").val(loopcount);
			$("#total_ans_count").html(0);
		}
		else
		{
			$("#adata").html("");
			var totaldata=data.split("*");
			var loopcount=totaldata.length;
			$("#answercount").val(loopcount);
			$("#total_ans_count").html(loopcount-1);
			for(var i=1; i<=loopcount; i++)
			{
				adata=totaldata[i].split("|");
				userinfo=adata[0];
				atime=adata[1];
				answer=adata[2];
				answer=answer.replace(/&amp;/g,"&");
				answer=answer.replace(/&amp;lt;pre&amp;gt;/g,"<pre>");
				answer=answer.replace(/&amp;lt;\/pre&amp;gt;/g,"</pre>");
				answer=answer.replace(/&lt;pre&gt;/g,"<pre>");
				answer=answer.replace(/&lt;\/pre&gt;/g,"</pre>");
				answer=answer.replace(/&lt;br&gt;/g,"<br>");
				answer=answer.replace(/&lt;b&gt;/g,"<b>");
				answer=answer.replace(/&lt;\/b&gt;/g,"</b>");
				answer=answer.replace(/&lt;i&gt;/g,"<i>");
				answer=answer.replace(/&lt;\/i&gt;/g,"</i>");
				answer=answer.replace(/&lt;u&gt;/g,"<u>");
				answer=answer.replace(/&lt;\/u&gt;/g,"</u>");
				answer=answer.replace(/&lt;span style=&quot;/g,"<span style=\"");
				answer=answer.replace(/&lt;\/span&gt;/g,"</span>");
				answer=answer.replace(/&lt;a/g,'<a');
				answer=answer.replace(/href=&quot;/g,"href=\"");
				answer=answer.replace(/&amp;lt;img/g,"<img");
				answer=answer.replace(/&quot;&gt;/g,'\">');
				answer=answer.replace(/&lt;\/a&gt;/g,"</a>");
				answer=answer.replace(/&lt;ol&gt;/g,"<ol>");
				answer=answer.replace(/&lt;\/ol&gt;/g,"</ol>");
				answer=answer.replace(/&lt;ul&gt;/g,"<ul>");
				answer=answer.replace(/&lt;\/ul&gt;/g,"</ul>");
				answer=answer.replace(/&lt;li&gt;/g,"<li>");
				answer=answer.replace(/&lt;\/li&gt;/g,"</li>");
				answer=answer.replace(/&amp;nbsp;/g,"\ ");
				ansid=adata[3];
				rightanswer=adata[4];
				markedby=adata[5];
				votes=adata[6];
				if(rightanswer==0)
				{
					insertcode ="<tr><td style='background: #214b7e;font-size:14px;'><input type='hidden' id='aid"+i+"' value='"+ansid+"'>";
					insertcode +="<div id='avotes"+i+"' class='divs big'></div><div class='divs' style='border-right:1px solid white;margin-right:20px;'><input id='auv"+i+"' type='image' src='images/up.png' title='Upvote' onclick=\"vote(catid,postid,'aid"+i+"','ans','1','"+i+"')\"><br><input id='adv"+i+"' type='image' src='images/down.png' title='Downvote' onclick=\"vote(catid,postid,'aid"+i+"','ans','0','"+i+"')\"></div>";
					insertcode +="<div id='atime"+i+"' class='divs'></div>";
					insertcode +="<div id='auserid"+i+"' class='divs'></div>";
					insertcode +="<div id='mas'><span id='markedas"+i+"' class='mdby'>&nbsp;</span><span id='opt"+i+"'><span class='markas' id='markas"+i+"' onclick=\"markasanswer(catid,postid,'aid"+i+"',"+i+");\" title='Click here if you think this is the Correct Answer'>Mark as Answer</span></span></div>";
					insertcode +="</td></tr>";
					insertcode +="<tr><td id='getabody"+i+"' class='getabody'><input type='hidden' id='answid'></td></tr><tr><td>&nbsp;</td></tr>";
				}
				else
				{
					insertcode ="<tr><td style='background: #214b7e;font-size:14px;'><input type='hidden' id='aid"+i+"' value='"+ansid+"'>";
					insertcode +="<div id='avotes"+i+"' class='divs big'></div><div class='divs' style='border-right:1px solid white;margin-right:20px;'><input id='auv"+i+"' type='image' src='images/up.png' title='Upvote' onclick=\"vote(catid,postid,'aid"+i+"','ans','1','"+i+"')\"><br><input id='adv"+i+"' type='image' src='images/down.png' title='Downvote' onclick=\"vote(catid,postid,'aid"+i+"','ans','0','"+i+"')\"></div>";
					insertcode +="<div id='atime"+i+"' class='divs'></div>";
					insertcode +="<div id='auserid"+i+"' class='divs'></div>";
					insertcode +="<div id='mas'><span id='markedas"+i+"' class='mdby'>Marked as Answer by "+markedby+" &rarr;&nbsp;</span><span id='opt"+i+"'><span title='Click here if you think this is not the Correct Answer' class='markas' id='markas"+i+"' onclick=\"unmarkasanswer(catid,postid,'aid"+i+"',"+i+");\">Unmark as Answer</span></span></div>";
					insertcode +="</td></tr>";
					insertcode +="<tr><td id='getabody"+i+"' class='getabody'><input type='hidden' id='answid'></td></tr><tr><td>&nbsp;</td></tr>";
				}
				$("#adata").show().append(insertcode);
				$("#auserid"+i).html("By "+userinfo);
				$("#avotes"+i).html(votes);				
				calculatetime(atime,"atime"+i);
				$("#getabody"+i).html(answer);
			}
		}
	});
}
function vote(catid,qid,aid,ptype,vtype,i)
{
	ansid=$("#"+aid).val();
	usr=$.cookie('CSAuth');
	if(usr==null)
	{
		alert("You must be logged in to do this operation.")
	}
	else
	{
		$("input").prop("disabled",true);
		$.post("forums/getvoters.php",{catid: catid, qid: postid, aid: ansid, ptype: ptype, usr: usr},function(data)
		{
			if(data==null)
			{
				$.post("forums/ans_vote.php",{catid: catid, qid: postid, aid: ansid, usr: usr, ptype: ptype, vtype: vtype},function(signal)
				{
					if(signal=='green')
					{
						$.post("forums/getqvotes.php",{qid: postid},function(data)
						{
							$("#voting").html(data);
						});
						show_instant_answer(catid,postid);
					}
					else
					{
						alert("Something went wrong while processing your request.");
					}
				});
			}
			else
			{
				voters=data.split("``");
				for(var i=0;i<voters.length;i++)
				{
					if(usr==voters[i])
					{
						alert("You can not vote again.");
						return false;
					}
					else
					{
						$.post("forums/ans_vote.php",{catid: catid, qid: postid, aid: ansid, usr: usr, ptype: ptype, vtype: vtype},function(signal)
						{
							if(signal=='green')
							{
								$.post("forums/getqvotes.php",{qid: postid},function(data)
								{
									$("#voting").html(data);
								});
								show_instant_answer(catid,postid);
							}
							else
							{
								alert(signal)
							}
						});
					}
				}
			}
		});
		$("input").prop("disabled",false);
	}
}
function markasanswer(catid,qid,aid,i)
{
	ansid=$("#"+aid).val();
	usr=$.cookie('CSAuth');
	if(usr==null)
	{
		alert("You must be logged in to do this operation.")
	}
	else
	{
		$.post("forums/markasanswer.php",{catid: catid, qid: postid, aid: ansid, usr: usr},function(data)
		{
			if(data=="green")
			{
				$("#markedas"+i).html("Marked as Answer by "+usr+" &rarr;&nbsp;");
				$("#opt"+i).html("<span title='Click here if you think this is not the Correct Answer' id='markas"+i+"' onclick=\"unmarkasanswer(catid,postid,'aid"+i+"',"+i+");\">Unmark as Answer</span>");
				$("#answered-status").html("<img src='images/answered.png'>");
			}
			else
			{
				alert("An unexpected error occured while processing your request.");
			}
		});	
	}
}
function unmarkasanswer(catid,qid,aid,i)
{
	ansid=$("#"+aid).val();
	usr=$.cookie('CSAuth');
	if(usr==null)
	{
		alert("You must be logged in to do this operation.")
	}
	else
	{
		$.post("forums/unmarkasanswer.php",{catid: catid, qid: postid, aid: ansid, usr: usr},function(signal)
		{
			if(signal=="green")
			{
				show_instant_answer(catid,postid);
				$.post("forums/checkanswered.php",{catid: catid, qid: postid, aid: ansid, usr: usr},function(data)
				{
					if(data==0)
					{
						$("#answered-status").html("<img src='images/unanswered.png'>");
					}
					else
					{
						
					}
				});
			}
			else
			{
				alert("An unexpected error occured while processing your request.");
			}
		});
	}
}
function loadcategory(id)
{
	$("#getdesiredpost").hide();
	$("#disc_search_key").val("");
	$("#search-body").hide();
	$("#disc-nav-tabs").show();
	$("#disc-nav-body").show();
	$("#all-body").html("<center><img src='images/loading.gif'></center>").load("forums/getuserallcats.php?id="+id);
	$("#solved-body").html("<center><img src='images/loading.gif'></center>").load("forums/getusersolvedcats.php?id="+id);
	$("#unsolved-body").html("<center><img src='images/loading.gif'></center>").load("forums/getuserunsolvedcats.php?id="+id);
	$("#most-body").html("<center><img src='images/loading.gif'></center>").load("forums/getusermostcats.php?id="+id);
	$("#recent-body").html("<center><img src='images/loading.gif'></center>").load("forums/getuserrecentcats.php?id="+id);
}
function search_disc()
{
	$("#disc_search_key").keyup(function(event)
	{
		if(event.which!=0)
		{
			key=$("#disc_search_key").val();
			if(key.length>0)
			{
				$(".disc-body").hide();
				$("#search-body").show().html("<center>Searching...</center>");
				$.post("forums/searchforums.php",{key: key},function(data)
				{
					$("#search-body").html(data);
				});
			}
			else
			{
				//
			}
		}
	});
}