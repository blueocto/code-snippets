
var tableOffset = $("#tableID").offset().top;
var $header = $("#tableID > thead").clone();
var $fixedHeader = $("#header-fixed").append($header);

$(window).bind("scroll", function() {
	var offset = $(this).scrollTop();
	
	if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
		$fixedHeader.show();
	}
	else if (offset < tableOffset) {
		$fixedHeader.hide();
	}
});
$("#header-fixed th").each(function(index){
	var index2 = index;
	$(this).width(function(index2){
		return $("#tableID th").eq(index).width();
	});
});


/* In your HTML

<table id="header-fixed"></table>

*/