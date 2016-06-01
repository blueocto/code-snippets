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