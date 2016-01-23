$(document).ready(function()
{
	loadtab("view_all");
	loadfirstdiv();
	getallresources();
	setInterval(function(){getallresources();},120000)
});
function getallresources()
{
	get_resources('e1');
	get_resources('e2');
	get_resources('e3');
	get_resources('pro');
	get_resources('sw');
	get_resources('other');
}
function loadtab(id)
{
	$(".tabs").css("border","none").css("background","none");
	$(".tabs_target").hide();
	$("#"+id).css("border","1px dotted rgba(0,0,0,0.1)").css("border-right","none").css("background","#e0e6f6");
	$("#"+id+"_target").show();
}
function changebg(id)
{
	var divid=$(id).attr("id");
	$(".desc-body").hide();
	$("#"+divid+"-body").show();
	$(".category").css("background-color","#e8e8e8").css("border-bottom-color","#e8e8e8");
	$("#"+divid).css("background-color","white").css("border-bottom-color","white");
}
function loadfirstdiv()
{
	changebg('e3');
	$(".desc-body").hide();
	$("#e3-body").show();
	$("#e3").css("background-color","white").css("border-bottom-color","white");
}
function get_resources(id)
{
	$("#"+id+"-body").html("<center>Loading...</center>");
	$.post("actions/get_resources.php",{id:id},function(data)
	{
		$("#"+id+"-body").html(data);
	});
}
function loadallresource()
{
	$("#view_all_target").load('actions/get_resources.php');
}
function get_sub()
{
	alert("1")
	var txt="<option>select</option>";
	var id=$("#category").val();
	$.get("actions/getlist.php",{id: id},function(result)
	{
		$("#sub").html(txt+result);
	});	
}
function getresourcelist()
{
	category=$("#category").val();
	subject=$("#sub").val();
	if(category==null||subject==null)
	{return false;}
	else
	{
		$.post("actions/getresourcelist.php",{cate:category,sub:subject},function(data)
		{
			$("#list").html(data);
		});
	}
}