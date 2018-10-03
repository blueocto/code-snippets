// find the width to match the height for lovely boxes!
// function var ele should be the class or id selector that the code should execute on. Default is .make-me-square
function matchWH(ele) {
	var myItem = document.querySelectorAll(ele); 
    
	//loop through each item found
	$(myItem).each(function(){
    
		//grab the width of the current item in the loop
		var width = $(this).width();
		//apply the width as the height, making it a lovely box!
		$(this).height(width);
        
	});
    
}

// Execute on load
$(document).ready( matchWH('.make-me-square') );	
// Bind event listener
$(window).resize( matchWH('.make-me-square') );