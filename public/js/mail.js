$(function () {
    str = window.location.href;
    if(str.indexOf("outbox")!=-1){
        $("#outbox").attr("class","active");
    }
    else if(str.indexOf("view")!=-1){
        back = $("#back").attr("href");
        if(back.indexOf("outbox")!=-1){
        	$("#outbox").attr("class","active");
        }else{
        	$("#inbox").attr("class","active");
        }
    }
    else{
        $("#inbox").attr("class","active");
    }
});

function write(){
	$('#mail').modal('show');
}

function cancel(){
	$('#subject').val('');
	$('#content').val('');
	$('#mail').modal('hide');
}