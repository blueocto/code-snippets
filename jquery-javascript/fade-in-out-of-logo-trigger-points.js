// fade in|out the logo from middle of top-bar to the left
jQuery(window).scroll(function() {
	var hT = jQuery('#scroll-to').offset().top,
	hH = jQuery('#scroll-to').outerHeight(),
	wH = jQuery(window).height(),
	wS = jQuery(this).scrollTop();
	if (wS > (hT+hH-wH) && (hT > wS) && (wS+wH > hT+hH)) {	
		// show the logo by default in the middle of the top-nav
		jQuery('.button-swap .logo').fadeIn(300).css('display','inline-block'); 
		
		// the left logo hidden by default
		jQuery('.logo-swap .logo').fadeOut(300).css('display','none'); 

	} else {
		// remove the logo ... it will show on the left
		jQuery('.button-swap .logo').fadeOut(300).css('display','none'); 
		
		// show the left logo now scrolling
		jQuery('.logo-swap .logo').fadeIn(300).css('display','inline-block'); 
	}
});

// fade in the 'request membership' button in the header
jQuery(window).scroll(function() {
	var hT = jQuery('#button-scroll').offset().top,
	hH = jQuery('#button-scroll').outerHeight(),
	wH = jQuery(window).height(),
	wS = jQuery(this).scrollTop();
	if (wS > (hT+hH-wH) && (hT > wS) && (wS+wH > hT+hH)) {
		// button should be hidden by default
		jQuery('.button-swap .button').fadeOut(300).css('display','none'); 
	} else {
		// show the button when we reach scroll-to
		jQuery('.button-swap .button').fadeIn(300).css('display','inline-block'); 
	}
});