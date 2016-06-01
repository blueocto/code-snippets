$("p").mouseup(function(){
	$(this).append('<span style="color:#F00;">Mouse up.</span>');
}).mousedown(function(){
	$(this).append('<span style="color:#00F;">Mouse down.</span>');
});