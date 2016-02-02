var team_name;
var team_title;
window.onload=function(){
	$("#team_name").attr("disabled","disabled");
	$("#team_title").attr("disabled","disabled");
	$("#upload").hide();
	$('#save').hide();
	$('#cancel').hide();
	$('#school-name').attr("disabled","disabled");
	$('#school-name').removeAttr("onclick");
	$('.tips').hide();
	team_name = $("#team_name").attr('value');
	team_title = $("#team_title").attr('value');
	school_name = $("#school-name").attr('value');
}
var tag=1;

function display(){
	if(tag==1){
		$("#team_name").attr("disabled",false);
		$("#team_title").attr("disabled",false);
		$("#upload").show();
		$('#save').show();
		$('#cancel').show();
		$("#school-name").attr("disabled",false);
		$('#school-name').attr("onclick","pop()");
		$('.tips').show();
		tag=0;
	}else{
		$("#team_name").attr("disabled","disabled");
		$("#team_title").attr("disabled","disabled");
		$("#team_name").val(team_name);
		$("#team_title").val(team_title);
		$("#upload").hide();
		$('#save').hide();
		$('#cancel').hide();
		$('.tips').hide();
		$('#school-name').attr("disabled","disabled");
		$('#school-name').removeAttr("onclick");
		tag=1;
	}
	
}

function save(){
	team_name = $("#team_name").attr('value');
	team_title = $("#team_title").attr('value');
	school_name = $("#school-name").attr('value');
}

function check(){
	var type=formchange.upload.value.match(/^(.*)(\.)(.{1,8})$/)[3];
	type=type.toUpperCase();
	if(type=="JPG" || type=="JPEG" || type=="PNG"){
	   return true;
	}
	else{
	   alert("请选择jpg,jpeg,png类型图片");
	   return false;
	}
}

function delcheck(){
	var teacher_count = $('#teacher_count').val();
	if(teacher_count<2){
		alert('请保留至少一名指导老师');
		return false;	
	}
	return true;

}