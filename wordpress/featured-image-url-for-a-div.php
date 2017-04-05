<?php 
/**
* It’s worth noting that has_post_thumbnail() does not just check for the Featured Image as the Codex User Contributed Note suggests. If a post contains no defined featured image but it does contain an image in the content this function will still return TRUE. so have updated this code.
**/
?>

<?php /* Lets grab the URL for the featured image */ 
	$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

if  ( ! empty( $featured_image_url ) ) { ?>

<div style="background-image:url(<?php echo $featured_image_url; ?>);">

<?php } else { ?>

<!-- do something else -->

<?php } ?>