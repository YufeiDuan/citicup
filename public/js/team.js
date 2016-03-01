var team_name;
var team_title;
window.onload=function(){
	$('#choose').modal('hide');
	$("#team_name").attr("disabled","disabled");
	$("#team_title").attr("disabled","disabled");
	$("#btn_upload").hide();
	$('#save').hide();
	$('#cancel').hide();
	$('#school-name').attr("disabled","disabled");
	$('#school-name').removeAttr("onclick");
	$('.tips').hide();
	team_name = $("#team_name").attr('value');
	team_title = $("#team_title").attr('value');
	school_name = $("#school-name").attr('value');
	$("#btn_upload").bind("click",function(){
        $("#upload_modal").show();
    });

    var bar = $('.bar');
    var percent = $('.percent');
    var progress = $(".progress");
    var files = $(".files");
    var btn = $(".btn span");
    var freq = $('#freq').val();
    var state = $('#state');


    files.bind('DOMNodeInserted', function(e) { 
        var content = $(e.target).text();
        var len = (content.toString()).length;
        if(len>500){
            //files.html("请刷新页面重试");
        }
    }); 
    $("#fileupload").change(function(){
        $("#myupload").ajaxSubmit({
            dataType:  'json',
            beforeSend: function() {
                progress.show();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
                btn.html("上传中...");
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            success: function(data) {
                files.html("<b>上传成功："+data.name+"("+data.size+"KB)</b>");
                

                btn.html("选择图片");
            },
            error:function(xhr){
                btn.html("上传失败");
                bar.width('0');
                files.html(xhr.responseText);
            }
        });
    });
}
var tag=1;

function display(){
	if(tag==1){
		$("#team_name").attr("disabled",false);
		$("#team_title").attr("disabled",false);
		$("#btn_upload").show();
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
		$("#school-name").val(school_name);
		$("#btn_upload").hide();
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
	if(confirm( '确认删除？ ')==false){
		return false;
	}
	return true;
}

function delconfirm(){
	if(confirm( '确认删除？ ')==false){
		return false;
	}
	return true;
}

function hideupload(){
	$("#upload_modal").hide();
	//self.location.reload();
	n = Math.random(100);
	$("#logo").attr("src","/logo/"+n);
}