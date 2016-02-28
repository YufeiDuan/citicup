$(function () {
	$('.mainmenu').bind("click",function(e){
		//alert(this);
		var p = $(this).parent();

		$("#menu li").removeClass("active");

		p.addClass("active");
		location.href = this;
	});
	$("a:not(.mainmenu)").bind("click",function(e){
		location.href=this;
	});
	
    $('#menu').affix({
        offset: {
            top: $('#menu').offset().top,
            bottom: $('footer').outerHeight(true)  + 40
        }
    });
    
});