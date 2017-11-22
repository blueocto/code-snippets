(function() {
	'use strict';

	// check if Service Workers supported in browser:
	if (!('serviceWorker' in navigator)) {
		console.log('Service worker not supported');
		return;
	}
	// or you can use:
	/*
	if (!navigator.serviceWorker) return; 
	*/

	navigator.serviceWorker.register('service-worker.js', {
		// scope: '/'
	})

	// If successful...
	.then(function(registration) {
		console.log('Registered at scope:', registration.scope);
	})

	// If not registered...
	.catch(function(error) {
		console.log('Registration failed:', error);
	});

	
	// or the shorter version:
	/*
	navigator.serviceWorker.register('/sw.js').then(function() {
		console.log('Registration worked!');
	}).catch(function() {
		console.log('Registration failed!'); 
	});
	*/

})();