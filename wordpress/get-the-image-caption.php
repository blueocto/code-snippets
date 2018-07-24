<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$args = array('post_type' => 'attachment','numberposts' => -1,'post_status' => null,'post_parent' => $post->ID);

	$attachments = get_posts( $args ); 
	if ( $attachments ) { 
	foreach ( $attachments as $attachment ) { ?>

		<div class="item">
			<?php 
				$itemimg = wp_get_attachment_image( $attachment->ID, 'thumbnail' ); 
				echo preg_replace('#(width|height)="d+"#','',$itemimg);
                // get the caption
				$caption = get_post_field('post_excerpt', $attachment->ID);
				echo $caption; 
			?>
		</div>

<?php } } endwhile; endif; ?>
<?php wp_reset_postdata(); ?>