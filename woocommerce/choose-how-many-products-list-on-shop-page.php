<?php

/*** functions.php ***/


/**
* Change number of products that are displayed per page (shop page)
*/
function new_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = -1; // -1 for all of them
	return $cols;
}
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

?>