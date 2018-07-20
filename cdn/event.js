// event 
// Copyright by Sunplace
$(function(){
		$(".event").click(function(){
			$(this).children("i").toggleClass("fa fa-angle-up");
			$(this).next("div").slideToggle();
		});
});