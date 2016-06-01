<!-- 
	This checked which images have been uploaded to that post or page, and puts them out in a foreach.

	It also strips out the width and height for Responsive layouts.
-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$args = array('post_type' => 'attachment','numberposts' => -1,'post_status' => null,'post_parent' => $post->ID);

	$attachments = get_posts( $args ); 
	if ( $attachments ) { 
	foreach ( $attachments as $attachment ) { ?>

		<div class="item">
			<?php 
				$itemimg = wp_get_attachment_image( $attachment->ID, 'full-size' );
				echo preg_replace('#(width|height)="d+"#','',$itemimg);
								//change $itemimg to echo, remove the = and delete the second line, if you want width/height
			?>
		</div>

<?php } } endwhile; endif; ?>
<?php wp_reset_postdata(); ?>