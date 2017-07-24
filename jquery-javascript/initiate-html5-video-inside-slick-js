/* ==========================================================================
	Example Slick slider
========================================================================== */

$('#FeaturesSlider .slides').slick({
	dots: true, 
	autoplay: false, 
	slidesToShow: 3,
	slidesToScroll: 3, 
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 640,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
	],
	nextArrow: '<button type="button" class="slick-next"></button>', 
	prevArrow: '<button type="button" class="slick-prev"></button>',
});

/* ==========================================================================
	Find HTML5 videos and initiate play
========================================================================== */

var videos = $('#FeaturesSlider .slides video');
videos.each(function(video) {
	$(this).get(0).play(); 
});

addRefreshSafariVideoListener("video-1");
addRefreshSafariVideoListener("video-2");
addRefreshSafariVideoListener("video-3");


/* ==========================================================================
	This allows a fullscreen video to be initiated on mobile
========================================================================== */
function addRefreshSafariVideoListener(elementId) {
	var player = document.getElementById(elementId);
	player.addEventListener('webkitendfullscreen', function(event) { 
  		var iframe_clone = $("#" + elementId).clone();
  		$("#" + elementId).replaceWith(iframe_clone);
	}, false);
}
