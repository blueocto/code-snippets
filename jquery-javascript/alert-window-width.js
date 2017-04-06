function checkWidth() {
	var windowSize = $(window).width();

	if (windowSize < 480) {
		alert("window width is less than 480");
	}
	else if (windowSize <= 768) {
		alert("window width is less than or equal to 768");
	}
	else if (windowSize < 870) {
		alert("window width is less than 870");
	}
	else if (windowSize <= 879) {
		alert("window width is less than or equal to 879");
		}
	else if (windowSize >= 1000) {
		alert("window width is equal to or more than 1000");
	}
	else if (windowSize <= 1024) {
		alert("window width is less than or equal to 1024");
	}
	else if (windowSize > 960) {
		alert("window width is greater than 960");
	}

	// Execute on load
	checkWidth();
	// Bind event listener
	$(window).resize(checkWidth);

};