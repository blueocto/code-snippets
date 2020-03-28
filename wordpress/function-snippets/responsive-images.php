<?php

// Output the current image sizes - usually Wordpress defaults
// "thumbnail" 	= 150px
// "medium"		= 300px
// "large"		= 1024px
// "full"		= original image size

// function image_size_names($sizes) {
	// var_dump($sizes); die;
// }
// add_filter('image_size_names_choose', 'image_size_names');


// Let’s say you want to “update” the existing sizes and add 2 new ones: ‘small’ and ‘medium_large’.
// Unfortunately, the default sizes can’t be overwritten by adding new ones with the same names.
// In this case, we're changing/removing them here in the code.

function remove_default_sizes() {
	remove_image_size('thumbnail');
	remove_image_size('medium');
	remove_image_size('large');
	remove_image_size('full');
}

function custom_image_sizes() {
	remove_default_sizes();
	// new image: name, width, height (auto)
	// match our breakpoints
	add_image_size( 'thumbnail', 160, 9999 );
	add_image_size( 'small',  320, 9999 );
	add_image_size( 'medium',  600, 9999 );
	add_image_size( 'large', 768, 9999 );
	add_image_size( 'xlarge', 1024, 9999 );
	add_image_size( 'xxlarge', 1366, 9999 );
	// no bigger than our overall row/container/global width
	add_image_size( 'full', 1095, 9900  );
}
add_action('after_setup_theme', 'custom_image_sizes');

function image_size_names($sizes) {
  return array_merge( $sizes, array(
	'thumbnail'		=> __( 'Thumbnail' ),
	'small'			=> __( 'Small' ),
	'medium'		=> __( 'Medium' ),
	'large' 		=> __( 'Large' ),
	'xlarge'		=> __( 'X Large' ),
	'xxlarge'		=> __( 'XX Large' ),
	'full'			=> __( 'Full' )
  ));
}
add_filter('image_size_names_choose', 'image_size_names');


// Add the ability to output more `sizes` so images only load upto their breakpoint
// e.g. image-768x512.jpg = viewport 768w

function responsive_image_sizes($sizes, $size) {
	global $_wp_additional_image_sizes;
	$width = $size[0];
	$list = array_values($_wp_additional_image_sizes);
	$len = count($list);
	$res = '';
	for($i=1; $i<$len; $i++) {
		$res .= '(max-width: '. $list[$i]['width'].'px) '. $list[$i-1]['width'].'px, ';
	}
	$res .= $width.'px'; 
	return $res;
}
add_filter('wp_calculate_image_sizes', 'responsive_image_sizes', 10 , 2);
