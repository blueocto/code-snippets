var script = document.createElement('script'),
scripts = document.getElementsByTagName('script')[0];
script.async = true;
script.src = url;
scripts.parentNode.insertBefore(script, scripts);



// A Reusable Function And Optional Callback

asyncLoadScript = function (url, callback) {

// Create a new script and setup the basics.
var script = document.createElement("script"), 
	firstScript = document.getElementsByTagName('script')[0];

	script.async = true;
	script.src = url;

	// Handle the case where an optional callback was passed in.
	if ( "function" === typeof(callback) ) { 
		script.onload = function() { 
			callback(); 

			// Clear it out to avoid getting called more than once or any memory leaks. 
			script.onload = script.onreadystatechange = undefined; 
		}; 
		script.onreadystatechange = function() { 
			if ( "loaded" === script.readyState || "complete" === script.readyState ) { 
				script.onload(); 
			} 
		};
	}

	// Attach the script tag to the page (before the first script) so the magic can happen.
	firstScript.parentNode.insertBefore(script, firstScript);
};

// If this is included in a page we can load a script simply by calling:

asyncLoadScript('http://example.com/foo.js');

// And, if we want to execute a callback after the script is completed loading we can do something like:

asyncLoadScript('http://example.com/foo.js', function() {
  alert('The script is loaded!');
});



// Efficient social networks async

(function(doc, script) {
	var js, 
		fjs = doc.getElementsByTagName(script)[0],
		add = function(url, id) {
			if (doc.getElementById(id)) {return;}
			js = doc.createElement(script);
			js.src = url;
			id && (js.id = id);
			fjs.parentNode.insertBefore(js, fjs);
		};

	// Google Analytics
	add(('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js', 'ga');
	// Google+ button
	add('http://apis.google.com/js/plusone.js');
	// Facebook SDK
	add('//connect.facebook.net/en_US/all.js', 'facebook-jssdk');
	// Twitter SDK
	add('//platform.twitter.com/widgets.js', 'twitter-wjs');
}(document, 'script'));