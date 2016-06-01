// See gainfordcarehomes.com for example

//iPad hover menu fix
var ua = navigator.userAgent, event = (ua.match(/iPad/i) );


var $nb = jQuery.noConflict();

$nb(document).ready(function(){

function showMenu() {
	if( (ua.match(/iPad/i) ) ) {
		
		$nb(".nav .menu-item-445 a").mousedown(function(e) {
			$nb('.nav .menu-item-445 ul').css("left","0");
		});
	
	} else {

	}
}
showMenu();


/* option CSS - whole menu needs to be high index, if slider is underneath

.nav, 
.nav .menu-item-445, 
.nav .menu-item-445 ul { z-index: 1000;}

*/