<?php

// This essentially removes any widths and heights from the Featured Images across the site

// In your functions.php

// Remove width/height from images with the_post_thumbnail()
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;
}

?>

<!-- In your template -->

<?php if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('full'); //this must be full for it to display 100% ?>
	</a><!-- //piece -->
<?php } ?>