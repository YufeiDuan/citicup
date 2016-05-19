$(function () {
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
            files.html("请刷新页面重试");
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
});

function hideupload(){
	$("#upload_modal").hide();
	//self.location.reload();
	n = Math.random(100);
	$("#logo").attr("src","/logo/"+n);
}

function check(){
	var type=formchange.upload.value.match(/^(.*)(\.)(.{1,8})$/)[3];
	type=type.toUpperCase();
	if(type=="JPG" || type=="JPEG" || type=="PNG"){
		alert(1);
	   return true;
	}
	else{
	   alert("请选择jpg,jpeg,png类型图片");
	   return false;
	}
}

//增加身份证验证
function checkid(){
    var　sId = add.id_num.value;
    var flag=0;
    //alert(sId);
    var aCity = { 11: "北京", 12: "天津", 13: "河北", 14: "山西", 15: "内蒙古", 21: "辽宁", 22: "吉林", 23: "黑龙江 ", 31: "上海", 32: "江苏", 33: "浙江", 34: "安徽", 35: "福建", 36: "江西", 37: "山东", 41: "河南", 42: "湖北 ", 43: "湖南", 44: "广东", 45: "广西", 46: "海南", 50: "重庆", 51: "四川", 52: "贵州", 53: "云南", 54: "西藏 ", 61: "陕西", 62: "甘肃", 63: "青海", 64: "宁夏", 65: "新疆", 71: "台湾", 81: "香港", 82: "澳门", 91: "国外 " }
    var iSum = 0;
    var info = "";
    sId = sId.replace(/x$/i, "a");
    if (aCity[parseInt(sId.substr(0, 2))] == null){
    flag=1;
    }
    sBirthday = sId.substr(6, 4) + "-" + Number(sId.substr(10, 2)) + "-" + Number(sId.substr(12, 2));
    var d = new Date(sBirthday.replace(/-/g, "/"))
    if (sBirthday != (d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate())){
    flag=1;
    }
    for (var i = 17; i >= 0; i--) iSum += (Math.pow(2, i) % 11) * parseInt(sId.charAt(17 - i), 11)
    if (iSum % 11 != 1){
    
    flag=1;
    }
    if(flag==1){
        $('#id_info').text("身份证号码不正确");
        $('#id_num').focus();
        return false;
    }
    //alert(aCity[parseInt(sId.substr(0, 2))] + "," + sBirthday + "," + (sId.substr(16, 1) % 2 ? "男" : "女"));
    $('#id_info').text("");
    return true;
}