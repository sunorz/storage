// event 
// Copyright by Sunplace
$(function(){
		$(".event").click(function(){
			var x = $(this).children("i").attr("class");
			if(x=="fa fa-angle-down")
				{
					$(this).children("i").attr("class","fa fa-angle-up");
				}
			else
				{
					$(this).children("i").attr("class","fa fa-angle-down");
				}

			$(".event_p").slideToggle();
		});
});