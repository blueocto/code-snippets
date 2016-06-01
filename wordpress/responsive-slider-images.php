<!-- Grab all images from this page, foreach them into slides, with no widths/heights -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$args = array('post_type' => 'attachment','numberposts' => -1,'post_status' => null,'post_parent' => $post->ID); 
	$attachments = get_posts( $args ); 
	if ( $attachments ) { 
		foreach ( $attachments as $attachment ) { ?>
					
			<div class="slide">
				<?php $itemimg = wp_get_attachment_image( $attachment->ID, 'full' ); echo preg_replace('#(width|height)="\d+"#','',$itemimg); ?>
			</div>

		<?php } } endwhile; endif; ?>
<?php wp_reset_postdata(); ?>