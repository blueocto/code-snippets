<?php

// Add the ability to show featured image captions
function the_post_thumbnail_caption() {
	global $post;
	$thumbnail_id    = get_post_thumbnail_id($post->ID);
	$thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
	if ($thumbnail_image && isset($thumbnail_image[0])) {
		echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
	}
}

?>

<!-- In your template file -->

<?php the_post_thumbnail_caption(); ?>

<?php 

// Customise the output but benefit from srcset

if (get_sub_field("hero_image")) {
	$heroImage = get_sub_field('hero_image');
	$heroSize = array( 1200, 1200, false); // (thumbnail, medium, large, full or custom size)
	$heroLoading = array( "loading" => "eager" );
	if( $heroImage ) {
		echo wp_get_attachment_image( $heroImage, $heroSize, '', $heroLoading );
	}
}
