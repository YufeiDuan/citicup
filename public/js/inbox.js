$(function () {
    $('#mail').modal('hide');
    $("#checkAll").change(function() {
        if ($("#checkAll").is(":checked")) {
            $("[name = chkItem]:checkbox").prop("checked", true);
        }else{
            $("[name = chkItem]:checkbox").prop("checked", false);
        }
    });
});

function checkchange(){
    var checked=true;
    $("[name = chkItem]:checkbox").each(function () {
        if (!$(this).is(":checked")) {
            checked=false;
        }
    });
    if(checked){
        $("#checkAll").prop("checked", true);
    }else{
        $("#checkAll").prop("checked", false);
    }
}

function getChecked(){
    var result = new Array();
        $("[name = chkItem]:checkbox").each(function () {
            if ($(this).is(":checked")) {
                result.push($(this).attr("value"));
            }
        });

        alert(result.join(","));
}

function viewmail(){
    $('#mail').modal('show');
}