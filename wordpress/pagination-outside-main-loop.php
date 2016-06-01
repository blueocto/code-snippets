<?php // Functions.php

// Allow pagination outside of main loop
function after_post_link($format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true) { 
	if ( $previous && is_attachment() ) 
		$post = & get_post($GLOBALS['post']->post_parent); 
	else 
		$post = get_adjacent_post($in_same_cat, $excluded_categories, $previous); 
	if ( !$post ) return; 
		$link = get_permalink($post); 
		$format = str_replace('%link', $link, $format); 
		$adjacent = $previous ? 'previous' : 'next'; 
	echo apply_filters( "{$adjacent}_post_link", $format, $link ); 
}
function before_post_link($format, $link, $in_same_cat = false, $excluded_categories = '', $previous = false) { 
	if ( $previous && is_attachment() ) 
		$post = & get_post($GLOBALS['post']->post_parent); 
	else 
		$post = get_adjacent_post($in_same_cat, $excluded_categories, $previous); 
	if ( !$post ) return; 
		$link = get_permalink($post); 
		$format = str_replace('%link', $link, $format); 
		$adjacent = $previous ? 'previous' : 'next'; 
	echo apply_filters( "{$adjacent}_post_link", $format, $link ); 
}

?>


<!-- Single.php -->

<a rel="shortcut" data-key="left" href="<?php before_post_link('%link', '', FALSE); ?>">
	<i class="icon-chevron-left"></i>&nbsp;Previous</a>|
<a rel="shortcut" data-key="up" href="index.php">
	<sup class="icon-chevron-up"></sup> &nbsp;All</a>| 
<a rel="shortcut" data-key="right" href="<?php after_post_link('%link', '', FALSE); ?>">
	Next &nbsp;<i class="icon-chevron-right"></i></a>