var team_name;
var team_title;
window.onload=function(){
	$("#team_name").attr("disabled","disabled");
	$("#team_title").attr("disabled","disabled");
	$("#upload").hide();
	$('.hrefselect a').hide();
	$('#save').hide();
	team_name = $("#team_name").attr('value');
	team_title = $("#team_title").attr('value');
}
var tag=1;

function display(){
	if(tag==1){
		$("#team_name").attr("disabled",false);
		$("#team_title").attr("disabled",false);
		$("#upload").show();
		$('.hrefselect a').show();
		$('#save').show();
		tag=0;
	}else{
		$("#team_name").attr("disabled","disabled");
		$("#team_title").attr("disabled","disabled");
		$("#team_name").val(team_name);
		$("#team_title").val(team_title);
		$("#upload").hide();
		$('.hrefselect a').hide();
		$('#save').hide();
		tag=1;
	}
	
}