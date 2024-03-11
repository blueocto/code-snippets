// find the width to match the height for lovely boxes!
function findWidth() {
    var myItem = document.querySelectorAll('.make-me-square'); 

    // not entirely sure why its 585px and not 600px, but hey
    if($(window).width() < 585) {
        // do nothing
    } else {
        // loop through each item found
        $(myItem).each(function(){
            // grab the width of the current item in the loop
            var width = $(this).width();
            // apply the width as the height, making it a lovely box!
            $(this).height(width);
        });
    }
}
// Execute on load
$(document).ready(findWidth);	
// Bind event listener
$(window).resize(findWidth);
