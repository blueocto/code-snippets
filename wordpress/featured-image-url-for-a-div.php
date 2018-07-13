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




<?php /** to dictate the size output use **/ ?>
<?php $thumb_id = get_post_thumbnail_id( $post->ID );
if ( '' != $thumb_id ) {
	// setting last param to false, stops WP outputting the default image, so you can set your own.
	$thumb_url  = wp_get_attachment_image_src( $thumb_id, 'medium', false );
	$featuredImage      = $thumb_url[0];
}?>



<?php 
	/**
	* It’s worth noting that has_post_thumbnail() does not just check for the Featured Image as the Codex User Contributed Note suggests. If a post contains no defined featured image but it does contain an image in the content this function will still return TRUE.
	**/
?>
<img <?php if ( has_post_thumbnail( $post->ID ) ) { ?>
	 data-interchange="[<?php the_post_thumbnail_url( 'hero-image-small' ); ?>, small], 
	[<?php the_post_thumbnail_url( 'hero-image-medium' ); ?>, medium], 
	[<?php the_post_thumbnail_url( 'hero-image-large' ); ?>, large], 
	[<?php the_post_thumbnail_url( 'hero-image-xlarge' ); ?>, xlarge],
	[<?php the_post_thumbnail_url( 'full' ); ?>, xxlarge]"
	<?php } else { ?>
	 data-src="/wp-content/uploads/2018/05/couple-at-desk-pointing-to-laptop-with-graphs-600x259.jpg" 
	 data-srcset="/wp-content/uploads/2018/05/couple-at-desk-pointing-to-laptop-with-graphs-900x389.jpg 600w, 
	 /wp-content/uploads/2018/05/couple-at-desk-pointing-to-laptop-with-graphs-1200x519.jpg 900w, 
	 /wp-content/uploads/2018/05/couple-at-desk-pointing-to-laptop-with-graphs-1440x623.jpg 1200w, 
	 /wp-content/uploads/2018/05/couple-at-desk-pointing-to-laptop-with-graphs.jpg 1440w" sizes="100vw"<?php } ?> alt="" class="lazyload">
	 