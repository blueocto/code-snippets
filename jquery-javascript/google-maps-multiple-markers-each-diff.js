/* To go in the Body (API 3)
============================================ */


// <![CDATA[
function initialize() {
	var mapOptions = {
		zoom: 11,
		center: new google.maps.LatLng(54.960873,-1.705993),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById('map_dist'), mapOptions);

	setMarkers(map, towns);
}
var towns = [
	['Whickham', 54.945238,-1.674471, 1, 'pin-green.png'],
	['Low Fell', 54.935944,-1.597009, 2, 'pin-orange.png'],
	['Burnopfield, Sunniside, Marley Hill, Byemoor, Tanfield Village & Tantobie', 54.908199,-1.735368, 3, 'pin-blue.png'],
	['Prudhoe, Wylam, Ovingham & Ovington', 54.963376,-1.846991, 4, 'pin-red.png'],
	['Blaydon & Winlaton', 54.963222,-1.718588, 5, 'pin-purple.png'],
	['Chapel Park & Westerhope', 54.996057,-1.712365, 6, 'pin-yellow.png'],
	['Ryton', 54.973771,-1.762598, 7, 'pin-pink.png']
];
function setMarkers(map, locations) {
	var shape = {
		coord: [1, 1, 1, 40, 40, 40, 40 , 1],
		type: 'poly'
	};
	for (var i = 0; i < locations.length; i++) {
		var town = locations[i];
		var image = 
			new google.maps.MarkerImage('/wp-content/themes/tvpublications/images/map_pins/'+town[4], // '4' represents the array number
			new google.maps.Size(40, 45),
			new google.maps.Point(0,0),
			new google.maps.Point(0, 45)
		);
		var myLatLng = new google.maps.LatLng(town[1], town[2]); // '1' and '2' represent the array number
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: image,
			shape: shape,
			title: town[0],
			zIndex: town[3]
		});
	}
}
google.maps.event.addDomListener(window, 'load', initialize);

// ]]>


/* To go in the Header

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

============================================ */


/* To go in the Header

<div id="map_dist" class="map_dist" style="width:640px; height:275px"></div>

============================================ */