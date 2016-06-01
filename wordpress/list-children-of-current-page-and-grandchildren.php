<!-- START LIST CHILDREN OF CURRENT PAGE -->
<?php
	$children = get_pages( array('child_of' => $post->ID) ); 
	if( count( $children ) != 0 ) { 
?>


	<?php 
		$args = array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'name', 'posts_per_page' => -1); 
		$child_query = new WP_Query( $args ); 
		while ( $child_query->have_posts() ) : $child_query->the_post(); 
	?>

	<h2><?php the_title(); ?></h2>

		<!-- START LIST GRANDCHILDREN OF LOOPING CHILDREN -->

		<?php
			$thispage = $post->ID;
			$children = get_pages( array('child_of' => $thispage) ); 
			if( count( $children ) != 0 ) { 
		?>
		<?php 
			$args = array( 'post_parent' => $thispage, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'name', 'posts_per_page' => -1); 
			$grandchild = new WP_Query( $args ); 
			while ( $grandchild->have_posts() ) : $grandchild->the_post(); 
		?>

		<p><?php the_title(); ?></p>

		<?php endwhile; wp_reset_postdata(); ?>
		<? } ?>

	<!-- // END LIST GRANDCHILDREN OF LOOPING CHILDREN -->

	<?php endwhile; wp_reset_postdata(); ?>


<?php } ?>
<!-- // END LIST CHILDREN OF CURRENT PAGE -->