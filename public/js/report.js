function lenOfIntroduction(val){
    var wom = val.match(/\S+/g);
    return {
        charactersNoSpaces : val.replace(/\s+/g, '').length,
        characters         : val.length,
        words              : wom ? wom.length : 0,
        lines              : val.split(/\r*\n/).length
    };
}

$(function () {
    $("#title").attr("disabled","disabled");
    $(".introduction").attr("disabled","disabled");
    $('#save').hide();
    $('#cancel').hide();
    $('#save2').hide();
    $('#cancel2').hide();
    $('.tips').hide();
    var bar = $('.bar');
    var percent = $('.percent');
    var progress = $(".progress");
    var files = $(".files");
    var btn = $(".btni span");
    var freq = $('#freq').val();
    var state = $('#state');
    var fileupload = $('#fileupload');
    var chn_info = $('#chn_info');
    var eng_info = $('#eng_info');
    if(freq==0){
        btn.hide();
        $('#freqli').html("今日提交次数达到上限，请明日再试。");
    }
    if(freq==-1){
        $('#freqli').hide();
    }
    else{
        $('#freqli').show();
    }
    files.bind('DOMNodeInserted', function(e) { 
        var content = $(e.target).text();
        var len = (content.toString()).length;
        if(len>500){
            //files.html("请刷新页面重试");
        }
    });
    fileupload.change(function(){
        $("#myupload").ajaxSubmit({
            dataType:  'json',
            beforeSend: function() {
                progress.show();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
                btn.html("上传中...");
                fileupload.attr("disabled","disabled");
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            success: function(data) {
                files.html("<b>上传成功："+data.name+"("+data.size+"KB)</b>");
                state.html("当前项目报告状态： "+data.time+" 已提交"+data.type+"类型文件");
                var freq = $('#freq').val();
                if(freq==-1){
                    $('#freqli').hide();
                    $('#freqli').html("");
                }else{
                    freq -=1;
                    $('#freq').val(freq);
                    $('#freqli').show();
                    $('#freqli').html("今日剩余上传次数："+freq);
                }
                if(freq==0){
                    btn.hide();
                    $('#freqli').show();
                    $('#freqli').html("今日提交次数达到上限，请明日再试。");
                }
                
                fileupload.removeAttr("disabled");
                btn.html("添加附件");
            },
            error:function(xhr){
                btn.html("上传失败");
                fileupload.removeAttr("disabled");
                bar.width('0');
                files.html(xhr.responseText);
            }
        });
    });
    $("#chn").bind('input propertychange', function() {
        var chn = this.value;
        var lenc = chn.length;
        chn_info.html(lenc);

    });
    $("#eng").bind('input propertychange', function() {
        var eng = this.value;
        var len = lenOfIntroduction(eng);
        eng_info.html(len.words);
        if(len.words>200){
            alert("英文简介词数过多，请删减！");
        }
    });
    
});
var tag=1;
function display(){
    if(tag==1){
        $("#title").attr("disabled",false);
        $('#save').show();
        $('#cancel').show();
        $('.tips').show();
        tag=0;
    }else{
        $("#title").attr("disabled","disabled");
        $('#save').hide();
        $('#cancel').hide();
        $('.tips').hide();
        tag=1;
    }
}
var tag2=1;
function display2(){
    if(tag2==1){
        $(".introduction").attr("disabled",false);
        $('#save2').show();
        $('#cancel2').show();
        $('.tips').show();
        tag2=0;
    }else{
        $(".introduction").attr("disabled","disabled");
        $('#save2').hide();
        $('#cancel2').hide();
        $('.tips').hide();
        tag2=1;
    }
}
//弹出窗口
function pop(){
    $('#upload_modal').modal('show');

}
function hide()
{
    window.location.reload();
    //$('#choose-box-wrapper').css("display","none");

}
