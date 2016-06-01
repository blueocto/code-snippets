// Paul Irish variant, delaying content load so @font-face doesn't flash, especially in Firefox
(function(){
	var d = document, e = d.documentElement, s = d.createElement('style');
	if (e.style.MozTransform === ''){ // gecko 1.9.1 inference
	// s.textContent = 'body{visibility:hidden}';
	s.textContent = 'body{text-indent:-9999px}';
	e.firstChild.appendChild(s);
	function f() { 
		var ffrendertime = setTimeout ( function(){s.parentNode && s.parentNode.removeChild(s)} , 200 ); 
	}
	addEventListener('load',f,false);
	setTimeout(f,2000); 
	}
})();
