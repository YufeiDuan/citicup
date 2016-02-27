$(function () {
	$('.mainmenu').bind("click",function(){
		var p = $(this).parent();

		$("#menu li").removeClass("active");

		p.addClass("active");
	});
});