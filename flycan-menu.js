
$(function(){
	
	var MENU = $("#BOX li a");
	
	MENU.hover(function(){
		$(this).stop(true,false).animate({top:-5},800,"easeOutBounce");
	},function(){
		$(this).stop(true,false).animate({top:-250},1000,"easeOutBack");
	});
	
});

