$(function () {
    str = window.location.href;
    if(str.indexOf("team")!=-1||str.indexOf("member")!=-1||str.indexOf("teacher")!=-1){
        $("#menu_team").attr("class","active");
    }
    if(str.indexOf("report")!=-1){
        $("#menu_report").attr("class","active");
    }
    if(str.indexOf("document")!=-1){
        $("#menu_document").attr("class","active");
    }
    if(str.indexOf("rate")!=-1){
        $("#menu_rate").attr("class","active");
    }
});