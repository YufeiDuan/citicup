$(function () {
    $("#title").attr("disabled","disabled");
    $('#save').hide();
    $('#cancel').hide();
    $('.tips').hide();
    var bar = $('.bar');
    var percent = $('.percent');
    var showimg = $('#showimg');
    var progress = $(".progress");
    var files = $(".files");
    var btn = $(".btn span");
    $("#fileupload").change(function(){
        $("#myupload").ajaxSubmit({
            dataType:  'json',
            beforeSend: function() {
                showimg.empty();
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
                files.html("<b>上传成功："+data.name+"("+data.size+"k)</b>");
                
                btn.html("添加附件");
            },
            error:function(xhr){
                btn.html("上传失败");
                bar.width('0')
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