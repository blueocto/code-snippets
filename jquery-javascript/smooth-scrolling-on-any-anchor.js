/* Smooth scroll to section
--- Variables: The offset required for smooth scroll. */
var offset = 83;

/* --- Function: Smooth scroll to section & apply offset. */
function navScroll(href, offset) {
	$('body,html').animate({scrollTop: $(href).offset().top-offset}, "slow");
}

/* Hook: Main navigation Smooth Scroll */
$("a").click(function () {

	// Enable Smooth Scroll
	navScroll($(this).attr("href"), offset);

	return false;
});
