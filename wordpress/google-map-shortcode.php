<?php

////////////////////////////////
// 1. In your functions file


// This allows us to be able to query any url and put the result into a var quickly.
function getCurlData($url)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
	$curlData = curl_exec($curl);
	curl_close($curl);

	return $curlData;
}

/*
 * 	Google Map Shortcode
 * 	Example: [google_map post_code=""]
 * 	Version 0.1.2
 */
function create_google_map($atts)
{
	$a = shortcode_atts(array(
		'post_code' => '',
	), $atts);
	$postCode = str_replace(' ', '', $a['post_code']);
	$lookup = getCurlData('https://api.postcodes.io/postcodes/' . $postCode);
	$lookupJSON = json_decode($lookup);
	$num = rand();
	$content = '<div style="display: inline-block;" class="card google-map-shortcode">
		<div data-marker="marker-' . $num . '" data-lat="' . $lookupJSON->result->latitude . '"
			 data-lng=" ' . $lookupJSON->result->longitude . '" class="map" id="map-' .  $num . '"></div>
	</div>';
	return $content;
}

add_shortcode('google_map', 'create_google_map');

///////////////////////////////
// 2. In your HTML/PHP file

?>

<?php if( get_sub_field( 'google_map_post_code' ) ):
	$scGoogleMaps = get_sub_field('google_map_post_code'); 
?>

<?php echo do_shortcode('[google_map post_code="' . $scGoogleMaps . '"]'); ?>

<script>
	function initMap() {let mapList = $('.map');let i = 0;mapList.each(function () {i++;let lat = parseFloat(this.dataset.lat);let lng = parseFloat(this.dataset.lng);let mapName = this.id;let icon = "[ICON-URL]";mapName = new google.maps.Map(document.getElementById(this.id), {center: {lat: lat, lng: lng},zoom: 16,disableDefaultUI: true,});this.dataset.marker = new google.maps.Marker({position: {lat: lat, lng: lng},map: mapName,icon: icon,});});}
</script>

<?php endif; ?>


<?php 

///////////////////////////////
// 3. In your styles

?>

// Google Maps
.google-map--shortcode {
	display: block !important;
	width: 100%;
	height: 286px;

	.map {
		width: 100%;
		height: 100%;
	}
}
