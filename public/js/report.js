$(function () {
    $("#title").attr("disabled","disabled");
    $('#save').hide();
    $('#cancel').hide();
    $('.tips').hide();
    var bar = $('.bar');
    var percent = $('.percent');
    var progress = $(".progress");
    var files = $(".files");
    var btn = $(".btn span");
    var freq = $('#freq').val();
    var state = $('#state');
    if(freq==0){
        $('.btn').hide();
        $('#freqinfo').html("今日提交次数达到上限，请明日再试。");
    }
    if(freq==-1){
        $('#freqinfo').html("");
    }
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
                state.html("当前项目报告状态： "+data.time+" 已提交"+data.type+"类型文件");
                var freq = $('#freq').val();
                if(freq==-1){
                    $('#freqinfo').html("");
                }else{
                    freq -=1;
                    $('#freq').val(freq);
                    $('#freqinfo').html("今日剩余上传次数："+freq);
                }
                if(freq==0){
                    $('.btn').hide();
                    $('#freqinfo').html("今日提交次数达到上限，请明日再试。");
                }
                

                btn.html("添加附件");
            },
            error:function(xhr){
                btn.html("上传失败");
                bar.width('0');
                files.html(xhr.responseText);
            }
        });
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