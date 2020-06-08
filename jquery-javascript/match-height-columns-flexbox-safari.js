// because Safari v10.1.2 doesn't accept 100% when Flexbox is in use
// Let's detected tallest height of content within the Columns, and match them
// function works when two options per line require the same height. Can be adpated to work with more than 2 items by modifying the for loop increment and the if statement that calculates the biggest size.
function matchPosts() {
	// set the class that you have applied to your elements.
	var className = 'card:not(.small)';

	// find all instances of match height. Assumes two items per match height line.
	var articles = document.getElementsByClassName(className);
	
	// loop through all instances, increasing by 2 each time, equal to running a for-loop for the first element in each row.
	if(articles.length > 1) {

		for (let i = 0; i < articles.length; i += 2) {
			// get the next element in the row and store it as x.
			var x = i + 1;
			// minimimum screen width to start applying match height
			var minWidth = 600;
			// remove any height style that may be applied already (avoids conflicts on screen resize)
			articles[i].style.removeProperty('height');
			articles[x].style.removeProperty('height');
			// get the height of both elements in row
			var y = articles[i].clientHeight;
			var z = articles[x].clientHeight;
			// only apply the match height styles if its above or equal to the minimum width set
			if($(window).width() >= minWidth) { 
				// checks to see which element is bigger, and applys the biggest height to the smallest element
				if (z > y) {
					articles[i].style.height = z + "px";
				} else {
					articles[x].style.height = y + "px";
				}
			}
		}
	}
};

// run the resize code on load, and on every screen resize. This avoids height elements becoming massive as content in boxes change.
// window.onload = function() {
	// Safari equal height fix
	// if ( $( ".card" ).length ) {
	// if(articles.length > 1) {
		// matchPosts();
	// };
	// }
// };

window.onresize = function() {
	// Safari equal height fix
	if ( $( ".js-carousel" ).length ) {
		var owlCarousel = $(".js-carousel");
		owlCarousel.owlCarousel({
			onInitialized: function (event) {
				
				matchPosts();
			},
		});
	};
};